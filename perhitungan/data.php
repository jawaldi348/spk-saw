<?php
require '../config/database.php';
$idtahun = $_GET['idtahun'];
$data_mhs = [];
$result = [];
$query = "SELECT * FROM mahasiswa JOIN tahun_akademik ON idtahun_mhs=id_tahun WHERE id_tahun='$idtahun'";
$execute = $connect->query($query);
while ($rows = $execute->fetch_array(MYSQLI_ASSOC)) {
    $id = $rows['kode_mhs'];
    $result = [
        'kode_mhs' => $rows['kode_mhs'],
        'nodaftar_mhs' => $rows['nodaftar_mhs'],
        'nama_mhs' => $rows['nama_mhs'],
        'status_terima' => $rows['status_terima'],
    ];
    $data_kriteria = [];
    $result_kriteria = [];
    $rangking = 0;
    $total_poin = 0;
    $query_kriteria = "SELECT * FROM kriteria";
    $query_result = $connect->query($query_kriteria);
    while ($kriteria = $query_result->fetch_array(MYSQLI_ASSOC)) {
        $result_kriteria = [
            'kode_kriteria' => $kriteria['kode_kriteria'],
            'bobot_kriteria' => $kriteria['bobot_kriteria']
        ];
        $kode_kriteria = $kriteria['kode_kriteria'];
        $query_nilai = "SELECT * FROM biodata JOIN subkriteria ON id_subkriteria=kode_subkriteria WHERE id_mahasiswa='$id' AND id_kriteria='$kode_kriteria'";
        $query_result_nilai = $connect->query($query_nilai);
        $data_nilai = $query_result_nilai->fetch_array(MYSQLI_ASSOC);
        $result_kriteria['bobot_subkriteria'] = $data_nilai['bobot_subkriteria'];
        $result_kriteria['nama_subkriteria'] = $data_nilai['nama_subkriteria'];
        // Normalisasi Kriteria
        if ($kode_kriteria == 'K3') :
            $sql_normalisasi_kriteria = "select min(bobot_subkriteria) as min_kriteria from biodata join subkriteria on id_subkriteria=kode_subkriteria where id_kriteria='$kode_kriteria'";
        else :
            $sql_normalisasi_kriteria = "select max(bobot_subkriteria) as max_kriteria from biodata join subkriteria on id_subkriteria=kode_subkriteria where id_kriteria='$kode_kriteria'";
        endif;
        $sql_result_normalisasi_kriteria = $connect->query($sql_normalisasi_kriteria);
        $data_normalisasi_kriteria = $sql_result_normalisasi_kriteria->fetch_array(MYSQLI_ASSOC);
        if ($kode_kriteria == 'K3') :
            $normalisasi_kriteria = $data_normalisasi_kriteria['min_kriteria'] / $data_nilai['bobot_subkriteria'];
        else :
            $normalisasi_kriteria = $data_nilai['bobot_subkriteria'] / $data_normalisasi_kriteria['max_kriteria'];
        endif;
        $total_poin = $total_poin + $data_nilai['bobot_subkriteria'];
        $jumlah_nilai = $kriteria['bobot_kriteria'] * $normalisasi_kriteria;
        $rangking = $rangking + $jumlah_nilai;
        $result_kriteria['normalisasi_kriteria'] = $normalisasi_kriteria;
        $result_kriteria['jumlah_nilai'] = number_format($jumlah_nilai, 2, '.', '');
        $data_kriteria[] = $result_kriteria;
    }
    $result['total_poin'] = number_format($total_poin, 2, '.', '');
    $result['total_nilai'] = number_format($rangking, 4, '.', '');
    // $result['persentase'] = number_format($rangking * 100, 0, '.', '');
    $result['persentase'] = (float)number_format($rangking * 100, 4);
    $result['kriteria'] = $data_kriteria;
    $data_mhs[] = $result;
}
$data_main_kriteria = [];
$result_main_kriteria = [];
$query_main_kriteria = "SELECT * FROM kriteria";
$query_main_result = $connect->query($query_main_kriteria);
while ($datakriteria = $query_main_result->fetch_array(MYSQLI_ASSOC)) {
    $result_main_kriteria = [
        'kode_kriteria' => $datakriteria['kode_kriteria'],
        'nama_kriteria' => $datakriteria['nama_kriteria']
    ];
    $data_main_kriteria[] = $result_main_kriteria;
}
$data = [
    'mahasiswa' => $data_mhs,
    'kriteria' => $data_main_kriteria
]; ?>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>No Pendaftaran</th>
                <th>Nama</th>
                <?php foreach ($data['kriteria'] as $kriteria) { ?>
                    <th class="text-center"><?= $kriteria['nama_kriteria'] ?></th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($data['mahasiswa'] as $mahasiswa) { ?>
                <tr>
                    <td class="center"><?= $no ?></td>
                    <td><?= $mahasiswa['nodaftar_mhs'] ?></td>
                    <td><?= $mahasiswa['nama_mhs'] ?></td>
                    <?php foreach ($mahasiswa['kriteria'] as $nilai_kriteria) { ?>
                        <td class="text-center"><?= number_format($nilai_kriteria['normalisasi_kriteria'], 2, '.', '') ?></td>
                    <?php } ?>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>
<hr>
<div class="row">
    <form action="perhitungan/simpan.php" method="POST">
        <input type="hidden" name="tahun" value="<?= $idtahun; ?>">
        <div class="col-xs-12 col-sm-4">
            <div class="form-group">
                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Input jumlah mahasiswa diterima dari persentase terbesar">
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <button type="submit" class="btn btn-xs btn-success"><i class="ace-icon fa fa-floppy-o bigger-110"></i> Simpan Data Mahasiswa Diterima</button>
        </div>
    </form>
</div>
<div class="table-header">Hasil Rekomendasi Penerimaan Peserta KIP</div>
<div>
    <table id="dynamic-table" class="table table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th class="center" width="5%">No</th>
                <th>No Pendaftaran</th>
                <th>Nama</th>
                <th class="text-center">Total Poin</th>
                <th class="text-center">SAW</th>
                <th class="text-center">Persentase</th>
                <th class="text-center">Status Diterima</th>
            </tr>
        </thead>
        <tbody>
            <?php
            array_multisort(array_map(function ($element) {
                return $element['total_nilai'];
            }, $data['mahasiswa']), SORT_DESC, $data['mahasiswa']);
            $no = 1;
            foreach ($data['mahasiswa'] as $mahasiswa) { ?>
                <tr>
                    <td class="center"><?= $no ?></td>
                    <td><?= $mahasiswa['nodaftar_mhs'] ?></td>
                    <td><?= $mahasiswa['nama_mhs'] ?></td>
                    <td class="text-center"><?= $mahasiswa['total_poin'] ?></td>
                    <td class="text-center"><?= $mahasiswa['total_nilai'] ?></td>
                    <td class="text-center"><?= $mahasiswa['persentase'] ?>%</td>
                    <td class="text-center"><?= $mahasiswa['status_terima'] == 0 ? '<span class="badge badge-warning">Pending</span>' : ($mahasiswa['status_terima'] == 1 ? '<span class="badge badge-success">Diterima</span>' : '<span class="badge badge-danger">Tidak Diterima</span>') ?></td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>
</div>
<?php
require '../config/database.php';
$idtahun = $_POST['tahun'];
$jumlah = $_POST['jumlah'];

$query_tahun = "SELECT * FROM tahun_akademik WHERE id_tahun='$idtahun'";
$execute_tahun = $connect->query($query_tahun);
$data_tahun = $execute_tahun->fetch_array(MYSQLI_ASSOC);

$data_mhs = [];
$result = [];
$query = "SELECT * FROM mahasiswa JOIN tahun_akademik ON idtahun_mhs=id_tahun WHERE id_tahun='$idtahun'";
$execute = $connect->query($query);
while ($rows = $execute->fetch_array(MYSQLI_ASSOC)) {
    $id = $rows['kode_mhs'];
    $result = [
        'kode_mhs' => $rows['kode_mhs'],
        'nodaftar_mhs' => $rows['nodaftar_mhs'],
        'nama_mhs' => $rows['nama_mhs']
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
<html>

<head>
    <title>Laporan Mahasiswa Penerima KIP</title>
    <link rel="stylesheet" type="text/css" href="../assets/cetak.css" />
    <link rel="stylesheet" type="text/css" media="print" href="assets/cetak_media_print.css" />
</head>

<body onLoad="//window.print();">
    <div class="page-portrait">
        <div class="nobreak">
            <style type="text/css">
                .header_cetak tr td {
                    font-family: Arial;
                    padding: 0px;
                }

                .header_cetak tr td img {
                    width: 70px;
                    height: 70px;
                    padding-bottom: 1px;
                }

                .header_cetak tr td h1 {
                    font-size: 17pt;
                    margin-bottom: -3px;
                }

                .header_cetak tr td h3 {
                    font-size: 12pt;
                    text-transform: uppercase;
                }

                .header_cetak tr td h4 {
                    font-size: 7pt;
                    font-weight: normal;
                    margin-top: -3px;
                }

                .header_cetak #top {
                    padding-top: 3px;
                    margin-bottom: -4px;
                }

                .header_cetak tr td h4 div {
                    display: inline-flex;
                }

                .header_cetak tr td hr {
                    border: solid 1px #000;
                    margin-top: -1px;
                }

                .hr1 {
                    border: 1px solid #000 !important;
                    margin-top: 0px !important;
                }

                .hr2 {
                    border: 0.6px solid #000 !important;
                    margin-top: -5px !important;
                }
            </style>

            <table width="100%" class="header_cetak">
                <tr>
                    <td><img src="../assets/images/logo.png" /></td>
                    <td width="100%">
                        <center>
                            <h1>INSTITUT BISNIS DAN TEKNOLOGI PELITA INDONESIA</h1>
                            <h3>FAKULTAS ILMU KOMPUTER</h3>
                            <h4 align="center">
                            </h4>
                            <h4 id="top">
                                <div>Jl. Jend. Ahmad Yani No. 78-88 Pekanbaru, 28127</div>
                                <div>Telp : (0761) 24418 (Hunting),</div>
                                <div>Fax : (0761) 35508</div>
                            </h4>
                            <h4>
                                <div>Website : pelitaindonesia.ac.id &nbsp;&nbsp;</div>
                                <div>Email : IBTPI@pelitaindonesia.ac.id</div>
                            </h4>
                        </center>
                    </td>

                </tr>
                <tr>
                    <td colspan="3">
                        <hr class="hr1">
                        <hr class="hr2">
                    </td>
                </tr>
            </table>

            <!-- <br /> -->
            <center>
                <h2>LAPORAN MAHASISWA PENERIMA KIP KULIAH <?= $data_tahun['nama_tahun'] ?></h2><br />
            </center>
            <table class="tabel-common" width="100%">
                <tr>
                    <th width="80" align="center">No. Pendaftaran</th>
                    <th>Nama Alternatif</th>
                    <th width="60">Hasil</th>
                    <th width="60">Persentase</th>
                </tr>
                <?php
                array_multisort(array_map(function ($element) {
                    return $element['total_nilai'];
                }, $data['mahasiswa']), SORT_DESC, $data['mahasiswa']);
                $no = 1;
                foreach ($data['mahasiswa'] as $mahasiswa) {
                    if ($no++ > $jumlah) break;
                ?>
                    <tr>
                        <td align="center"><?= $mahasiswa['nodaftar_mhs'] ?></td>
                        <td><?= $mahasiswa['nama_mhs'] ?></td>
                        <td align="center"><?= $mahasiswa['total_nilai'] ?></td>
                        <td align="center"><?= $mahasiswa['persentase'] ?>%</td>
                    </tr>
                <?php } ?>
            </table>
            <hr class="hidden" />
        </div>

        <br>

        <div id="table-tandatangan">
            <table align="right" width="100%">
                <tr>
                    <td width="70%" rowspan="3">&nbsp;</td>
                    <td align="center">Pekanbaru, <?= date('d M Y') ?><br /><span id="tipe_pengesahan0">Kepala Bagian Kemahasiswaan</span><br /><span id="jabatan0"></span></td>
                </tr>
                <tr>
                    <td align="center" height="50"></td>
                </tr>
                <tr>
                    <td align="center" nowrap="nowrap"><strong>Johan, M.Kom</strong></td>
                </tr>
            </table>
        </div>

    </div>
</body>

</html>
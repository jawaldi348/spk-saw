<?php
$id = $_GET['id'];
$query = "SELECT * FROM mahasiswa WHERE kode_mhs='$id'";
$execute = $connect->query($query);
$data = $execute->fetch_array(MYSQLI_ASSOC);

$error = '';
if (isset($_POST['edit'])) {
    $nama = $_POST['nama'];
    $nodaftar = $_POST['nodaftar'];
    $data_kriteria = $_POST['kriteria'];
    if ($nodaftar == '') {
        $error = 'No Pendaftaran tidak boleh kosong';
    } else {
        $query = "UPDATE mahasiswa SET nodaftar_mhs='$nodaftar',nama_mhs='$nama' WHERE kode_mhs='$id'";
        foreach ($data_kriteria as $kriteria) {
            $id_kriteria = $kriteria['id_kriteria'];
            $id_subkriteria = $kriteria['sub_kriteria'];
            if ($id_subkriteria != '') {
                $periksa_data = "SELECT * FROM prasyarat WHERE id_mahasiswa='$id' AND id_kriteria='$id_kriteria'";
                $execute_periksa = $connect->query($periksa_data);
                if ($execute_periksa->num_rows > 0) {
                    $data_periksa = $execute_periksa->fetch_array(MYSQLI_ASSOC);
                    $idbiodata = $data_periksa['id_prasyarat'];
                    $query_subkriteria = "UPDATE prasyarat SET id_subkriteria='$id_subkriteria' WHERE id_prasyarat='$idbiodata'";
                } else {
                    $query_subkriteria = "INSERT INTO prasyarat(id_mahasiswa,id_kriteria,id_subkriteria) VALUES('$id','$id_kriteria','$id_subkriteria')";
                }
                $connect->query($query_subkriteria);
            }
        }
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=alternatif")</script>';
        }
    }
}
?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit Alternatif</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Nama</label>
                            <input type="text" name="nama" class="form-control" value="<?= $data['nama_mhs'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">No Pendaftaran</label>
                            <input type="text" name="nodaftar" id="nodaftar" class="form-control" value="<?= $data['nodaftar_mhs'] ?>">
                        </div>
                        <?php $query_kriteria = "SELECT * FROM kriteria";
                        $result = $connect->query($query_kriteria);
                        if ($result->num_rows > 0) {
                            while ($kriteria = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                <input type="hidden" name="kriteria[<?= $kriteria['kode_kriteria'] ?>][id_kriteria]" value="<?= $kriteria['kode_kriteria'] ?>">
                                <div class="form-group">
                                    <label class="control-label"><?= $kriteria['kode_kriteria'] . ' - ' . $kriteria['nama_kriteria'] ?></label>
                                    <select name="kriteria[<?= $kriteria['kode_kriteria'] ?>][sub_kriteria]" class="form-control">
                                        <option value="">-- Pilih --</option>
                                        <?php
                                        $kode_kriteria = $kriteria['kode_kriteria'];
                                        $query_subkriteria = "SELECT * FROM subkriteria WHERE kriteria_subkriteria='$kode_kriteria'";
                                        $resultsub = $connect->query($query_subkriteria);
                                        if ($resultsub->num_rows > 0) {
                                            while ($subkriteria = $resultsub->fetch_array(MYSQLI_ASSOC)) {
                                                $id_subkriteria = $subkriteria['kode_subkriteria'];
                                                $query_cek = "SELECT * FROM prasyarat WHERE id_mahasiswa='$id' AND id_subkriteria='$id_subkriteria'";
                                                $execute = $connect->query($query_cek);
                                                $data_cek = $execute->fetch_array(MYSQLI_ASSOC);
                                                $selected = $data_cek != null ? 'selected' : '';
                                        ?>
                                                <option value="<?= $subkriteria['kode_subkriteria'] ?>" <?= $selected ?>><?= $subkriteria['nama_subkriteria'] ?></option>
                                        <?php }
                                        } ?>
                                    </select>
                                </div>
                        <?php }
                        } ?>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="edit" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=alternatif" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
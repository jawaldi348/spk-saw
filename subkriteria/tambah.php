<?php
$error = '';
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $kriteria = $_POST['kriteria'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    if ($kode == '' || $kriteria == '' || $nama == '' || $bobot == '') {
        $error = 'Kode, Kriteria, Sub Kriteria, atau Bobot tidak boleh kosong';
    } else {
        $query = "INSERT INTO subkriteria VALUES('$kode','$kriteria','$nama','$bobot')";
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=subkriteria")</script>';
        }
    }
}
?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Tambah Sub Kriteria</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Kode Sub Kriteria</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kriteria</label>
                            <select name="kriteria" id="kriteria" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php $query_kriteria = "SELECT * FROM kriteria";
                                $result = $connect->query($query_kriteria);
                                if ($result->num_rows > 0) {
                                    while ($kriteria = $result->fetch_array(MYSQLI_ASSOC)) { ?>
                                        <option value="<?= $kriteria['kode_kriteria'] ?>"><?= $kriteria['kode_kriteria'] . ' - ' . $kriteria['nama_kriteria'] ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Sub Kriteria</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bobot</label>
                            <input type="text" name="bobot" id="bobot" class="form-control">
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=subkriteria" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
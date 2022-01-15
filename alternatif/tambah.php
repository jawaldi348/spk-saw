<?php
$error = '';
if (isset($_POST['tambah'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    if ($kode == '' || $kode == '') {
        $error = 'Kode dan Nama Alternatif tidak boleh kosong';
    } else {
        $query = "INSERT INTO alternatif VALUES('$kode','$nama')";
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
                <h4 class="widget-title">Tambah Alternatif</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Kode Alternatif</label>
                            <input type="text" name="kode" id="kode" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Alternatif</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=alternatif" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
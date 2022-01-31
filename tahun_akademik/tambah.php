<?php
$error = '';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $status = $_POST['status'];
    if ($nama == '') {
        $error = 'Nama tahun tidak boleh kosong';
    } else {
        if ($status == 1) {
            $query = "UPDATE tahun_akademik SET status_tahun='0'";
            $connect->query($query);
        }
        $query = "INSERT INTO tahun_akademik(nama_tahun,status_tahun) VALUES('$nama','$status')";
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=tahun-akademik")</script>';
        }
    }
}
?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Tambah Tahun Akademik</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Nama Tahun</label>
                            <input type="text" name="nama" id="nama" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Status</label>
                            <select name="status" id="status" class="form-control">
                                <option value="">Pilih</option>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=tahun-akademik" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
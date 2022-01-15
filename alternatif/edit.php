<?php
$id = $_GET['id'];
$query = "SELECT * FROM alternatif WHERE kode_alternatif='$id'";
$execute = $connect->query($query);
$data = $execute->fetch_array(MYSQLI_ASSOC);

$error = '';
if (isset($_POST['edit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    if ($nama == '') {
        $error = 'Nama alternatif tidak boleh kosong';
    } else {
        $query = "UPDATE alternatif SET nama_alternatif='$nama' WHERE kode_alternatif='$kode'";
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
                            <label class="control-label">Kode Alternatif</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="<?= $data['kode_alternatif'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nama Alternatif</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_alternatif'] ?>">
                        </div>
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
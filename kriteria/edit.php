<?php
$id = $_GET['id'];
$query = "SELECT * FROM kriteria WHERE kode_kriteria='$id'";
$execute = $connect->query($query);
$data = $execute->fetch_array(MYSQLI_ASSOC);

$error = '';
if (isset($_POST['edit'])) {
    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $bobot = $_POST['bobot'];
    if ($kode == '' || $nama == '' || $bobot == '') {
        $error = 'Kode, Kriteria, atau Bobot tidak boleh kosong';
    } else {
        $query = "UPDATE kriteria SET nama_kriteria='$nama',bobot_kriteria='$bobot' WHERE kode_kriteria='$kode'";
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=kriteria")</script>';
        }
    }
}
?>

<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit Kriteria</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Kode Kriteria</label>
                            <input type="text" name="kode" id="kode" class="form-control" value="<?= $data['kode_kriteria'] ?>" readonly>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Kriteria</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="<?= $data['nama_kriteria'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Bobot</label>
                            <input type="text" name="bobot" id="bobot" class="form-control" value="<?= $data['bobot_kriteria'] ?>">
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="edit" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=kriteria" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$id = $_GET['id'];
$query = "SELECT * FROM user WHERE id_user='$id'";
$execute = $connect->query($query);
$data = $execute->fetch_array(MYSQLI_ASSOC);

$error = '';
if (isset($_POST['edit'])) {
    $kode = $_POST['kode'];
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == '') {
        $error = 'Username tidak boleh kosong';
    } else {
        if ($pass == '') {
            $query = "UPDATE user SET username='$user' WHERE id_user='$kode'";
        } else {
            $query = "UPDATE user SET username='$user',password=md5('$pass') WHERE id_user='$kode'";
        }
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("./?page=user")</script>';
        }
    }
}
?>
<div class="row">
    <div class="col-sm-offset-3 col-sm-6">
        <div class="widget-box">
            <div class="widget-header">
                <h4 class="widget-title">Edit User</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <input type="hidden" name="kode" value="<?= $data['id_user'] ?>">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control" value="<?= $data['username'] ?>">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <span class="help-block red">Kosongkan jika tidak ingin ganti password.</span>
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="edit" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=user" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
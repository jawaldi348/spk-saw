<?php
$query = "SELECT id_user FROM user ORDER BY id_user DESC LIMIT 1";
$execute = $connect->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
    $result = $data['id_user'];
    $kode = intval($result) + 1;
} else {
    $kode = 1;
}
$error = '';
if (isset($_POST['tambah'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];
    if ($user == '' || $pass == '') {
        $error = 'Username dan Password tidak boleh kosong';
    } else {
        $query = "INSERT INTO user VALUES('$kode','$user',md5('$pass'))";
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
                <h4 class="widget-title">Tambah User</h4>
            </div>
            <div class="widget-body">
                <form action="" method="POST">
                    <div class="widget-main">
                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                        <div class="form-group">
                            <label class="control-label">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="form-actions center">
                        <button type="submit" name="tambah" class="btn btn-sm btn-primary"><i class="ace-icon fa fa-floppy-o"></i> Simpan</button>
                        <a href="./?page=user" class="btn btn-sm btn-danger"><i class="ace-icon glyphicon glyphicon-remove"></i> Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
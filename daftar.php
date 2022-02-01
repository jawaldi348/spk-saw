<?php
require 'config/database.php';
$error = '';
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query_tahun = "SELECT * FROM tahun_akademik WHERE status_tahun='1'";
    $execute_tahun = $connect->query($query_tahun);
    $data_tahun = $execute_tahun->fetch_array(MYSQLI_ASSOC);
    $idtahun = $data_tahun['id_tahun'];

    $query_username = "SELECT * FROM mahasiswa WHERE username_mhs='$username'";
    $cek_username = $connect->query($query_username);
    if ($nama == '' || $username == '' || $password == '') {
        $error = 'Nama lengkap, Username, atau Password tidak boleh kosong';
    } else if ($cek_username->num_rows > 0) {
        $error = 'Username sudah digunakan';
    } else {
        $query = "INSERT INTO mahasiswa(idtahun_mhs,nama_mhs,username_mhs,password_mhs) VALUES('$idtahun','$nama','$username',md5('$password'))";
        if ($connect->query($query) === true) {
            echo '<script>window.location.replace("login.php")</script>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>Daftar - SPK SAW</title>

    <meta name="description" content="User login page" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="assets/css/ace.min.css" />
    <link rel="stylesheet" href="assets/css/ace-rtl.min.css" />
</head>

<body class="login-layout">
    <div class="main-container">
        <div class="main-content">
            <div class="row">
                <div class="col-sm-10 col-sm-offset-1">
                    <div class="login-container">
                        <div class="center">
                            <h1>
                                <i class="ace-icon fa fa-university green"></i>
                                <span class="red">IBT</span>
                                <span class="white" id="id-text2">PI</span>
                            </h1>
                            <h4 class="blue" id="id-company-text">SPK Metode SAW</h4>
                        </div>
                        <div class="space-6"></div>
                        <div class="position-relative">
                            <div class="signup-box visible widget-box no-border">
                                <div class="widget-body">
                                    <div class="widget-main">
                                        <h4 class="header green lighter bigger">
                                            <i class="ace-icon fa fa-users blue"></i>
                                            Pendaftaran Calon Mahasiswa
                                        </h4>
                                        <?= $error != '' ? '<div class="alert alert-danger">' . $error . '</div>' : '' ?>
                                        <form action="" method="POST">
                                            <fieldset>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="text" class="form-control" name="username" placeholder="Username" />
                                                        <i class="ace-icon fa fa-user"></i>
                                                    </span>
                                                </label>
                                                <label class="block clearfix">
                                                    <span class="block input-icon input-icon-right">
                                                        <input type="password" class="form-control" name="password" placeholder="Password" />
                                                        <i class="ace-icon fa fa-lock"></i>
                                                    </span>
                                                </label>
                                                <div class="space-24"></div>
                                                <div class="clearfix">
                                                    <button type="submit" name="tambah" class="width-100 pull-right btn btn-sm btn-success">
                                                        <span class="bigger-110">Register</span>
                                                        <i class="ace-icon fa fa-arrow-right icon-on-right"></i>
                                                    </button>
                                                </div>
                                            </fieldset>
                                        </form>
                                    </div>
                                    <div class="toolbar center">
                                        <a href="login.php" class="back-to-login-link"><i class="ace-icon fa fa-arrow-left"></i> Kembali ke login</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
        if ('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>" + "<" + "/script>");
    </script>
</body>

</html>
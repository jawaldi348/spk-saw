<?php
require 'config/database.php';
$user = @$_POST['username'];
$pass = @$_POST['password'];
session_start();
if (empty($user || $pass)) {
    $_SESSION['message'] = 'Username atau password tidak boleh kosong';
    header('location:./login.php');
} else {
    // Cek Data User
    $query_user = "SELECT * FROM user WHERE username='$user' AND password=md5('$pass')";
    $cek_user = $connect->query($query_user);
    // Cek Data Mahasiswa
    $query_mhs = "SELECT * FROM mahasiswa WHERE username_mhs='$user' AND password_mhs=md5('$pass')";
    $cek_mhs = $connect->query($query_mhs);
    if ($cek_user->num_rows > 0) {
        $data = $cek_user->fetch_array(MYSQLI_ASSOC);
        unset($_SESSION['message']);
        $_SESSION['iduser'] = $data['id_user'];
        $_SESSION['level'] = 'admin';
        header('location:./index.php');
    } elseif ($cek_mhs->num_rows > 0) {
        $data = $cek_mhs->fetch_array(MYSQLI_ASSOC);
        unset($_SESSION['message']);
        $_SESSION['iduser'] = $data['kode_mhs'];
        $_SESSION['level'] = 'mhs';
        header('location:./index.php');
    } else {
        $_SESSION['message'] = 'Akun yang diinputkan tidak terdaftar';
        header('location:./login.php');
    }
}

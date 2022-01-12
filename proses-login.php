<?php
require 'config/database.php';
$user = @$_POST['username'];
$pass = @$_POST['password'];
session_start();
if (empty($user || $pass)) {
    $_SESSION['message'] = 'Username atau password tidak boleh kosong';
    header('location:./login.php');
} else {
    $query = "SELECT * FROM user WHERE username='$user' AND password=md5('$pass')";
    $execute = $connect->query($query);
    if ($execute->num_rows > 0) {
        $data = $execute->fetch_array(MYSQLI_ASSOC);
        unset($_SESSION['message']);
        $_SESSION['iduser'] = $data['id_user'];
        header('location:./index.php');
    } else {
        $_SESSION['message'] = 'Akun yang diinputkan tidak terdaftar';
        header('location:./login.php');
    }
}

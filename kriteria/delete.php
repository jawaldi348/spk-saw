<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROm kriteria where kode_kriteria='$id'";
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=kriteria")</script>';
}

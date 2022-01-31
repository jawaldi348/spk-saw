<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROm tahun_akademik where id_tahun='$id'";
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=tahun-akademik")</script>';
}

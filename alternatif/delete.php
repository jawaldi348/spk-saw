<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROm alternatif where kode_alternatif='$id'";
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=alternatif")</script>';
}

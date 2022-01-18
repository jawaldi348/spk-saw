<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROm subkriteria where kode_subkriteria='$id'";
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=subkriteria")</script>';
}

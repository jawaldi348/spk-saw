<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROM mahasiswa where kode_mhs='$id'";
$query_kriteria = "DELETE FROM prasyarat where id_mahasiswa='$id'";
$connect->query($query_kriteria);
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=alternatif")</script>';
}

<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROM alternatif where kode_alternatif='$id'";
$query_kriteria = "DELETE FROM alternatif_kriteria where id_alternatif='$id'";
$connect->query($query_kriteria);
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=alternatif")</script>';
}

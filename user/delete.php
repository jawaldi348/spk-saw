<?php
require '../config/database.php';
$id = $_GET['id'];
$query = "DELETE FROm user where id_user='$id'";
if ($connect->query($query) === true) {
    echo '<script>window.location.replace("../index.php?page=user")</script>';
}

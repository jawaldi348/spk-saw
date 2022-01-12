<?php $connect = new mysqli('localhost', 'root', '', 'spk_saw');
if ($connect->connect_errno) {
    "Database error " . $connect->connect_errno;
}

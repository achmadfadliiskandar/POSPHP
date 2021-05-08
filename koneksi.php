<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "posphp";
$connect = new mysqli("$host","$user","$password","$database");

if ($connect->connect_errno) {
    echo "Tidak Terhubung".$connect->connect_errno;
}
?>
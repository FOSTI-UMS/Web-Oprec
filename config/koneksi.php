<?php
$server="127.0.0.1";
$server_username="root";
$server_password="";
$db="web-oprec";

$dbc=mysqli_connect($server,$server_username, $server_password) or die ("Koneksi Gagal");

mysqli_select_db($dbc, $db) or die("Database tidak Ada!!");
?>
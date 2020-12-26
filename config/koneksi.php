<?php
$server="localhost";
// $server_username="root";
// $server_password="";
$server_username="u5782209_root";
$server_password="r00tind0l0e1337";
$db="u5782209_oprec";

$dbc=mysqli_connect($server,$server_username, $server_password) or die ("Koneksi Gagal");

mysqli_select_db($dbc, $db) or die("Database tidak Ada!!");
?>
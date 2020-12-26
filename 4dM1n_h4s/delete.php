<?php 
session_start();
if (isset($_SESSION['admin'])) {
	if (isset($_GET['nim'])) {
    	include("../config/koneksi.php");
    	$nim=mysqli_escape_string($dbc, $_GET['nim']);
    	$fileQR="../img/qrcode/QRCode-".$nim."-Absensi.png";
    	// Hapus QR
    	if (file_exists($fileQR)) {
    		unlink($fileQR);
    	}
    	
    	$sql=mysqli_query($dbc, "DELETE FROM pendaftar WHERE nim='$nim'");
    	if ($sql) {
    		echo "<script>alert('Berhasil Dihapus.');window.location='daftar.php'</script>";
    	} else {
    		echo "<script>alert('Gagal Dihapus.');window.location='daftar.php'</script>";
    	}
    } else {
    	echo "<script>window.location='daftar.php'</script>";
    }
} else {
        echo "<script>alert('ACCESS DENIED');window.location='login/';</script>";
}
?>
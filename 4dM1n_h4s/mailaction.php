<?php

use PHPMailer\PHPMailer\PHPMailer;
session_start();

if (isset($_SESSION['admin'])) {
	if (isset($_POST['nim'])) {
    	include("../config/koneksi.php");
    	$nim=mysqli_escape_string($dbc, $_POST['nim']);

        // Cek NIM
        $sql=mysqli_query($dbc, "SELECT * FROM pendaftar WHERE nim='$nim'");

        if (mysqli_num_rows($sql)) {
            $fetchData=mysqli_fetch_array($sql);
            $nama = $fetchData['nama'];
			$email = trim($fetchData['email']);
			$nohp = $fetchData['nohp'];
			$alamat = $fetchData['alamat'];
			$jk = $fetchData['jenis_kelamin'];
			$semester = $fetchData['semester'];
			$prodi = $fetchData['prodi'];
			$motto = $fetchData['motto'];
			$alasan = $fetchData['alasan_masuk'];
			$filename = $fetchData['qr'];

            require '../config/vendor/autoload.php';
            $mail = new PHPMailer(true);
            include("../config/setting_mail.php");

            $mail->send();
            echo "<script>alert('EMAIL BERHASIL DIKIRIM !');window.location='./send-mail.php';</script>";
        } else {
            echo "<script>alert('EMAIL GAGAL DIKIRIM : NIM TIDAK TERDAFTAR');window.location='./send-mail.php';</script>";
        }
    } else {
        echo "<script>window.location='./send-mail.php';</script>";
    }
} else {
    echo "<script>alert('ACCESS DENIED');window.location='login/';</script>";
}

?>
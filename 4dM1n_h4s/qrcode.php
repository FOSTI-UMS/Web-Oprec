<?php 
session_start();
error_reporting(E_ERROR | E_PARSE);

if (isset($_SESSION['admin'])) {
	if (isset($_POST['nim'])) {
    	include("../config/koneksi.php");
    	$nim=mysqli_escape_string($dbc, $_POST['nim']);

        // Cek NIM
        $sql=mysqli_query($dbc, "SELECT * FROM pendaftar WHERE nim='$nim'");

        if (mysqli_num_rows($sql)) {
            $fetchData=mysqli_fetch_array($sql);
            // Hapus QR
            if (file_exists($fetchData['qr'])) {
                echo "<script>window.location='$fetchData[qr]'</script>";
            } else {
                // buat QR
                // Memuat library
                include "../config/library/phpqrcode/qrlib.php";

                // Lokasi Menyimpan gambar
                $temp='../img/qrcode/';
                $student_data=$fetchData['nim']."/".$fetchData['nama']."/".$fetchData['email']."/OPREC";
                $qrcode_contoh=base64_encode($student_data);
                $filename=$temp.'QRCode-'.$fetchData['nim'].'-Absensi.png';
                $iserror=false;

                try {
                    QRcode::png($qrcode_contoh, $filename, 40,40);
                } catch (Exception $e) {
                    if(!str_contains($e->getMessage(), "Deprecated")) {
                        $iserror=true;
                    }
                }

                if(!$iserror) {
                    $result=mysqli_query($dbc, "UPDATE pendaftar SET qr='$filename' WHERE nim='$nim'");
                    if($sql) {
                        echo "<script>window.location='$filename'</script>";
                    } else {
                        unlink($filename);
                        echo "<script>alert('QRCODE GAGAL GENERATE : SQL');window.location='./qrcode_generator.php';</script>";
                    }
                } else {
                    echo "<script>alert('QRCODE GAGAL GENERATE : FILE');window.location='./qrcode_generator.php';</script>";
                }
            }
    
        } else {
            echo "<script>alert('QRCODE GAGAL GENERATE : NIM TIDAK TERDAFTAR');window.location='./qrcode_generator.php';</script>";
        }
    	
    } else {
    	echo "<script>window.location='qrcode_generator.php'</script>";
    }
} else {
    echo "<script>alert('ACCESS DENIED');window.location='login/';</script>";
}
?>
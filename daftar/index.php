<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Open Recruitment Fosti UMS 2019">
	<meta name="author" content="">
	<title>Pendaftaran OPREC | Forum Open Source Teknik Informatika</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="../assets/favicon.png" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="../favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="../favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="../favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="../favicon.ico">


	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i">

	<!-- BASE CSS -->
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/style.css" rel="stylesheet">
	<link href="../css/responsive.css" rel="stylesheet">
	<link href="../css/animate.min.css" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="../css/custom.css" rel="stylesheet">

	<script type="text/javascript">
		function delayedRedirect(){
		    window.location = "../"
		}
    </script>

</head>
<body onLoad="setTimeout('delayedRedirect()', 8000)" style="background-color:#fff;">

<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


function uploadFoto(){
	$namafile = $_FILES['foto_pribadi']['name'];
	$ukuranFile = $_FILES['foto_pribadi']['size'];
	$error = $_FILES['foto_pribadi']['error'];
	$tmpName = $_FILES['foto_pribadi']['tmp_name'];
	
	$ekstensiFile = explode('.', $namafile);
	$ekstensiFile = end($ekstensiFile);

	

	//cek upload
	if($error === 4){
		echo "<script>
				alert('Pilih foto terlebih dahulu');
				document.location.href = '../index';
				</script>";
		return exit;
	}

	//cek ukuran foto
	if($ukuranFile > 2000000){
		echo "<script>
				alert('Pendaftaran gagal,  Ukuran gambar terlalu besar');
				document.location.href = '../index';
				</script>";
		
		return exit;
	}
	
	//change name
	global $nim;
	$namaFileBaru= $nim.'.'.$ekstensiFile;
    
    //cek file foto
	$ekstensiFotoValid = ['jpg','png','jpeg'];
	$ekstensiFoto = explode('.', $namafile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if(!in_array($ekstensiFoto,$ekstensiFotoValid)){
		echo "<script>
				alert('Pendaftaran gagal, File yang anda upload bukan gambar');
				document.location.href = '../index';
				</script>";
		return exit;
	}

	//upload foto
	$dirUpload = '../img/foto_pribadi/';
	move_uploaded_file($tmpName,$dirUpload.$namaFileBaru);
	return $namaFileBaru;
}

function uploadFotoKtm(){
	$namafile = $_FILES['foto_ktm']['name'];
	$ukuranFile = $_FILES['foto_ktm']['size'];
	$error = $_FILES['foto_ktm']['error'];
	$tmpName = $_FILES['foto_ktm']['tmp_name'];

	$ekstensiFile = explode('.', $namafile);
	$ekstensiFile = end($ekstensiFile);

	//cek upload
	if($error === 4){
		echo "<script>
				alert('pilih foto terlebih dahulu');
				document.location.href = '../index';
				</script>";
		return exit;
	}

	//change name
	global $nim;
	$namaFileBaru= 'ktm-'.$nim.'.'.$ekstensiFile;

	//cek ukuran foto
	if($ukuranFile > 2000000){
		echo "<script>
				alert('Pendaftaran gagal, Ukuran gambar terlalu besar');
				document.location.href = '../index';
				</script>";
		return exit;
	}
	
	//cek file foto
	$ekstensiFotoValid = ['jpg','png','jpeg'];
	$ekstensiFoto = explode('.', $namafile);
	$ekstensiFoto = strtolower(end($ekstensiFoto));
	if(!in_array($ekstensiFoto,$ekstensiFotoValid)){
		echo "<script>
				alert('Pendaftaran gagal,  File yang anda upload bukan gambar');
				document.location.href = '../index';
				</script>";
		return exit;
	}

	//upload foto
	$dirUpload = '../img/foto_ktm/';
	move_uploaded_file($tmpName,$dirUpload.$namaFileBaru);
	return $namaFileBaru;
}

if (isset($_POST['process'])) {
	$email			= $_POST['email'];
	$captcha		= $_POST['g-recaptcha-response'];
	$secretKey		= "6LdPzFQUAAAAAJCoPs2cKjCKo7506WN8OqQNshV6"; //oprec.fostiums.org
	// $secretKey		= "6LcW38AZAAAAAEzGLWWsv9DcHitIhkDvgfhjV8WR"; //127.0.0.1
	$ip 			= $_SERVER['REMOTE_ADDR'];
	$response		= file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys	= json_decode($response,true);
	// $responseKeys["success"]	= 1;

	// if(intval($responseKeys["success"]) == 1)
	if(intval($responseKeys["success"]) == 1) {
		include("../config/koneksi.php");
		$nim=mysqli_escape_string($dbc, $_POST['nim']);
		$nama=mysqli_escape_string($dbc, $_POST['nama']);
		$email=mysqli_escape_string($dbc, $_POST['email']);
		$nohp=mysqli_escape_string($dbc, $_POST['nohp']);
		$alamat=mysqli_escape_string($dbc, $_POST['alamat']);
		$jk=mysqli_escape_string($dbc, $_POST['jk']);
		$semester=mysqli_escape_string($dbc, $_POST['semester']);
		$prodi=mysqli_escape_string($dbc, $_POST['prodi']);
		$motto=mysqli_escape_string($dbc, $_POST['motto']);
		$alasan=mysqli_escape_string($dbc, $_POST['alasan']);
		$foto = uploadFoto();
		$fotoKtm = uploadFotoKtm();

		
		

		$data=[$nim, $nama, $email, $nohp, $alamat, $jk, $semester, $prodi, $motto, $alasan, $foto,$fotoKtm];

		// pembagian cp
		$cp1=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT jml_peserta FROM cp WHERE id=1"));
		$cp2=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT jml_peserta FROM cp WHERE id=2"));
		$cp3=mysqli_fetch_assoc(mysqli_query($dbc, "SELECT jml_peserta FROM cp WHERE id=3"));
		if ($cp1['jml_peserta'] <= $cp2['jml_peserta']) {
			$cp = 1;
			$qrcp='../img/lala.png';
		}
		if ($cp1['jml_peserta'] > $cp2['jml_peserta']) {
			$cp = 2;
			$qrcp='../img/mutiara.png';
		} 
		if ($cp2['jml_peserta'] > $cp3['jml_peserta']) {
			$cp = 3;
			$qrcp='../img/danis.png';
		}
	
		// print_r($data);
		$error=array();
		if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
			$error[]="Email";
		}
		if (!in_array($semester,[1,3])) {
			$error[]="Semester";

		}
		if (!is_numeric($nohp)) {
			$error[]="NOHP";
		}
		if (!in_array($jk,["P","L"])) {
			$error[]="Jenis Kelamin";
		}

		if (count($error) == 0) {
			// Cek Database apakah Terdaftar atau Belum
			$sql=mysqli_query($dbc, "SELECT nim FROM pendaftar WHERE nim='$nim'");
			if (mysqli_num_rows($sql) == 0) {
				# Entry Data & Create Barcode
				# Buat Barcode
				// Memuat library
				include "../config/library/phpqrcode/qrlib.php";

				// Lokasi Menyimpan gambar
				$temp='../img/qrcode/';

				// Kode yang di buat untuk absensi qrcode
				// $qrstring = base64_encode(id.'/'.nama.'/'.email.'/'.event);
				$qrcode_contoh=base64_encode("$nim/$nama/$email/OPREC");
				$filename=$temp.'QRCode-'.$nim.'-Absensi.png';
				if (!file_exists($filename)) {
					// Buat Barcode bila ada
					QRcode::png($qrcode_contoh, $filename, 40,40);
					if (file_exists($filename)) {
						$create=True;
					} else {
						$create=False;
					}
				} else {
					$create=True;
					$filename=$filename;
				}
				$filename=mysqli_escape_string($dbc, $filename);
				// Entry Data
				if ($create==True) {
					$sql=mysqli_query($dbc,"INSERT INTO pendaftar(nim,nama,jenis_kelamin,nohp,email,alamat,prodi,semester,motto,alasan_masuk,qr,foto,foto_ktm,cp_id) VALUES ('$nim','$nama','$jk','$nohp','$email','$alamat','$prodi','$semester','$motto','$alasan','$filename', '$foto', '$fotoKtm','$cp')");
					
					if ($sql) {
						$jml_peserta=mysqli_query($dbc, "UPDATE cp SET jml_peserta=jml_peserta+1 WHERE id='$cp'");
						include("../config/contohKartu.php");
						$kartu=kartuPeserta($nim, $nama, $email, $nohp, $alamat, $jk, $semester, $prodi, $motto, $alasan, $foto, $filename, $qrcp);

						if(file_exists('../img/kartuPeserta/'.$nim.'.pdf')){
						    
						$kartuPeserta='../img/kartuPeserta/'.$nim.'.pdf';
						
						// Load Composer's autoloader

						require '../config/library/vendor/autoload.php';
						$mail = new PHPMailer(true);
					    include("../config/setting_mail.php");
					    if ($mail->send()) {			    
					?>
					<div id="success">
					    <div class="icon icon--order-success svg">
					              <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
					                <g fill="none" stroke="#8EC343" stroke-width="2">
					                  <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
					                  <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
					                </g>
					              </svg>
					     </div>
					<h4><span>Pendaftaran FOSTI Berhasil!!</span></h4>
					<p>Silahkan <b>Cek Email Anda</b>, <b>pastikan anda mendapatkan balasan email dari fosti berupa Kartu Wawancara yang berisi 2 Qrcode. </b>, apabila tidak mendapatkan silahkan tekan tombol bantuan di halaman pendaftaran.</p>
					<p>Kamu akan kembali ke halaman pendaftaran dalam 5 detik.</p>
					<p>Segera Konfirmasi Pendaftaran anda ke <a href="http://www.bit.ly/HaloFosti2020" target="_blank">bit.ly/HaloFosti2020</a></p>
					</div>
					<?php
						} else {
							echo "<div id='success'><h4><span>Pendaftaran Berhasil!</span></h4>
							<p>SMPT : GAGAL, Pendafaran Berhasil Namun E-mail tidak terkirim.
							<p>Silahkan <b>Cek Email Anda</b>, <b>pastikan anda mendapatkan balasan email dari fosti berupa Qrcode</b>, apabila tidak mendapatkan silahkan tekan tombol bantuan di halaman pendaftaran.</p>
								<p>Kamu akan kembali ke halaman pendaftaran dalam 5 detik.</p> 
								<br> <button> <a href='<?php kartuPeserta() ?>'> cetak </a></button>";
						}
						}
						
					} else {
						echo "<div id='success'><h4><span>Pendaftaran Gagal!</span></h4><p>Silahkan Ulangi atau tanyakan ke admin dengan cara tekan tombol bantuan. kami akan mengalihkan anda ke halaman pendaftaran dalam 5 detik.</p></div>";
					}
				} else {
					echo "<div id='success'><h4><span>Pendaftaran Gagal!</span></h4><p>Qrcode Gagal Dibuat Silahkan Ulangi Pendaftaran. kami akan mengalihkan anda ke halaman pendaftaran dalam 5 detik.</p></div";
				}

			} else {
				$error[]="reg";
				echo "<div id='success'><h4><span>Anda telah Terdaftar!</span></h4><p>Silahkan cek data anda dengan tanyakan ke admin dengan cara tekan tombol bantuan. kami akan mengalihkan anda ke halaman pendaftaran dalam 5 detik.</p></div>";
			}
		} else {
			$location="";
			foreach ($error as $err) {
				$location=$location.$err.",";
			}
			echo "<script>alert('Pengisian $location Tidak Benar, Silahkan Ulangi');window.location='../?error=$location';</script>";
		}
	} else {
		echo "<div id='success'><h4><span>Captcha Error!</span></h4><p>Silahkan ulangi pendaftaran, pastikan anda ceklis captcha dengan benar. kami akan mengalihkan anda ke halaman pendaftaran dalam 5 detik.</p></div>";
	}

	
?>
<?php
} else {
?>
	<div id="success">
	    <div class="icon icon--order-success svg">
	    	X
	    </div>
	<h4><span>Pendaftaran FOSTI Gagal!</span>Silahkan ulangi kembali</h4>
	<small>Kamu akan kembali ke halaman pendaftaran dalam 5 detik.</small>
	</div>
<?php
}
?>
</body>
</html>
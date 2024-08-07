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
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="favicon.ico">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="favicon.ico">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i" rel="stylesheet">
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>

	<!-- BASE CSS -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/animate.min.css" rel="stylesheet">
	<link href="css/icon_fonts/css/all_icons_min.css" rel="stylesheet">
	<link href="css/skins/square/grey.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/sweet-alert-bootstrap-4.min.css" type="text/css">

	<!-- YOUR CUSTOM CSS -->
	<link href="css/custom.css" rel="stylesheet">

	<script src="js/modernizr.js"></script>
	<!-- Modernizr -->

</head>

<body>
	
	<div id="preloader">
		<div data-loader="circle-side"></div>
	</div><!-- /Preload -->
	
	<div id="loader_form">
		<div data-loader="circle-side-2"></div>
		<h3 class="loading">Harap bersabar sedang upload foto...</h3>
	</div><!-- /loader_form -->

	<header>
		<div class="container-fluid">
		    <div class="row">
                <div class="col-3">
                    <div id="logo_home">
                        <a href="./"><img src="img/fosti.png" alt="Fosti Logo"></a>
                    </div>
                </div>
                <div class="col-9">
                    <div id="social">
						<ul>
                            <li><a href="https://twitter.com/fostiums"><i class="icon-twitter"></i></a></li>
                            <li><a href="mailto:fostiums@gmail.com"><i class="icon-google"></i></a></li>
                            <li><a href="https://www.instagram.com/fosti_ums/"><i class="icon-instagram"></i></a></li>
                            <li><a href="https://github.com/FOSTI-UMS"><i class="icon-github"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
		</div>
		<!-- container -->
	</header>
	<!-- End Header -->

	<main>
		<?php
		
		if (isset($_GET['error'])) {
			$error=explode(",", $_GET['error']);
			foreach ($error as $err) {
			?>
			<div class="alert alert-danger">
				<strong>Gagall !</strong> Pengisian <b><?php echo $err; ?></b> Tidak Benar, Ulangi..
				<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				    <span aria-hidden="true">&times;</span>
				 </button>
			</div>
			<?php
			}
		}
		?>

		<div id="form_container">
			<div class="row">
				<div class="col-lg-5">
					<div id="left_form">
						<figure><img src="img/favicon.png" alt="" width="200px"></figure>
						<h2>Pendaftaran</h2> 
						<p>Form pendaftaran OPREC FOSTI Forum Open Source Teknik Informatika, Silahkan isi data anda dengan benar dan tepat. Apabila ada kekeliruan atau masalah silahkan tekan tombol Bantuan dibawah.</p>
					</div>
				</div>
				<div class="col-lg-7">
					<div id="wizard_container">
						<div id="top-wizard">
							<div id="progressbar"></div>
						</div>
						<!-- /top-wizard -->
						<form name="oprec_fosti" id="wrapped" method="POST" enctype="multipart/form-data">
							<input id="website" name="website" type="text" value="">
							<!-- Leave for security protection, read docs for details -->
							<div id="middle-wizard">

								<div class="step">
									<h3 class="main_question"><strong>1/3</strong>Silahkan isi biodata anda</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="nim" class="form-control required" placeholder="NIM">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="nama" class="form-control required" placeholder="Nama Lengkap">
											</div>
										</div>
									</div>
									<!-- /row -->

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="email" name="email" class="form-control required" placeholder="Alamat Email">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="tel" name="nohp" class="form-control required" placeholder="Nomor HP">
											</div>
										</div>
									</div>
									<!-- /row -->

									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="alamat" class="form-control required" placeholder="Alamat Tinggal">
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group radio_input required">
												<label><input type="radio" value="L" checked name="jk" class="icheck">Laki-Laki</label>
												<label><input type="radio" value="P" name="jk" class="icheck">Perempuan</label>
											</div>
										</div>
									</div>
									<!-- /row -->
									<!-- /row -->

									<div class="row">
										<div class="col-md-6">
										    <label>Ukuran file max 2 MB</label>
											<div class="form-group">
											<input type="file" name="foto_pribadi" accept="image/*" class="custom-file-input required" id="customFile">
  											<label class="custom-file-label" for="customFile">Foto Pribadi</label>
											</div>
										</div>
										<div class="col-md-6">
										    <label>Ukuran file max 2 MB</label>
											<div class="form-group">
											<input type="file" name="foto_ktm" accept="image/*" class="custom-file-input required"id="customFile">
  											<label class="custom-file-label" for="customFile" >Foto KTM</label>
											</div>
											<br>
										</div>
									</div>
									<!-- /row -->
									<div>
										<label>Ukuran file max 2 MB</label>
										<div class="form-group">
											<input type="file" name="foto_sosmed" accept="image/*" class="custom-file-input required" id="customFile">
											<label class="custom-file-label" for="customFile">Screenshot Follow Sosmed Fosti</label>
										</div>
									</div>
									<div class="row">
										<div class="col">
											<div class="form-group">
												<input type="text" name="linkcv" class="form-control" placeholder="Link CV">
											</div>
										</div>
									</div>
								</div>
								<!-- /step-->

								<div class="step">
									<h3 class="main_question"><strong>2/3</strong>Silakan isi dengan info tambahan</h3>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<select name="semester" class="form-control required">										
													<option value="1">Semester 1</option>
													<option value="3">Semester 3</option>
												</select>
											</div>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<input type="text" name="prodi" class="form-control required" placeholder="Program Studi">
											</div>
										</div>
									</div>
									<!-- /row -->

									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<textarea name="motto" class="form-control required" style="height:50px;" placeholder="Tuliskan sedikit motto hidup kamu disini..."></textarea>
											</div>

										</div>
										<div class="col-md-12">
											<div class="form-group">
												<textarea name="alasan" class="form-control required" style="height:90px;" placeholder="Tuliskan sedikit alasan kamu ingin mengikuti fosti disini..."></textarea>
											</div>
										</div>
									</div>
									<!-- /row -->
									<!-- /row -->
								</div>
								<!-- /step-->

								<div class="submit step">
									<h3 class="main_question"><strong>3/3</strong>Submit Pendaftaran</h3>
									<div class="form-group">
										<textarea name="additional_message" class="form-control" style="height:150px;" placeholder="Pastikan data yang kamu input telah benar, kami tidak bertanggungjawab atas kekliruan data anda. Silahkan cek data anda kembali dengan menekan tombol Backward, apabila data anda benar silahkan submit." disabled=""></textarea>
									</div>
									<div class="form-group terms">
										<div class="g-recaptcha" data-sitekey="6LdZjxoTAAAAAEWgQRRLKR0wBHcQofl9QTsmVR1h"></div> <!--oprec.fostiums.org-->										<br>
									</div>
								</div>
								<!-- /step
							</div>
							/middle-wizard -->
							<div id="bottom-wizard">
								<button type="button" name="backward" class="backward">Backward </button>
								<button type="button" name="forward" class="forward">Forward</button>
								<button type="submit" name="process" class="submit">Submit</button>
							</div>
							<!-- /bottom-wizard -->
						</form>
					</div>
					<!-- /Wizard container -->
				</div>
			</div><!-- /Row -->
		</div><!-- /Form_container -->
	</main>
	
	<footer id="home" class="clearfix">
		<p>© 2023 FOSTI</p>
		<ul>
			<li><a href="https://fostiums.org" class="animated_link">Fourm Open Source Teknik Informatika</a></li>
			<li><a href="#" target="_blank" class="animated_link">Bantuan</a></li>
		</ul>
	</footer>
	<!-- end footer-->
	
	<div class="cd-overlay-nav">
		<span></span>
	</div>
	<!-- cd-overlay-nav -->

	<div class="cd-overlay-content">
		<span></span>
	</div>
	<!-- cd-overlay-content -->
	<!-- SCRIPTS -->
	<!-- Jquery-->
	<script src="js/jquery-3.2.1.min.js"></script>
	<!-- Common script -->
	<script src="js/common_scripts_min.js"></script>
	<!-- Wizard script -->
	<script src="js/registration_wizard_func.js"></script>
	<!-- Menu script -->
	<script src="js/velocity.min.js"></script>
	<script src="js/main.js"></script>
	<!-- Theme script -->
	<script src="js/functions.js"></script>
	<script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>

</body>
</html>
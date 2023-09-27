<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Open Recruitment Fosti UMS">
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
				<div class="col">
					<div id="left_form">
						<figure><img src="img/favicon.png" alt="" width="200px"></figure>
						<h2>FOSTI UMS 2023 - REGISTRATION CLOSED</h2> 
						<p>The number of applicants has reached our quota!</p>
						<p>Thank you for your positive responses</p>
					</div>
				</div>
			</div><!-- /Row -->
		</div><!-- /Form_container -->
	</main>
	
	<footer id="home" class="clearfix">
		<p>© <?= date('Y');?> FOSTI</p>
		<ul>
			<li><a href="http://fostiums.org" class="animated_link">Fourm Open Source Teknik Informatika</a></li>
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
	<script>
	    function CheckSpace(event)
            {
               if(event.which ==32)
               {
                  event.preventDefault();
                  return false;
               }
            }
	</script>
</body>
</html>
<?php
session_start();
if (!isset($_SESSION['admin'])) {
	if (isset($_POST['login'])) {
		include("../../config/koneksi.php");
		$username=mysqli_escape_string($dbc, $_POST['username']);
        $password=md5(mysqli_escape_string($dbc, $_POST['password']));

		// cek data
		$sql=mysqli_query($dbc, "SELECT * FROM admin WHERE username='$username'");
		if (mysqli_num_rows($sql) > 0) {
			// ambil data
			$fetchData=mysqli_fetch_array($sql);
			// cek password
			if ($password == $fetchData['password']) {
				// Password Benar
				$_SESSION['admin']=$fetchData;
				echo "<script>window.location='../';</script>";
			} else {
				// Password Gagal
				echo "<script>window.location='./?pesan=gagal';</script>";
			}

		} else {
			echo "<script>window.location='./?pesan=gagal';</script>";
		}
	}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Sign In | WEB OPREC FOSTI 2023</title>
    <!-- Favicon-->
    <link rel="icon" href="../../assets/favicon.png" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../../assets/iconfont/material-icons.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../assets/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../assets/plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../assets/plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../assets/css/style.css" rel="stylesheet">

    <link href="../../assets/css/themes/all-themes.css" rel="stylesheet" />

    <!-- CSS manual -->
    <link href="style.css" rel="stylesheet">

    <!-- CSS sweetalert -->
    <link rel='stylesheet' href='../../assets/plugins/sweetalert2/sweetalert2.min.css'>

</head>
<body class="login-page">
    <div class="login-box">
        <div class="logo">
            <a title="Homepage" href="http://fosti.ums.ac.id/"><b>F<b style="color:red;">OS</b>TI 2023</b></a>
            <small>WEB OPREC FOSTI</small>
        </div>
        <div style="border-radius: 15px 15px 0 0 !important;" class="card">
            <div class="body">
                <form id="sign_in" action="" method="POST">
                    <div class="msg">Silahkan login untuk melanjutkan</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-green">
                            <label id="showhide" for="rememberme">Show Password</label>
                        </div>
                        <div class="col-xs-4">
                            <input style="margin: 0;" type="submit" name="login" class="tombol" value="LOGIN">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <footer><p>Copyright © 2023 | <a href="http://fosti.ums.ac.id/" title="Homepage">FOSTI UMS </a> | All Rights Reserved.</p></footer>
        <!-- Show Password -->
    <script>
    (function() {
    
        var showHide = function( element, field ) {
            this.element = element;
            this.field = field;
            
            this.toggle();    
        };
        
        showHide.prototype = {
            toggle: function() {
                var self = this;
                self.element.addEventListener( "change", function() {
                    if(self.element.checked) {self.field.setAttribute( "type", "text" );}
                    else {self.field.setAttribute( "type", "password" );}
                }, false);
            }
        };
        
        document.addEventListener( "DOMContentLoaded", function() {
            var checkbox = document.querySelector( "#rememberme" ),
                password = document.querySelector( "#password" ),
                form = document.querySelector( "#sign_in" );
                
                var toggler = new showHide( checkbox, password );
        });
        
    })();
</script>

    <!-- Jquery Core Js -->
    <script src="../../assets/plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="../../assets/plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../assets/plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="../../assets/plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="../../assets/js/admin.js"></script>
    <script src="../../assets/js/pages/examples/sign-in.js"></script>

    <!-- Sweetalert Js -->
    <script src="../../assets/plugins/sweetalert2//sweetalert2.all.min.js"></script>
 <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan']=="gagal"){
            echo "<script type='text/javascript'>
                swal({
                title: 'Username atau Password Salah!',
                type: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4caf50',
                reverseButtons: true,
                focusConfirm: true,
                  });
                </script>";
        }
        else if($_GET['pesan']=="dilarang"){
            echo "<script type='text/javascript'>
                swal({
                title: 'Anda Tidak Diizinkan Mengakses Halaman Tersebut!',
                type: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4caf50',
                reverseButtons: true,
                focusConfirm: true,
                  });
                </script>";
        }
         else if($_GET['pesan']=="blacklist"){
            echo "<script type='text/javascript'>
                swal({
                title: 'Anda Masuk Buronan Interpol!',
                type: 'error',
                confirmButtonText: 'OK',
                confirmButtonColor: '#4caf50',
                reverseButtons: true,
                focusConfirm: true,
                  });
                </script>";
        }
    }
?>
</body>
</html>
<?php
}
?>
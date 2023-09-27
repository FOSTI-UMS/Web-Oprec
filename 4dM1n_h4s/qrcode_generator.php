<?php require('./template/check-admin.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <?php require('./template/head.php'); ?>
</head>
<body class="theme-green">
    <?php require('./template/loader.php'); ?>

    <?php require('./template/topsidebar.php'); ?>

    <section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>GENERATE QR</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Halaman GenrateQRCode <small>Halaman untuk membuat QRcode pendaftar yang tidak berhasil membuat mendapatkan QRCode...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p class="align-justify">Halaman ini digunakan untuk membuat QRCode Peserta bila Gagal pembuatan QRCode saat Registrasi.</p>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
            <form action="qrcode.php" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    FORM GENERATOR
                                </h2>
                            </div>
                            <div class="body">
                                <div class="form-group">
                                    <div class="form-line">
                                        <input type="text" class="form-control" placeholder="NIM" name="nim">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="text-right">
                                        <button class="btn btn-success" type="submit" name="buatQR">GENERATE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

    <?php require('./template/bottom.php'); ?>
</body>
</html>
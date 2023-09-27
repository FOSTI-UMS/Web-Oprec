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
                <h2>SEND EMAIL</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Halaman Kirim Email <small>Halaman untuk mengirim email kepada peserta yang tidak menerima email pendaftaran...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p class="align-justify">Halaman ini digunakan untuk mengirim email pendaftaran apabila pengiriman email gagal pada saat registrasi.</p>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
            <form action="mailaction.php" method="POST">
                <div class="row clearfix">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="card">
                            <div class="header">
                                <h2>
                                    FORM SENDER
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
                                        <button class="btn btn-success" type="submit" name="kirimEmail">SEND</button>
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
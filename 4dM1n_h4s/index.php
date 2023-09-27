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
                <h2>DASHBOARD</h2>
            </div>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header bg-green">
                            <h2>
                                Halaman Administrator <small>Halaman untuk melihat daftar yang telah melakukan pengisian data peserta oprec...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p class="align-justify">WEB Oprec digunakan untuk melakukan dan memanage pendaftaran anggota baru FOSTI Universitas Muhammadiyah Surakarta...</p>
                        </div>
                    </div>
                </div>
                <!-- #END# Browser Usage -->
            </div>
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                v1.1.0
                                <small>28 Agustus 2023</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Menambahkan file upload sosmed peserta OPREC</p>
                            <p>- Menambahkan fitur open dan close pendaftaran pada index homepage</p>
                            <p>- Menambahkan fitur send email untuk peserta yang tidak menerima email pendaftaran</p>
                        </div>
                        <div class="header">
                            <h2>
                                v1.0.0
                                <small>12 Agustus 2019</small>
                            </h2>
                        </div>
                        <div class="body">
                            <p>- Melihat data peserta OPREC FOSTI 2019</p>
                            <p>- Mengelola data peserta OPREC FOSTI 2019</p>
                            <p>- Mengeksport data ke berbagai jenis file (pdf,excel,dll)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php require('./template/bottom.php'); ?>
</body>
</html>
<?php require('./template/check-admin.php'); ?>
<?php
include("../config/koneksi.php");
$koneksi = $dbc;
?>
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
                                Daftar Singkat Oprec <small>Halaman admin untuk melihat data peserta oprec Fosti...</small>
                            </h2>
                        </div>
                        <div class="body">
                            <a class="btn btn-danger" href="./tables.php">LIHAT TABLE LENGKAP</a>
                            <br>
                            <br>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIM</th>
                                            <th>Email</th>
                                            <th>SMT</th>
                                            <th>PRODI</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        // query untuk menampilkan data
                                        $result = mysqli_query($koneksi, "SELECT * FROM pendaftar");
                                        $i = 0;

                                        // ambil data dari database
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<tr>";

                                            echo "<td style='text-align: center !important;'>" . ++$i . "</td>";
                                            echo "<td>" . $row['nama'] . "</td>";
                                            echo "<td>" . $row['nim'] . "</td>";
                                            echo "<td>" . $row['email'] . "</td>";
                                            echo "<td>" . $row['semester'] . "</td>";
                                            echo "<td>" . $row['prodi'] . "</td>";
                                            echo '<td><a class="btn btn-danger btn-sm" href=delete.php?nim=' . $row["nim"] . '><i class="material-icons">delete</i>Hapus</a></td>';

                                            echo "</tr>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <?php require('./template/bottom.php'); ?>
</body>
</html>
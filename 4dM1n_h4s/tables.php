<?php
session_start();
if (isset($_SESSION['admin'])) {
    include("../config/koneksi.php");
    $koneksi = $dbc;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Data Peserta</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon-->
    <link rel="icon" href="assets/favicon.png" type="image/x-icon">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/plugins/font-awesome/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="assets/css/admin.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="assets/plugins/datatables-bs4/css/dataTables.bootstrap4.css">

    <!-- CSS sweetalert -->
    <link rel='stylesheet' href='assets/plugins/sweetalert2/sweetalert2.min.css'>
    <!-- Custom Css -->
    <!-- <link href="assets/css/style.css" rel="stylesheet"> -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition sidebar-mini layout-navbar-fixed">
    <?php require('./template/loader.php'); ?>

    <div class="card-body p-0">
        <div class="download">
            <a class="btn btn-primary btn-sm" href="./daftar.php">
                <i class="fas fa-arrow-left">
                </i>
                Kembali
            </a>
        </div>
        <table id="tabel" class="table table-bordered table-striped table-hover projects">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>Nama</th>
                    <th>JK</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Prodi</th>
                    <th>Smt</th>
                    <th>Motto</th>
                    <th>Alasan</th>
                    <th>QR</th>
                    <th>Foto</th>
                    <th>Foto KTM</th>
                    <th>Foto Sosmed</th>
                    <th>LINK CV</th>
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
                    echo "<td>" . $row['nim'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['jenis_kelamin'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['nohp'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['prodi'] . "</td>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . $row['motto'] . "</td>";
                    echo "<td>" . $row['alasan_masuk'] . "</td>";
                    
                    echo '<td><a class="btn btn-primary btn-sm" href=' . $row['qr'] . '><i class="fa fa-eye"></i>Lihat</a></td>';
                    echo '<td><a class="btn btn-primary btn-sm" href=../img/foto_pribadi/' . $row['foto'] . '><i class="fa fa-eye"></i>Lihat</a></td>';
                    echo '<td><a class="btn btn-primary btn-sm" href=../img/foto_ktm/' . $row['foto_ktm'] . '><i class="fa fa-eye"></i>Lihat</a></td>';
                    echo '<td><a class="btn btn-primary btn-sm" href=../img/foto_sosmed/' . $row['foto_sosmed'] . '><i class="fa fa-eye"></i>Lihat</a></td>';
                    echo "<td>" . $row['link_cv'] . "</td>";
                    echo '<td><a id="hapus" class="btn btn-danger btn-sm" href=delete.php?nim=' . $row["nim"] . '><i class="fa fa-trash"></i>Hapus</a></td>';

                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- jQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- AdminLTE App -->
    <script src="assets/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="assets/dist/js/demo.js"></script>
    <!-- DataTables -->
    <script src="assets/plugins/datatables/jquery.dataTables.js"></script>
    <script src="assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script src="assets/plugins/datatables/extensions/export/dataTables.buttons.min.js"></script>
    <script src="assets/plugins/datatables/extensions/export/buttons.flash.min.js"></script>
    <script src="assets/plugins/datatables/extensions/export/jszip.min.js"></script>
    <script src="assets/plugins/datatables/extensions/export/pdfmake.min.js"></script>
    <script src="assets/plugins/datatables/extensions/export/vfs_fonts.js"></script>
    <script src="assets/plugins/datatables/extensions/export/buttons.html5.min.js"></script>
    <script src="assets/plugins/datatables/extensions/export/buttons.print.min.js"></script>
    <!-- Validation Plugin Js -->
    <script src="assets/js/jquery.validate.js"></script>
    <!-- Sweetalert Js -->
    <script src="assets/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <!-- Custom Js -->
    <script src="assets/js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            setTimeout(function() {
                $('.page-loader-wrapper').fadeOut();
            }, 50);
        })
    </script>
    <script type="text/javascript">
        $(function() {
            $("#tabel").DataTable({
                "scrollX": true,
                "paging": true,
                "searching": true,
                "ordering": true,
                "info": true,
                "dom": 'Bfrtip',
                "buttons": [
                    {
                        extend: 'excel',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    },
                    {
                        extend: 'print',
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11]
                        }
                    }
                ]
            });
        });
    </script>
</body>
</html>
<?php
} else {
    echo "<script>window.location='./login/?pesan=dilarang';</script>";
}
?>
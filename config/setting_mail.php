<?php
//hide error
error_reporting(0);

//Server settings
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = 'fostifest22@gmail.com';
$mail->Password   = 'ppsddvsrtzgjpsot';
$mail->SMTPSecure = 'tls';
$mail->Port       = 587;

//Recipients
$mail->setFrom('fostifest22@gmail.com', 'OPREC FOSTI UMS');
$mail->addAddress($email, $nama);
$mail->addAddress($email);
$mail->addReplyTo('fostiums@gmail.com');
$mail->addEmbeddedImage($filename, 'qr_code');

// Attachment
// $mail->addAttachment($kartuPeserta);

// Content
$mail->isHTML(true);
$mail->Subject = '[Pendaftaran] OPREC FOSTI';
$mail->Body    = '
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u"
        crossorigin="anonymous">
        <style>
            span{
                display: block;
            }
            span>strong{
                padding-left:3em;
            }

            .berhasil
            {
                background-color: green;
                padding: 10px;
                color: white;
                border-radius: 10px;
                text-align: center;
            }
            .konfirmasi
            {
                background-color: rgb(57, 57, 58);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
            .konfirmasi a
            {
                background-color: rgb(57, 57, 58);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                text-decoration: none;
            }
            .konfirmasi:hover
            {
                background-color: rgb(101, 101, 103);
                padding: 10px;
                color: white;
                font-size: 16pt;
                font-weight: bold;
                border-radius: 5px;
                border:0;
                text-align: center;
                margin-top: 30px;
                margin-bottom: 30px;
                cursor: pointer;
            }
        </style>
    <title>Pendaftaran OPREC FOSTI 2023</title>
</head>
<body>
    <div class="data">
        <div class="berhasil">Pendaftaran Berhasil</div>
        <hr>
        <br>
        Berikut data anda:
        <br>
        <table border="0">
            <tr>
                <td width="40%">Nama</td>
                <td>: '.$nama.'</td>
            </tr>
            <tr>
                <td>NIM</td>
                <td>: '.$nim.'</td>
            </tr>
            <tr>
                <td>E-Mail</td>
                <td>: '.$email.'</td>
            </tr>
            <tr>
                <td>No Handphone</td>
                <td>: '.$nohp.'</td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>: '.$alamat.'</td>
            </tr>
            <tr>
                <td>Prodi/Smt</td>
                <td>: '.$prodi.'/'.$semester.'</td>
            </tr>
            <tr>
                <td>Alasan</td>
                <td>: '.$alasan.'</td>
            </tr>
            <tr>
                <td>Moto</td>
                <td>: '.$motto.'</td>
            </tr>

        </table>

        <hr>
        <p align="center"><b>KODE QR PESERTA<b></p>
        <center>
            <img src="cid:qr_code" alt="QR Code" width="200" height="200">
            <br>
            <p>
            Harap lakukan konfirmasi pendaftaran pada contact person berikut setelah menerima email ini.<br/>
            <a href="">(Amanda)</a>&nbsp;|&nbsp;
            <a href="">(Zul)</a>
            </p>
            <br></br>
        </center>
        <hr>
    </div>
    <center>
        <small>
            <strong style="text-align:center;">Copyright &copy; 2023  |<a href="http://fostiums.org"> FOSTI </a>|  All rights reserved. </strong>
        </small>
    </center>
</body>
</html>
';
?>
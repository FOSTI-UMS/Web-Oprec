<?php
function kartuPeserta($nim, $nama, $email, $nohp, $alamat, $jk, $semester, $prodi, $motto, $alasan, $foto, $qrcode, $qrcp){
    require '../config/library/vendor/autoload.php';

    $mpdf = new \Mpdf\Mpdf([
        'margin_top' => 20,
        'margin_left' => 20,
        'margin_right' => 30,
        'mirrorMargins' => true],
        ['mode' => 'utf-8', 'format' => 'A4-L']);
    
    $stylesheet = file_get_contents('../css/stylePdf.css');
    $mpdf->WriteHTML($stylesheet,1);
    // $mpdf->showImageErrors = true;
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Kartu Peserta</title>
    </head>
    <body>

    
    <div class=judul><h2>Open Recruitment Fosti UMS 2020</h2></div>


    <br>
    <br>
    <table cellspacing="5" border="0" class="data_diri">
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>'.$nama.'</td>
        </tr>
        <tr>
            <td>NIM</td>
            <td>:</td>
            <td>'.$nim.'</td>
        </tr>
         <tr>
            <td>Prodi/Smt </td>
            <td>:</td>
            <td>'.$prodi.'/ '.$semester.'</td>
        </tr>
        <tr>
            <td>Email</td>
            <td>:</td>
            <td>'.$email.'</td>
        </tr>
        <tr>
            <td>Hp</td>
            <td>:</td>
            <td>'.$nohp.'</td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td>'.$alamat.'</td>
        </tr>
        <tr>
            <td>Moto</td>
            <td>:</td>
            <td>'.$motto.'</td>
        </tr>
         <tr>
            <td>Alasan Masuk</td>
            <td>:</td>
            <td>'.$alasan.'</td>
        </tr>
        <tr>
        <td></td>
        </tr>
        <tr>
            <td>
            <div class="abarcode">
                <img src="'.$qrcode.'" 
                style="width: 50mm; height: 50mm; margin: 0;" />
                </div> 
                <label><i><font size = "2"> Qrcode pendaftaran Oprec FOSTI</font></i></label>
                </td>
                <td></td>
                <td><img src="'.$qrcp.'" 
                style="width: 50mm; height: 50mm; margin: 0;" /><br>
                <label><i><font size = "2">Scan Qrcode diatas untuk mengubungi cp</font></i></label>
            </td>
        </tr>
        <tr>
        <td></td>
        </tr>
        <tr>
            <td colspan="3" ><img src="../img/tabel.png" 
            style="width: 150mm; height: 50mm; margin: 0;" /></td>
        </tr>
        <div style="position: absolute; left:600; right: 80; top: 165; bottom: 0;">
            <img src="../img/foto_pribadi/'.$foto.'" 
            style="width: 35mm; height: 45mm; margin: 0;" />
        </div>
        </table>
  

';
    
    
    $html .= '</body>
    </html>';
    $mpdf->writeHtml($html);
    $mpdf->Image('../img/ums.png', 7,5, 30, 30, 'png', '', true, false);
    $mpdf->Image('../img/fosti.png', 160, 15, 40, 20, 'png', '', true, false);
    
return $mpdf->Output('../img/kartuPeserta/'.$nim.'.pdf', 'F');  

}
?>

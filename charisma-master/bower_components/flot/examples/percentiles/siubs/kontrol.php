<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "../ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "../ez_sql_mysql.php";
 
include("../ayar.php");
$user1= mysql_real_escape_string($db->escape($_POST["username"]));
$satir = $db->get_row("select tckimlik , sifre from yonetim where tckimlik='".$user1."' ");
$user=$satir->tckimlik;
$pass= $satir->sifre;
?>
<?php

if(($_POST["username"]==$user) and ($_POST["password"]==$pass) and ($db->num_rows > 0) ){
$_SESSION["loginy"] = "true";
$_SESSION["user"] = $user;
$_SESSION["pass"] = $pass;

header("Location:index.php");
}else{
echo "<center>Kullanc&#305; Ad&#305; veya &#350;ifre Yanl&#305;&#351;.<br>";
echo "Giri&#351; sayfas&#305;na y&ouml;nlendiriliyorsunuz.</center>";
header("Refresh: 1; url=giris.php");
}
ob_end_flush();
?>
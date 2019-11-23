<?php
// veritabanin ayarlarini yapiyoruz.
$vt_kullanici="";
$vt_parola="";
$vt_isim="";
$vt_sunucu="localhost";
 
// ezSQL sinifini cagirarak calistirmaya basliyoruz.
$db = new ezSQL_mysql($vt_kullanici,$vt_parola,$vt_isim,$vt_sunucu);
//$db->query("SET NAMES 'utf8'");
?>

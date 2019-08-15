<?php
// veritabanin ayarlarini yapiyoruz.
$vt_kullanici="ylbasvuru";
$vt_parola="2a4y3a7y3";
$vt_isim="zadmin_basvuru";
$vt_sunucu="localhost";
 
// ezSQL sinifini cagirarak calistirmaya basliyoruz.
$db = new ezSQL_mysql($vt_kullanici,$vt_parola,$vt_isim,$vt_sunucu);
//$db->query("SET NAMES 'utf8'");
?>

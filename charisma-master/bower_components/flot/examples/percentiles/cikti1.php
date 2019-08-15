<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "ez_sql_mysql.php";
 
include("ayar.php");
$user1= mysql_real_escape_string($db->escape($_SESSION["user"]));
$ilan_id= mysql_real_escape_string($db->escape($_GET["id"]));


$basvuru = $db->get_row("select id , tarih_saat , tckimlik , basvuru2_id from basvuru where ilan_id='".$ilan_id."'  and tckimlik='".$user1."'  and aktif=1 ");
if($basvuru->id > 0 ) {


$ogrenci_bilgileri = $db->get_row("select * from  basvuru2 where tckimlik='".$user1."' and id='".$basvuru->basvuru2_id."' ");
$adi_soyadi=$ogrenci_bilgileri->adi ."&nbsp;".$ogrenci_bilgileri->soyadi;
$evtel = $ogrenci_bilgileri->evtelefon;
$dogum_yeri = $ogrenci_bilgileri->dogum_yeri;
$dogum_tarihi = $ogrenci_bilgileri->d_gun."/".$ogrenci_bilgileri->d_ay."/".$ogrenci_bilgileri->d_yil;
$cep_tel = $ogrenci_bilgileri->ceptelefon;

$tc = $ogrenci_bilgileri->tckimlik;
$eposta = $ogrenci_bilgileri->email;
$ilce = $ogrenci_bilgileri->ilce;
$sehir = $ogrenci_bilgileri->il;

$universite = $ogrenci_bilgileri->universite;
$fakulte = $ogrenci_bilgileri->fakulte;
$bolum = $ogrenci_bilgileri->bolum;


if($ogrenci_bilgileri->mezuniyet_derece == '2') {
								  $yuzluk_not = $db->get_var("select yuzluk from not_karsilik where dortluk='".$ogrenci_bilgileri->mezuniyet_sayisal."' ");
							  $lisans_notu = $yuzluk_not; 
							  } else {
								$lisans_notu =   $ogrenci_bilgileri->mezuniyet_sayisal;
							  }
							


if($ogrenci_bilgileri->dil_sinav_adi=="1") { $dilsinavadi = "ÜDS"; }
if($ogrenci_bilgileri->dil_sinav_adi=="2") { $dilsinavadi = "YDS"; }
if($ogrenci_bilgileri->dil_sinav_adi=="3") { $dilsinavadi = "TOEFL"; }
if($ogrenci_bilgileri->dil_sinav_adi=="4") { $dilsinavadi = "KPDS"; }

$ales_sozel  = $ogrenci_bilgileri->ales_sozel;
$ales_sayisal = $ogrenci_bilgileri->ales_sayisal;
$ales_ea = $ogrenci_bilgileri->ales_ea;

$dil_puan = $ogrenci_bilgileri->dil_sinav_puan;

$ilan = $db->get_row("select * from  ilanlar where id='".$ilan_id."'");
$enstitu = $ilan->enstitu;
$ana_bilim = $ilan->ana_bilim;
$bilim_dali = $ilan->bilim_dali;

//$db->query("insert into basvuru (ilan_id,aktif,kisi_id , tarih_saat ) values ('".$ilan_id."' ,1 ,'".$ogrenci_bilgileri->id."' , '".date('Y.m.d H:i:s')."' ) ");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <title>Siirt Üniversitesi Yüksek Lisans Başvuru Sistemi</title>
    
    <meta name="description" content="Siirt Üniversitesi Yüksek lisans başvuru sistemi.">
    <meta name="author" content="Mansur BEŞTAŞ">


</head>

<body>

<a href="#" onclick="window.print()">Sayfayı Yazıcıya Gönder</a><br /><br />
<table width="710" border="0">
  <tr>
    <td width="710">
    
<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="126" valign="top"><img src="img/siirt_logo.jpg" alt="" width="122" height="104" /></td>
    <td width="491" align="center" valign="middle"><p align="center"><strong>SİİRT    ÜNİVERSİTESİ</strong><br />
      <strong>LİSANSÜSTÜ    ÖĞRENİM BAŞVURU FORMU</strong>
      </td>
  </tr>
</table>

<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td colspan="6">&nbsp;<strong>Kimlik  ve İletişim Bilgileri:</strong></td>
    </tr>
  <tr>
    <td width="128">      Adı    ve Soyadı </td>
    <td width="16">:</td>
    <td width="244"><?php echo $adi_soyadi; ?> </td>
    <td width="120">Ev    Telefonu</td>
    <td width="19">:</td>
    <td width="184"><?php echo $evtel; ?> </td>
  </tr>
  <tr>
    <td width="128" align="left" valign="top"><br />
      Doğum    Yeri, Yılı</td>
    <td width="16" align="left" valign="middle">:</td>
    <td width="244" align="left" valign="top"><br />
      <?php echo $dogum_yeri; ?>  &nbsp;&nbsp;  <?php echo $dogum_tarihi; ?> </td>
    <td width="120" align="left" valign="top"><br />
      Cep    Telefonu</td>
    <td width="19" align="left" valign="middle">:</td>
    <td width="184" align="left" valign="top"><br />
      <?php echo $cep_tel; ?>  </td>
  </tr>
  <tr>
    <td width="128">TC    Kimlik No</td>
    <td width="16">:</td>
    <td width="244"><?php echo $tc; ?> </td>
    <td width="120">E-Posta    Adresi</td>
    <td width="19">:</td>
    <td width="184"><?php echo $eposta; ?> </td>
  </tr>
  <tr>
    <td width="128" rowspan="3">&nbsp;</td>
    <td width="16" rowspan="3">&nbsp;</td>
    <td width="244" rowspan="3">&nbsp;</td>
    <td width="120">İlçesi</td>
    <td width="19">:</td>
    <td width="184"><?php echo $ilce; ?> </td>
  </tr>
  <tr>
    <td width="120">İli</td>
    <td width="19">:</td>
    <td width="184"><?php echo $sehir; ?> </td>
  </tr>
  <tr>
    <td width="120">&nbsp;</td>
    <td width="19">&nbsp;</td>
    <td width="184">&nbsp;</td>
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td colspan="3">&nbsp;<strong>Öğrenim Bilgileri:</strong></td>
    </tr>
  <tr>
    <td width="192">Son Mezun Olduğu  </td>
    <td width="16">&nbsp;</td>
    <td width="507">&nbsp;</td>
  </tr>
  <tr>
    <td width="192">Üniversite</td>
    <td width="16">:</td>
    <td width="507"><?php echo $universite; ?> </td>
  </tr>
  <tr>
    <td width="192">Fakülte</td>
    <td width="16">:</td>
    <td width="507"><?php echo $fakulte; ?> </td>
  </tr>
  <tr>
    <td width="192">Bölüm/Anabilim Dalı</td>
    <td width="16">:</td>
    <td width="507"><?php echo $bolum; ?> </td>
  </tr>
  <tr>
    <td width="192">Akademik    Ortalaması</td>
    <td width="16">:</td>
    <td width="507">
    
      Lisans      : <?php echo $lisans_notu; ?>

     </td>
  </tr>
</table>
<br />
<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="312"><strong>Lisansüstü Eğitim    Sınavı (ALES) Bilgileri</strong>
      (ALES    sonuçları üç yıl süre ile geçerlidir)</td>
    <td width="21" valign="top">:  </td>
    <td width="382">
      <table border="0" cellspacing="0" cellpadding="0" width="309">
        <tr>
          <td width="203">
            ALES Sözel Puanı </td>
          <td width="16">:</td>
          <td width="90"><?php echo $ales_sozel; ?> </td>
        </tr>
        <tr>
          <td width="203">ALES Sayisal Puanı</td>
          <td width="16">:</td>
          <td width="90"><?php echo $ales_sayisal; ?></td>
        </tr>
        <tr>
          <td width="203">ALES EA Puanı</td>
          <td width="16">:</td>
          <td width="90"><?php echo $ales_ea; ?></td>
        </tr>
      </table>
      
      </td>
      
  </tr>
</table>
<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td width="313"><strong>Yabancı Dil Sınavı    Bilgileri</strong></td>
    <td width="21" align="right">:</td>
    <td width="383">
      <table border="0" cellspacing="0" cellpadding="0" width="310">
        <tr>
          <td width="204">Sınav Adı :&nbsp;<?php echo $dilsinavadi; ?>  &nbsp;&nbsp;
            Puanı: </td>
          <td width="16">:</td>
          <td width="90"><?php echo $dil_puan; ?> </td>
        </tr>
      </table>
     </td>
  </tr>
</table>
<br />
<table border="0" cellspacing="0" cellpadding="0" width="700">
  <tr>
    <td colspan="3">&nbsp;<strong>Başvurulan  Enstitü Bilgileri:</strong></td>
    <td width="247" rowspan="5">&nbsp;</td>
  </tr>
  <tr>
    <td width="466">Enstitü</td>
    <td width="23">:</td>
    <td width="316"><?php echo $enstitu; ?></td>
    </tr>
  <tr>
    <td width="466">Anabilim Dalı  </td>
    <td width="23">:</td>
    <td width="316"><?php echo $ana_bilim; ?> </td>
  </tr>
  <tr>
    <td width="466">Bilim Dalı (Varsa)</td>
    <td width="23">:</td>
    <td width="316"><?php echo $bilim_dali; ?> </td>
  </tr>
  <tr>
    <td width="466" colspan="3">&nbsp;</td>
  </tr>
</table>
Yukarıda  beyan ettiğim bilgiler doğrudur ve tarafımdan doldurulmuştur. Aksi bir durum  söz konusu olduğu takdirde 
  tüm sorumluğu kabul ediyorum. Gereğini arz ederim.
  <br />
&nbsp;&nbsp;&nbsp;
Başvuru No  : <?php 
echo md5(sha1($basvuru->id)); 
?><br />
&nbsp;&nbsp;&nbsp;&nbsp;Başvuru Tarihi : <?php  echo $basvuru->tarih_saat; ?>
    
    
    
    
    
    </td>
  </tr>
</table>
<?php } else { echo "Ba&#351;vuru Yap&#305;l&#305;nca &Ccedil;&#305;kt&#305; Alabilirsiniz !!!!"; } ?>

</body>
</html>
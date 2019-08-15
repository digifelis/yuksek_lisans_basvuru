<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
?>
<?php
ini_set("soap.wsdl_cache_enabled", "0");
include "KPSSoapClient.php";

header("Content-Type: text/plain");

$username_krm = "KRM-7117690";
$password_krm = "Sabri.56*";

$tckn=$_POST["username"];

//echo $tckn;
if($tckn < 89999999999) {
/* türkiyeli TC */

$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=BilesikKutukSorgulaKimlikNoServis";

$kpsClient = new KPSSoapClient($username_krm, $password_krm, $wsdl);
//print_r($kpsClient);
try {
        $result = $kpsClient->Sorgula(
                array(
                        'kriterListesi' => array(
                                'BilesikKutukSorgulaKimlikNoSorguKriteri' => array(
                                        'KimlikNo' => $tckn
                                )
                        )
                )
        );

//echo $result[ListeleCokluResult][SorguSonucu][KisiBilgisi][HataBilgisi]; 
$donen[0] =  $result->SorgulaResult->HataBilgisi;
$donen[1] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Ad;
$donen[2] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Soyad;
$donen[3] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumYer;

$dogum[ay] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Ay;
$dogum[gun] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Gun;
$dogum[yil] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Yil;

$cinsiyet =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Cinsiyet->Kod;


} catch (Exception $e)
{
        print_r($e);
}
/* türkiyeli tc bitimi */
} else {
	/* Yabancı TC başlangıcı */
$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=BilesikKutukSorgulaKimlikNoServis";

$kpsClient = new KPSSoapClient($username_krm, $password_krm, $wsdl);

try {
        $result = $kpsClient->Sorgula(
                array(
                        'kriterListesi' => array(
                                'BilesikKutukSorgulaKimlikNoSorguKriteri' => array(
                                        'KimlikNo' => $tckn
                                )
                        )
                )
        );




$donen[0] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->HataBilgisi;
//print_r($result);

$donen[1] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->TemelBilgisi->Ad;
$donen[2] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->TemelBilgisi->Soyad;
$donen[3] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumYer;

$dogum[ay] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->DogumTarih->Ay;
$dogum[gun] = $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->DogumTarih->Gun;
$dogum[yil] = $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->DogumTarih->Yil;

$cinsiyet =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->YabanciKisiKutukleri->KisiBilgisi->TemelBilgisi->Cinsiyet->Kod;

} catch (Exception $e)
{
        print_r($e);
}	
/* Yabancı tc bitimi */	
}


//echo "tc kimlik 3";	
?>


<?php
//ezSQL çekirdegini dahil ediyoruz.
include_once "ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "ez_sql_mysql.php";
 
include("ayar.php");
$user1= mysql_real_escape_string($db->escape($_POST["username"]));
$pass1= mysql_real_escape_string($db->escape($_POST["password"]));
$email1= mysql_real_escape_string($db->escape($_POST["email"]));

$satir = $db->get_row("select tckimlik , sifre from kisiler where tckimlik='".$user1."' ");
$user=$satir->tckimlik;
$pass= $satir->sifre;
//echo "vt 1";
?>
<?php


 
if($donen[0] == ""){

//echo $user1."--".$pass1."--".$email1."<br>";
if($user1 != "" and $pass1 != "" and $email1 != "") {
if($user == "") {
	
	$pass1 = md5(sha1($pass1));
//$db->query("insert into kisiler (tckimlik , sifre , email) values ('".$user1."' , '".$pass1."' , '".$email1."') ");
if($user1 < 89999999999) { $uyruk=1; } else { $uyruk=2; }
if($donen[1] != ""){	
$db->query("insert into kisiler (tckimlik , sifre , email , adi, soyadi , dogum_yeri , d_gun , d_ay, d_yil , cinsiyet , uyruk ) values ('".$user1."' , '".$pass1."' , '".$email1."' , '".$donen[1]."' , '".$donen[2]."' , '".$donen[3]."' , '".$dogum[gun]."'  , '".$dogum[ay]."' , '".$dogum[yil]."' , '".$cinsiyet."' , '".$uyruk."' ) ");

						if($db->rows_affected>0) {
//							echo "Kay&#305;t &#304;&#351;lemi Ba&#351;ar&#305;l&#305;";
							header("Refresh: 1; url=giris.php?uyari=1");
						} else {
							echo "Hatalı işlem";
							header("Refresh: 1; url=kayit.php?uyari=1");
						}
					} else {
						header("Refresh: 1; url=kayit.php?uyari=1");
					}

}
if($user != "") {
	//echo "Bu T.C. Kimli&#287;i Zaten Kay&#305;tl&#305;";
	
	header("Refresh: 1; url=giris.php?uyari=2");
}
												} else {
											//	echo "Hatal&#305; i&#351;lem";
							header("Refresh: 1; url=kayit.php?uyari=2");	
												}
												
												
												} else { 
//echo "Hatal&#305; i&#351;lem";
header("Refresh: 1; url=kayit.php?uyari=3");
} 

ob_end_flush();

?>


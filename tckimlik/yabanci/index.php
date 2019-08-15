<?php
ini_set("soap.wsdl_cache_enabled", "0");
include "KPSSoapClient.php";

header("Content-Type: text/plain");


$username = "KRM-7117690";
$password = "Sabri.56*";

//$tckn = $_GET[tckimlik];


if($_GET[tckimlik]){
$tckn = $_GET[tckimlik];
} else {
$tckn = "99803154874";
}

/*
$username = "KRM-27613557282";
$password = "wvLUn5BfZ";
*/
$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=YbKisiSorgulaYbKimlikNoServis&Version=2016/01/01";
//$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=KisiSorgulaTCKimlikNoServis";


$kpsClient = new KPSSoapClient($username, $password, $wsdl);
try {
        $result = $kpsClient->ListeleCoklu(
                array(
                        'kriterListesi' => array(
                                'YbKisiSorgulaYbKimlikNoSorguKriteri' => array(
                                        'KimlikNo' => $tckn
                                )
                        )
                )
        );

	  $donen =  $result->ListeleCokluResult->SorguSonucu->KisiBilgisi->HataBilgisi->Kod;
print_r($result);

 $donen[1] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->Ad;
 $donen[2] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->Soyad;
 $donen[3] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->DogumYer;
echo $donen[1]."\n";
echo $donen[2]."\n";
echo $donen[3]."\n";


$dogum[ay] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->DogumTarih->Ay;
$dogum[gun] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->DogumTarih->Gun;
$dogum[yil] =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->DogumTarih->Yil;

echo $dogum[gun]."\n";
echo $dogum[ay]."\n";
echo $dogum[yil]."\n";

$cinsiyet =  $result->ListeleCokluResult->SorguSonucu->YbKimlikNoIleYbKisiBilgisi->Cinsiyet->Kod;
echo $cinsiyet."\n";


} catch (Exception $e)
{
        print_r($e);
}
?>

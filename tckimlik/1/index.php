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
$tckn = "27143584914";
}

/*
$username = "KRM-27613557282";
$password = "wvLUn5BfZ";
*/

//$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=KisiSorgulaTCKimlikNoServis";
$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=BilesikKutukSorgulaKimlikNoServis";
       

$kpsClient = new KPSSoapClient($username, $password, $wsdl);
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
//echo $result->ListeleCokluResult->SorguSonucu->KisiBilgisi->HataBilgisi;
print_r($result);
//NufusCuzdaniBilgisi
$donen =  $result->SorgulaResult->HataBilgisi;
//print_r($donen);

 $donen[1] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Ad;
 $donen[2] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Soyad;
 $donen[3] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumYer;
echo $donen[1]."\n";
echo $donen[2]."\n";
echo $donen[3]."\n";


$dogum[ay] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Ay;
$dogum[gun] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Gun;
$dogum[yil] =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->DogumTarih->Yil;

echo $dogum[gun]."\n";
echo $dogum[ay]."\n";
echo $dogum[yil]."\n";

$cinsiyet =  $result->SorgulaResult->SorguSonucu->BilesikKutukBilgileri->TCVatandasiKisiKutukleri->KisiBilgisi->TemelBilgisi->Cinsiyet->Kod;
echo $cinsiyet."\n";


} catch (Exception $e)
{
        print_r($e);
}




/*
$wsdl      = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=KimlikNoSorgulaAdresServis&Version=2016/10/01 ";
            $kpsClient = new KPSSoapClient($username, $password, $wsdl);
            try {
                $result = $kpsClient->Sorgula(
                    array(
                        'kriterListesi' => array(
                            'KimlikNoileAdresSorguKriteri' => array(
                                'KimlikNo' => $tckn,
                            ),
                        ),
                    )
                );
                print_r( $result);
               
            } catch (Exception $e) {
// print_r($e);
            }



*/

?>

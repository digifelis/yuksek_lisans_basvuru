<?php

include "KPSSoapClient.php";

header("Content-Type: text/plain");

$username = "KRM-*******";
$password = "********";
$wsdl = "https://kpsbasvuru.nvi.gov.tr/Services/Wsdl.ashx?Service=KisiSorgulaTCKimlikNoServis";

$kpsClient = new KPSSoapClient($username, $password, $wsdl);

try {
        $result = $kpsClient->ListeleCoklu(
                array(
                        'kriterListesi' => array(
                                'KisiSorgulaTCKimlikNoSorguKriteri' => array(
                                        'TCKimlikNo' => 01234567895
                                )
                        )
                )
        );
        
        print_r($result);
        
} catch (Exception $e)
{
        print_r($e);
}

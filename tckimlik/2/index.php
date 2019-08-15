<?php
$tc = '';
	


	$ServisAdresi 	= 'https://sonucservis.osym.gov.tr/service.asmx?WSDL';
	$KullaniciAdi 	= 'edu.osym@duzce';
	$Sifre 			= 'Rgyt245i';
	$SinavId 		= '15';
	$SinavYili 		= '2015';
	$SinavDonemi 	= 'S1';

	$TcKimlikNo 	= $tc;
	$TcKimlikNo 	= '37517084476';

	$client 		= new SoapClient($ServisAdresi,array('soap_version'  => SOAP_1_2));
	$NS 			= 'https://sonucservis.osym.gov.tr/';
	$Header 		= new SOAPHeader($NS,'AuthenticationHeader',array(
			'KullaniciAdi' => $KullaniciAdi,
			'Sifre' => $Sifre));
	$client->__setSoapHeaders($Header);
	$SonucGetir 	= $client->__soapCall("SonucGetir",array('parameters' => array(
			'SinavId' => $SinavId,
			'SinavYili' => $SinavYili,
			'SinavDonemi' => $SinavDonemi,
			'TcKimlikNo' => $TcKimlikNo)));



	$SonucuParcala 	= simplexml_load_string($SonucGetir->SonucGetirResult->XMLData);;

	echo 'Sınav Yılı : '.$SinavYili; 
	
	echo '<pre>';
	print_r($SonucuParcala);
	echo '</pre>';
	
		$data['TCKIMLIKNO'] 				= $SonucuParcala->TCKIMLIKNO;
		$data['AD']	  						= $SonucuParcala->AD;
		$data['SOYAD']						= $SonucuParcala->SOYAD;

		$data['OKUL_KOD']					= $SonucuParcala->OKUL_KOD;
		$data['OKUL_TUR']					= $SonucuParcala->OKUL_TUR;
		$data['ALAN_KOL_BOLUM']				= $SonucuParcala->ALAN_KOL_BOLUM;

		$data['ONCEKI_YIL_YERLESME_DURUMU']	= $SonucuParcala->ONCEKI_YIL_YERLESME_DURUMU;

		$data['OBP']  						= $SonucuParcala->OBP;
		$data['OBP_SAY']  					= $SonucuParcala->OBP_SAY;
		$data['OBP_SOZ']  					= $SonucuParcala->OBP_SOZ;
		$data['OBP_EA']  					= $SonucuParcala->OBP_EA;


		$data['YGS1'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS1));
		$data['YGS2'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS2));
		$data['YGS3'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS3));
		$data['YGS4'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS4));
		$data['YGS5'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS5));
		$data['YGS6'] 						= floatval(str_replace(",", ".",$SonucuParcala->YGS6));

		$ygs_max = 0;
		if($data['YGS1'] > $ygs_max) $ygs_max = $data['YGS1'];
		if($data['YGS2'] > $ygs_max) $ygs_max = $data['YGS2'];
		if($data['YGS3'] > $ygs_max) $ygs_max = $data['YGS3'];
		if($data['YGS4'] > $ygs_max) $ygs_max = $data['YGS4'];
		if($data['YGS5'] > $ygs_max) $ygs_max = $data['YGS5'];
		if($data['YGS6'] > $ygs_max) $ygs_max = $data['YGS6'];

		$data['YGSMAX'] = $ygs_max;
		
		
		echo '<pre>';
		print_r($data);
		echo '</pre>';
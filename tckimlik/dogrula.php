<?php
header("Content-type: text/html; charset=utf-8");
function turkce_duzelt($veri){
    $bul = array('ç', 'ğ', 'ı', 'i', 'ö', 'ş', 'ü');
    $deg = array('Ç', 'Ğ', 'I', 'İ', 'Ö', 'Ş', 'Ü');
    return str_replace($bul, $deg, $veri);
}


if(isset($_POST) && isset($_POST['tc_no'])){
	$ad = strtoupper(turkce_duzelt(trim($_POST['ad'])));
	$soyad = strtoupper(turkce_duzelt(trim($_POST['soyad'])));
	$dogum_yili = trim($_POST['dogum_yili']);
	$tc_no = trim($_POST['tc_no']);
	settype($tc_no, 'double');
	if(!$ad || strlen($ad) <= 2 || !$soyad || strlen($soyad) <= 2 || !$dogum_yili || !$tc_no){
		echo 'Boş Alan Bırakmayın!..';
	}else if(strlen($tc_no) != 11){
		echo 'T.C. Numaranız 11 Karakter Olmalıdır!..';
	}else if(strlen($dogum_yili) != 4 || !is_numeric($dogum_yili)){
		echo 'Geçersiz Doğum Yılı!..';
	}else{
		try{
			$veriler = array('TCKimlikNo' => $tc_no, 'Ad' => $ad, 'Soyad' => $soyad, 'DogumYili' => $dogum_yili);
			$baglan = new SoapClient('https://tckimlik.nvi.gov.tr/Service/KPSPublic.asmx?WSDL');
			//$baglan = new SoapClient('https://tckimlik.nvi.gov.tr/WS/TCKimlikNoDogrula/Service/KPSPublic.asmx');
			$sonuc = $baglan->TCKimlikNoDogrula($veriler);
			if($sonuc->TCKimlikNoDogrulaResult){
				echo $soyad."<br>";
				
				echo 'Tebrikler! Bilgiler Doğru!..';
			}else{
				echo $soyad."<br>";
				echo 'Hata! Bilgiler Yanlış!..';
			}
		}catch(Exception $hata){
			echo 'Hata! Geçersiz Bilgiler!..';
		}
	}
}else{
	echo '<h1>Erişim Engellendi!</h1>';
}
?>
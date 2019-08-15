<meta charset="utf-8" /> 
<?php
//$tckimlik = "15230986284";
$tckimlik = $_GET[tc];
$ales_yili = $_GET[yil];
$ales_mevsim = "2";
 $site = 'http://siirt.edu.tr/BesyoOsysmSonuclari/enstituler.aspx?kul_adi=enstitu&sifre=enstitu_fbe_sbe_56&tc='.$tckimlik.'&yil='.$ales_yili.'&sinav=13';
  $ch = curl_init();
  $hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";
  curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
  curl_setopt($ch, CURLOPT_URL, $site);
  curl_setopt($ch, CURLOPT_USERAGENT, $hc);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $site = curl_exec($ch);
  curl_close($ch);
  
  print_r($site);
  
  function parcala_ve_al($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
    return @$m[1];
}


  
  // Veriyi parçalama işlemi
  preg_match_all('@<div id="donem">(.*?)</div>@si',$site,$derece1);


 $arr1 = explode("|",$derece1[0][0]);
 $arr2 = explode("|",$derece1[0][1]);
 $dizi = array_merge(array($arr1),array($arr2));

  if(count($derece1[0]) == 2){

		if(strstr($dizi[0][0], "İlkbahar")) { $parametre1[0][0]=$dizi[0][0]; $parametre1[0][1]=$dizi[0][1]; }
		if(strstr($dizi[1][0], "Sonbahar")) { $parametre1[1][0]=$dizi[1][0]; $parametre1[1][1]=$dizi[1][1]; } 
 } 
 
 else {
	 
 if(count($derece1[0]) == 1) {

		if(strstr($dizi[0][0], "İlkbahar")) {  $parametre1[0][0]=$dizi[0][0]; $parametre1[0][1]=$dizi[0][1]; } 
		if(strstr($dizi[0][0], "Sonbahar")) { $parametre1[1][0]=$dizi[0][0]; $parametre1[1][1]=$dizi[0][1]; }  
	}	 
	 
	 
	 
 }

if($ales_mevsim==1){$donem = $parametre1[0][1]; }  
if($ales_mevsim==2){$donem = $parametre1[1][1]; }
	
	function temizle($veri)
{
$veri =str_replace("</div>","",$veri);
return $veri;
}
$donem = temizle($donem);
  $site = 'http://www.siirt.edu.tr/BesyoOsysmSonuclari/enstitusonucyazdir.aspx?kul_adi=enstitu&sifre=enstitu_fbe_sbe_56&tc='.$tckimlik.'&yil='.$ales_yili.'&donem='.$donem;

  
  $ch = curl_init();
  $hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";
  curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
  curl_setopt($ch, CURLOPT_URL, $site);
  curl_setopt($ch, CURLOPT_USERAGENT, $hc);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $site = curl_exec($ch);
  curl_close($ch);
 
  // Veriyi parçalama işlemi
  preg_match_all('@<td align="center">(.*?)</td>@si',$site,$notlar);
 
 echo "sayısal : ".$notlar[0][8];
 echo "-";
 
 echo "sözel : ".$notlar[0][11];
 echo "-";
 
 echo "eşitağırlık : ".$notlar[0][14];
 echo "-";
 
  print_r($veri_derece1)


?>
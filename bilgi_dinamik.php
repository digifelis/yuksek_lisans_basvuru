<?php
/*
if($_POST[islem] == "ales") {
	
	
	$ServisAdresi 	= 'https://sonucservis.osym.gov.tr/service.asmx?WSDL';
	$KullaniciAdi 	= 'edu.osym@duzce';
	$Sifre 			= 'Rgyt245i';
	$SinavId 		= '13';
	$SinavYili 		= $_POST[ales_yili];
	$SinavDonemi 	= 'S'.$_POST[ales_mevsim];

	$TcKimlikNo 	= $_POST[tckimlik];

	$client 		= new SoapClient($ServisAdresi,array('soap_version'=> SOAP_1_2));
	$NS 			= 'https://sonucservis.osym.gov.tr/';
	$Header 		= new SOAPHeader($NS,'AuthenticationHeader',array(
			'KullaniciAdi'=> $KullaniciAdi,
			'Sifre'=> $Sifre));
	$client->__setSoapHeaders($Header);
	$SonucGetir 	= $client->__soapCall("SonucGetir",array('parameters'=> array(
			'SinavId'=> $SinavId,
			'SinavYili'=> $SinavYili,
			'SinavDonemi'=> $SinavDonemi,
			'TcKimlikNo'=> $TcKimlikNo)));



	$SonucuParcala 	= simplexml_load_string($SonucGetir->SonucGetirResult->XMLData);;

//	echo 'Sınav Yılı : '.$SinavYili; 
	echo $SonucuParcala->SAY_PUAN."-";
	echo $SonucuParcala->SOZ_PUAN."-";
	echo $SonucuParcala->EA_PUAN;
//	echo '<pre>';
//	print_r($SonucuParcala);
//	echo '</pre>';
}
*/

if($_POST[islem] == "ales") {
$tckimlik = $_POST[tckimlik];
$ales_yili = $_POST[ales_yili];
$ales_mevsim = $_POST[ales_mevsim];

$site = 'http://siirt.edu.tr/BesyoOsysmSonuclari/enstituler.aspx?kul_adi=enstitu&sifre=enstitu_fbe_sbe_56&tc='.$tckimlik.'&yil='.$ales_yili.'&sinav=13';
  $ch = curl_init();
  $hc = "YahooSeeker-Testing/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; Yahoo! Search - Web Search)";
  curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
  curl_setopt($ch, CURLOPT_URL, $site);
  curl_setopt($ch, CURLOPT_USERAGENT, $hc);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
  $site = curl_exec($ch);
  curl_close($ch);
  
  
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

	//////////////////////////////////////////////////////////////////////////
if($ales_mevsim==1){$donem = $parametre1[0][1]; }  
if($ales_mevsim==2){$donem = $parametre1[1][1]; }
	
	function temizle($veri)
{
	$veri =str_replace("</div>","",$veri);
	return $veri;
}
$donem = temizle($donem);	
	
	
	
	//echo $tckimlik."-".$ales_yili."-".$donem;
 $site = 'http://www.siirt.edu.tr/BesyoOsysmSonuclari/enstitusonucyazdir.aspx?kul_adi=enstitu&sifre=enstitu_fbe_sbe_56&tc='.$tckimlik.'&yil='.$ales_yili.'&donem='.$donem.'';
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
 /*
 echo "sayısal : ".$notlar[0][8];
 echo "<br>";
 
 echo "sözel : ".$notlar[0][11];
 echo "<br>";
 
 echo "eşitağırlık : ".$notlar[0][14];
 echo "<br>";
 */
 $sayisal = parcala_ve_al('<TD align="center">','</TD>',$notlar[0][8]);
 $sozel = parcala_ve_al('<TD align="center">','</TD>',$notlar[0][11]);
 $esitagirlik = parcala_ve_al('<TD align="center">','</TD>',$notlar[0][14]);
 echo $sayisal[0]."-".$sozel[0]."-".$esitagirlik[0];
 

	
}





if($_POST[islem] == "ogrenim"){
	echo " <label>";
	if($_POST[secenek] == "1" ) {
		echo  '<input class="form-control"   type="text" name="mezuniyet_sayisal" id="mezuniyet_sayisal" placeholder="Örnek 56,78" maxlength="5"   value="'.$_POST[deger].'"> ';
	}
	if($_POST[secenek]== "2") {
		$secili = "selected";
		$bos = "";
		echo '<select class="form-control" name="mezuniyet_sayisal" size="1" id="mezuniyet_sayisal" value="1">
<option '.(($_POST[deger] == '1,00')?'selected="selected"':"" ).'value="1,00">1,00</option>
<option '.(($_POST[deger] == '1,01')?'selected="selected"':"" ).'value="1,01">1,01</option>
<option '.(($_POST[deger] == '1,02')?'selected="selected"':"" ).'value="1,02">1,02</option>
<option '.(($_POST[deger] == '1,03')?'selected="selected"':"" ).'value="1,03">1,03</option>
<option '.(($_POST[deger] == '1,04')?'selected="selected"':"" ).'value="1,04">1,04</option>
<option '.(($_POST[deger] == '1,05')?'selected="selected"':"" ).'value="1,05">1,05</option>
<option '.(($_POST[deger] == '1,06')?'selected="selected"':"" ).'value="1,06">1,06</option>
<option '.(($_POST[deger] == '1,07')?'selected="selected"':"" ).'value="1,07">1,07</option>
<option '.(($_POST[deger] == '1,08')?'selected="selected"':"" ).'value="1,08">1,08</option>
<option '.(($_POST[deger] == '1,09')?'selected="selected"':"" ).'value="1,09">1,09</option>
<option '.(($_POST[deger] == '1,10')?'selected="selected"':"" ).'value="1,10">1,10</option>
<option '.(($_POST[deger] == '1,11')?'selected="selected"':"" ).'value="1,11">1,11</option>
<option '.(($_POST[deger] == '1,12')?'selected="selected"':"" ).'value="1,12">1,12</option>
<option '.(($_POST[deger] == '1,13')?'selected="selected"':"" ).'value="1,13">1,13</option>
<option '.(($_POST[deger] == '1,14')?'selected="selected"':"" ).'value="1,14">1,14</option>
<option '.(($_POST[deger] == '1,15')?'selected="selected"':"" ).'value="1,15">1,15</option>
<option '.(($_POST[deger] == '1,16')?'selected="selected"':"" ).'value="1,16">1,16</option>
<option '.(($_POST[deger] == '1,17')?'selected="selected"':"" ).'value="1,17">1,17</option>
<option '.(($_POST[deger] == '1,18')?'selected="selected"':"" ).'value="1,18">1,18</option>
<option '.(($_POST[deger] == '1,19')?'selected="selected"':"" ).'value="1,19">1,19</option>
<option '.(($_POST[deger] == '1,20')?'selected="selected"':"" ).'value="1,20">1,20</option>
<option '.(($_POST[deger] == '1,21')?'selected="selected"':"" ).'value="1,21">1,21</option>
<option '.(($_POST[deger] == '1,22')?'selected="selected"':"" ).'value="1,22">1,22</option>
<option '.(($_POST[deger] == '1,23')?'selected="selected"':"" ).'value="1,23">1,23</option>
<option '.(($_POST[deger] == '1,24')?'selected="selected"':"" ).'value="1,24">1,24</option>
<option '.(($_POST[deger] == '1,25')?'selected="selected"':"" ).'value="1,25">1,25</option>
<option '.(($_POST[deger] == '1,26')?'selected="selected"':"" ).'value="1,26">1,26</option>
<option '.(($_POST[deger] == '1,27')?'selected="selected"':"" ).'value="1,27">1,27</option>
<option '.(($_POST[deger] == '1,28')?'selected="selected"':"" ).'value="1,28">1,28</option>
<option '.(($_POST[deger] == '1,29')?'selected="selected"':"" ).'value="1,29">1,29</option>
<option '.(($_POST[deger] == '1,30')?'selected="selected"':"" ).'value="1,30">1,30</option>
<option '.(($_POST[deger] == '1,31')?'selected="selected"':"" ).'value="1,31">1,31</option>
<option '.(($_POST[deger] == '1,32')?'selected="selected"':"" ).'value="1,32">1,32</option>
<option '.(($_POST[deger] == '1,33')?'selected="selected"':"" ).'value="1,33">1,33</option>
<option '.(($_POST[deger] == '1,34')?'selected="selected"':"" ).'value="1,34">1,34</option>
<option '.(($_POST[deger] == '1,35')?'selected="selected"':"" ).'value="1,35">1,35</option>
<option '.(($_POST[deger] == '1,36')?'selected="selected"':"" ).'value="1,36">1,36</option>
<option '.(($_POST[deger] == '1,37')?'selected="selected"':"" ).'value="1,37">1,37</option>
<option '.(($_POST[deger] == '1,38')?'selected="selected"':"" ).'value="1,38">1,38</option>
<option '.(($_POST[deger] == '1,39')?'selected="selected"':"" ).'value="1,39">1,39</option>
<option '.(($_POST[deger] == '1,40')?'selected="selected"':"" ).'value="1,40">1,40</option>
<option '.(($_POST[deger] == '1,41')?'selected="selected"':"" ).'value="1,41">1,41</option>
<option '.(($_POST[deger] == '1,42')?'selected="selected"':"" ).'value="1,42">1,42</option>
<option '.(($_POST[deger] == '1,43')?'selected="selected"':"" ).'value="1,43">1,43</option>
<option '.(($_POST[deger] == '1,44')?'selected="selected"':"" ).'value="1,44">1,44</option>
<option '.(($_POST[deger] == '1,45')?'selected="selected"':"" ).'value="1,45">1,45</option>
<option '.(($_POST[deger] == '1,46')?'selected="selected"':"" ).'value="1,46">1,46</option>
<option '.(($_POST[deger] == '1,47')?'selected="selected"':"" ).'value="1,47">1,47</option>
<option '.(($_POST[deger] == '1,48')?'selected="selected"':"" ).'value="1,48">1,48</option>
<option '.(($_POST[deger] == '1,49')?'selected="selected"':"" ).'value="1,49">1,49</option>
<option '.(($_POST[deger] == '1,50')?'selected="selected"':"" ).'value="1,50">1,50</option>
<option '.(($_POST[deger] == '1,51')?'selected="selected"':"" ).'value="1,51">1,51</option>
<option '.(($_POST[deger] == '1,52')?'selected="selected"':"" ).'value="1,52">1,52</option>
<option '.(($_POST[deger] == '1,53')?'selected="selected"':"" ).'value="1,53">1,53</option>
<option '.(($_POST[deger] == '1,54')?'selected="selected"':"" ).'value="1,54">1,54</option>
<option '.(($_POST[deger] == '1,55')?'selected="selected"':"" ).'value="1,55">1,55</option>
<option '.(($_POST[deger] == '1,56')?'selected="selected"':"" ).'value="1,56">1,56</option>
<option '.(($_POST[deger] == '1,57')?'selected="selected"':"" ).'value="1,57">1,57</option>
<option '.(($_POST[deger] == '1,58')?'selected="selected"':"" ).'value="1,58">1,58</option>
<option '.(($_POST[deger] == '1,59')?'selected="selected"':"" ).'value="1,59">1,59</option>
<option '.(($_POST[deger] == '1,60')?'selected="selected"':"" ).'value="1,60">1,60</option>
<option '.(($_POST[deger] == '1,61')?'selected="selected"':"" ).'value="1,61">1,61</option>
<option '.(($_POST[deger] == '1,62')?'selected="selected"':"" ).'value="1,62">1,62</option>
<option '.(($_POST[deger] == '1,63')?'selected="selected"':"" ).'value="1,63">1,63</option>
<option '.(($_POST[deger] == '1,64')?'selected="selected"':"" ).'value="1,64">1,64</option>
<option '.(($_POST[deger] == '1,65')?'selected="selected"':"" ).'value="1,65">1,65</option>
<option '.(($_POST[deger] == '1,66')?'selected="selected"':"" ).'value="1,66">1,66</option>
<option '.(($_POST[deger] == '1,67')?'selected="selected"':"" ).'value="1,67">1,67</option>
<option '.(($_POST[deger] == '1,68')?'selected="selected"':"" ).'value="1,68">1,68</option>
<option '.(($_POST[deger] == '1,69')?'selected="selected"':"" ).'value="1,69">1,69</option>
<option '.(($_POST[deger] == '1,70')?'selected="selected"':"" ).'value="1,70">1,70</option>
<option '.(($_POST[deger] == '1,71')?'selected="selected"':"" ).'value="1,71">1,71</option>
<option '.(($_POST[deger] == '1,72')?'selected="selected"':"" ).'value="1,72">1,72</option>
<option '.(($_POST[deger] == '1,73')?'selected="selected"':"" ).'value="1,73">1,73</option>
<option '.(($_POST[deger] == '1,74')?'selected="selected"':"" ).'value="1,74">1,74</option>
<option '.(($_POST[deger] == '1,75')?'selected="selected"':"" ).'value="1,75">1,75</option>
<option '.(($_POST[deger] == '1,76')?'selected="selected"':"" ).'value="1,76">1,76</option>
<option '.(($_POST[deger] == '1,77')?'selected="selected"':"" ).'value="1,77">1,77</option>
<option '.(($_POST[deger] == '1,78')?'selected="selected"':"" ).'value="1,78">1,78</option>
<option '.(($_POST[deger] == '1,79')?'selected="selected"':"" ).'value="1,79">1,79</option>
<option '.(($_POST[deger] == '1,80')?'selected="selected"':"" ).'value="1,80">1,80</option>
<option '.(($_POST[deger] == '1,81')?'selected="selected"':"" ).'value="1,81">1,81</option>
<option '.(($_POST[deger] == '1,82')?'selected="selected"':"" ).'value="1,82">1,82</option>
<option '.(($_POST[deger] == '1,83')?'selected="selected"':"" ).'value="1,83">1,83</option>
<option '.(($_POST[deger] == '1,84')?'selected="selected"':"" ).'value="1,84">1,84</option>
<option '.(($_POST[deger] == '1,85')?'selected="selected"':"" ).'value="1,85">1,85</option>
<option '.(($_POST[deger] == '1,86')?'selected="selected"':"" ).'value="1,86">1,86</option>
<option '.(($_POST[deger] == '1,87')?'selected="selected"':"" ).'value="1,87">1,87</option>
<option '.(($_POST[deger] == '1,88')?'selected="selected"':"" ).'value="1,88">1,88</option>
<option '.(($_POST[deger] == '1,89')?'selected="selected"':"" ).'value="1,89">1,89</option>
<option '.(($_POST[deger] == '1,90')?'selected="selected"':"" ).'value="1,90">1,90</option>
<option '.(($_POST[deger] == '1,91')?'selected="selected"':"" ).'value="1,91">1,91</option>
<option '.(($_POST[deger] == '1,92')?'selected="selected"':"" ).'value="1,92">1,92</option>
<option '.(($_POST[deger] == '1,93')?'selected="selected"':"" ).'value="1,93">1,93</option>
<option '.(($_POST[deger] == '1,94')?'selected="selected"':"" ).'value="1,94">1,94</option>
<option '.(($_POST[deger] == '1,95')?'selected="selected"':"" ).'value="1,95">1,95</option>
<option '.(($_POST[deger] == '1,96')?'selected="selected"':"" ).'value="1,96">1,96</option>
<option '.(($_POST[deger] == '1,97')?'selected="selected"':"" ).'value="1,97">1,97</option>
<option '.(($_POST[deger] == '1,98')?'selected="selected"':"" ).'value="1,98">1,98</option>
<option '.(($_POST[deger] == '1,99')?'selected="selected"':"" ).'value="1,99">1,99</option>
<option '.(($_POST[deger] == '2,00')?'selected="selected"':"" ).'value="2,00">2,00</option>
<option '.(($_POST[deger] == '2,01')?'selected="selected"':"" ).'value="2,01">2,01</option>
<option '.(($_POST[deger] == '2,02')?'selected="selected"':"" ).'value="2,02">2,02</option>
<option '.(($_POST[deger] == '2,03')?'selected="selected"':"" ).'value="2,03">2,03</option>
<option '.(($_POST[deger] == '2,04')?'selected="selected"':"" ).'value="2,04">2,04</option>
<option '.(($_POST[deger] == '2,05')?'selected="selected"':"" ).'value="2,05">2,05</option>
<option '.(($_POST[deger] == '2,06')?'selected="selected"':"" ).'value="2,06">2,06</option>
<option '.(($_POST[deger] == '2,07')?'selected="selected"':"" ).'value="2,07">2,07</option>
<option '.(($_POST[deger] == '2,08')?'selected="selected"':"" ).'value="2,08">2,08</option>
<option '.(($_POST[deger] == '2,09')?'selected="selected"':"" ).'value="2,09">2,09</option>
<option '.(($_POST[deger] == '2,10')?'selected="selected"':"" ).'value="2,10">2,10</option>
<option '.(($_POST[deger] == '2,11')?'selected="selected"':"" ).'value="2,11">2,11</option>
<option '.(($_POST[deger] == '2,12')?'selected="selected"':"" ).'value="2,12">2,12</option>
<option '.(($_POST[deger] == '2,13')?'selected="selected"':"" ).'value="2,13">2,13</option>
<option '.(($_POST[deger] == '2,14')?'selected="selected"':"" ).'value="2,14">2,14</option>
<option '.(($_POST[deger] == '2,15')?'selected="selected"':"" ).'value="2,15">2,15</option>
<option '.(($_POST[deger] == '2,16')?'selected="selected"':"" ).'value="2,16">2,16</option>
<option '.(($_POST[deger] == '2,17')?'selected="selected"':"" ).'value="2,17">2,17</option>
<option '.(($_POST[deger] == '2,18')?'selected="selected"':"" ).'value="2,18">2,18</option>
<option '.(($_POST[deger] == '2,19')?'selected="selected"':"" ).'value="2,19">2,19</option>
<option '.(($_POST[deger] == '2,20')?'selected="selected"':"" ).'value="2,20">2,20</option>
<option '.(($_POST[deger] == '2,21')?'selected="selected"':"" ).'value="2,21">2,21</option>
<option '.(($_POST[deger] == '2,22')?'selected="selected"':"" ).'value="2,22">2,22</option>
<option '.(($_POST[deger] == '2,23')?'selected="selected"':"" ).'value="2,23">2,23</option>
<option '.(($_POST[deger] == '2,24')?'selected="selected"':"" ).'value="2,24">2,24</option>
<option '.(($_POST[deger] == '2,25')?'selected="selected"':"" ).'value="2,25">2,25</option>
<option '.(($_POST[deger] == '2,26')?'selected="selected"':"" ).'value="2,26">2,26</option>
<option '.(($_POST[deger] == '2,27')?'selected="selected"':"" ).'value="2,27">2,27</option>
<option '.(($_POST[deger] == '2,28')?'selected="selected"':"" ).'value="2,28">2,28</option>
<option '.(($_POST[deger] == '2,29')?'selected="selected"':"" ).'value="2,29">2,29</option>
<option '.(($_POST[deger] == '2,30')?'selected="selected"':"" ).'value="2,30">2,30</option>
<option '.(($_POST[deger] == '2,31')?'selected="selected"':"" ).'value="2,31">2,31</option>
<option '.(($_POST[deger] == '2,32')?'selected="selected"':"" ).'value="2,32">2,32</option>
<option '.(($_POST[deger] == '2,33')?'selected="selected"':"" ).'value="2,33">2,33</option>
<option '.(($_POST[deger] == '2,34')?'selected="selected"':"" ).'value="2,34">2,34</option>
<option '.(($_POST[deger] == '2,35')?'selected="selected"':"" ).'value="2,35">2,35</option>
<option '.(($_POST[deger] == '2,36')?'selected="selected"':"" ).'value="2,36">2,36</option>
<option '.(($_POST[deger] == '2,37')?'selected="selected"':"" ).'value="2,37">2,37</option>
<option '.(($_POST[deger] == '2,38')?'selected="selected"':"" ).'value="2,38">2,38</option>
<option '.(($_POST[deger] == '2,39')?'selected="selected"':"" ).'value="2,39">2,39</option>
<option '.(($_POST[deger] == '2,40')?'selected="selected"':"" ).'value="2,40">2,40</option>
<option '.(($_POST[deger] == '2,41')?'selected="selected"':"" ).'value="2,41">2,41</option>
<option '.(($_POST[deger] == '2,42')?'selected="selected"':"" ).'value="2,42">2,42</option>
<option '.(($_POST[deger] == '2,43')?'selected="selected"':"" ).'value="2,43">2,43</option>
<option '.(($_POST[deger] == '2,44')?'selected="selected"':"" ).'value="2,44">2,44</option>
<option '.(($_POST[deger] == '2,45')?'selected="selected"':"" ).'value="2,45">2,45</option>
<option '.(($_POST[deger] == '2,46')?'selected="selected"':"" ).'value="2,46">2,46</option>
<option '.(($_POST[deger] == '2,47')?'selected="selected"':"" ).'value="2,47">2,47</option>
<option '.(($_POST[deger] == '2,48')?'selected="selected"':"" ).'value="2,48">2,48</option>
<option '.(($_POST[deger] == '2,49')?'selected="selected"':"" ).'value="2,49">2,49</option>
<option '.(($_POST[deger] == '2,50')?'selected="selected"':"" ).'value="2,50">2,50</option>
<option '.(($_POST[deger] == '2,51')?'selected="selected"':"" ).'value="2,51">2,51</option>
<option '.(($_POST[deger] == '2,52')?'selected="selected"':"" ).'value="2,52">2,52</option>
<option '.(($_POST[deger] == '2,53')?'selected="selected"':"" ).'value="2,53">2,53</option>
<option '.(($_POST[deger] == '2,54')?'selected="selected"':"" ).'value="2,54">2,54</option>
<option '.(($_POST[deger] == '2,55')?'selected="selected"':"" ).'value="2,55">2,55</option>
<option '.(($_POST[deger] == '2,56')?'selected="selected"':"" ).'value="2,56">2,56</option>
<option '.(($_POST[deger] == '2,57')?'selected="selected"':"" ).'value="2,57">2,57</option>
<option '.(($_POST[deger] == '2,58')?'selected="selected"':"" ).'value="2,58">2,58</option>
<option '.(($_POST[deger] == '2,59')?'selected="selected"':"" ).'value="2,59">2,59</option>
<option '.(($_POST[deger] == '2,60')?'selected="selected"':"" ).'value="2,60">2,60</option>
<option '.(($_POST[deger] == '2,61')?'selected="selected"':"" ).'value="2,61">2,61</option>
<option '.(($_POST[deger] == '2,62')?'selected="selected"':"" ).'value="2,62">2,62</option>
<option '.(($_POST[deger] == '2,63')?'selected="selected"':"" ).'value="2,63">2,63</option>
<option '.(($_POST[deger] == '2,64')?'selected="selected"':"" ).'value="2,64">2,64</option>
<option '.(($_POST[deger] == '2,65')?'selected="selected"':"" ).'value="2,65">2,65</option>
<option '.(($_POST[deger] == '2,66')?'selected="selected"':"" ).'value="2,66">2,66</option>
<option '.(($_POST[deger] == '2,67')?'selected="selected"':"" ).'value="2,67">2,67</option>
<option '.(($_POST[deger] == '2,68')?'selected="selected"':"" ).'value="2,68">2,68</option>
<option '.(($_POST[deger] == '2,69')?'selected="selected"':"" ).'value="2,69">2,69</option>
<option '.(($_POST[deger] == '2,70')?'selected="selected"':"" ).'value="2,70">2,70</option>
<option '.(($_POST[deger] == '2,71')?'selected="selected"':"" ).'value="2,71">2,71</option>
<option '.(($_POST[deger] == '2,72')?'selected="selected"':"" ).'value="2,72">2,72</option>
<option '.(($_POST[deger] == '2,73')?'selected="selected"':"" ).'value="2,73">2,73</option>
<option '.(($_POST[deger] == '2,74')?'selected="selected"':"" ).'value="2,74">2,74</option>
<option '.(($_POST[deger] == '2,75')?'selected="selected"':"" ).'value="2,75">2,75</option>
<option '.(($_POST[deger] == '2,76')?'selected="selected"':"" ).'value="2,76">2,76</option>
<option '.(($_POST[deger] == '2,77')?'selected="selected"':"" ).'value="2,77">2,77</option>
<option '.(($_POST[deger] == '2,78')?'selected="selected"':"" ).'value="2,78">2,78</option>
<option '.(($_POST[deger] == '2,79')?'selected="selected"':"" ).'value="2,79">2,79</option>
<option '.(($_POST[deger] == '2,80')?'selected="selected"':"" ).'value="2,80">2,80</option>
<option '.(($_POST[deger] == '2,81')?'selected="selected"':"" ).'value="2,81">2,81</option>
<option '.(($_POST[deger] == '2,82')?'selected="selected"':"" ).'value="2,82">2,82</option>
<option '.(($_POST[deger] == '2,83')?'selected="selected"':"" ).'value="2,83">2,83</option>
<option '.(($_POST[deger] == '2,84')?'selected="selected"':"" ).'value="2,84">2,84</option>
<option '.(($_POST[deger] == '2,85')?'selected="selected"':"" ).'value="2,85">2,85</option>
<option '.(($_POST[deger] == '2,86')?'selected="selected"':"" ).'value="2,86">2,86</option>
<option '.(($_POST[deger] == '2,87')?'selected="selected"':"" ).'value="2,87">2,87</option>
<option '.(($_POST[deger] == '2,88')?'selected="selected"':"" ).'value="2,88">2,88</option>
<option '.(($_POST[deger] == '2,89')?'selected="selected"':"" ).'value="2,89">2,89</option>
<option '.(($_POST[deger] == '2,90')?'selected="selected"':"" ).'value="2,90">2,90</option>
<option '.(($_POST[deger] == '2,91')?'selected="selected"':"" ).'value="2,91">2,91</option>
<option '.(($_POST[deger] == '2,92')?'selected="selected"':"" ).'value="2,92">2,92</option>
<option '.(($_POST[deger] == '2,93')?'selected="selected"':"" ).'value="2,93">2,93</option>
<option '.(($_POST[deger] == '2,94')?'selected="selected"':"" ).'value="2,94">2,94</option>
<option '.(($_POST[deger] == '2,95')?'selected="selected"':"" ).'value="2,95">2,95</option>
<option '.(($_POST[deger] == '2,96')?'selected="selected"':"" ).'value="2,96">2,96</option>
<option '.(($_POST[deger] == '2,97')?'selected="selected"':"" ).'value="2,97">2,97</option>
<option '.(($_POST[deger] == '2,98')?'selected="selected"':"" ).'value="2,98">2,98</option>
<option '.(($_POST[deger] == '2,99')?'selected="selected"':"" ).'value="2,99">2,99</option>
<option '.(($_POST[deger] == '3,00')?'selected="selected"':"" ).'value="3,00">3,00</option>
<option '.(($_POST[deger] == '3,01')?'selected="selected"':"" ).'value="3,01">3,01</option>
<option '.(($_POST[deger] == '3,02')?'selected="selected"':"" ).'value="3,02">3,02</option>
<option '.(($_POST[deger] == '3,03')?'selected="selected"':"" ).'value="3,03">3,03</option>
<option '.(($_POST[deger] == '3,04')?'selected="selected"':"" ).'value="3,04">3,04</option>
<option '.(($_POST[deger] == '3,05')?'selected="selected"':"" ).'value="3,05">3,05</option>
<option '.(($_POST[deger] == '3,06')?'selected="selected"':"" ).'value="3,06">3,06</option>
<option '.(($_POST[deger] == '3,07')?'selected="selected"':"" ).'value="3,07">3,07</option>
<option '.(($_POST[deger] == '3,08')?'selected="selected"':"" ).'value="3,08">3,08</option>
<option '.(($_POST[deger] == '3,09')?'selected="selected"':"" ).'value="3,09">3,09</option>
<option '.(($_POST[deger] == '3,10')?'selected="selected"':"" ).'value="3,10">3,10</option>
<option '.(($_POST[deger] == '3,11')?'selected="selected"':"" ).'value="3,11">3,11</option>
<option '.(($_POST[deger] == '3,12')?'selected="selected"':"" ).'value="3,12">3,12</option>
<option '.(($_POST[deger] == '3,13')?'selected="selected"':"" ).'value="3,13">3,13</option>
<option '.(($_POST[deger] == '3,14')?'selected="selected"':"" ).'value="3,14">3,14</option>
<option '.(($_POST[deger] == '3,15')?'selected="selected"':"" ).'value="3,15">3,15</option>
<option '.(($_POST[deger] == '3,16')?'selected="selected"':"" ).'value="3,16">3,16</option>
<option '.(($_POST[deger] == '3,17')?'selected="selected"':"" ).'value="3,17">3,17</option>
<option '.(($_POST[deger] == '3,18')?'selected="selected"':"" ).'value="3,18">3,18</option>
<option '.(($_POST[deger] == '3,19')?'selected="selected"':"" ).'value="3,19">3,19</option>
<option '.(($_POST[deger] == '3,20')?'selected="selected"':"" ).'value="3,20">3,20</option>
<option '.(($_POST[deger] == '3,21')?'selected="selected"':"" ).'value="3,21">3,21</option>
<option '.(($_POST[deger] == '3,22')?'selected="selected"':"" ).'value="3,22">3,22</option>
<option '.(($_POST[deger] == '3,23')?'selected="selected"':"" ).'value="3,23">3,23</option>
<option '.(($_POST[deger] == '3,24')?'selected="selected"':"" ).'value="3,24">3,24</option>
<option '.(($_POST[deger] == '3,25')?'selected="selected"':"" ).'value="3,25">3,25</option>
<option '.(($_POST[deger] == '3,26')?'selected="selected"':"" ).'value="3,26">3,26</option>
<option '.(($_POST[deger] == '3,27')?'selected="selected"':"" ).'value="3,27">3,27</option>
<option '.(($_POST[deger] == '3,28')?'selected="selected"':"" ).'value="3,28">3,28</option>
<option '.(($_POST[deger] == '3,29')?'selected="selected"':"" ).'value="3,29">3,29</option>
<option '.(($_POST[deger] == '3,30')?'selected="selected"':"" ).'value="3,30">3,30</option>
<option '.(($_POST[deger] == '3,31')?'selected="selected"':"" ).'value="3,31">3,31</option>
<option '.(($_POST[deger] == '3,32')?'selected="selected"':"" ).'value="3,32">3,32</option>
<option '.(($_POST[deger] == '3,33')?'selected="selected"':"" ).'value="3,33">3,33</option>
<option '.(($_POST[deger] == '3,34')?'selected="selected"':"" ).'value="3,34">3,34</option>
<option '.(($_POST[deger] == '3,35')?'selected="selected"':"" ).'value="3,35">3,35</option>
<option '.(($_POST[deger] == '3,36')?'selected="selected"':"" ).'value="3,36">3,36</option>
<option '.(($_POST[deger] == '3,37')?'selected="selected"':"" ).'value="3,37">3,37</option>
<option '.(($_POST[deger] == '3,38')?'selected="selected"':"" ).'value="3,38">3,38</option>
<option '.(($_POST[deger] == '3,39')?'selected="selected"':"" ).'value="3,39">3,39</option>
<option '.(($_POST[deger] == '3,40')?'selected="selected"':"" ).'value="3,40">3,40</option>
<option '.(($_POST[deger] == '3,41')?'selected="selected"':"" ).'value="3,41">3,41</option>
<option '.(($_POST[deger] == '3,42')?'selected="selected"':"" ).'value="3,42">3,42</option>
<option '.(($_POST[deger] == '3,43')?'selected="selected"':"" ).'value="3,43">3,43</option>
<option '.(($_POST[deger] == '3,44')?'selected="selected"':"" ).'value="3,44">3,44</option>
<option '.(($_POST[deger] == '3,45')?'selected="selected"':"" ).'value="3,45">3,45</option>
<option '.(($_POST[deger] == '3,46')?'selected="selected"':"" ).'value="3,46">3,46</option>
<option '.(($_POST[deger] == '3,47')?'selected="selected"':"" ).'value="3,47">3,47</option>
<option '.(($_POST[deger] == '3,48')?'selected="selected"':"" ).'value="3,48">3,48</option>
<option '.(($_POST[deger] == '3,49')?'selected="selected"':"" ).'value="3,49">3,49</option>
<option '.(($_POST[deger] == '3,50')?'selected="selected"':"" ).'value="3,50">3,50</option>
<option '.(($_POST[deger] == '3,51')?'selected="selected"':"" ).'value="3,51">3,51</option>
<option '.(($_POST[deger] == '3,52')?'selected="selected"':"" ).'value="3,52">3,52</option>
<option '.(($_POST[deger] == '3,53')?'selected="selected"':"" ).'value="3,53">3,53</option>
<option '.(($_POST[deger] == '3,54')?'selected="selected"':"" ).'value="3,54">3,54</option>
<option '.(($_POST[deger] == '3,55')?'selected="selected"':"" ).'value="3,55">3,55</option>
<option '.(($_POST[deger] == '3,56')?'selected="selected"':"" ).'value="3,56">3,56</option>
<option '.(($_POST[deger] == '3,57')?'selected="selected"':"" ).'value="3,57">3,57</option>
<option '.(($_POST[deger] == '3,58')?'selected="selected"':"" ).'value="3,58">3,58</option>
<option '.(($_POST[deger] == '3,59')?'selected="selected"':"" ).'value="3,59">3,59</option>
<option '.(($_POST[deger] == '3,60')?'selected="selected"':"" ).'value="3,60">3,60</option>
<option '.(($_POST[deger] == '3,61')?'selected="selected"':"" ).'value="3,61">3,61</option>
<option '.(($_POST[deger] == '3,62')?'selected="selected"':"" ).'value="3,62">3,62</option>
<option '.(($_POST[deger] == '3,63')?'selected="selected"':"" ).'value="3,63">3,63</option>
<option '.(($_POST[deger] == '3,64')?'selected="selected"':"" ).'value="3,64">3,64</option>
<option '.(($_POST[deger] == '3,65')?'selected="selected"':"" ).'value="3,65">3,65</option>
<option '.(($_POST[deger] == '3,66')?'selected="selected"':"" ).'value="3,66">3,66</option>
<option '.(($_POST[deger] == '3,67')?'selected="selected"':"" ).'value="3,67">3,67</option>
<option '.(($_POST[deger] == '3,68')?'selected="selected"':"" ).'value="3,68">3,68</option>
<option '.(($_POST[deger] == '3,69')?'selected="selected"':"" ).'value="3,69">3,69</option>
<option '.(($_POST[deger] == '3,70')?'selected="selected"':"" ).'value="3,70">3,70</option>
<option '.(($_POST[deger] == '3,71')?'selected="selected"':"" ).'value="3,71">3,71</option>
<option '.(($_POST[deger] == '3,72')?'selected="selected"':"" ).'value="3,72">3,72</option>
<option '.(($_POST[deger] == '3,73')?'selected="selected"':"" ).'value="3,73">3,73</option>
<option '.(($_POST[deger] == '3,74')?'selected="selected"':"" ).'value="3,74">3,74</option>
<option '.(($_POST[deger] == '3,75')?'selected="selected"':"" ).'value="3,75">3,75</option>
<option '.(($_POST[deger] == '3,76')?'selected="selected"':"" ).'value="3,76">3,76</option>
<option '.(($_POST[deger] == '3,77')?'selected="selected"':"" ).'value="3,77">3,77</option>
<option '.(($_POST[deger] == '3,78')?'selected="selected"':"" ).'value="3,78">3,78</option>
<option '.(($_POST[deger] == '3,79')?'selected="selected"':"" ).'value="3,79">3,79</option>
<option '.(($_POST[deger] == '3,80')?'selected="selected"':"" ).'value="3,80">3,80</option>
<option '.(($_POST[deger] == '3,81')?'selected="selected"':"" ).'value="3,81">3,81</option>
<option '.(($_POST[deger] == '3,82')?'selected="selected"':"" ).'value="3,82">3,82</option>
<option '.(($_POST[deger] == '3,83')?'selected="selected"':"" ).'value="3,83">3,83</option>
<option '.(($_POST[deger] == '3,84')?'selected="selected"':"" ).'value="3,84">3,84</option>
<option '.(($_POST[deger] == '3,85')?'selected="selected"':"" ).'value="3,85">3,85</option>
<option '.(($_POST[deger] == '3,86')?'selected="selected"':"" ).'value="3,86">3,86</option>
<option '.(($_POST[deger] == '3,87')?'selected="selected"':"" ).'value="3,87">3,87</option>
<option '.(($_POST[deger] == '3,88')?'selected="selected"':"" ).'value="3,88">3,88</option>
<option '.(($_POST[deger] == '3,89')?'selected="selected"':"" ).'value="3,89">3,89</option>
<option '.(($_POST[deger] == '3,90')?'selected="selected"':"" ).'value="3,90">3,90</option>
<option '.(($_POST[deger] == '3,91')?'selected="selected"':"" ).'value="3,91">3,91</option>
<option '.(($_POST[deger] == '3,92')?'selected="selected"':"" ).'value="3,92">3,92</option>
<option '.(($_POST[deger] == '3,93')?'selected="selected"':"" ).'value="3,93">3,93</option>
<option '.(($_POST[deger] == '3,94')?'selected="selected"':"" ).'value="3,94">3,94</option>
<option '.(($_POST[deger] == '3,95')?'selected="selected"':"" ).'value="3,95">3,95</option>
<option '.(($_POST[deger] == '3,96')?'selected="selected"':"" ).'value="3,96">3,96</option>
<option '.(($_POST[deger] == '3,97')?'selected="selected"':"" ).'value="3,97">3,97</option>
<option '.(($_POST[deger] == '3,98')?'selected="selected"':"" ).'value="3,98">3,98</option>
<option '.(($_POST[deger] == '3,99')?'selected="selected"':"" ).'value="3,99">3,99</option>
<option '.(($_POST[deger] == '4,00')?'selected="selected"':"" ).'value="4,00">4,00</option>

      </select>
		
		';
	}
	
	echo "</label>";
}

if($_POST[islem] == "ogrenim1"){
	echo " <label>";
	if($_POST[secenek] == "1" ) {
		echo  '<input class="form-control"   type="text" name="d_mezuniyet_sayisal" id="d_mezuniyet_sayisal" placeholder="Örnek 56,78" maxlength="5"   value="'.$_POST[deger].'"> ';
	}
	if($_POST[secenek]== "2") {
		$secili = "selected";
		$bos = "";
		echo '<select class="form-control" name="d_mezuniyet_sayisal" size="1" id="d_mezuniyet_sayisal" value="1">
<option '.(($_POST[deger] == '1,00')?'selected="selected"':"" ).'value="1,00">1,00</option>
<option '.(($_POST[deger] == '1,01')?'selected="selected"':"" ).'value="1,01">1,01</option>
<option '.(($_POST[deger] == '1,02')?'selected="selected"':"" ).'value="1,02">1,02</option>
<option '.(($_POST[deger] == '1,03')?'selected="selected"':"" ).'value="1,03">1,03</option>
<option '.(($_POST[deger] == '1,04')?'selected="selected"':"" ).'value="1,04">1,04</option>
<option '.(($_POST[deger] == '1,05')?'selected="selected"':"" ).'value="1,05">1,05</option>
<option '.(($_POST[deger] == '1,06')?'selected="selected"':"" ).'value="1,06">1,06</option>
<option '.(($_POST[deger] == '1,07')?'selected="selected"':"" ).'value="1,07">1,07</option>
<option '.(($_POST[deger] == '1,08')?'selected="selected"':"" ).'value="1,08">1,08</option>
<option '.(($_POST[deger] == '1,09')?'selected="selected"':"" ).'value="1,09">1,09</option>
<option '.(($_POST[deger] == '1,10')?'selected="selected"':"" ).'value="1,10">1,10</option>
<option '.(($_POST[deger] == '1,11')?'selected="selected"':"" ).'value="1,11">1,11</option>
<option '.(($_POST[deger] == '1,12')?'selected="selected"':"" ).'value="1,12">1,12</option>
<option '.(($_POST[deger] == '1,13')?'selected="selected"':"" ).'value="1,13">1,13</option>
<option '.(($_POST[deger] == '1,14')?'selected="selected"':"" ).'value="1,14">1,14</option>
<option '.(($_POST[deger] == '1,15')?'selected="selected"':"" ).'value="1,15">1,15</option>
<option '.(($_POST[deger] == '1,16')?'selected="selected"':"" ).'value="1,16">1,16</option>
<option '.(($_POST[deger] == '1,17')?'selected="selected"':"" ).'value="1,17">1,17</option>
<option '.(($_POST[deger] == '1,18')?'selected="selected"':"" ).'value="1,18">1,18</option>
<option '.(($_POST[deger] == '1,19')?'selected="selected"':"" ).'value="1,19">1,19</option>
<option '.(($_POST[deger] == '1,20')?'selected="selected"':"" ).'value="1,20">1,20</option>
<option '.(($_POST[deger] == '1,21')?'selected="selected"':"" ).'value="1,21">1,21</option>
<option '.(($_POST[deger] == '1,22')?'selected="selected"':"" ).'value="1,22">1,22</option>
<option '.(($_POST[deger] == '1,23')?'selected="selected"':"" ).'value="1,23">1,23</option>
<option '.(($_POST[deger] == '1,24')?'selected="selected"':"" ).'value="1,24">1,24</option>
<option '.(($_POST[deger] == '1,25')?'selected="selected"':"" ).'value="1,25">1,25</option>
<option '.(($_POST[deger] == '1,26')?'selected="selected"':"" ).'value="1,26">1,26</option>
<option '.(($_POST[deger] == '1,27')?'selected="selected"':"" ).'value="1,27">1,27</option>
<option '.(($_POST[deger] == '1,28')?'selected="selected"':"" ).'value="1,28">1,28</option>
<option '.(($_POST[deger] == '1,29')?'selected="selected"':"" ).'value="1,29">1,29</option>
<option '.(($_POST[deger] == '1,30')?'selected="selected"':"" ).'value="1,30">1,30</option>
<option '.(($_POST[deger] == '1,31')?'selected="selected"':"" ).'value="1,31">1,31</option>
<option '.(($_POST[deger] == '1,32')?'selected="selected"':"" ).'value="1,32">1,32</option>
<option '.(($_POST[deger] == '1,33')?'selected="selected"':"" ).'value="1,33">1,33</option>
<option '.(($_POST[deger] == '1,34')?'selected="selected"':"" ).'value="1,34">1,34</option>
<option '.(($_POST[deger] == '1,35')?'selected="selected"':"" ).'value="1,35">1,35</option>
<option '.(($_POST[deger] == '1,36')?'selected="selected"':"" ).'value="1,36">1,36</option>
<option '.(($_POST[deger] == '1,37')?'selected="selected"':"" ).'value="1,37">1,37</option>
<option '.(($_POST[deger] == '1,38')?'selected="selected"':"" ).'value="1,38">1,38</option>
<option '.(($_POST[deger] == '1,39')?'selected="selected"':"" ).'value="1,39">1,39</option>
<option '.(($_POST[deger] == '1,40')?'selected="selected"':"" ).'value="1,40">1,40</option>
<option '.(($_POST[deger] == '1,41')?'selected="selected"':"" ).'value="1,41">1,41</option>
<option '.(($_POST[deger] == '1,42')?'selected="selected"':"" ).'value="1,42">1,42</option>
<option '.(($_POST[deger] == '1,43')?'selected="selected"':"" ).'value="1,43">1,43</option>
<option '.(($_POST[deger] == '1,44')?'selected="selected"':"" ).'value="1,44">1,44</option>
<option '.(($_POST[deger] == '1,45')?'selected="selected"':"" ).'value="1,45">1,45</option>
<option '.(($_POST[deger] == '1,46')?'selected="selected"':"" ).'value="1,46">1,46</option>
<option '.(($_POST[deger] == '1,47')?'selected="selected"':"" ).'value="1,47">1,47</option>
<option '.(($_POST[deger] == '1,48')?'selected="selected"':"" ).'value="1,48">1,48</option>
<option '.(($_POST[deger] == '1,49')?'selected="selected"':"" ).'value="1,49">1,49</option>
<option '.(($_POST[deger] == '1,50')?'selected="selected"':"" ).'value="1,50">1,50</option>
<option '.(($_POST[deger] == '1,51')?'selected="selected"':"" ).'value="1,51">1,51</option>
<option '.(($_POST[deger] == '1,52')?'selected="selected"':"" ).'value="1,52">1,52</option>
<option '.(($_POST[deger] == '1,53')?'selected="selected"':"" ).'value="1,53">1,53</option>
<option '.(($_POST[deger] == '1,54')?'selected="selected"':"" ).'value="1,54">1,54</option>
<option '.(($_POST[deger] == '1,55')?'selected="selected"':"" ).'value="1,55">1,55</option>
<option '.(($_POST[deger] == '1,56')?'selected="selected"':"" ).'value="1,56">1,56</option>
<option '.(($_POST[deger] == '1,57')?'selected="selected"':"" ).'value="1,57">1,57</option>
<option '.(($_POST[deger] == '1,58')?'selected="selected"':"" ).'value="1,58">1,58</option>
<option '.(($_POST[deger] == '1,59')?'selected="selected"':"" ).'value="1,59">1,59</option>
<option '.(($_POST[deger] == '1,60')?'selected="selected"':"" ).'value="1,60">1,60</option>
<option '.(($_POST[deger] == '1,61')?'selected="selected"':"" ).'value="1,61">1,61</option>
<option '.(($_POST[deger] == '1,62')?'selected="selected"':"" ).'value="1,62">1,62</option>
<option '.(($_POST[deger] == '1,63')?'selected="selected"':"" ).'value="1,63">1,63</option>
<option '.(($_POST[deger] == '1,64')?'selected="selected"':"" ).'value="1,64">1,64</option>
<option '.(($_POST[deger] == '1,65')?'selected="selected"':"" ).'value="1,65">1,65</option>
<option '.(($_POST[deger] == '1,66')?'selected="selected"':"" ).'value="1,66">1,66</option>
<option '.(($_POST[deger] == '1,67')?'selected="selected"':"" ).'value="1,67">1,67</option>
<option '.(($_POST[deger] == '1,68')?'selected="selected"':"" ).'value="1,68">1,68</option>
<option '.(($_POST[deger] == '1,69')?'selected="selected"':"" ).'value="1,69">1,69</option>
<option '.(($_POST[deger] == '1,70')?'selected="selected"':"" ).'value="1,70">1,70</option>
<option '.(($_POST[deger] == '1,71')?'selected="selected"':"" ).'value="1,71">1,71</option>
<option '.(($_POST[deger] == '1,72')?'selected="selected"':"" ).'value="1,72">1,72</option>
<option '.(($_POST[deger] == '1,73')?'selected="selected"':"" ).'value="1,73">1,73</option>
<option '.(($_POST[deger] == '1,74')?'selected="selected"':"" ).'value="1,74">1,74</option>
<option '.(($_POST[deger] == '1,75')?'selected="selected"':"" ).'value="1,75">1,75</option>
<option '.(($_POST[deger] == '1,76')?'selected="selected"':"" ).'value="1,76">1,76</option>
<option '.(($_POST[deger] == '1,77')?'selected="selected"':"" ).'value="1,77">1,77</option>
<option '.(($_POST[deger] == '1,78')?'selected="selected"':"" ).'value="1,78">1,78</option>
<option '.(($_POST[deger] == '1,79')?'selected="selected"':"" ).'value="1,79">1,79</option>
<option '.(($_POST[deger] == '1,80')?'selected="selected"':"" ).'value="1,80">1,80</option>
<option '.(($_POST[deger] == '1,81')?'selected="selected"':"" ).'value="1,81">1,81</option>
<option '.(($_POST[deger] == '1,82')?'selected="selected"':"" ).'value="1,82">1,82</option>
<option '.(($_POST[deger] == '1,83')?'selected="selected"':"" ).'value="1,83">1,83</option>
<option '.(($_POST[deger] == '1,84')?'selected="selected"':"" ).'value="1,84">1,84</option>
<option '.(($_POST[deger] == '1,85')?'selected="selected"':"" ).'value="1,85">1,85</option>
<option '.(($_POST[deger] == '1,86')?'selected="selected"':"" ).'value="1,86">1,86</option>
<option '.(($_POST[deger] == '1,87')?'selected="selected"':"" ).'value="1,87">1,87</option>
<option '.(($_POST[deger] == '1,88')?'selected="selected"':"" ).'value="1,88">1,88</option>
<option '.(($_POST[deger] == '1,89')?'selected="selected"':"" ).'value="1,89">1,89</option>
<option '.(($_POST[deger] == '1,90')?'selected="selected"':"" ).'value="1,90">1,90</option>
<option '.(($_POST[deger] == '1,91')?'selected="selected"':"" ).'value="1,91">1,91</option>
<option '.(($_POST[deger] == '1,92')?'selected="selected"':"" ).'value="1,92">1,92</option>
<option '.(($_POST[deger] == '1,93')?'selected="selected"':"" ).'value="1,93">1,93</option>
<option '.(($_POST[deger] == '1,94')?'selected="selected"':"" ).'value="1,94">1,94</option>
<option '.(($_POST[deger] == '1,95')?'selected="selected"':"" ).'value="1,95">1,95</option>
<option '.(($_POST[deger] == '1,96')?'selected="selected"':"" ).'value="1,96">1,96</option>
<option '.(($_POST[deger] == '1,97')?'selected="selected"':"" ).'value="1,97">1,97</option>
<option '.(($_POST[deger] == '1,98')?'selected="selected"':"" ).'value="1,98">1,98</option>
<option '.(($_POST[deger] == '1,99')?'selected="selected"':"" ).'value="1,99">1,99</option>
<option '.(($_POST[deger] == '2,00')?'selected="selected"':"" ).'value="2,00">2,00</option>
<option '.(($_POST[deger] == '2,01')?'selected="selected"':"" ).'value="2,01">2,01</option>
<option '.(($_POST[deger] == '2,02')?'selected="selected"':"" ).'value="2,02">2,02</option>
<option '.(($_POST[deger] == '2,03')?'selected="selected"':"" ).'value="2,03">2,03</option>
<option '.(($_POST[deger] == '2,04')?'selected="selected"':"" ).'value="2,04">2,04</option>
<option '.(($_POST[deger] == '2,05')?'selected="selected"':"" ).'value="2,05">2,05</option>
<option '.(($_POST[deger] == '2,06')?'selected="selected"':"" ).'value="2,06">2,06</option>
<option '.(($_POST[deger] == '2,07')?'selected="selected"':"" ).'value="2,07">2,07</option>
<option '.(($_POST[deger] == '2,08')?'selected="selected"':"" ).'value="2,08">2,08</option>
<option '.(($_POST[deger] == '2,09')?'selected="selected"':"" ).'value="2,09">2,09</option>
<option '.(($_POST[deger] == '2,10')?'selected="selected"':"" ).'value="2,10">2,10</option>
<option '.(($_POST[deger] == '2,11')?'selected="selected"':"" ).'value="2,11">2,11</option>
<option '.(($_POST[deger] == '2,12')?'selected="selected"':"" ).'value="2,12">2,12</option>
<option '.(($_POST[deger] == '2,13')?'selected="selected"':"" ).'value="2,13">2,13</option>
<option '.(($_POST[deger] == '2,14')?'selected="selected"':"" ).'value="2,14">2,14</option>
<option '.(($_POST[deger] == '2,15')?'selected="selected"':"" ).'value="2,15">2,15</option>
<option '.(($_POST[deger] == '2,16')?'selected="selected"':"" ).'value="2,16">2,16</option>
<option '.(($_POST[deger] == '2,17')?'selected="selected"':"" ).'value="2,17">2,17</option>
<option '.(($_POST[deger] == '2,18')?'selected="selected"':"" ).'value="2,18">2,18</option>
<option '.(($_POST[deger] == '2,19')?'selected="selected"':"" ).'value="2,19">2,19</option>
<option '.(($_POST[deger] == '2,20')?'selected="selected"':"" ).'value="2,20">2,20</option>
<option '.(($_POST[deger] == '2,21')?'selected="selected"':"" ).'value="2,21">2,21</option>
<option '.(($_POST[deger] == '2,22')?'selected="selected"':"" ).'value="2,22">2,22</option>
<option '.(($_POST[deger] == '2,23')?'selected="selected"':"" ).'value="2,23">2,23</option>
<option '.(($_POST[deger] == '2,24')?'selected="selected"':"" ).'value="2,24">2,24</option>
<option '.(($_POST[deger] == '2,25')?'selected="selected"':"" ).'value="2,25">2,25</option>
<option '.(($_POST[deger] == '2,26')?'selected="selected"':"" ).'value="2,26">2,26</option>
<option '.(($_POST[deger] == '2,27')?'selected="selected"':"" ).'value="2,27">2,27</option>
<option '.(($_POST[deger] == '2,28')?'selected="selected"':"" ).'value="2,28">2,28</option>
<option '.(($_POST[deger] == '2,29')?'selected="selected"':"" ).'value="2,29">2,29</option>
<option '.(($_POST[deger] == '2,30')?'selected="selected"':"" ).'value="2,30">2,30</option>
<option '.(($_POST[deger] == '2,31')?'selected="selected"':"" ).'value="2,31">2,31</option>
<option '.(($_POST[deger] == '2,32')?'selected="selected"':"" ).'value="2,32">2,32</option>
<option '.(($_POST[deger] == '2,33')?'selected="selected"':"" ).'value="2,33">2,33</option>
<option '.(($_POST[deger] == '2,34')?'selected="selected"':"" ).'value="2,34">2,34</option>
<option '.(($_POST[deger] == '2,35')?'selected="selected"':"" ).'value="2,35">2,35</option>
<option '.(($_POST[deger] == '2,36')?'selected="selected"':"" ).'value="2,36">2,36</option>
<option '.(($_POST[deger] == '2,37')?'selected="selected"':"" ).'value="2,37">2,37</option>
<option '.(($_POST[deger] == '2,38')?'selected="selected"':"" ).'value="2,38">2,38</option>
<option '.(($_POST[deger] == '2,39')?'selected="selected"':"" ).'value="2,39">2,39</option>
<option '.(($_POST[deger] == '2,40')?'selected="selected"':"" ).'value="2,40">2,40</option>
<option '.(($_POST[deger] == '2,41')?'selected="selected"':"" ).'value="2,41">2,41</option>
<option '.(($_POST[deger] == '2,42')?'selected="selected"':"" ).'value="2,42">2,42</option>
<option '.(($_POST[deger] == '2,43')?'selected="selected"':"" ).'value="2,43">2,43</option>
<option '.(($_POST[deger] == '2,44')?'selected="selected"':"" ).'value="2,44">2,44</option>
<option '.(($_POST[deger] == '2,45')?'selected="selected"':"" ).'value="2,45">2,45</option>
<option '.(($_POST[deger] == '2,46')?'selected="selected"':"" ).'value="2,46">2,46</option>
<option '.(($_POST[deger] == '2,47')?'selected="selected"':"" ).'value="2,47">2,47</option>
<option '.(($_POST[deger] == '2,48')?'selected="selected"':"" ).'value="2,48">2,48</option>
<option '.(($_POST[deger] == '2,49')?'selected="selected"':"" ).'value="2,49">2,49</option>
<option '.(($_POST[deger] == '2,50')?'selected="selected"':"" ).'value="2,50">2,50</option>
<option '.(($_POST[deger] == '2,51')?'selected="selected"':"" ).'value="2,51">2,51</option>
<option '.(($_POST[deger] == '2,52')?'selected="selected"':"" ).'value="2,52">2,52</option>
<option '.(($_POST[deger] == '2,53')?'selected="selected"':"" ).'value="2,53">2,53</option>
<option '.(($_POST[deger] == '2,54')?'selected="selected"':"" ).'value="2,54">2,54</option>
<option '.(($_POST[deger] == '2,55')?'selected="selected"':"" ).'value="2,55">2,55</option>
<option '.(($_POST[deger] == '2,56')?'selected="selected"':"" ).'value="2,56">2,56</option>
<option '.(($_POST[deger] == '2,57')?'selected="selected"':"" ).'value="2,57">2,57</option>
<option '.(($_POST[deger] == '2,58')?'selected="selected"':"" ).'value="2,58">2,58</option>
<option '.(($_POST[deger] == '2,59')?'selected="selected"':"" ).'value="2,59">2,59</option>
<option '.(($_POST[deger] == '2,60')?'selected="selected"':"" ).'value="2,60">2,60</option>
<option '.(($_POST[deger] == '2,61')?'selected="selected"':"" ).'value="2,61">2,61</option>
<option '.(($_POST[deger] == '2,62')?'selected="selected"':"" ).'value="2,62">2,62</option>
<option '.(($_POST[deger] == '2,63')?'selected="selected"':"" ).'value="2,63">2,63</option>
<option '.(($_POST[deger] == '2,64')?'selected="selected"':"" ).'value="2,64">2,64</option>
<option '.(($_POST[deger] == '2,65')?'selected="selected"':"" ).'value="2,65">2,65</option>
<option '.(($_POST[deger] == '2,66')?'selected="selected"':"" ).'value="2,66">2,66</option>
<option '.(($_POST[deger] == '2,67')?'selected="selected"':"" ).'value="2,67">2,67</option>
<option '.(($_POST[deger] == '2,68')?'selected="selected"':"" ).'value="2,68">2,68</option>
<option '.(($_POST[deger] == '2,69')?'selected="selected"':"" ).'value="2,69">2,69</option>
<option '.(($_POST[deger] == '2,70')?'selected="selected"':"" ).'value="2,70">2,70</option>
<option '.(($_POST[deger] == '2,71')?'selected="selected"':"" ).'value="2,71">2,71</option>
<option '.(($_POST[deger] == '2,72')?'selected="selected"':"" ).'value="2,72">2,72</option>
<option '.(($_POST[deger] == '2,73')?'selected="selected"':"" ).'value="2,73">2,73</option>
<option '.(($_POST[deger] == '2,74')?'selected="selected"':"" ).'value="2,74">2,74</option>
<option '.(($_POST[deger] == '2,75')?'selected="selected"':"" ).'value="2,75">2,75</option>
<option '.(($_POST[deger] == '2,76')?'selected="selected"':"" ).'value="2,76">2,76</option>
<option '.(($_POST[deger] == '2,77')?'selected="selected"':"" ).'value="2,77">2,77</option>
<option '.(($_POST[deger] == '2,78')?'selected="selected"':"" ).'value="2,78">2,78</option>
<option '.(($_POST[deger] == '2,79')?'selected="selected"':"" ).'value="2,79">2,79</option>
<option '.(($_POST[deger] == '2,80')?'selected="selected"':"" ).'value="2,80">2,80</option>
<option '.(($_POST[deger] == '2,81')?'selected="selected"':"" ).'value="2,81">2,81</option>
<option '.(($_POST[deger] == '2,82')?'selected="selected"':"" ).'value="2,82">2,82</option>
<option '.(($_POST[deger] == '2,83')?'selected="selected"':"" ).'value="2,83">2,83</option>
<option '.(($_POST[deger] == '2,84')?'selected="selected"':"" ).'value="2,84">2,84</option>
<option '.(($_POST[deger] == '2,85')?'selected="selected"':"" ).'value="2,85">2,85</option>
<option '.(($_POST[deger] == '2,86')?'selected="selected"':"" ).'value="2,86">2,86</option>
<option '.(($_POST[deger] == '2,87')?'selected="selected"':"" ).'value="2,87">2,87</option>
<option '.(($_POST[deger] == '2,88')?'selected="selected"':"" ).'value="2,88">2,88</option>
<option '.(($_POST[deger] == '2,89')?'selected="selected"':"" ).'value="2,89">2,89</option>
<option '.(($_POST[deger] == '2,90')?'selected="selected"':"" ).'value="2,90">2,90</option>
<option '.(($_POST[deger] == '2,91')?'selected="selected"':"" ).'value="2,91">2,91</option>
<option '.(($_POST[deger] == '2,92')?'selected="selected"':"" ).'value="2,92">2,92</option>
<option '.(($_POST[deger] == '2,93')?'selected="selected"':"" ).'value="2,93">2,93</option>
<option '.(($_POST[deger] == '2,94')?'selected="selected"':"" ).'value="2,94">2,94</option>
<option '.(($_POST[deger] == '2,95')?'selected="selected"':"" ).'value="2,95">2,95</option>
<option '.(($_POST[deger] == '2,96')?'selected="selected"':"" ).'value="2,96">2,96</option>
<option '.(($_POST[deger] == '2,97')?'selected="selected"':"" ).'value="2,97">2,97</option>
<option '.(($_POST[deger] == '2,98')?'selected="selected"':"" ).'value="2,98">2,98</option>
<option '.(($_POST[deger] == '2,99')?'selected="selected"':"" ).'value="2,99">2,99</option>
<option '.(($_POST[deger] == '3,00')?'selected="selected"':"" ).'value="3,00">3,00</option>
<option '.(($_POST[deger] == '3,01')?'selected="selected"':"" ).'value="3,01">3,01</option>
<option '.(($_POST[deger] == '3,02')?'selected="selected"':"" ).'value="3,02">3,02</option>
<option '.(($_POST[deger] == '3,03')?'selected="selected"':"" ).'value="3,03">3,03</option>
<option '.(($_POST[deger] == '3,04')?'selected="selected"':"" ).'value="3,04">3,04</option>
<option '.(($_POST[deger] == '3,05')?'selected="selected"':"" ).'value="3,05">3,05</option>
<option '.(($_POST[deger] == '3,06')?'selected="selected"':"" ).'value="3,06">3,06</option>
<option '.(($_POST[deger] == '3,07')?'selected="selected"':"" ).'value="3,07">3,07</option>
<option '.(($_POST[deger] == '3,08')?'selected="selected"':"" ).'value="3,08">3,08</option>
<option '.(($_POST[deger] == '3,09')?'selected="selected"':"" ).'value="3,09">3,09</option>
<option '.(($_POST[deger] == '3,10')?'selected="selected"':"" ).'value="3,10">3,10</option>
<option '.(($_POST[deger] == '3,11')?'selected="selected"':"" ).'value="3,11">3,11</option>
<option '.(($_POST[deger] == '3,12')?'selected="selected"':"" ).'value="3,12">3,12</option>
<option '.(($_POST[deger] == '3,13')?'selected="selected"':"" ).'value="3,13">3,13</option>
<option '.(($_POST[deger] == '3,14')?'selected="selected"':"" ).'value="3,14">3,14</option>
<option '.(($_POST[deger] == '3,15')?'selected="selected"':"" ).'value="3,15">3,15</option>
<option '.(($_POST[deger] == '3,16')?'selected="selected"':"" ).'value="3,16">3,16</option>
<option '.(($_POST[deger] == '3,17')?'selected="selected"':"" ).'value="3,17">3,17</option>
<option '.(($_POST[deger] == '3,18')?'selected="selected"':"" ).'value="3,18">3,18</option>
<option '.(($_POST[deger] == '3,19')?'selected="selected"':"" ).'value="3,19">3,19</option>
<option '.(($_POST[deger] == '3,20')?'selected="selected"':"" ).'value="3,20">3,20</option>
<option '.(($_POST[deger] == '3,21')?'selected="selected"':"" ).'value="3,21">3,21</option>
<option '.(($_POST[deger] == '3,22')?'selected="selected"':"" ).'value="3,22">3,22</option>
<option '.(($_POST[deger] == '3,23')?'selected="selected"':"" ).'value="3,23">3,23</option>
<option '.(($_POST[deger] == '3,24')?'selected="selected"':"" ).'value="3,24">3,24</option>
<option '.(($_POST[deger] == '3,25')?'selected="selected"':"" ).'value="3,25">3,25</option>
<option '.(($_POST[deger] == '3,26')?'selected="selected"':"" ).'value="3,26">3,26</option>
<option '.(($_POST[deger] == '3,27')?'selected="selected"':"" ).'value="3,27">3,27</option>
<option '.(($_POST[deger] == '3,28')?'selected="selected"':"" ).'value="3,28">3,28</option>
<option '.(($_POST[deger] == '3,29')?'selected="selected"':"" ).'value="3,29">3,29</option>
<option '.(($_POST[deger] == '3,30')?'selected="selected"':"" ).'value="3,30">3,30</option>
<option '.(($_POST[deger] == '3,31')?'selected="selected"':"" ).'value="3,31">3,31</option>
<option '.(($_POST[deger] == '3,32')?'selected="selected"':"" ).'value="3,32">3,32</option>
<option '.(($_POST[deger] == '3,33')?'selected="selected"':"" ).'value="3,33">3,33</option>
<option '.(($_POST[deger] == '3,34')?'selected="selected"':"" ).'value="3,34">3,34</option>
<option '.(($_POST[deger] == '3,35')?'selected="selected"':"" ).'value="3,35">3,35</option>
<option '.(($_POST[deger] == '3,36')?'selected="selected"':"" ).'value="3,36">3,36</option>
<option '.(($_POST[deger] == '3,37')?'selected="selected"':"" ).'value="3,37">3,37</option>
<option '.(($_POST[deger] == '3,38')?'selected="selected"':"" ).'value="3,38">3,38</option>
<option '.(($_POST[deger] == '3,39')?'selected="selected"':"" ).'value="3,39">3,39</option>
<option '.(($_POST[deger] == '3,40')?'selected="selected"':"" ).'value="3,40">3,40</option>
<option '.(($_POST[deger] == '3,41')?'selected="selected"':"" ).'value="3,41">3,41</option>
<option '.(($_POST[deger] == '3,42')?'selected="selected"':"" ).'value="3,42">3,42</option>
<option '.(($_POST[deger] == '3,43')?'selected="selected"':"" ).'value="3,43">3,43</option>
<option '.(($_POST[deger] == '3,44')?'selected="selected"':"" ).'value="3,44">3,44</option>
<option '.(($_POST[deger] == '3,45')?'selected="selected"':"" ).'value="3,45">3,45</option>
<option '.(($_POST[deger] == '3,46')?'selected="selected"':"" ).'value="3,46">3,46</option>
<option '.(($_POST[deger] == '3,47')?'selected="selected"':"" ).'value="3,47">3,47</option>
<option '.(($_POST[deger] == '3,48')?'selected="selected"':"" ).'value="3,48">3,48</option>
<option '.(($_POST[deger] == '3,49')?'selected="selected"':"" ).'value="3,49">3,49</option>
<option '.(($_POST[deger] == '3,50')?'selected="selected"':"" ).'value="3,50">3,50</option>
<option '.(($_POST[deger] == '3,51')?'selected="selected"':"" ).'value="3,51">3,51</option>
<option '.(($_POST[deger] == '3,52')?'selected="selected"':"" ).'value="3,52">3,52</option>
<option '.(($_POST[deger] == '3,53')?'selected="selected"':"" ).'value="3,53">3,53</option>
<option '.(($_POST[deger] == '3,54')?'selected="selected"':"" ).'value="3,54">3,54</option>
<option '.(($_POST[deger] == '3,55')?'selected="selected"':"" ).'value="3,55">3,55</option>
<option '.(($_POST[deger] == '3,56')?'selected="selected"':"" ).'value="3,56">3,56</option>
<option '.(($_POST[deger] == '3,57')?'selected="selected"':"" ).'value="3,57">3,57</option>
<option '.(($_POST[deger] == '3,58')?'selected="selected"':"" ).'value="3,58">3,58</option>
<option '.(($_POST[deger] == '3,59')?'selected="selected"':"" ).'value="3,59">3,59</option>
<option '.(($_POST[deger] == '3,60')?'selected="selected"':"" ).'value="3,60">3,60</option>
<option '.(($_POST[deger] == '3,61')?'selected="selected"':"" ).'value="3,61">3,61</option>
<option '.(($_POST[deger] == '3,62')?'selected="selected"':"" ).'value="3,62">3,62</option>
<option '.(($_POST[deger] == '3,63')?'selected="selected"':"" ).'value="3,63">3,63</option>
<option '.(($_POST[deger] == '3,64')?'selected="selected"':"" ).'value="3,64">3,64</option>
<option '.(($_POST[deger] == '3,65')?'selected="selected"':"" ).'value="3,65">3,65</option>
<option '.(($_POST[deger] == '3,66')?'selected="selected"':"" ).'value="3,66">3,66</option>
<option '.(($_POST[deger] == '3,67')?'selected="selected"':"" ).'value="3,67">3,67</option>
<option '.(($_POST[deger] == '3,68')?'selected="selected"':"" ).'value="3,68">3,68</option>
<option '.(($_POST[deger] == '3,69')?'selected="selected"':"" ).'value="3,69">3,69</option>
<option '.(($_POST[deger] == '3,70')?'selected="selected"':"" ).'value="3,70">3,70</option>
<option '.(($_POST[deger] == '3,71')?'selected="selected"':"" ).'value="3,71">3,71</option>
<option '.(($_POST[deger] == '3,72')?'selected="selected"':"" ).'value="3,72">3,72</option>
<option '.(($_POST[deger] == '3,73')?'selected="selected"':"" ).'value="3,73">3,73</option>
<option '.(($_POST[deger] == '3,74')?'selected="selected"':"" ).'value="3,74">3,74</option>
<option '.(($_POST[deger] == '3,75')?'selected="selected"':"" ).'value="3,75">3,75</option>
<option '.(($_POST[deger] == '3,76')?'selected="selected"':"" ).'value="3,76">3,76</option>
<option '.(($_POST[deger] == '3,77')?'selected="selected"':"" ).'value="3,77">3,77</option>
<option '.(($_POST[deger] == '3,78')?'selected="selected"':"" ).'value="3,78">3,78</option>
<option '.(($_POST[deger] == '3,79')?'selected="selected"':"" ).'value="3,79">3,79</option>
<option '.(($_POST[deger] == '3,80')?'selected="selected"':"" ).'value="3,80">3,80</option>
<option '.(($_POST[deger] == '3,81')?'selected="selected"':"" ).'value="3,81">3,81</option>
<option '.(($_POST[deger] == '3,82')?'selected="selected"':"" ).'value="3,82">3,82</option>
<option '.(($_POST[deger] == '3,83')?'selected="selected"':"" ).'value="3,83">3,83</option>
<option '.(($_POST[deger] == '3,84')?'selected="selected"':"" ).'value="3,84">3,84</option>
<option '.(($_POST[deger] == '3,85')?'selected="selected"':"" ).'value="3,85">3,85</option>
<option '.(($_POST[deger] == '3,86')?'selected="selected"':"" ).'value="3,86">3,86</option>
<option '.(($_POST[deger] == '3,87')?'selected="selected"':"" ).'value="3,87">3,87</option>
<option '.(($_POST[deger] == '3,88')?'selected="selected"':"" ).'value="3,88">3,88</option>
<option '.(($_POST[deger] == '3,89')?'selected="selected"':"" ).'value="3,89">3,89</option>
<option '.(($_POST[deger] == '3,90')?'selected="selected"':"" ).'value="3,90">3,90</option>
<option '.(($_POST[deger] == '3,91')?'selected="selected"':"" ).'value="3,91">3,91</option>
<option '.(($_POST[deger] == '3,92')?'selected="selected"':"" ).'value="3,92">3,92</option>
<option '.(($_POST[deger] == '3,93')?'selected="selected"':"" ).'value="3,93">3,93</option>
<option '.(($_POST[deger] == '3,94')?'selected="selected"':"" ).'value="3,94">3,94</option>
<option '.(($_POST[deger] == '3,95')?'selected="selected"':"" ).'value="3,95">3,95</option>
<option '.(($_POST[deger] == '3,96')?'selected="selected"':"" ).'value="3,96">3,96</option>
<option '.(($_POST[deger] == '3,97')?'selected="selected"':"" ).'value="3,97">3,97</option>
<option '.(($_POST[deger] == '3,98')?'selected="selected"':"" ).'value="3,98">3,98</option>
<option '.(($_POST[deger] == '3,99')?'selected="selected"':"" ).'value="3,99">3,99</option>
<option '.(($_POST[deger] == '4,00')?'selected="selected"':"" ).'value="4,00">4,00</option>

      </select>
		
		';
	}
	
	echo "</label>";
}
?>

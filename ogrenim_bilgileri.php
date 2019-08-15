<?php
if($_POST) {
$mezuniyet_derece = $db->escape($_POST[mezuniyet_derece]);
$mezuniyet_sayisal = $db->escape($_POST[mezuniyet_sayisal]);
$xx = ',';
$yy='.';
$mezuniyet_sayisal = str_replace($yy,$xx,$mezuniyet_sayisal);

$universite = $db->escape($_POST[universite]);
$fakulte = $db->escape($_POST[fakulte]);
$bolum = $db->escape($_POST[bolum]);
$mezuniyet_yili = $db->escape($_POST[mezuniyet_yili]);

$d_mezuniyet_derece = $db->escape($_POST[d_mezuniyet_derece]);
$d_mezuniyet_sayisal = $db->escape($_POST[d_mezuniyet_sayisal]);
$d_mezuniyet_sayisal = str_replace($yy,$xx,$d_mezuniyet_sayisal);
$d_universite = $db->escape($_POST[d_universite]);
$d_fakulte = $db->escape($_POST[d_fakulte]);
$d_bolum = $db->escape($_POST[d_bolum]);
$d_mezuniyet_yili = $db->escape($_POST[d_mezuniyet_yili]);

$kt=0;
if($mezuniyet_derece==2 and $mezuniyet_sayisal > 4 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Dörtlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 

if($d_mezuniyet_derece==2 and $d_mezuniyet_sayisal > 4 ) { echo '<div class="alert alert-danger">
		<strong>Yüksek Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Dörtlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 

if($mezuniyet_derece==1 and $mezuniyet_sayisal > 100 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 

if($d_mezuniyet_derece==1 and $d_mezuniyet_sayisal > 100 ) { echo '<div class="alert alert-danger">
		<strong>Yüksek Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; }
	  
	  

if($mezuniyet_derece==1 and $mezuniyet_sayisal < 50 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not ile Mezun Olma İmkanı  Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 

/*
if($d_mezuniyet_derece==1 and $d_mezuniyet_sayisal < 50 ) { echo '<div class="alert alert-danger">
		<strong>Yüksek Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not ile Mezun Olma İmkanı  Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; }

*/



	  
	  
	  
if($kt==0) {
$db->query("update kisiler set mezuniyet_derece='".$mezuniyet_derece."' , mezuniyet_sayisal='".$mezuniyet_sayisal."' , universite='".$universite."' , fakulte='".$fakulte."' , bolum='".$bolum."' , mezuniyet_yili='".$mezuniyet_yili."' , d_mezuniyet_derece='".$d_mezuniyet_derece."' , d_mezuniyet_sayisal='".$d_mezuniyet_sayisal."' , d_universite='".$d_universite."' , d_fakulte='".$d_fakulte."' , d_bolum='".$d_bolum."' , d_mezuniyet_yili='".$d_mezuniyet_yili."' where tckimlik='".$_SESSION[user]."'   ");

	if($db->rows_affected>0) {
		
							echo '<div class="alert alert-success">
		<strong>İşlem Başarı ile Tamamlandı..<br>
               </strong>
      </div>';
						} else {
							echo '<div class="alert alert-danger">
		<strong>Hatalı İşlem.<br>.<br>
               </strong>
      </div>';
						}
		} else { echo '<div class="alert alert-danger">
		<strong>Bilgilerinizi Kontrol Ediniz.<br><br>
               </strong>
      </div>'; }
}
$user1 = $db->escape($_SESSION[user]);
$satir = $db->get_row("select * from kisiler where tckimlik='".$user1."' ");
?>
<script src="http://code.jquery.com/jquery.js"></script>
  <script>
  
  $( document ).ready(function() {
	deneme('<?php echo $satir->mezuniyet_sayisal; ?>');
	deneme1('<?php echo $satir->d_mezuniyet_sayisal; ?>');
});
  
function deneme(a){
var mezuniyet_derece = $('#mezuniyet_derece').val();
//var ales_mevsim = $('#ales_mevsim').val();

$.post('bilgi_dinamik.php',{ islem:"ogrenim" ,  secenek: mezuniyet_derece , deger: a },function(output){
// gösterilecek bir şey yok	
//alert(output);
$('#mezuniyet_sayisal').html(output);

	});	
	
}


function deneme1(a){
var mezuniyet_derece = $('#d_mezuniyet_derece').val();
//var ales_mevsim = $('#ales_mevsim').val();

$.post('bilgi_dinamik.php',{ islem:"ogrenim1" ,  secenek: mezuniyet_derece , deger: a },function(output){
// gösterilecek bir şey yok	
//alert(output);
$('#d_mezuniyet_sayisal').html(output);

	});	
	
}

  </script>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Öğrenim Bilgileri</h2>
 </div>
 <div class="box-content row">
                <div class="col-lg-12 col-md-12">
                <form class="form-inline" role="form" method="post" >
                <table width="1000px;" >
                <tr>
                <td width="500px;">
                Mezun Olduğu Lisans Öğrenim Bilgileri
         <br />        
              
              
 <label>Mezuniyet Derecesi <br>
   
      <select class="form-control"   name="mezuniyet_derece" size="1" id="mezuniyet_derece"  value="<?php echo $satir->mezuniyet_derece; ?>" onchange="deneme('<?php echo $satir->mezuniyet_sayisal; ?>');">
      <option <?php if($satir->mezuniyet_derece == 1) { echo "selected"; } else {echo "";}   ?> value="1">Yüzlük</option>
        <option <?php if($satir->mezuniyet_derece == 2) { echo "selected"; } else {echo "";}   ?> value="2">Dörtlük</option>
      </select>
    </label>
    <label>
  <div id="mezuniyet_sayisal" style="width:150px;"></div>
    <!-- input yeri -->
      </label>
    
    <br />  
    Örnek : 56,78
  
  <p>
    <label>
    Üniversite  <br> 
      <input class="form-control"   type="text" name="universite" id="universite"  value="<?php echo $satir->universite; ?>">
    </label>
  </p>
  <p>
    <label>
      Fakülte  <br>
      <input class="form-control"   type="text" name="fakulte" id="fakulte"  value="<?php echo $satir->fakulte; ?>">
    </label>
  </p>
  <p>
    <label>
      Bölüm  <br> 
      <input class="form-control"   type="text" name="bolum" id="bolum"  value="<?php echo $satir->bolum; ?>">
    </label>
  </p>
  <p>
    <label>
    Mezuniyet Yılı  <br> 
      <select class="form-control"   name="mezuniyet_yili" id="mezuniyet_yili">
		<option <?php if($satir->mezuniyet_yili == 2019) { echo "selected"; } else {echo "";}   ?> value="2019">2019</option>
		<option <?php if($satir->mezuniyet_yili == 2018) { echo "selected"; } else {echo "";}   ?> value="2018">2018</option> 
        <option <?php if($satir->mezuniyet_yili == 2017) { echo "selected"; } else {echo "";}   ?> value="2017">2017</option>    
        <option <?php if($satir->mezuniyet_yili == 2016) { echo "selected"; } else {echo "";}   ?> value="2016">2016</option>
		<option <?php if($satir->mezuniyet_yili == 2015) { echo "selected"; } else {echo "";}   ?> value="2015">2015</option>
        <option <?php if($satir->mezuniyet_yili == 2014) { echo "selected"; } else {echo "";}   ?> value="2014">2014</option>
        <option <?php if($satir->mezuniyet_yili == 2013) { echo "selected"; } else {echo "";}   ?> value="2013">2013</option>
        <option <?php if($satir->mezuniyet_yili == 2012) { echo "selected"; } else {echo "";}   ?> value="2012">2012</option>
        <option <?php if($satir->mezuniyet_yili == 2011) { echo "selected"; } else {echo "";}   ?> value="2011">2011</option>
        <option <?php if($satir->mezuniyet_yili == 2010) { echo "selected"; } else {echo "";}   ?> value="2010">2010</option>
        <option <?php if($satir->mezuniyet_yili == 2009) { echo "selected"; } else {echo "";}   ?> value="2009">2009</option>
        <option <?php if($satir->mezuniyet_yili == 2008) { echo "selected"; } else {echo "";}   ?> value="2008">2008</option>
        <option <?php if($satir->mezuniyet_yili == 2007) { echo "selected"; } else {echo "";}   ?> value="2007">2007</option>
        <option <?php if($satir->mezuniyet_yili == 2006) { echo "selected"; } else {echo "";}   ?> value="2006">2006</option>
        <option <?php if($satir->mezuniyet_yili == 2005) { echo "selected"; } else {echo "";}   ?> value="2005">2005</option>
        <option <?php if($satir->mezuniyet_yili == 2004) { echo "selected"; } else {echo "";}   ?> value="2004">2004</option>
        <option <?php if($satir->mezuniyet_yili == 2003) { echo "selected"; } else {echo "";}   ?> value="2003">2003</option>
        <option <?php if($satir->mezuniyet_yili == 2002) { echo "selected"; } else {echo "";}   ?> value="2002">2002</option>
        <option <?php if($satir->mezuniyet_yili == 2001) { echo "selected"; } else {echo "";}   ?> value="2001">2001</option>
        <option <?php if($satir->mezuniyet_yili == 2000) { echo "selected"; } else {echo "";}   ?> value="2000">2000</option>
        <option <?php if($satir->mezuniyet_yili == 1999) { echo "selected"; } else {echo "";}   ?> value="1999">1999</option>
        <option <?php if($satir->mezuniyet_yili == 1998) { echo "selected"; } else {echo "";}   ?> value="1998">1998</option>
        <option <?php if($satir->mezuniyet_yili == 1997) { echo "selected"; } else {echo "";}   ?> value="1997">1997</option>
        <option <?php if($satir->mezuniyet_yili == 1996) { echo "selected"; } else {echo "";}   ?> value="1996">1996</option>
        <option <?php if($satir->mezuniyet_yili == 1995) { echo "selected"; } else {echo "";}   ?> value="1995">1995</option>
        <option <?php if($satir->mezuniyet_yili == 1994) { echo "selected"; } else {echo "";}   ?> value="1994">1994</option>
        <option <?php if($satir->mezuniyet_yili == 1993) { echo "selected"; } else {echo "";}   ?> value="1993">1993</option>
        <option <?php if($satir->mezuniyet_yili == 1992) { echo "selected"; } else {echo "";}   ?> value="1992">1992</option>
        <option <?php if($satir->mezuniyet_yili == 1991) { echo "selected"; } else {echo "";}   ?> value="1991">1991</option>
        <option <?php if($satir->mezuniyet_yili == 1990) { echo "selected"; } else {echo "";}   ?> value="1990">1990</option>
        <option <?php if($satir->mezuniyet_yili == 1989) { echo "selected"; } else {echo "";}   ?> value="1989">1989</option>
        <option <?php if($satir->mezuniyet_yili == 1988) { echo "selected"; } else {echo "";}   ?> value="1988">1988</option>
        <option <?php if($satir->mezuniyet_yili == 1987) { echo "selected"; } else {echo "";}   ?> value="1987">1987</option>
        <option <?php if($satir->mezuniyet_yili == 1986) { echo "selected"; } else {echo "";}   ?> value="1986">1986</option>
        <option <?php if($satir->mezuniyet_yili == 1985) { echo "selected"; } else {echo "";}   ?> value="1985">1985</option>
        <option <?php if($satir->mezuniyet_yili == 1984) { echo "selected"; } else {echo "";}   ?> value="1984">1984</option>
        <option <?php if($satir->mezuniyet_yili == 1983) { echo "selected"; } else {echo "";}   ?> value="1983">1983</option>
        <option <?php if($satir->mezuniyet_yili == 1982) { echo "selected"; } else {echo "";}   ?> value="1982">1982</option>
        <option <?php if($satir->mezuniyet_yili == 1981) { echo "selected"; } else {echo "";}   ?> value="1981">1981</option>
        <option <?php if($satir->mezuniyet_yili == 1980) { echo "selected"; } else {echo "";}   ?> value="1980">1980</option>
        <option <?php if($satir->mezuniyet_yili == 1979) { echo "selected"; } else {echo "";}   ?> value="1979">1979</option>
        <option <?php if($satir->mezuniyet_yili == 1978) { echo "selected"; } else {echo "";}   ?> value="1978">1978</option>
        <option <?php if($satir->mezuniyet_yili == 1977) { echo "selected"; } else {echo "";}   ?> value="1977">1977</option>
        <option <?php if($satir->mezuniyet_yili == 1976) { echo "selected"; } else {echo "";}   ?> value="1976">1976</option>
        <option <?php if($satir->mezuniyet_yili == 1975) { echo "selected"; } else {echo "";}   ?> value="1975">1975</option>
        <option <?php if($satir->mezuniyet_yili == 1974) { echo "selected"; } else {echo "";}   ?> value="1974">1974</option>
        <option <?php if($satir->mezuniyet_yili == 1973) { echo "selected"; } else {echo "";}   ?> value="1973">1973</option>
        <option <?php if($satir->mezuniyet_yili == 1972) { echo "selected"; } else {echo "";}   ?> value="1972">1972</option>
        <option <?php if($satir->mezuniyet_yili == 1971) { echo "selected"; } else {echo "";}   ?> value="1971">1971</option>
        
      </select>
    </label>
  </p>
  <p>
   <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
  </p>

                </td>
                <td width="600px;">
                Mezun Olduğu Yüksek Lisans Öğrenim Bilgileri (Doktora Programına Başvuracaklar İçin Doldurulması Zorunludur.)
                <br>
               
              
              
  
    <label>
    Mezuniyet Derecesi<br> 
      <select class="form-control"   name="d_mezuniyet_derece" size="1" id="d_mezuniyet_derece"  value="<?php echo $satir->d_mezuniyet_derece; ?>" onchange="deneme1('<?php echo $satir->d_mezuniyet_sayisal; ?>');">
      <option <?php if($satir->d_mezuniyet_derece == 1) { echo "selected"; } else {echo "";}   ?> value="1">Yüzlük</option>
      <option <?php if($satir->d_mezuniyet_derece == 2) { echo "selected"; } else {echo "";}   ?> value="2">Dörtlük</option>
      </select>
    </label>
    <label>
     <div id="d_mezuniyet_sayisal" style="width:150px;"></div>
  <!--    <input class="form-control"   type="text" name="d_mezuniyet_sayisal" id="d_mezuniyet_sayisal" placeholder="Örnek 56,78" maxlength="5"     value="<?php echo $satir->d_mezuniyet_sayisal; ?>">
      -->
    </label>
     <br />  
     Örnek : 56,78
  </p>
  
    <label>
    <p>Üniversite  <br> 
      <input class="form-control"   type="text" name="d_universite" id="d_universite"  value="<?php echo $satir->d_universite; ?>">
    </label>
  </p>
  <p>
    <label>
      Fakülte  <br>
      <input class="form-control"   type="text" name="d_fakulte" id="d_fakulte"  value="<?php echo $satir->d_fakulte; ?>">
    </label>
  </p>
  <p>
    <label>
      Bölüm  <br> 
      <input class="form-control"   type="text" name="d_bolum" id="d_bolum"  value="<?php echo $satir->d_bolum; ?>">
    </label>
  </p>
   
    <label>
    <p>Mezuniyet Yılı  <br>
      <select class="form-control"   name="d_mezuniyet_yili" id="d_mezuniyet_yili">
		<option <?php if($satir->d_mezuniyet_yili == 2019) { echo "selected"; } else {echo "";}   ?> value="2019">2019</option>
		<option <?php if($satir->d_mezuniyet_yili == 2018) { echo "selected"; } else {echo "";}   ?> value="2018">2018</option>   
        <option <?php if($satir->d_mezuniyet_yili == 2017) { echo "selected"; } else {echo "";}   ?> value="2017">2017</option>      
        <option <?php if($satir->d_mezuniyet_yili == 2016) { echo "selected"; } else {echo "";}   ?> value="2016">2016</option>
		<option <?php if($satir->d_mezuniyet_yili == 2015) { echo "selected"; } else {echo "";}   ?> value="2015">2015</option>
        <option <?php if($satir->d_mezuniyet_yili == 2014) { echo "selected"; } else {echo "";}   ?> value="2014">2014</option>
        <option <?php if($satir->d_mezuniyet_yili == 2013) { echo "selected"; } else {echo "";}   ?> value="2013">2013</option>
        <option <?php if($satir->d_mezuniyet_yili == 2012) { echo "selected"; } else {echo "";}   ?> value="2012">2012</option>
        <option <?php if($satir->d_mezuniyet_yili == 2011) { echo "selected"; } else {echo "";}   ?> value="2011">2011</option>
        <option <?php if($satir->d_mezuniyet_yili == 2010) { echo "selected"; } else {echo "";}   ?> value="2010">2010</option>
        <option <?php if($satir->d_mezuniyet_yili == 2009) { echo "selected"; } else {echo "";}   ?> value="2009">2009</option>
        <option <?php if($satir->d_mezuniyet_yili == 2008) { echo "selected"; } else {echo "";}   ?> value="2008">2008</option>
        <option <?php if($satir->d_mezuniyet_yili == 2007) { echo "selected"; } else {echo "";}   ?> value="2007">2007</option>
        <option <?php if($satir->d_mezuniyet_yili == 2006) { echo "selected"; } else {echo "";}   ?> value="2006">2006</option>
        <option <?php if($satir->d_mezuniyet_yili == 2005) { echo "selected"; } else {echo "";}   ?> value="2005">2005</option>
        <option <?php if($satir->d_mezuniyet_yili == 2004) { echo "selected"; } else {echo "";}   ?> value="2004">2004</option>
        <option <?php if($satir->d_mezuniyet_yili == 2003) { echo "selected"; } else {echo "";}   ?> value="2003">2003</option>
        <option <?php if($satir->d_mezuniyet_yili == 2002) { echo "selected"; } else {echo "";}   ?> value="2002">2002</option>
        <option <?php if($satir->d_mezuniyet_yili == 2001) { echo "selected"; } else {echo "";}   ?> value="2001">2001</option>
        <option <?php if($satir->d_mezuniyet_yili == 2000) { echo "selected"; } else {echo "";}   ?> value="2000">2000</option>
        <option <?php if($satir->d_mezuniyet_yili == 1999) { echo "selected"; } else {echo "";}   ?> value="1999">1999</option>
        <option <?php if($satir->d_mezuniyet_yili == 1998) { echo "selected"; } else {echo "";}   ?> value="1998">1998</option>
        <option <?php if($satir->d_mezuniyet_yili == 1997) { echo "selected"; } else {echo "";}   ?> value="1997">1997</option>
        <option <?php if($satir->d_mezuniyet_yili == 1996) { echo "selected"; } else {echo "";}   ?> value="1996">1996</option>
        <option <?php if($satir->d_mezuniyet_yili == 1995) { echo "selected"; } else {echo "";}   ?> value="1995">1995</option>
        <option <?php if($satir->d_mezuniyet_yili == 1994) { echo "selected"; } else {echo "";}   ?> value="1994">1994</option>
        <option <?php if($satir->d_mezuniyet_yili == 1993) { echo "selected"; } else {echo "";}   ?> value="1993">1993</option>
        <option <?php if($satir->d_mezuniyet_yili == 1992) { echo "selected"; } else {echo "";}   ?> value="1992">1992</option>
        <option <?php if($satir->d_mezuniyet_yili == 1991) { echo "selected"; } else {echo "";}   ?> value="1991">1991</option>
        <option <?php if($satir->d_mezuniyet_yili == 1990) { echo "selected"; } else {echo "";}   ?> value="1990">1990</option>
        <option <?php if($satir->d_mezuniyet_yili == 1989) { echo "selected"; } else {echo "";}   ?> value="1989">1989</option>
        <option <?php if($satir->d_mezuniyet_yili == 1988) { echo "selected"; } else {echo "";}   ?> value="1988">1988</option>
        <option <?php if($satir->d_mezuniyet_yili == 1987) { echo "selected"; } else {echo "";}   ?> value="1987">1987</option>
        <option <?php if($satir->d_mezuniyet_yili == 1986) { echo "selected"; } else {echo "";}   ?> value="1986">1986</option>
        <option <?php if($satir->d_mezuniyet_yili == 1985) { echo "selected"; } else {echo "";}   ?> value="1985">1985</option>
        <option <?php if($satir->d_mezuniyet_yili == 1984) { echo "selected"; } else {echo "";}   ?> value="1984">1984</option>
        <option <?php if($satir->d_mezuniyet_yili == 1983) { echo "selected"; } else {echo "";}   ?> value="1983">1983</option>
        <option <?php if($satir->d_mezuniyet_yili == 1982) { echo "selected"; } else {echo "";}   ?> value="1982">1982</option>
        <option <?php if($satir->d_mezuniyet_yili == 1981) { echo "selected"; } else {echo "";}   ?> value="1981">1981</option>
        <option <?php if($satir->d_mezuniyet_yili == 1980) { echo "selected"; } else {echo "";}   ?> value="1980">1980</option>
        <option <?php if($satir->d_mezuniyet_yili == 1979) { echo "selected"; } else {echo "";}   ?> value="1979">1979</option>
        <option <?php if($satir->d_mezuniyet_yili == 1978) { echo "selected"; } else {echo "";}   ?> value="1978">1978</option>
        <option <?php if($satir->d_mezuniyet_yili == 1977) { echo "selected"; } else {echo "";}   ?> value="1977">1977</option>
        <option <?php if($satir->d_mezuniyet_yili == 1976) { echo "selected"; } else {echo "";}   ?> value="1976">1976</option>
        <option <?php if($satir->d_mezuniyet_yili == 1975) { echo "selected"; } else {echo "";}   ?> value="1975">1975</option>
        <option <?php if($satir->d_mezuniyet_yili == 1974) { echo "selected"; } else {echo "";}   ?> value="1974">1974</option>
        <option <?php if($satir->d_mezuniyet_yili == 1973) { echo "selected"; } else {echo "";}   ?> value="1973">1973</option>
        <option <?php if($satir->d_mezuniyet_yili == 1972) { echo "selected"; } else {echo "";}   ?> value="1972">1972</option>
        <option <?php if($satir->d_mezuniyet_yili == 1971) { echo "selected"; } else {echo "";}   ?> value="1971">1971</option>
        
      </select>
    </label>
  </p>
  <p>
   
  </p>

                
                </td>
                </tr>
                </table>
    </form>          
</div>
 </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

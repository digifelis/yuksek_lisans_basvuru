<script src="http://code.jquery.com/jquery.js"></script>
  <script>
function deneme(a){
//alert("ben burdayım");
var ales_yili = $('#ales_yili').val();
var ales_mevsim = $('#ales_mevsim').val();

if(ales_yili == "2014" && ales_mevsim == "1" ) {
alert("Bu Sınav Tarihi Kullanılamaz..");
} else {

$.post('bilgi_dinamik.php',{ islem:"ales" ,  ales_yili: ales_yili , ales_mevsim:ales_mevsim , tckimlik:a },function(output){
// gösterilecek bir şey yok	
//alert(output);
if(output != '--') {
 degisken = output.split('-');
//alert(degisken[0]);
$('#ales_sayisal').val(degisken[0].replace(',','.'));
$('#ales_sozel').val(degisken[1].replace(',','.'));
$('#ales_ea').val(degisken[2].replace(',','.'));


} else { alert("Sınav Sonucu Bulunamadı");}


	});	
	
}	
	
	
}
 



 </script>



<?php
if($_POST) {
$dil_sinav_adi = $db->escape($_POST[dil_sinav_adi]);
$dil_sinav_puan = $db->escape($_POST[dil_sinav_puan]);


$ales_sayisal = $db->escape($_POST[ales_sayisal]);
$ales_sozel = $db->escape($_POST[ales_sozel]);
$ales_ea = $db->escape($_POST[ales_ea]);


$yy = ',';
$xx='.';
$ales_sayisal  = str_replace($yy,$xx,$ales_sayisal);
$ales_sozel  = str_replace($yy,$xx,$ales_sozel);
$ales_ea  = str_replace($yy,$xx,$ales_ea);




$ales_yili = $db->escape($_POST[ales_yili]);
$ales_mevsim = $db->escape($_POST[ales_mevsim]);




$kt=0;
//////////////////////////////////////////////
if($ales_yili == 2014 and $ales_mevsim == 1 ) { echo '<div class="alert alert-danger">
		<strong>Bu Ales Notu Kullanılamaz. Tarihi Geçmiştir.<br>
               </strong>
      </div>'; $kt=1; } 

////////////////////////////////////////////

if($ales_sayisal > 100 ) { echo '<div class="alert alert-danger">
		<strong>Ales Sayısal Notunuzu Kontrol Ediniz.<br>
               </strong>
      </div>'; $kt=1; } 
	  
	  
	  if($ales_sozel > 100 ) { echo '<div class="alert alert-danger">
		<strong>Ales Sözel Notunuzu Kontrol Ediniz.<br>
               </strong>
      </div>'; $kt=1; } 
	  
	  
	  if($ales_ea > 100 ) { echo '<div class="alert alert-danger">
		<strong>Ales Eşit Ağırlık Notunuzu Kontrol Ediniz.<br>
               </strong>
      </div>'; $kt=1; } 
	  


	  if($dil_sinav_adi == 3 and $dil_sinav_puan >120 ) { echo '<div class="alert alert-danger">
		<strong>TOEFL Sınavı Notunuzu Kontrol Ediniz.<br>
               </strong>
      </div>'; $kt=1; }


		if(($dil_sinav_adi == 1 or $dil_sinav_adi == 2 or $dil_sinav_adi == 4 ) and $dil_sinav_puan >100 ) { echo '<div class="alert alert-danger">
		<strong>Dil Sınavı Notunuzu Kontrol Ediniz.<br>
               </strong>
      </div>'; $kt=1; }



			if($kt==0) {
$db->query("update kisiler set ales_mevsim='".$ales_mevsim."' , ales_yili='".$ales_yili."' , dil_sinav_adi='".$dil_sinav_adi."' , dil_sinav_puan='".$dil_sinav_puan."' , ales_sayisal='".$ales_sayisal."' , ales_sozel='".$ales_sozel."', ales_ea='".$ales_ea."' where tckimlik='".$_SESSION[user]."'   ");

	if($db->rows_affected>0) {
							echo '<div class="alert alert-success">
		<strong>İşlem Başarı ile Tamamlandı..<br>
               </strong>
      </div>';
						} else {
							echo "Hatalı işlem";
						}
						
			}
}
$user1 = $db->escape($_SESSION[user]);
$satir = $db->get_row("select * from kisiler where tckimlik='".$user1."' ");

?>


<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Sınav Bilgileri</h2>
                </div>
 <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                
              <form class="form-inline" role="form" method="post" > 
         <!--     Bütün dil sınavlarının 100'lük sisteme dönüştürülmüş notu girilmelidir.<br>  -->
 
    <label>
     <p>Sınav Adı <br> 
      <select  class="form-control"   name="dil_sinav_adi" id="dil_sinav_adi">
		<option <?php if($satir->dil_sinav_adi == 1) { echo "selected"; } else {echo "";}   ?>  value="1">ÜDS</option>
								
		<option <?php if($satir->dil_sinav_adi == 2) { echo "selected"; } else {echo "";}   ?>  value="2">YDS</option>
								
		<option <?php if($satir->dil_sinav_adi == 3) { echo "selected"; } else {echo "";}   ?>  value="3">TOEFL</option>
								
		<option <?php if($satir->dil_sinav_adi == 4) { echo "selected"; } else {echo "";}   ?>  value="4">KPDS</option>
		
		<option <?php if($satir->dil_sinav_adi == 5) { echo "selected"; } else {echo "";}   ?>  value="5">YÖKDİL</option>

		
								
		
      </select>
    </label>

  
  
  
 
  
  </p>
  <p>
    <label>
      Dil Sınav Puanı <br> 
      <input  class="form-control"   type="text" name="dil_sinav_puan" id="dil_sinav_puan" placeholder="Örnek 56.7891"   value="<?php echo $satir->dil_sinav_puan; ?>">
    </label>
    <br />
  Örnek : 56.7891</p>
  <p>
  
  
  
  
  <table>
  <tr>
  <td>
  
  <label>
    <p>ALES Sınav Yılı  <br>
      <select class="form-control"   name="ales_yili" id="ales_yili">
	  <option <?php if($satir->ales_yili == 2019) { echo "selected"; } else {echo "";}   ?> value="2019">2019</option>
	  <option <?php if($satir->ales_yili == 2018) { echo "selected"; } else {echo "";}   ?> value="2018">2018</option>
      <option <?php if($satir->ales_yili == 2017) { echo "selected"; } else {echo "";}   ?> value="2017">2017</option>
      <option <?php if($satir->ales_yili == 2016) { echo "selected"; } else {echo "";}   ?> value="2016">2016</option>
      <option <?php if($satir->ales_yili == 2015) { echo "selected"; } else {echo "";}   ?> value="2015">2015</option>
      <option <?php if($satir->ales_yili == 2014) { echo "selected"; } else {echo "";}   ?> value="2014">2014</option>
	  
        
        
        
        </select>
        </p>
        </label>
  
  </td>
  <td>
  
   <label>
    <p>ALES Dönemi  <br>
      <select class="form-control"   name="ales_mevsim" id="ales_mevsim">
      
        <option <?php if($satir->ales_mevsim == 2) { echo "selected"; } else {echo "";}   ?> value="2">Güz</option>
        <option <?php if($satir->ales_mevsim == 1) { echo "selected"; } else {echo "";}   ?> value="1">Bahar</option>
		<option <?php if($satir->ales_mevsim == 3) { echo "selected"; } else {echo "";}   ?> value="3">1. Sınav</option>
        <option <?php if($satir->ales_mevsim == 4) { echo "selected"; } else {echo "";}   ?> value="4">2. Sınav</option>
        <option <?php if($satir->ales_mevsim == 5) { echo "selected"; } else {echo "";}   ?> value="5">3. Sınav</option>
		
        </select>
        </p>
        </label>
  
  </td>
  <td>
  
    <label>
   <!-- <a href="#" id="deneme"  class=" btn btn-success btn-lg" onclick="deneme(<?php echo $_SESSION[user]; ?>);">&nbsp;Sınav Puanını Getir</a> 	-->

    </label>
  
  </td>
  
  
  </tr>
  
  
  <tr>
  <td>ALES Sayısal</td><td>ALES Sözel</td><td>ALES Eşit Ağırlık</td>
  </tr>
  <tr>
  <td> <input  class="form-control" placeholder="Örnek 56.7891"    type="text" name="ales_sayisal" id="ales_sayisal" value="<?php echo $satir->ales_sayisal; ?>"></td>
  <td><input  class="form-control" placeholder="Örnek 56.7891"    type="text" name="ales_sozel" id="ales_sozel" value="<?php echo $satir->ales_sozel; ?>"></td>
  <td><input  class="form-control"  placeholder="Örnek 56.7891"   type="text" name="ales_ea" id="ales_ea" value="<?php echo $satir->ales_ea; ?>"></td>
  
  </tr>
  <tr>
    <td colspan="3"> Örnek : 56.7891</td>
    </tr>
  </table>
    
  </p>
  <p>
    <label>
      <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
    </label>
  </p>
</form>
 
 </div>
               

            </div>
 
 
 
 
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

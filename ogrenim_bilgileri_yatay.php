<?php
if($_POST) {
$y_mezuniyet_derece = $db->escape($_POST[y_mezuniyet_derece]);
$mezuniyet_sayisal = $db->escape($_POST[mezuniyet_sayisal]);
$xx = ',';
$yy='.';
$mezuniyet_sayisal = str_replace($yy,$xx,$mezuniyet_sayisal);

$y_universite = $db->escape($_POST[y_universite]);
$y_fakulte = $db->escape($_POST[y_fakulte]);
$y_bolum = $db->escape($_POST[y_bolum]);


$kt=0;
if($y_mezuniyet_derece==2 and $mezuniyet_sayisal > 4 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Dörtlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 



if($y_mezuniyet_derece==1 and $mezuniyet_sayisal > 100 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 


	  

if($y_mezuniyet_derece==1 and $mezuniyet_sayisal < 50 ) { echo '<div class="alert alert-danger">
		<strong>Lisans Mezuniyet Derecesi ve Notu bilgilerine Dikkat ediniz <br> Yüzlük sistemde Yazdığınız Not ile Mezun Olma İmkanı  Bulunmamaktadır.<br>
               </strong>
      </div>'; $kt=1; } 





	  
	  
	  
if($kt==0) {
$db->query("update kisiler set y_mezuniyet_derece='".$y_mezuniyet_derece."' , y_mezuniyet_sayisal='".$mezuniyet_sayisal."' , y_universite='".$y_universite."' , y_fakulte='".$y_fakulte."' , y_bolum='".$y_bolum."'  where tckimlik='".$_SESSION[user]."'   ");

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
	deneme('<?php echo $satir->y_mezuniyet_sayisal; ?>');
	
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
               <label> Yatay Geçiş Başvurusu Yapacak Adaylar İle İlgili Bölümdür.
                <br />
                Yatay Geçişe Başvuracak Adaylar İçin Zorunludur.
                </label>
                <br />
                Başvuru Tarihine Kadar Almış Olunan Derslerin Ağırlıklı Not Ortalaması
         <br />        
              
              
 <label>Mezuniyet Derecesi <br>
   
<select class="form-control"   name="y_mezuniyet_derece" size="1" id="mezuniyet_derece"  value="<?php echo $satir->y_mezuniyet_derece; ?>" onchange="deneme('<?php echo $satir->y_mezuniyet_sayisal; ?>');">
      <option <?php if($satir->y_mezuniyet_derece == 1) { echo "selected"; } else {echo "";}   ?> value="1">Yüzlük</option>
        <option <?php if($satir->y_mezuniyet_derece == 2) { echo "selected"; } else {echo "";}   ?> value="2">Dörtlük</option>
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
      <input class="form-control"   type="text" name="y_universite" id="universite"  value="<?php echo $satir->y_universite; ?>">
    </label>
  </p>
  <p>
    <label>
      Fakülte  <br>
      <input class="form-control"   type="text" name="y_fakulte" id="fakulte"  value="<?php echo $satir->y_fakulte; ?>">
    </label>
  </p>
  <p>
    <label>
      Bölüm  <br> 
      <input class="form-control"   type="text" name="y_bolum" id="bolum"  value="<?php echo $satir->y_bolum; ?>">
    </label>
  </p>

  <p>
   <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
  </p>

                </td>
                <td width="600px;">
                
                
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
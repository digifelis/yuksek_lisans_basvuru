<?php
if($_POST) {
$dil_sinav_adi = $db->escape($_POST[dil_sinav_adi]);
$dil_sinav_puan = $db->escape($_POST[dil_sinav_puan]);
$ales_sayisal = $db->escape($_POST[ales_sayisal]);
$ales_sozel = $db->escape($_POST[ales_sozel]);
$ales_ea = $db->escape($_POST[ales_ea]);

$db->query("update kisiler set dil_sinav_adi='".$dil_sinav_adi."' , dil_sinav_puan='".$dil_sinav_puan."' , ales_sayisal='".$ales_sayisal."' , ales_sozel='".$ales_sozel."', ales_ea='".$ales_ea."' where tckimlik='".$_SESSION[user]."'   ");

	if($db->rows_affected>0) {
							echo '<div class="alert alert-success">
		<strong>İşlem Başarı ile Tamamlandı..<br>
               </strong>
      </div>';
						} else {
							echo "Hatalı işlem";
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
								
		
      </select>
    </label>
  </p>
  <p>
    <label>
      Dil Sınav Puanı <br> 
      <input  class="form-control"   type="text" name="dil_sinav_puan" id="dil_sinav_puan" value="<?php echo $satir->dil_sinav_puan; ?>">
    </label>
  </p>
  <p>
  <table>
  <tr>
  <td>ALES Sayısal</td><td>ALES Sözel</td><td>ALES Eşit Ağırlık</td>
  </tr>
  <tr>
  <td> <input  class="form-control"   type="text" name="ales_sayisal" id="ales_sayisal" value="<?php echo $satir->ales_sayisal; ?>"></td>
  <td><input  class="form-control"   type="text" name="ales_sozel" id="ales_sozel" value="<?php echo $satir->ales_sozel; ?>"></td>
  <td><input  class="form-control"   type="text" name="ales_ea" id="ales_ea" value="<?php echo $satir->ales_ea; ?>"></td>
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
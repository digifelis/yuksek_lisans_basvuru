<?php

if($_POST) {
$sehir = $db->escape($_POST[sehir]);
$ilce = $db->escape($_POST[ilce]);
$adres = $db->escape($_POST[adres]);
$ceptelefon = $db->escape($_POST[cep_tel]);
$evtelefon = $db->escape($_POST[ev_tel]);
$email = $db->escape($_POST[email]);

$db->query("update kisiler set il='".$sehir."' , ilce='".$ilce."' , adres='".$adres."' , ceptelefon='".$ceptelefon."' , evtelefon='".$evtelefon."' , email='".$email."' where tckimlik='".$_SESSION[user]."'   ");

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
                <h2><i class="glyphicon glyphicon-edit"></i> İletişim Bilgileri</h2>
 </div>
 <div class="box-content row">
                <div class="col-lg-7 col-md-12">
              <form class="form-inline" role="form" method="post" > 
              <table>
              <tr>
              <td> Şehir  <br>  
    <label>
      <input class="form-control"  type="text" name="sehir" id="sehir"  value="<?php echo $satir->il; ?>">
    </label></td><td>İlçe  <br>  
    <label>
      <input class="form-control"  type="text" name="ilce" id="ilce"  value="<?php echo $satir->ilce; ?>">
    </label></td>
    
              </tr>
    <tr><td colspan="2">Adres  <br>  <label>
      <textarea class="form-control"  name="adres" id="adres" cols="45" rows="5"> <?php echo $satir->adres; ?></textarea>
    </label>
    </td>
    </tr> 
    <tr>
    <td>Cep Telefonu  <br> 
    <label>
      <input class="form-control"  type="text" name="cep_tel" id="cep_tel"  value="<?php echo $satir->ceptelefon; ?>">
    </label></td>
    <td>Ev telefonu  <br>  
    <label>
      <input class="form-control"  type="text" name="ev_tel" id="ev_tel"  value="<?php echo $satir->evtelefon; ?>">
    </label></td>
    </tr>         
            
            
    <tr>
    <td>Email <br> 
    <label>
      <input class="form-control"  type="text" name="email" id="email"  value="<?php echo $satir->email; ?>">
    </label></td>
    <td></td>
    </tr>     
             
              
              </table>
               <p>
   

  <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
  </p>
  
   
              </form>
 <br> <br>
 
 </div>
  </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->

<?php
if($_POST) {
	$ilan_adi = $db->escape($_POST[ilan_adi]);
	$bas_tarihi=$db->escape($_POST[bas_tarihi]);

	$bit_tarihi=$db->escape($_POST[bit_tarihi]);
	$ales_turu0=$db->escape($_POST[ales_turu0]);
	$ales_turu1=$db->escape($_POST[ales_turu1]);
	$ales_turu2=$db->escape($_POST[ales_turu2]);
	
	
	
	
	$aktif=$db->escape($_POST[aktif]);
	
	$enstitu=$db->escape($_POST[enstitu]);
	$ana_bilim=$db->escape($_POST[ana_bilim]);
	$bilim_dali=$db->escape($_POST[bilim_dali]);
	$doktora=$db->escape($_POST[doktora]);
	$grup_no = $db->escape($_POST[grup_no]);
	
$formul = $_POST[lisans_f]."|".$_POST[ylisans_f]."|".$_POST[ales_f]."|".$_POST[dil_f];
$formul1 = $_POST[lisans_f1]."|".$_POST[ylisans_f1]."|".$_POST[ales_f1]."|".$_POST[dil_f1];


	$db->query("insert into ilanlar (ilan_adi,bas_tarihi,bit_tarihi,aktif,enstitu,ana_bilim,bilim_dali,doktora , ales_turu0 , ales_turu1,ales_turu2,grup_no , formul , formul1 ) values ('".$ilan_adi."','".$bas_tarihi."','".$bit_tarihi."','".$aktif."' , '".$enstitu."' , '".$ana_bilim."' , '".$bilim_dali."', '".$doktora."' ,'".$ales_turu0."','".$ales_turu1."','".$ales_turu2."','".$grup_no."' , '".$formul."' , '".$formul1."') ");
	

	if($db->rows_affected>0) {
							echo "işlem başarılı";
						} else {
							echo "Hatalı işlem";
						}
$satir = $db->get_row("select * from ilanlar where id='".$db->insert_id."' ");						

}


?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> İlan Oluştur</h2>

              
 </div>
 <div class="box-content row">
                <div class="col-lg-7 col-md-12">
               
              
          <form class="form-inline" role="form" method="post" > 
                    
                
            <label>  İlan Adı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" size="50"  name="ilan_adi"  value="<?php echo $satir->ilan_adi;?>">
               
                 <br>
                 <label>  Enstitü Adı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                 <!--   <input type="text" class="form-control"  size="50"   name="enstitu"  value="<?php echo $satir->enstitu;?>"> -->
                <select  class="form-control" style="width:405px;"  name="enstitu" >
        <option  value="Sosyal Bilimler" <?php if($satir->enstitu == "Sosyal Bilimler") { echo "selected"; } else {echo "";}   ?> >Sosyal Bilimler</option>
        <option  value="Fen Bilimleri" <?php if($satir->enstitu == "Fen Bilimleri") { echo "selected"; } else {echo "";}   ?>>Fen Bilimleri</option>
        <option  value="Sağlık Bilimleri" <?php if($satir->enstitu == "Sağlık Bilimleri") { echo "selected"; } else {echo "";}   ?>>Sağlık Bilimleri</option>
                        </select> 
						
                 <br>
                 <label> Ana Bilim Dalı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
                    <input type="text" class="form-control" size="50"    name="ana_bilim"  value="<?php echo $satir->ana_bilim;?>">
               
                 <br>
            <label>  Bilim Dalı (Varsa)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="form-control"  size="50"   name="bilim_dali"  value="<?php echo $satir->bilim_dali;?>">
               
                 <br>
                 
                İlan Başlangıç Tarihi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" class="form-control"  name="bas_tarihi"  value="<?php echo $satir->bas_tarihi;?>">
               <br>
                İlan Başlangıç Tarihi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="date" class="form-control"  name="bit_tarihi"  value="<?php echo $satir->bit_tarihi;?>">
                    <br />
           <label>Ales Puan Kriterleri</label><br />
                    <label>Sayisal</label>&nbsp;			<input type="checkbox" name="ales_turu0" value="1"  class="form-control"  <?php if($satir->ales_turu0 == 1) { echo 'checked="checked"'; } else {echo "";}   ?>   />&nbsp;&nbsp;&nbsp;
                    <label>Sözel</label>		&nbsp;	<input type="checkbox" name="ales_turu1" value="10"   class="form-control"  <?php if($satir->ales_turu1 == 10) { echo 'checked="checked"'; } else {echo "";}   ?> />&nbsp;&nbsp;&nbsp;
                    <label>eşit Ağırlık</label>		&nbsp;<input type="checkbox" name="ales_turu2" value="100"   class="form-control"  <?php if($satir->ales_turu2 == 100) { echo 'checked="checked"'; } else {echo "";}   ?> />&nbsp;&nbsp;&nbsp;
                    
                    <br />
                           
          <!--        
                    <br />
                   <label>Ales Puan Türü</label>

                   
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select  class="form-control" style="width:120px;"  name="ales_turu" >
        <option  value="1" <?php if($satir->ales_turu == 1) { echo "selected"; } else {echo "";}   ?> >Sayısal</option>
        <option  value="2" <?php if($satir->ales_turu == 2) { echo "selected"; } else {echo "";}   ?>>Sözel</option>
        <option  value="3" <?php if($satir->ales_turu == 3) { echo "selected"; } else {echo "";}   ?>>Eşit Ağırlık</option>
                        </select>   
                 <br>
              -->         
  <label>Aktiflik</label>

                   
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                     <select  class="form-control" style="width:80px;"  name="aktif" >
        <option  value="1" <?php if($satir->aktif == 1) { echo "selected"; } else {echo "";}   ?> >Evet</option>
        <option  value="2" <?php if($satir->aktif == 2) { echo "selected"; } else {echo "";}   ?>>Hayır</option>
                        </select>
                        <br>
		<label>Doktora</label>				
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
                     <select  class="form-control" style="width:80px;"  name="doktora" >
        <option  value="1" <?php if($satir->doktora == 1) { echo "selected"; } else {echo "";}   ?> >Evet</option>
        <option  value="0" <?php if($satir->doktora == 0) { echo "selected"; } else {echo "";}   ?>>Hayır</option>
                        </select>
                        <br>	


 <br>
            <label>  Grup No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label>
            <input type="text" class="form-control"  size="50"   name="grup_no"  value="<?php echo $satir->grup_no; ?>">
<br />
						
<table>

 <tr>
  <td>Başvuru formülü</td> <td></td> <td></td> <td></td>
  </tr>


 <tr>
  <td>Lisans</td><td>Yüksek Lisans</td><td>ALES</td><td>Yabancı Dil</td>
  </tr>
  <tr>

  <td><input  class="form-control"     type="text" name="lisans_f" id="ales_sayisal"   value="<?php echo $lisans_f; ?>"></td>
  <td><input  class="form-control"     type="text" name="ylisans_f" id="ales_sozel"   value="<?php echo $ylisans_f; ?>"></td>
  <td><input  class="form-control"     type="text" name="ales_f" id="ales_ea"   value="<?php echo $ales_f; ?>"></td>
  <td><input  class="form-control"     type="text" name="dil_f" id="ales_ea"   value="<?php echo $dil_f; ?>"></td>

  </tr>
 
 <tr>
  <td>Lisanstan yüksek lisansa başvuru formülü</td> <td></td> <td></td> <td></td>
  </tr>
  <tr>

  <td><input  class="form-control"     type="text" name="lisans_f1" id="ales_sayisal"   value="<?php echo $lisans_f1; ?>"></td>
  <td><input  class="form-control"     type="text" name="ylisans_f1" id="ales_sozel"   value="<?php echo $ylisans_f1; ?>"></td>
  <td><input  class="form-control"     type="text" name="ales_f1" id="ales_ea"   value="<?php echo $ales_f1; ?>"></td>
  <td><input  class="form-control"     type="text" name="dil_f1" id="ales_ea"   value="<?php echo $dil_f1; ?>"></td>

  </tr>




  </table>

						
                 <button type="submit" class="btn btn-default glyphicon glyphicon-ok-sign btn-lg">&nbsp;Kaydet</button>
                
            </form>  
            </div>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


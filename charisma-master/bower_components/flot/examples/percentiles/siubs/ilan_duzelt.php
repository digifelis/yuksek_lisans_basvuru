<?php
if($_POST) {
	$ilan_adi = $db->escape($_POST[ilan_adi]);
	$bas_tarihi=$db->escape($_POST[bas_tarihi]);

	$bit_tarihi=$db->escape($_POST[bit_tarihi]);
	$ales_turu=$db->escape($_POST[ales_turu]);
	$aktif=$db->escape($_POST[aktif]);
	
		$enstitu=$db->escape($_POST[enstitu]);
	$ana_bilim=$db->escape($_POST[ana_bilim]);
	$bilim_dali=$db->escape($_POST[bilim_dali]);

$db->query("update ilanlar set ilan_adi='".$ilan_adi."',bas_tarihi='".$bas_tarihi."',bit_tarihi='".$bit_tarihi."',ales_turu='".$ales_turu."',aktif='".$aktif."' , enstitu='".$enstitu."',ana_bilim='".$ana_bilim."',bilim_dali='".$bilim_dali."' where id='".$_GET[id]."' ");

	if($db->rows_affected>0) {
							echo "işlem başarılı";
						} else {
							echo "Hatalı işlem";
						}
					

}

$satir = $db->get_row("select * from ilanlar where id='".$_GET[id]."' ");	
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
                    <input type="text" class="form-control"  size="50"   name="enstitu"  value="<?php echo $satir->enstitu;?>">
               
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
                   <label>Ales Puan Türü</label>

                   
                      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <select  class="form-control" style="width:120px;"  name="ales_turu" >
        <option  value="1" <?php if($satir->ales_turu == 1) { echo "selected"; } else {echo "";}   ?> >Sayısal</option>
        <option  value="2" <?php if($satir->ales_turu == 2) { echo "selected"; } else {echo "";}   ?>>Sözel</option>
        <option  value="3" <?php if($satir->ales_turu == 3) { echo "selected"; } else {echo "";}   ?>>Eşit Ağırlık</option>
                        </select>   
                 <br>     
  <label>Aktiflik</label>

              
                     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;   
                         <select  class="form-control" style="width:80px;"  name="aktif" >
        <option  value="1" <?php if($satir->aktif == 1) { echo "selected"; } else {echo "";}   ?> >Evet</option>
        <option  value="2" <?php if($satir->aktif == 2) { echo "selected"; } else {echo "";}   ?>>Hayır</option>
                        </select>
                        <br />
                 <button type="submit" class="btn btn-default glyphicon glyphicon-ok-sign btn-lg">&nbsp;Kaydet</button>
                
            </form>  
            </div>
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


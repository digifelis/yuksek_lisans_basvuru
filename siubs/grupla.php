<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Grup İşlemleri</h2>

                <div class="box-icon">
                    <a href="#" class="btn btn-setting btn-round btn-default"><i
                            class="glyphicon glyphicon-cog"></i></a>
                    <a href="#" class="btn btn-minimize btn-round btn-default"><i
                            class="glyphicon glyphicon-chevron-up"></i></a>
                    <a href="#" class="btn btn-close btn-round btn-default"><i
                            class="glyphicon glyphicon-remove"></i></a>
                </div>
            </div>
            <div class="box-content row">
                <div class="col-lg-7 col-md-12">
  <?php
  if($_POST){
	if($_POST[islem]=="sil"){
$db->query("delete from grup where id=".$_POST[id]);
if($db->rows_affected>0) { echo "Grup Silindi"; }	else  { echo "Grup Silinemedi !!!"; }
	}
	
	if($_POST[islem]=="ekle"){
	$db->query("insert into grup (grup_adi) values ('".$_POST[grup]."')");
	if($db->rows_affected>0) { echo "Grup eklendi"; }	else  { echo "Grup Eklenemedi !!!"; }	
	}
	
}

?>                 
                   
 <!--           kodlar buraya gelecek                               -->
                    <form class="form-inline" role="form" method="post" > 
                   <table width="570" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <th width="126" scope="row">Grup Adı</th>
    <td width="361">&nbsp;<input type="text" class="form-control" size="50"  name="grup"  value="<?php echo   $bilgiler->grup; ?>"></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td>&nbsp;<button type="submit" class="btn btn-default glyphicon glyphicon-ok-sign btn-lg">&nbsp;Kaydet</button></td>
  </tr>
</table>
<input type="hidden" name="islem" value="ekle" />
        </form>           
                   
  <br /><br />                 
                   
                   
  <table width="596" class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                        <th width="45">Grup No</th>
                        <th width="314">Grup Adı</th>
                            <th width="191">İşlemler</th>
                          </tr>
                        </thead>
                        <tbody>



<?php 

$sonuclar = $db->get_results("select * from grup  ");
$xx = '.';
$yy=',';

if (is_array($sonuclar) || is_object($sonuclar))
{
$x=1;	
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                        <td><?php echo $sonuc->id; ?></td>
                         <td><?php echo $sonuc->grup_adi; ?></td>
                            <td>
                            
                           <div style="width:80px;float:left">  <a href="index.php?islem=grupla_ilan&id=<?php echo $sonuc->id; ?>">İlan Ekle</a>&nbsp;&nbsp;|&nbsp;&nbsp;</div>
                            
                            <div style="width:30px;float:left">
							<form method="post" name="form<?php echo $sonuc->id; ?>">
                            <input type="hidden" name="islem" value="sil" />
                            <input type="hidden" name="id" value="<?php echo $sonuc->id; ?>" />
                            <a href="#" onclick="document.form<?php echo $sonuc->id; ?>.submit();">Sil</a>
							</form>
                            </div>
                           
                            
                            
							</td>
                          </tr>
                       
                       
                       
                       
                       
                       
                       
          <?php 
}
}
?>                
                       
                       
                        </tbody>
                    </table>                 
                   
                   
                   
                   

                 
              </div>
               

            </div>
        </div>
    </div>
</div>
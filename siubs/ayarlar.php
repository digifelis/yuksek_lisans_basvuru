<?php
if($_POST){
$db->query("update ayarlar set title='".$_POST[title]."' , description='".$_POST[aciklama]."' , logo='".$_POST[logo]."' , footer ='".$_POST[footer]."' , google='".$_POST[google]."'  where id=1  ");	

$db->query('update ayarlar set giris_yazisi="'.$_POST[bilgi].'" where id=1 ');

if($db->rows_affected>0) {
							echo "işlem başarılı";
						} else {
							echo "Hatalı işlem";
						}
						
						
						
}
$bilgiler = $db->get_row("select * from ayarlar where id=1");


?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well">
                <h2><i class="glyphicon glyphicon-info-sign"></i> Ayarlar</h2>

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
         
        <form class="form-inline" role="form" method="post" >   
         
                   
     <table width="813" border="0" cellspacing="1" cellpadding="1">
  <tr>
    <th width="169" align="right" scope="row">Title Yazısı</th>
    <td width="631">&nbsp;<input type="text" class="form-control" size="50"  name="title"  value="<?php echo   $bilgiler->title; ?>"></td>
  </tr>
  <tr>
    <th align="right" scope="row">Açıklama</th>
    <td>&nbsp;<textarea class="form-control" name="aciklama" cols="52" rows="5"><?php echo   $bilgiler->description; ?></textarea> </td>
  </tr>
  <tr>
    <th align="right" scope="row">Logo adresi</th>
    <td>&nbsp;<input type="text" class="form-control" size="50"  name="logo"  value="<?php echo   $bilgiler->logo; ?>"></td>
  </tr>
  <tr>
    <th align="right" scope="row">Google Analytics</th>
    <td>&nbsp;<textarea class="form-control" name="google" cols="52" rows="5"><?php echo   $bilgiler->google; ?></textarea></td>
  </tr>
  <tr>
    <th align="right" scope="row">Footer</th>
    <td>&nbsp;<textarea class="form-control" name="footer" cols="52" rows="5"><?php echo   $bilgiler->footer; ?></textarea></td>
  </tr>
  <tr>
    <th align="right" scope="row">Bilgilendirme Yazısı</th>
    <td>&nbsp;<textarea class="form-control" name="bilgi" cols="52" rows="5"><?php echo   $bilgiler->giris_yazisi; ?></textarea></td>
  </tr>
  <tr>
    <th align="right" scope="row">&nbsp;</th>
    <td>&nbsp;<button type="submit" class="btn btn-default glyphicon glyphicon-ok-sign btn-lg">&nbsp;Kaydet</button></td>
  </tr>
</table>
              
                   
      </form>             
                   
                   
                   

                 
              </div>
               

            </div>
        </div>
    </div>
</div>
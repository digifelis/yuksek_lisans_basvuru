<?php
if($_GET) { 
$id = trim($_GET[id]);
if($_GET[sub_islem] == "ekle") {
$db->query("insert into grup_list (ilan_id , grup_id) values ( '".$_GET[sub_id]."' , '".$_GET[id]."' ) ");
header("Location: index.php?islem=grupla_ilan&id=".$id);
//header('Location: index.php');
//exit();
}


if($_GET[sub_islem] == "sil") {
$db->query("delete from grup_list where id='".$_GET[ids]."' ");
header("Location: index.php?islem=grupla_ilan&id=".$id);
//header('Location: index.php');
exit();
}










}

?>
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
 
 
 
 <table width="500" border="1" cellspacing="1" cellpadding="1">
  <tr>
    <td>&nbsp;Grupta Olmayan İlanlar</th>
    <td>&nbsp;</td>
    <td>&nbsp;Grupta Olan İlanlar</td>
  </tr>
  <tr>
    <th height="303" align="left" valign="top" scope="row">
    
    
    
    
    
    
    
    
      <table width="500" border="1" cellspacing="1" cellpadding="1">
      <?php 
	  $sonuclar = $db->get_results("select * from ilanlar where aktif=1 ");
	  if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	  ?>
        <tr>
          <th scope="row"><?php echo $sonuc->ilan_adi; ?></th>
          <td>&nbsp;<a href="index.php?islem=grupla_ilan&id=<?php echo $_GET[id]; ?>&sub_islem=ekle&sub_id=<?php echo $sonuc->id; ?>">Ekle</a></td>
        </tr>
    
                    
          <?php 
}
}
?>   
      
      </table>
      
      
      
      
      
      
      
      
      
      
    </th>
    <td align="left" valign="top">&nbsp;</td>
    <td align="left" valign="top">
    
    
    
    
    
    
    <table width="500" border="1" cellspacing="1" cellpadding="1">
      <?php 
	  $sonuclar = $db->get_results("SELECT * , grup_list.id as ids FROM grup_list , ilanlar where ilanlar.id=grup_list.ilan_id and grup_id=".$_GET[id]);
	  if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	  ?>
        <tr>
          <th scope="row"><?php echo $sonuc->ilan_adi; ?></th>
          <td>&nbsp;<a href="index.php?islem=grupla_ilan&id=<?php echo $_GET[id]; ?>&sub_islem=sil&sub_id=<?php echo $sonuc->id; ?>&ids=<?php echo $sonuc->ids; ?>">Sil</a></td>
        </tr>
    
                    
          <?php 
}
}
?>  
    </table>
    
    
    
    
    
    
    
    
    
    
    </td>
  </tr>
</table>

 
 
 
 
 
 
 
 

                 
              </div>
               

            </div>
        </div>
    </div>
</div>
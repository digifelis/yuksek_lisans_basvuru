<script type="text/javascript">
function PencereButonu(Url,Scrol,En,Boy) {
day = new Date();
id = day.getTime();

window.open(Url,"yenipencere","menubar=1,resizable=1,width="+En+",height="+Boy+"");
//window.open(Url, '" + id + "','scrollbars=',width="+En+",height="+Boy+");
}
</script>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Açık İlanlar</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                
                
           <?php 
		   
		   if($_GET[sub_action] == "sil") {
			   $db->query("delete from ilanlar where id='".$_GET[id]."' ");
			   
			   if($db->rows_affected>0) {
				   
							 echo '<div class="alert alert-danger">
		İlan Silindi<br>
                
      </div>';
		 
		   
		   
						} else {
							
							
							 echo '<div class="alert alert-danger">
		İlan Silinemedi !!!<br>
                
      </div>';
		   }
		   
		   
						}
			   
			   
	echo $_SESSION["enst"];		  
		   
		   ?>
                
                
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                        <th>İlan İd</th>
                            <th>İlan Adı</th>
                             <th>Grup No</th>
                            <th>Başlangıç Tarihi</th>
                            
                            <th>Bitiş Tarihi</th>
                            <th>Başvuru Sayısı</th>
                            <th>Aktiflik</th>
                            
                            <th>İşlemler</th>
                           
                        </tr>
                        </thead>
                        <tbody>



<?php 
if ($_SESSION["enst"] == 0) {
	$sonuclar = $db->get_results("select * from ilanlar where arsiv=1  order by id DESC");
} else {
	$sonuclar = $db->get_results("select * from ilanlar where arsiv=1 and enst=".$_SESSION["enst"]." order by id DESC");
}

foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                        	<td><?php echo $sonuc->id; ?></td>
                            <td><?php echo $sonuc->ilan_adi; ?></td>
                             <td class="center"> <?php echo $sonuc->grup_no; ?> </td>
                            <td class="center"><?php echo $sonuc->bas_tarihi; ?></td>
                            <td class="center"><?php echo $sonuc->bit_tarihi; ?></td>
                            <td class="center"><?php 
							
							
							$sonuclar1 = $db->get_row("select count(basvuru2.id) as sayisi  from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id='".$sonuc->id."'  order by ilanlar.id DESC");
							
							echo $sonuclar1->sayisi;
							
							
							 ?></td>
                            <td class="center">
                              <?php 
							  if($sonuc->aktif == "1") { echo "EVET"; }
							  if($sonuc->aktif == "2") { echo "HAYIR"; }
							  
							   ?>
                            </td>
                            
                           
                            
                            <td class="center">
                             <!--    <a class="btn btn-success" href="index.php?islem=basvuru_listele&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Başvuruları Listele
                                </a> -->
                                 <a class="btn btn-success" href="index.php?islem=basvuru_listele1&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Başvuruları Listele
                                </a>
                            
                                <a class="btn btn-info" href="index.php?islem=ilan_duzelt&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                   Düzelt
                                </a>
                            
                                
                             
                                
                                 <a class="btn btn-success" href="javascript:void(0);" onclick="PencereButonu('ilan_dokum.php?id=<?php echo $sonuc->id; ?>',1,450,150);">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Döküm Al
                                </a> 
                                <?php if ($sonuc->aktif == 1 and $sonuclar1->sayisi == 0) { ?>
                                <a class="btn btn-danger" href="index.php?islem=ilan_listele&sub_action=sil&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Sil
                                </a>
								<?php } elseif ($_SESSION["enst"] == 0) {  ?>
								<a class="btn btn-danger" href="index.php?islem=ilan_listele&sub_action=sil&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Sil
                                </a>
								<?php } ?>
                            </td>
                        </tr>
                       
                       
                       
                       
                       
                       
                       
          <?php 
}

?>                
                       
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--/span-->

    </div>

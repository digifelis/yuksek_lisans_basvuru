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
			   
			   
			  
		   
		   ?>
                
                
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>İlan Adı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            <th>Durum</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>



<?php 
$sonuclar = $db->get_results("select * from ilanlar order by id DESC");
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                            <td><?php echo $sonuc->ilan_adi; ?></td>
                            <td class="center"><?php echo $sonuc->bas_tarihi; ?></td>
                            <td class="center"><?php echo $sonuc->bit_tarihi; ?></td>
                            <td class="center">
                              <?php echo $sonuc->aktif; ?>
                            </td>
                            <td class="center">
                                 <a class="btn btn-success" href="index.php?islem=basvuru_listele&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Başvuruları Listele
                                </a>
                                <a class="btn btn-info" href="index.php?islem=ilan_duzelt&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                   Düzelt
                                </a>
                                <a class="btn btn-danger" href="index.php?islem=ilan_listele&sub_action=sil&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                    Sil
                                </a>
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
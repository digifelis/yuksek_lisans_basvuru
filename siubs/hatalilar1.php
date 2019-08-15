<?php 
/*

if($_GET[sub_action] == "sil") {

$db->query("delete from basvuru where kisi_id = '".$_GET[silinecek_kisi]."' and basvuru2_id='".$_GET[basvuru_id]."' and ilan_id='".$_GET[id]."' ");	
if($db->rows_affected > 0) { echo "1. işlem başarılı<br>"; } else { echo "1. işlem başarısız<br>"; }
$db->query("delete from basvuru2 where id='".$_GET[basvuru_id]."' ");
if($db->rows_affected > 0) { echo "2. işlem başarılı<br>"; } else { echo "2. işlem başarısız <br>"; }	
	
}
*/
?>

<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Kişi Listesi</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
                
                
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                        <th>sıra no </th>
                        <th width="72">TCKN</th>
                            <th width="72">Adı Soyadı</th>
                            <th width="185">cep telefon</th>
                            <th width="92">ev telefon</th>
                            <th width="111">email</th>
                           
                            <th width="300">İşlemler</th>
                           
                        </tr>
                        </thead>
                        <tbody>



<?php 
/*
$sonuclar = $db->get_results("SELECT basvuru.* , kisiler.* from basvuru , kisiler where basvuru.basvuru2_id=0 and basvuru.tckimlik=kisiler.tckimlik  order by kisiler.tckimlik DESC");
*/
$sonuclar = $db->get_results("select * from basvuru2 where mezuniyet_derece=2 and mezuniyet_sayisal>4  ");
$xx = '.';
$yy=',';

if (is_array($sonuclar) || is_object($sonuclar))
{
$x=1;	
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                        <td><?php echo $x; $x++; ?></td>
                         <td><?php echo $sonuc->tckimlik; ?></td>
                            <td><?php echo $sonuc->adi."&nbsp;".$sonuc->soyadi; ?></td>
                            <td class="center"><?php 
							
							echo $sonuc->ceptelefon;
							
							
							
							 
							?></td>
                            <td class="center"><?php 
						
							echo $sonuc->evtelefon;
							
							
							?></td>
                            <td class="center">
                              <?php 
							
							  
							  echo $sonuc->email;
							 
							  ?>
                            </td>
                           
                            
                           <td class="center">
                         <!--
                           <a class="btn btn-info" href="index.php?islem=hatalilar1&sub_action=sil&id=<?php echo $sonuc->tckimlik; ?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                   Kayıt Başvurusunu Sil
                                </a>
                                 -->
                           
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
        <!--/span-->

    </div>
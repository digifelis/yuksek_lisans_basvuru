<?php

if($_GET[sub_action] == "sil") {

$db->query("delete from basvuru where kisi_id = '".$_GET[silinecek_kisi]."' and basvuru2_id='".$_GET[basvuru_id]."' and ilan_id='".$_GET[id]."' ");	
if($db->rows_affected > 0) { echo "1. işlem başarılı<br>"; } else { echo "1. işlem başarısız<br>"; }
$db->query("delete from basvuru2 where id='".$_GET[basvuru_id]."' ");
if($db->rows_affected > 0) { echo "2. işlem başarılı<br>"; } else { echo "2. işlem başarısız <br>"; }	
	
}

?>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Başvurular</h2>

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
                            <th>Adı Soyadı</th>
                            <th>Ales Puanı</th>
                            <th>Lisans Mezuniyet Derecesi</th>
                            <th>Yüksek Lisans Mezuniyet Derecesi</th>
                            <th>Dil Puanı</th>
                            <th>Başvuru Puanı</th>
                           <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>



<?php 
/*
$sonuclar = $db->get_results("select basvuru.* , kisiler.* , ilanlar.* from basvuru ,kisiler , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.kisi_id = kisiler.id and ilanlar.id='".$db->escape($_GET[id])."' and basvuru.aktif=1 and kisiler.aktif=0 and ilanlar.aktif=1  order by ilanlar.id DESC");
*/

$sonuclar = $db->get_results("select basvuru.* , basvuru2.* , ilanlar.* from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id='".$db->escape($_GET[id])."' and basvuru.aktif=1 and basvuru2.aktif=0 and ilanlar.aktif=1  order by ilanlar.id DESC");

$xx = '.';
$yy=',';

if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                            <td><?php echo $sonuc->adi."&nbsp;".$sonuc->soyadi; ?></td>
                            <td class="center"><?php 
							if($sonuc->ales_turu == 1) {
							echo $sonuc->ales_sayisal;
							$ales_notu = $sonuc->ales_sayisal;
							}
							if($sonuc->ales_turu == 2) {
							echo $sonuc->ales_sozel;
							$ales_notu = $sonuc->ales_sozel;
							}
							if($sonuc->ales_turu == 3) {
							echo $sonuc->ales_ea;
							$ales_notu = $sonuc->ales_ea;
							}
							 
							?></td>
                            <td class="center"><?php 
							
							if($sonuc->mezuniyet_derece == '2') {
								  $yuzluk_not = $db->get_var("select yuzluk from not_karsilik where dortluk='".$sonuc->mezuniyet_sayisal."' ");
							  $ogrenci_not = $yuzluk_not; 
							  } else {
								$ogrenci_not =   $sonuc->mezuniyet_sayisal;
							  }
							 
							$ogrenci_not = str_replace($yy,$xx,$ogrenci_not);
							  echo $ogrenci_not;
							
							?></td>
                            <td class="center">
                              <?php 
							
							  if($sonuc->d_mezuniyet_derece == '2') {
								  $yuzluk_not = $db->get_var("select yuzluk from not_karsilik where dortluk='".$sonuc->d_mezuniyet_sayisal."' ");
							  $ogrenci_not_d = $yuzluk_not; 
							  } else {
								$ogrenci_not_d =   $sonuc->d_mezuniyet_sayisal;
							  }
							  $ogrenci_not_d = str_replace($yy,$xx,$ogrenci_not_d);
							  echo $ogrenci_not_d;
							 
							  ?>
                            </td>
                            
                            <td class="center">
                              <?php 
							  
							  
							 
							  if($sonuc->dil_sinav_adi == '3') {
								  $yuzluk_not = $db->get_var("select yds from dil_karsilik where toefl='".$sonuc->dil_sinav_puan."' ");
							  $ogrenci_dil_not = $yuzluk_not; 
							  } else {
								$ogrenci_dil_not =  $sonuc->dil_sinav_puan;
							  }
							  $ogrenci_dil_not = str_replace($yy,$xx,$ogrenci_dil_not);
							  echo $ogrenci_dil_not;
							
							  
							  ?>
                            </td>
                            
                           <td class="center">
                           <?php
						   if($sonuc->doktora == 0) {
							   
							 $snc=($ales_notu*50/100)+($ogrenci_not*40/100)+($ogrenci_dil_not*10/100); 
						   }							 
							   
						   if($sonuc->doktora == 1) {
							   
							  $snc=($ales_notu*50/100)+($ogrenci_not*10/100)+($ogrenci_not_d*15/100)+($ogrenci_dil_not*25/100);    
							   
						   }	

						   echo $snc;
						   ?>
                           
                           </td>
                        
                        <td>
                        
                       <a class="btn btn-danger" href="index.php?islem=basvuru_listele&sub_action=sil&silinecek_kisi=<?php echo $sonuc->kisi_id; ?>&basvuru_id=<?php echo $sonuc->basvuru2_id; ?>&id=<?php echo $_GET[id]; ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                  Başvuruyu  Sil
                                </a> 
                        
                        
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
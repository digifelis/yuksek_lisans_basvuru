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
               
               
               <form action="" method="post">
               
              <input name="tckimlik" type="text" style="width:250px;" placeholder="TC Kimlik No yada isim yada soyad yazınız"  class="form-control"  /> <br />
              <input name="tikla" type="submit" style="width:250px;"  value="ARAMA YAP"  class="form-control" />
               
               
               </form>
               
                <br />
                
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                        <th width="72">TCKN</th>
                            <th width="72">Adı Soyadı</th>
                            <th width="300">İşlemler</th>
                            <th> İletisim <br /> Cep Telefon &nbsp;|&nbsp;Ev telefon&nbsp;</th>
                            <th>dogum yeri &nbsp; - &nbsp;Doğum Tarihi</th>
                            <th width="185">Ales Puanı<br>Sayisal&nbsp;|&nbsp;Sözel&nbsp;|&nbsp;Eşit Ağırlık&nbsp;</th>
                            <th width="92">Lisans Mezuniyet Derecesi</th>
                            <th width="111">Yüksek Lisans Mezuniyet Derecesi</th>
                            <th width="69">Dil Puanı</th>
                            
                           
                        </tr>
                        </thead>
                        <tbody>



<?php 
/*
$sonuclar = $db->get_results("select basvuru.* , kisiler.* , ilanlar.* from basvuru ,kisiler , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.kisi_id = kisiler.id and ilanlar.id='".$db->escape($_GET[id])."' and basvuru.aktif=1 and kisiler.aktif=0 and ilanlar.aktif=1  order by ilanlar.id DESC");
*/
if($_POST) {  
$sonuclar = $db->get_results("select * from kisiler where tckimlik like '%".$_POST[tckimlik]."%' or adi like '%".$_POST[tckimlik]."%' or soyadi like '%".$_POST[tckimlik]."%' order by tckimlik DESC limit 0,10"); 
} else {
$sonuclar = $db->get_results("select * from kisiler order by id DESC limit 0,10");
}
$xx = '.';
$yy=',';

if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                         <td><?php echo $sonuc->tckimlik; ?></td>
                            <td><?php echo $sonuc->adi."&nbsp;".$sonuc->soyadi; ?></td>
                             </td>
                            
                           <td class="center">
                           <a class="btn btn-info" href="index.php?islem=kisi_duzelt&id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-edit icon-white"></i>
                                   Şifresini Düzelt
                                </a>
                            
                           </td>
                            <td class="center"><?php 
							
							echo $sonuc->ceptelefon;
							echo "&nbsp;|&nbsp;";
							echo $sonuc->evtelefon;
							echo "&nbsp;|&nbsp;";
							echo $sonuc->email;
							
							
							
							 
							?></td> 
                           <td><?php echo $sonuc->dogum_yeri."&nbsp;-&nbsp;".$sonuc->d_gun."/".$sonuc->d_ay."/".$sonuc->d_yil; ?></td> 
                            <td class="center"><?php 
							
							echo $sonuc->ales_sayisal;
							echo "&nbsp;|&nbsp;";
							echo $sonuc->ales_sozel;
							echo "&nbsp;|&nbsp;";
							echo $sonuc->ales_ea;
							
							
							 
							?></td>
                            <td class="center"><?php 
						//	echo $sonuc->mezuniyet_sayisal."<br>";
							
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
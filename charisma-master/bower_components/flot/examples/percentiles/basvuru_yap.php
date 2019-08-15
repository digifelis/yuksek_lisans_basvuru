<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
?>
<script type="text/javascript">
function PencereButonu(Url,Scrol,En,Boy) {
day = new Date();
id = day.getTime();
window.open(Url, '" + id + "','scrollbars=',width="+En+",height="+Boy+");
}
</script>
<?php
$user1= $db->escape($_SESSION["user"]);
$ogrenci_bilgileri = $db->get_row("select * from  kisiler where tckimlik='".$user1."'");
if($_POST){
	$ilan_id= $db->escape($_POST["ilan_id"]);
	
	

$db->query("CREATE TEMPORARY TABLE tmp SELECT * from kisiler WHERE id='".$ogrenci_bilgileri->id."' 	");
$db->query("ALTER TABLE tmp drop id	");
$db->query("INSERT INTO basvuru2 SELECT 0,tmp.* FROM tmp	");
$db->query("DROP TABLE tmp	");
$son_id= $db->insert_id;
$db->query("insert into basvuru (ilan_id,aktif,kisi_id , tarih_saat , tckimlik , basvuru2_id ) values ('".$ilan_id."' ,1 ,'".$ogrenci_bilgileri->id."' , '".date('Y.m.d H:i:s')."' , '".$user1."' , '".$son_id."' ) ");


}
$uyarilar = "";
$uyarilar1 = "";
$uyarilar2 = "";
$uyarilar3 = "";
/* kişisel bilgiler */

if($ogrenci_bilgileri->dogum_yeri == "") 
{
	$uyarilar .="Do&#287;um Yeri Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->adi == "") 
{
	$uyarilar .="&#304;sim Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->soyadi == "") 
{
	$uyarilar .="Soyad&#305; Bilgisi Eksik<br>"; 
}
/* iletişim bilgileri */
if($ogrenci_bilgileri->il == "") 
{
	$uyarilar1 .="&#350;ehir Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->ilce == "") 
{
	$uyarilar1 .="&#304;l&ccedil;e Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->adres == "") 
{
	$uyarilar1 .="Adres Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->ceptelefon == "") 
{
	$uyarilar1 .="Cep Telefon Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->evtelefon == "") 
{
	$uyarilar1 .="Ev Telefon Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->email == "") 
{
	$uyarilar1 .="E-mail Bilgisi Eksik<br>"; 
}
/* ogrenim bilgileri */
if($ogrenci_bilgileri->mezuniyet_sayisal == "") 
{
	$uyarilar2 .="Mezuniyet Derecesi Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->universite == "") 
{
	$uyarilar2 .="&Uuml;niversite Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->fakulte == "") 
{
	$uyarilar2 .="Fak&uuml;lte Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->bolum == "") 
{
	$uyarilar2 .="B&ouml;l&uuml;m Bilgisi Eksik<br>"; 
}

/* sınav bilgileri  */
if($ogrenci_bilgileri->dil_sinav_puan == "" or $ogrenci_bilgileri->dil_sinav_puan == "0") 
{
	$uyarilar3 .="Dil Puan Bilgisi Eksik<br>"; 
}

if($ogrenci_bilgileri->dil_sinav_adi == "3" and $ogrenci_bilgileri->dil_sinav_puan < 48 ) 
{
	$uyarilar3 .="TOEFL S&#305;nav Puan&#305; 48 den K&uuml;&ccedil;&uuml;k olamaz<br>"; 
}

if($ogrenci_bilgileri->ales_sozel == "" or $ogrenci_bilgileri->ales_sozel == "0") 
{
	$uyarilar3 .="ALES S&ouml;zel Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->ales_sayisal == "" or $ogrenci_bilgileri->ales_sayisal == "0") 
{
	$uyarilar3 .="ALES Say&#305;sal Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->ales_ea == ""  or $ogrenci_bilgileri->ales_ea == "0") 
{
	$uyarilar3 .="ALES Eşit Ağırlık Bilgisi Eksik<br>"; 
}

?>
<div class="row">
        <div class="box col-md-12">
            <div class="box-inner">
                <div class="box-header well" data-original-title="">
                    <h2><i class="glyphicon glyphicon-user"></i> Açık Programlar</h2>

                    <div class="box-icon">
                        <a href="#" class="btn btn-minimize btn-round btn-default"><i
                                class="glyphicon glyphicon-chevron-up"></i></a>
                        <a href="#" class="btn btn-close btn-round btn-default"><i
                                class="glyphicon glyphicon-remove"></i></a>
                    </div>
                </div>
                <div class="box-content">
              <?php
			  if($uyarilar !="") {
				echo '<div class="alert alert-success">
				
		'.$uyarilar.'
      </div>'; 
			  }
			  if($uyarilar1 !="") {
				echo '<div class="alert alert-danger">
		'.$uyarilar1.'
      </div>'; 
			  }
			  			  if($uyarilar2 !="") {
				echo '<div class="alert alert-info">
		'.$uyarilar2.'
      </div>'; 
			  }
			  			  if($uyarilar3 !="") {
				echo '<div class="alert alert-danger">
		'.$uyarilar3.'
      </div>'; 
			  }
			  
			  $toplami = $uyarilar.$uyarilar1.$uyarilar2.$uyarilar3;
			  if($toplami == "") {
			  ?>
                    <table class="table table-striped table-bordered responsive">
                        <thead>
                        <tr>
                            <th>İlan Adı</th>
                            <th>Başlangıç Tarihi</th>
                            <th>Bitiş Tarihi</th>
                            
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>




<?php 
$sonuclar = $db->get_results("select * from ilanlar where aktif=1 order by id DESC");
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                            <td><?php echo $sonuc->ilan_adi; ?></td>
                            <td class="center"><?php echo $sonuc->bas_tarihi; ?></td>
                            <td class="center"><?php echo $sonuc->bit_tarihi; ?></td>
                           
                            <td class="center">
                                
                                <?php
								$basvuru = $db->get_row("select id , tarih_saat from basvuru where ilan_id='".$sonuc->id."'  and kisi_id='".$ogrenci_bilgileri->id."'  and aktif=1 ");
if($basvuru->id > 0 ) {
	?>
                               
      <?php } else { ?>
       <form action="" method="post">
                                <input type="hidden" name="ilan_id" value="<?php echo $sonuc->id; ?>" />
                                 <button type="submit" class="btn btn-info">&nbsp;<i class="glyphicon glyphicon-edit icon-white"></i>
                                   Başvuru Yap&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                
                                </form>
      
      <?php } ?>  
      
      
      
       <a class="btn btn-success" href="javascript:void(0);" onclick="PencereButonu('cikti1.php?id=<?php echo $sonuc->id; ?>',1,30,25);">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Başvuru Çıktısı Al
                                </a>                        
                               
                            </td>
                        </tr>
                       
                       
                       
                       
                       
                       
                       
          <?php 
}

?>       
                        </tbody>
                    </table>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--/span-->

    </div>
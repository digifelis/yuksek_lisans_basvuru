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
$ilan_id= $db->escape($_GET["ilan_id"]);

/*
if($_GET[sub_action] == "sil") {
$uyarilar4 = "Başvuru İptal Edildi<br>";
$basvuru2_bilgi = $db->get_row("select basvuru2_id from basvuru where tckimlik = '".$user1."' and  ilan_id='".$_GET[ilan_id]."' ");
$db->query("delete from basvuru where tckimlik = '".$user1."' and  ilan_id='".$_GET[ilan_id]."' ");	
//if($db->rows_affected > 0) { echo "1. işlem başarılı<br>"; } else { echo "1. işlem başarısız<br>"; }

$db->query("delete from basvuru2 where id='".$basvuru2_bilgi->basvuru2_id."' ");
//if($db->rows_affected > 0) { echo "2. işlem başarılı<br>"; } else { echo "2. işlem başarısız <br>"; }	
}
*/

if($_POST){
	if($_POST["sub_action"] == "sil") {
		
		$uyarilar4 = "Başvuru İptal Edildi<br>";
		$basvuru2_bilgi = $db->get_row("select basvuru2_id from basvuru where tckimlik = '".$user1."' and  ilan_id='".$_POST[ilan_id]."' ");
		$db->query("delete from basvuru where tckimlik = '".$user1."' and  ilan_id='".$_POST[ilan_id]."' ");	
		//if($db->rows_affected > 0) { echo "1. işlem başarılı<br>"; } else { echo "1. işlem başarısız<br>"; }

		$db->query("delete from basvuru2 where id='".$basvuru2_bilgi->basvuru2_id."' ");
		//if($db->rows_affected > 0) { echo "2. işlem başarılı<br>"; } else { echo "2. işlem başarısız <br>"; }	

		
	} else {
			$ilan_id= $db->escape($_POST["ilan_id"]);
			$varmi = $db->get_row("select * from basvuru where tckimlik='".$user1."' and ilan_id='".$ilan_id."' ");
			if($varmi->id == "") {
			
			
			

		$db->query("CREATE TEMPORARY TABLE tmp SELECT * from kisiler WHERE id='".$ogrenci_bilgileri->id."' 	");
		$db->query("ALTER TABLE tmp drop id	");
		$db->query("INSERT INTO basvuru2 SELECT 0,tmp.* FROM tmp	");
		$db->query("DROP TABLE tmp	");
		$son_id= $db->insert_id;
		/* ilan noya göre grup no bilgisi getirme */
		$vt_grup_no = $db->get_var("select grup_no from ilanlar where id='".$ilan_id."' ");


		$db->query("insert into basvuru (ilan_id,aktif,kisi_id , tarih_saat , tckimlik , basvuru2_id , grup_no ) values ('".$ilan_id."' ,1 ,'".$ogrenci_bilgileri->id."' , '".date('Y.m.d H:i:s')."' , '".$user1."' , '".$son_id."' , '".$vt_grup_no."' ) ");

		$uyarilar4 = "Bu İlan İçin Başvurunuz Alınmıştır.<br> Başvuru Çıktısı Almayı Unutmayınız.<br> Başarılar";

			} else { $uyarilar4 = "Bu İlan İçin Daha Önceden Başvurunuz Alınmıştır"; }
	}
}



$uyarilar = "";
$uyarilar1 = "";
$uyarilar2 = "";
$uyarilar3 = "";
$uyarilar5 = "";
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
/*
if($ogrenci_bilgileri->evtelefon == "") 
{
	$uyarilar1 .="Ev Telefon Bilgisi Eksik<br>"; 
}
*/
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

if($ogrenci_bilgileri->dil_sinav_puan == "") 
{
	$uyarilar3 .="Dil Puan Bilgisi Eksik<br>"; 
}

if($ogrenci_bilgileri->dil_sinav_adi == "3" and $ogrenci_bilgileri->dil_sinav_puan < 48 ) 
{
	$uyarilar3 .="TOEFL S&#305;nav Puan&#305; 48 den K&uuml;&ccedil;&uuml;k olamaz<br>"; 
}

/* ALES puanı istenmiyorsa bu bölüm kapatılacak */

if($ogrenci_bilgileri->ales_sozel == "" or $ogrenci_bilgileri->ales_sozel == "0") 
{
	$uyarilar5 .="ALES S&ouml;zel Bilgisi Eksik<br>"; 
}

if($ogrenci_bilgileri->ales_sayisal == "" or $ogrenci_bilgileri->ales_sayisal == "0") 
{
	$uyarilar5 .="ALES Say&#305;sal Bilgisi Eksik<br>"; 
}
if($ogrenci_bilgileri->ales_ea == ""  or $ogrenci_bilgileri->ales_ea == "0") 
{
	$uyarilar5 .="ALES Eşit Ağırlık Bilgisi Eksik<br>"; 
}

//	$uyarilar5 .= "<br><strong>ALES Bilgisi Gerektirmeyen Başvurular için Dikkate Almayınız.</strong>";	
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
				echo '<a href="index.php?islem=kisisel_bilgileri">
				<div class="alert alert-success">
				
		'.$uyarilar.'
      </div></a>'; 
			  }
			  if($uyarilar1 !="") {
				echo '<a href="index.php?islem=iletisim_bilgileri">
				<div class="alert alert-danger">
		'.$uyarilar1.'
      </div></a>'; 
			  }
			  			  if($uyarilar2 !="") {
				echo '<a href="index.php?islem=ogrenim_bilgileri">
				<div class="alert alert-info">
		'.$uyarilar2.'
      </div></a>'; 
			  }
			  			  if($uyarilar3 !="") {
				echo '<a href="index.php?islem=sinav_bilgileri">
				<div class="alert alert-danger">
		'.$uyarilar3.'
      </div></a>'; 
			  }

			  
			  
			   if($uyarilar4 !="") {
				echo '<div class="alert alert-danger">
		'.$uyarilar4.'
      </div>'; 
			  }
/*	
	if($user1 < '88888888888'){	
if($uyarilar5 !="") {
                                echo '<a href="index.php?islem=sinav_bilgileri">
                                <div class="alert alert-danger">
                '.$uyarilar5.'
      </div></a>';
                          }
	}

*/

if($uyarilar5 !="") {
                                echo '<a href="index.php?islem=sinav_bilgileri">
                                <div class="alert alert-danger">
                '.$uyarilar5.'
      </div></a>';
                          }
/* ales puanı isteniyorsa bu bölüm aktif */						  
$toplami = $uyarilar.$uyarilar1.$uyarilar2.$uyarilar3.$uyarilar5; 
 /* ales puanı istenmiyorsa bu bölüm aktif */
//$toplami = $uyarilar.$uyarilar1.$uyarilar2.$uyarilar3;
	  $listele = 0;
/*	  
if($toplami == "" and $uyarilar5 != "" ) {
$sql_cumle = "select * from ilanlar where aktif=1 and id in (74,75,76) order by id DESC";
$listele = 1;
} else { 

if($toplami == "" and $uyarilar5 =="") {
$sql_cumle = "select * from ilanlar where aktif=1 order by id DESC";
$listele = 1;
}
}
*/

//$sql_cumle = "select * from ilanlar where aktif=1 and id=43  order by id DESC";
$sql_cumle = "select * from ilanlar where aktif=1 order by id DESC";
if($toplami=="") { $listele = 1; }

			  if($listele == 1) {
			  ?>
 <!-- <div class="alert alert-danger">ALES Bilgileri Doldurmadan Diğer İlanlara Başvuru Yapamazsınız.</div>            -->
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

/* başvurusu yapılmış grupları listeye aktarma */
$vt_grup_liste = $db->get_results("select grup_no from basvuru where kisi_id='".$ogrenci_bilgileri->id."'  and aktif=1 ");
$grup_liste = array();
foreach ($vt_grup_liste as $a_grup_liste) {
array_push($grup_liste , $a_grup_liste->grup_no);
}



$sonuclar = $db->get_results($sql_cumle);
if($db->num_rows > 0 ) {
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                            <td><?php echo $sonuc->ilan_adi; ?></td>
                            <td class="center"><?php echo $sonuc->bas_tarihi; ?></td>
                            <td class="center"><?php echo $sonuc->bit_tarihi; ?></td>
                           
                            <td class="center">
              <!--     <a href="index.php?islem=basvuru_listele&id=<?php echo $sonuc->id; ?>">Başvuruları Gör</a> <br />             --> 
                                <?php
								$basvuru = $db->get_row("select id , tarih_saat , grup_no from basvuru where ilan_id='".$sonuc->id."'  and kisi_id='".$ogrenci_bilgileri->id."'  and aktif=1 ");
								
								
								
if($basvuru->id > 0 ) {
	?>
     <a class="btn btn-success" href="javascript:void(0);" onclick="PencereButonu('cikti1.php?id=<?php echo $sonuc->id; ?>',1,30,25);">
                                    <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                                    Başvuru Çıktısı Al
                                </a> 
    <form action="" method="post">
	<input type="hidden" name="islem" value="basvuru_yap" />
	<input type="hidden" name="sub_action" value="sil" />
	<input type="hidden" name="ilan_id" value="<?php echo $sonuc->id; ?>" />
                                 <button type="submit" class="btn btn-danger">&nbsp;<i class="glyphicon glyphicon-trash icon-white""></i>
                                   Başvuruyu  İptal Et&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                
                                </form>
		<!--						
     <a class="btn btn-danger" href="index.php?islem=basvuru_yap&sub_action=sil&ilan_id=<?php echo $sonuc->id; ?>">
                                    <i class="glyphicon glyphicon-trash icon-white"></i>
                                  Başvuruyu  İptal Et
                                </a> 
            -->                    
                                
                                
                                 
                                                          
      <?php } else { ?>
      <?php 
	  if(in_array($sonuc->grup_no , $grup_liste)) { 
	  echo "Aynı Kategoriden Başvurunuz Bulunduğundan Dolayı Başvuru Yapamazsınız. <br>Ayrıntılar için Başvuru Kılavuzuna Bakınız."; 
	  } else {
	  ?>
       <form action="" method="post">
                                <input type="hidden" name="ilan_id" value="<?php echo $sonuc->id; ?>" />
                                 <button type="submit" class="btn btn-info">&nbsp;<i class="glyphicon glyphicon-edit icon-white"></i>
                                   Başvuru Yap&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</button>
                                
                                </form>
      <?php } ?> 
      <?php } ?>  
      
      
     
                             
                               
                            </td>
                        </tr>
                       
                       
                       
                       
                       
                       
                       
          <?php 
}
} else {
echo '<div class="alert alert-success">
		
                Aktif İlan Bulunmamaktadır.
      </div>';
	
	
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

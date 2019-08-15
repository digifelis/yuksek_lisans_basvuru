<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
date_default_timezone_set('Europe/Istanbul');
?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "../ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "../ez_sql_mysql.php";
 
include("../ayar.php");


 
ob_start(); 
session_start();
error_reporting(0); 
/* excel kütüphanesi yüklendi */
require_once "Classes/PHPExcel/IOFactory.php";
	//şablon excel dosyasını bul
$objTpl = PHPExcel_IOFactory::load("sablon/liste.xls");
// excel dosyasının ilk sayfasını seç
$objTpl->setActiveSheetIndex(0); 


$formul = $db->get_var("select formul from ilanlar where id='".$db->escape($_GET[id])."' ");

$x = explode('|' , $formul);
$lisans_notu = $x[0];
$y_lisans_notu = $x[1];
$ales_notu = $x[2];
$dil_notu  = $x[3];

$formul1 = $db->get_var("select formul1 from ilanlar where id='".$db->escape($_GET[id])."' ");
if($formul1 == "") { $formul1="0|0|0|0"; }
$x1 = explode('|' , $formul1);
$lisans_notu1 = $x1[0];
$y_lisans_notu1 = $x1[1];
$ales_notu1 = $x1[2];
$dil_notu1  = $x1[3];

$yataymi = $db->get_var("select yatay from ilanlar where id='".$db->escape($_GET[id])."'");
if($yataymi == 1) {
$sonuclar = $db->get_results("select
kisi_id,
formul ,
basvuru2_id,
basvuru2.tckimlik,adi,soyadi,y_universite,y_fakulte,y_bolum,
if(mezuniyet_derece=2,'dörtlük','yüzlük') as mezuniyet_derece,
mezuniyet_sayisal,bolum,fakulte,
if(d_mezuniyet_derece=2,'dörtlük','yüzlük') as d_mezuniyet_derece,
d_mezuniyet_sayisal,d_bolum,d_fakulte,
if(dil_sinav_adi=1,'ÜDS',if(dil_sinav_adi=2,'YDS',if(dil_sinav_adi=3,'toefl',if(dil_sinav_adi=4,'kpds','yökdil')))) as sinav_adi,
dil_sinav_puan,ales_sozel,ales_sayisal,ales_ea,
@ogrenci_not := if(mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=mezuniyet_sayisal) ,mezuniyet_sayisal) as ogrenci_not,
@ogrenci_not_d := if(d_mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=d_mezuniyet_sayisal) ,d_mezuniyet_sayisal) as ogrenci_not_d,
@ogrenci_not_yatay := if(y_mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=y_mezuniyet_sayisal) ,y_mezuniyet_sayisal) as ogrenci_not_yatay,
@ogrenci_dil_not := replace(if(dil_sinav_adi=3,(select yds from dil_karsilik where toefl=dil_sinav_puan),dil_sinav_puan) ,',','.') as ogrenci_dil_not,
@secenek := ales_turu0 + ales_turu1 + ales_turu2 as sececek ,
                @ales_notu :=  cast(if(@secenek=1,ales_sayisal,if(@secenek=10,ales_sozel,if(@secenek=100,ales_ea,
                                if(@secenek=11,GREATEST(ales_sayisal,ales_sozel),
                                                if(@secenek=101,GREATEST(ales_sayisal,ales_ea),
                                                        if(@secenek=110,GREATEST(ales_ea,ales_sozel),
                                                                        if(@secenek=111,GREATEST(ales_sayisal,ales_sozel,ales_ea),0)
                                                                )       )  )            )   )) as decimal(12,4)) as ales_notu,
cast(@ales_notu as decimal (12,4) ) as ales_notu,
@doktora_p:= if(@ogrenci_not_d = 0,
(replace(@ales_notu,',','.')*".$ales_notu1."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu1."/100)+(replace(@ogrenci_not_d,',','.')*".$y_lisans_notu1."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu1."/100),
(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_not_d,',','.')*".$y_lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100) ) ,

@sonucu:= if(doktora=0,
(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100), @doktora_p ) as sonucu,

@sonucu:=(replace(@ogrenci_not_yatay,',','.')*".$y_lisans_notu."/100) as sonucu,
cast(@sonucu as decimal (12,4) ) as sonucu1
from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id !='1'   and ilanlar.id='".$db->escape($_GET[id])."' order by sonucu1 DESC");

} else {
$sonuclar = $db->get_results("select 
kisi_id,
formul ,
basvuru2_id,
basvuru2.tckimlik,adi,soyadi,y_universite,y_fakulte,y_bolum,
if(mezuniyet_derece=2,'dörtlük','yüzlük') as mezuniyet_derece,
mezuniyet_sayisal,bolum,fakulte,
if(d_mezuniyet_derece=2,'dörtlük','yüzlük') as d_mezuniyet_derece,
d_mezuniyet_sayisal,d_bolum,d_fakulte,
if(dil_sinav_adi=1,'ÜDS',if(dil_sinav_adi=2,'YDS',if(dil_sinav_adi=3,'toefl',if(dil_sinav_adi=4,'kpds','yökdil')))) as sinav_adi,
dil_sinav_puan,ales_sozel,ales_sayisal,ales_ea,
@ogrenci_not := if(mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=mezuniyet_sayisal) ,mezuniyet_sayisal) as ogrenci_not,
@ogrenci_not_d := if(d_mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=d_mezuniyet_sayisal) ,d_mezuniyet_sayisal) as ogrenci_not_d,
@ogrenci_dil_not := replace(if(dil_sinav_adi=3,(select yds from dil_karsilik where toefl=dil_sinav_puan),dil_sinav_puan) ,',','.') as ogrenci_dil_not,
@secenek := ales_turu0 + ales_turu1 + ales_turu2 as sececek ,
		@ales_notu :=  cast(if(@secenek=1,ales_sayisal,if(@secenek=10,ales_sozel,if(@secenek=100,ales_ea,
				if(@secenek=11,GREATEST(ales_sayisal,ales_sozel),
						if(@secenek=101,GREATEST(ales_sayisal,ales_ea),
							if(@secenek=110,GREATEST(ales_ea,ales_sozel),
									if(@secenek=111,GREATEST(ales_sayisal,ales_sozel,ales_ea),0)
								) 	)  ) 		)   )) as decimal(12,4)) as ales_notu,
cast(@ales_notu as decimal (12,4) ) as ales_notu,
@doktora_p:= if(@ogrenci_not_d = 0, 
(replace(@ales_notu,',','.')*".$ales_notu1."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu1."/100)+(replace(@ogrenci_not_d,',','.')*".$y_lisans_notu1."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu1."/100),
(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_not_d,',','.')*".$y_lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100) ) ,

@sonucu:= if(doktora=0,
(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100), @doktora_p ) as sonucu,

cast(@sonucu as decimal (12,4) ) as sonucu1
from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id !='1'   and ilanlar.id='".$db->escape($_GET[id])."' order by sonucu1 DESC");

}
/*
$sonuclar = $db->get_results("
select 
kisi_id,
basvuru2_id,
basvuru2.tckimlik,adi,soyadi,

if(mezuniyet_derece=2,'dörtlük','yüzlük') as mezuniyet_derece,
mezuniyet_sayisal,
bolum,
if(d_mezuniyet_derece=2,'dörtlük','yüzlük') as d_mezuniyet_derece,
d_mezuniyet_sayisal,
d_bolum,
if(dil_sinav_adi=1,'ÜDS',if(dil_sinav_adi=2,'YDS',if(dil_sinav_adi=3,'toefl','kpds'))) as sinav_adi,
dil_sinav_puan,
ales_sozel,
ales_sayisal,
ales_ea,










@ogrenci_not := if(mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=mezuniyet_sayisal) ,mezuniyet_sayisal) as ogrenci_not,
@ogrenci_not_d := if(d_mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=d_mezuniyet_sayisal) ,d_mezuniyet_sayisal) as ogrenci_not_d,

@ogrenci_dil_not := replace(if(dil_sinav_adi=3,(select yds from dil_karsilik where toefl=dil_sinav_puan),dil_sinav_puan) ,',','.') as ogrenci_dil_not,

@secenek := ales_turu0 + ales_turu1 + ales_turu2 as secenek ,

		@ales_notu :=  cast(if(@secenek=1,ales_sayisal,if(@secenek=10,ales_sozel,if(@secenek=100,ales_ea,
				if(@secenek=11,GREATEST(ales_sayisal,ales_sozel),
						if(@secenek=101,GREATEST(ales_sayisal,ales_ea),
								if(@secenek=110,GREATEST(ales_ea,ales_sozel),
									if(@secenek=111,GREATEST(ales_sayisal,ales_sozel,ales_ea),0)
								)
						)
				)
		)   )) as decimal(12,4)) as ales_notu,


cast(@ales_notu as decimal (12,4) ) as ales_notu,

@sonucu:= if(doktora=0,
(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100),


(replace(@ales_notu,',','.')*".$ales_notu."/100)+(replace(@ogrenci_not,',','.')*".$lisans_notu."/100)+(replace(@ogrenci_not_d,',','.')*".$y_lisans_notu."/100)+(replace(@ogrenci_dil_not,',','.')*".$dil_notu."/100) ) as sonucu,
cast(@sonucu as decimal (12,4) ) as sonucu1

from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id!='1' and basvuru.aktif=1 and basvuru2.aktif=0  and ilanlar.id='".$db->escape($_GET[id])."' order by sonucu1 DESC
 ");
*/
$h=2;
$xy=1;
if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	
	
$objTpl->getActiveSheet()->setCellValue('A'.$h, $xy);
$objTpl->getActiveSheet()->setCellValue('B'.$h, $sonuc->tckimlik);
$objTpl->getActiveSheet()->setCellValue('C'.$h, $sonuc->adi."  ".$sonuc->soyadi);
$objTpl->getActiveSheet()->setCellValue('D'.$h, $sonuc->ales_notu);
$objTpl->getActiveSheet()->setCellValue('E'.$h, $sonuc->ogrenci_not);
$objTpl->getActiveSheet()->setCellValue('F'.$h, $sonuc->ogrenci_not_d);
$objTpl->getActiveSheet()->setCellValue('G'.$h, $sonuc->ogrenci_dil_not);


$objTpl->getActiveSheet()->setCellValue('H'.$h, $sonuc->mezuniyet_derece);
$objTpl->getActiveSheet()->setCellValue('I'.$h, $sonuc->mezuniyet_sayisal);

$objTpl->getActiveSheet()->setCellValue('J'.$h, $sonuc->fakulte);
$objTpl->getActiveSheet()->setCellValue('K'.$h, $sonuc->bolum);
$objTpl->getActiveSheet()->setCellValue('L'.$h, $sonuc->d_mezuniyet_derece);
$objTpl->getActiveSheet()->setCellValue('M'.$h, $sonuc->d_mezuniyet_sayisal);

$objTpl->getActiveSheet()->setCellValue('N'.$h, $sonuc->d_faulte);
$objTpl->getActiveSheet()->setCellValue('O'.$h, $sonuc->d_bolum);
$objTpl->getActiveSheet()->setCellValue('P'.$h, $sonuc->sinav_adi);
$objTpl->getActiveSheet()->setCellValue('Q'.$h, $sonuc->dil_sinav_puan);
$objTpl->getActiveSheet()->setCellValue('R'.$h, $sonuc->ales_sozel);
$objTpl->getActiveSheet()->setCellValue('S'.$h, $sonuc->ales_sayisal);
$objTpl->getActiveSheet()->setCellValue('T'.$h, $sonuc->ales_ea);

$objTpl->getActiveSheet()->setCellValue('U'.$h, $sonuc->sonucu1);
$objTpl->getActiveSheet()->setCellValue('V'.$h, $sonuc->ogrenci_not_yatay);
$objTpl->getActiveSheet()->setCellValue('W'.$h, $sonuc->y_universite);
$objTpl->getActiveSheet()->setCellValue('X'.$h, $sonuc->y_fakulte);
$objTpl->getActiveSheet()->setCellValue('Y'.$h, $sonuc->y_bolum);
	
	
	
	$h++;
	$xy++;
}

}






//	$objTpl->getActiveSheet()->setCellValue('C1', "mansur beştaş");















/* yeni oluşturulacak dosyanın ismini belirle */
//$filename=mt_rand(1,100000).'.xls'; 
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="'.$filename.'"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objTpl, 'Excel5');  //downloadable file is in Excel 2003 format (.xls)
$objWriter->save('php://output');  //send it to user, of course you can save it to disk also!
// $objWriter->save("cikti/".$_GET[id].".xls"); 
exit; //done.. exiting!


?>

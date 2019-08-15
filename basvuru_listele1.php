<?php 
$xy=1;
$user1= $db->escape($_SESSION["user"]);
?><div class="row">
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
                        <th>Sıra No</th>
                        
                            <th>Ales Puanı</th>
                            <th>Lisans Mezuniyet Derecesi</th>
                            <th>Yüksek Lisans Mezuniyet Derecesi</th>
                            <th>Dil Puanı</th>
                            <th>Başvuru Puanı</th>
                          
                        </tr>
                        </thead>
                        <tbody>



<?php 

$sonuclar = $db->get_results("select 
kisi_id,
basvuru2_id,
basvuru2.tckimlik,adi,soyadi,
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
(replace(@ales_notu,',','.')*50/100)+(replace(@ogrenci_not,',','.')*40/100)+(replace(@ogrenci_dil_not,',','.')*10/100),


(replace(@ales_notu,',','.')*50/100)+(replace(@ogrenci_not,',','.')*10/100)+(replace(@ogrenci_not_d,',','.')*15/100)+(replace(@ogrenci_dil_not,',','.')*25/100) ) as sonucu,
cast(@sonucu as decimal (12,4) ) as sonucu1

from basvuru ,basvuru2 , ilanlar where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id!='1' and basvuru.aktif=1 and basvuru2.aktif=0 and ilanlar.aktif=1 and ilanlar.id='".$db->escape($_GET[id])."' order by sonucu1 DESC");


/*
$sonuclar = $db->get_results("select 
@ales_puan :=10,
@sorgu_alan := 0,

if(ales_turu0=1,@sorgu_alan:=1 ,0 ) as x,
if(ales_turu1 = 1, @sorgu_alan:=2 + @sorgu_alan ,@sorgu_alan ) as y,
if( ales_turu2 = 1, @sorgu_alan:=4 + @sorgu_alan , @sorgu_alan ) as z,

@ales_puan := 
case
when	@sorgu_alan=1	then	@ales_puan := ales_sayisal
when	@sorgu_alan=2	then	@ales_puan := ales_sozel
when	@sorgu_alan=4	then	@ales_puan := ales_ea
when	@sorgu_alan=3	then
		case
		when	ales_sayisal>ales_sozel	then	@ales_puan:= ales_sayisal	else	@ales_puan:=ales_sozel
		end

when	@sorgu_alan=5	then
		case
		when	ales_sayisal>ales_ea	then	@ales_puan:= ales_sayisal	else	@ales_puan:=ales_ea
		end

when	@sorgu_alan=6	then
		case
		when	ales_sozel>ales_ea then	@ales_puan:= ales_sozel	else	@ales_puan:=ales_ea
		end

end as ales_puan,

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

@ogrenci_not := if(mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=mezuniyet_sayisal) 

,mezuniyet_sayisal) as ogrenci_not,

@ogrenci_not_d := if(d_mezuniyet_derece=2,(select yuzluk from not_karsilik where dortluk=d_mezuniyet_sayisal) 

,d_mezuniyet_sayisal) as ogrenci_not_d,

@ogrenci_dil_not := replace(if(dil_sinav_adi=3,(select yds from dil_karsilik where toefl=dil_sinav_puan),dil_sinav_puan) 

,',','.') as ogrenci_dil_not,

@ales_notu :=cast(@ales_puan as decimal(12,4)) as ales_notu,




cast(   
 if(doktora=0,
(replace(@ales_notu,',','.')*50/100)+
(replace(@ogrenci_not,',','.')*40/100)+
(replace(@ogrenci_dil_not,',','.')*10/100),

(replace(@ales_notu,',','.')*50/100)+
(replace(@ogrenci_not,',','.')*10/100)+
(replace(@ogrenci_not_d,',','.')*15/100)+
(replace(@ogrenci_dil_not,',','.')*25/100) )	as decimal(12,4)) as sonucu,
ilanlar.aktif

from basvuru ,basvuru2 , ilanlar   where ilanlar.id=basvuru.ilan_id and basvuru.basvuru2_id = basvuru2.id and ilanlar.id !=1 and basvuru.aktif=1 and basvuru2.aktif=0 and ilanlar.id='".$db->escape($_GET[id])."' order by sonucu desc ");

*/

$xx = '.';
$yy=',';

if (is_array($sonuclar) || is_object($sonuclar))
{
	
foreach ( $sonuclar as $sonuc )
{
	?>
   


                        <tr>
                        <td><?php 
						if($sonuc->tckimlik == $user1) {
						echo $xy."&nbsp;&nbsp;Bu Sizin Sıralamanız  "; 
						} else {
							echo $xy;
						}
						$xy++; 
						?>
                       
                            <td class="center"><?php 
							
							echo $sonuc->ales_notu;
							
							 
							?></td>
                            <td class="center"><?php 
							
							 echo $sonuc->ogrenci_not;
							
							?></td>
                            <td class="center">
                              <?php 
							
							  echo  $sonuc->ogrenci_not_d;
							 
							  ?>
                            </td>
                            
                            <td class="center">
                              <?php 
							  
							  
							 
							 echo  $sonuc->ogrenci_dil_not;
							
							  
							  ?>
                            </td>
                            
                           <td class="center">
                           <?php
						 echo $sonuc->sonucu1;
                          ?> 
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
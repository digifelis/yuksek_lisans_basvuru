<?php

if($_POST) {
	if( ($_POST["sifre1"] == $_POST["sifre2"]) and ($_POST["sifre1"] != "" ) and ($_POST["sifre2"] != "" )  ) {
	
	
	//$sifre = md5(sha1($db->escape(mysql_real_escape_string($_POST["sifre1"]))));
	$sifre = md5(sha1($_POST["sifre1"]));
	
	echo $db->escape(mysql_real_escape_string($_POST["sifre1"]));
	echo "<br>".$_POST["sifre1"]."&nbsp;&nbsp;&nbsp;".$sifre."<br>";
	echo md5(sha1($pass1));
	
$db->query("update kisiler set sifre='".$sifre."' where tckimlik='".$_POST[tckimlik]."'");	
						if($db->rows_affected>0) { echo '<div class="alert alert-success">
		<strong>İşlem Başarı ile Tamamlandı..</strong></div>'; } else { echo '<div class="alert alert-success">
		<strong>Hatalı işlem</strong></div>';	}
						
							} else { echo '<div class="alert alert-success">
		<strong>ŞİFRELER AYNI DEĞİL YADA BOŞ GEÇİLEMEZ</strong></div>';}
			}
$kisi_tc = $db->get_row("select * from kisiler where id=".$_GET[id]);
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Kullanıcı Bilgileri</h2>

              <form class="form-inline" role="form" method="post" >  
  </div>
 <div class="box-content row">
                <div class="col-lg-7 col-md-12">
                <br>
                
                    T.C. Kimlik No&nbsp;&nbsp;
                    <input class="form-control"  type="text" class="form-control" name="tckimlik"  value="<?php echo $kisi_tc->tckimlik; ?>">
               
                <br>
                Parola&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input class="form-control"   type="password" class="form-control" placeholder="" name="sifre1">
                
                 <br>
                Parola (Tekrar)
                    <input class="form-control"   type="password" class="form-control" placeholder="" name="sifre2">
               
                 <br>
                <br><br>
                 
                
                <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
                
            </form> 
            </div>   
            </div>
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


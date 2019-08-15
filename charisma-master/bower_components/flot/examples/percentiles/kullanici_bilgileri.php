<?php

if($_POST) {
	$sifre = md5(sha1($db->escape(mysql_real_escape_string($_POST["sifre1"]))));
$db->query("update kisiler set sifre='".$sifre."' where tckimlik='".$_SESSION["user"]."'");	
						if($db->rows_affected>0) {
							echo "işlem başarılı";
							
						} else {
							echo "Hatalı işlem";
						}
			}

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
                    <input class="form-control"  type="text" class="form-control"  value="<?php echo $_SESSION[user]; ?>">
               
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


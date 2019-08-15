<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();

//ezSQL çekirdegini dahil ediyoruz.
include_once "ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "ez_sql_mysql.php";
 
include("ayar.php");



$sifirlama_anahtar	 = mysql_real_escape_string($db->escape($_GET['anahtar']));
$pass1 = mysql_real_escape_string($db->escape($_POST['password']));

$kayitvarmi = $db->get_row('select * from kisiler where sifirlama_anahtar = "'. $sifirlama_anahtar.'" ');

if ($sifirlama_anahtar == "") {	
	header('Location: index.php');
} 


if ($db->num_rows == 0) {	
	header('Location: index.php');
} 

if($_POST){
	$pass1 = md5(sha1($pass1));
	if($pass1 == "") {
	header("Refresh: 1; url=sifre_yenile.php?uyari=2");	
	}
	$db->query(" update kisiler set sifre= '".$pass1."' where sifirlama_anahtar='".$sifirlama_anahtar."'  ");
	if($db->rows_affected>0) {
		// şifre değişti
		header("Refresh: 1; url=sifre_yenile.php?uyari=1");
	} else {
		
		header("Refresh: 1; url=sifre_yenile.php?uyari=2");
	}
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Siirt Üniversitesi Yüksek Lisans Başvuru Sistemi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Siirt Üniversitesi Yüksek Lisans başvuru sistemi.">
    <meta name="author" content="Mansur BEŞTAŞ">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>
<div class="ch-container">
    <div class="row">
        
    <div class="row">
        <div class="col-md-12 center login-header">
            <h2>Siirt Üniversitesi Başvuru Sistemi</h2>
        </div>
        <!--/span-->
    </div><!--/row-->

    <div class="row">
    <div class="well col-md-5 center login-box">
    <?php 
	if($_GET[uyari] == "") {
		echo '<div class="alert alert-success">
		
                Yeni Parolanızı Giriniz.
      </div>';
	}
	?>
    <?php 
	if($_GET[uyari] == 1) {
		echo '<div class="alert alert-success">
		İşlem Başarılı<br>
                Parola Değiştirme İşlemi Başarılı Yeni Parolanız İle Giriş Yapabilirsiniz.
      </div>';
	  header("Refresh: 5; url=giris.php");
	}
	
	?>
    
    <?php 
	if($_GET[uyari] == 2) {
		echo '<div class="alert alert-info">
		İşlem Başarısız<br>
               Parola Değiştirme İşleminde hata Gerçekleşti Lütfen Daha Sonra Tekrar Deneyiniz.
      </div>';
	}
	?>
           
            <form class="form-horizontal" action="" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="Yeni Parolanız" name="password">
                    </div>
                    <div class="clearfix"></div><br>
<!--
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="text" class="form-control" placeholder="Email" name="email">
                    </div>
					-->
                    <div class="clearfix"></div>

                   <!-- <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div> -->
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Şifremi Değiştir</button>
                    </p>
                </fieldset>
            </form>
            İlk Defa Giriş Yapacaksanız Sisteme Kayıt Olmanız Gereklidir.<br>
           <a href="kayit.php"> Kayıt İçin Tıklayınız.</a>
           
           <br><br>
           
           <a href="giris.php"> Giriş Yap.</a>
           
        </div>
        <!--/span-->
    </div><!--/row-->
</div><!--/fluid-row-->

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>

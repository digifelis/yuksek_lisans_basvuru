<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();

$uyari = (int) $_GET[uyari];
$uyari = htmlentities($uyari,  ENT_QUOTES,  "utf-8");

?>
<!DOCTYPE html>
<html lang="en">
<head>
 
    <meta charset="utf-8">
    <title>Siirt Üniversitesi Yüksek Lisans Başvuru Sistemi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Siirt Üniversitesi Yüksek lisans başvuru sistemi.">
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
	if($uyari == "") {
		echo '<div class="alert alert-danger">
		
            <strong>    Lütfen Bilgileri Eksiksiz Doldurunuz.</strong>
      </div>';
	}
	?>
    <?php 
	if($uyari == 1) {
		echo '<div class="alert alert-danger">
		Kayıt İşlemi Sırasında Hata Oluştu Lütfen Tekrar Deneyiniz.<br>
                
      </div>';
	}
	?>
    
    <?php 
	if($uyari == 2) {
		echo '<div class="alert alert-info">
		Lütfen Bilgileri Eksiksiz ve Hatasız Doldurunuz.<br>
                
      </div>';
	}
	?>
    <?php 
	if($uyari == 3) {
		echo '<div class="alert alert-danger">
		Lütfen Bilgileri Geçerli T.C. Kimlik No Giriniz.<br>
                
      </div>';
	}
	?>
    
    
    
          
            <form class="form-horizontal" action="kayit_kontrol.php" method="post">
                <fieldset>
                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user red"></i></span>
                        <input type="text" class="form-control" placeholder="T.C. Kimlik No" name="username">
                    </div>
                    <div class="clearfix"></div><br>

                    <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="password" class="form-control" placeholder="Parolanız" name="password">
                    </div>
                    <div class="clearfix"></div><br>
                     <div class="input-group input-group-lg">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock red"></i></span>
                        <input type="text" class="form-control" placeholder="Email adresiniz" name="email">
                    </div>
                    <div class="clearfix"></div>

                   <!-- <div class="input-prepend">
                        <label class="remember" for="remember"><input type="checkbox" id="remember"> Remember me</label>
                    </div> -->
                    <div class="clearfix"></div>

                    <p class="center col-md-5">
                        <button type="submit" class="btn btn-primary">Kayıt Ol</button>
                    </p>
                </fieldset>
            </form>
            Sisteme Kayıtlı İseniz<br>
           <a href="giris.php"> Giriş İçin Tıklayınız.</a>
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

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-11140047-28', 'auto');
  ga('send', 'pageview');

</script>


</body>
</html>

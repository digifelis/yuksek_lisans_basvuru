<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
ini_set('display_errors', 0);

session_start();
if(!isset($_SESSION["login"])){
//echo "<center>Bu sayfay&#305; g&ouml;r&uuml;nt&uuml;leme yetkiniz yoktur.</center>";
header("Refresh: 1; url=giris.php");
}else{



?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "ez_sql_mysql.php";
 
include("ayar.php");
$ayarlar = $db->get_row("select * from ayarlar where id=1");
?>













<!DOCTYPE html>
<html lang="en">
<head>

   <meta charset="utf-8">
    <title><?php echo $ayarlar->title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $ayarlar->description; ?>">
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
    <!-- topbar starts -->
    <div class="navbar navbar-default" role="navigation">

        <div class="navbar-inner">
            <button type="button" class="navbar-toggle pull-left animated flip">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php"> <img alt="yüksek lisans başvuru" src="<?php echo $ayarlar->logo; ?>" class="hidden-xs"/>
                <span>SİÜ-BS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Aday</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="#">Profil</a></li>
                    <li class="divider"></li>
                    <li><a href="cikis.php">Çıkış</a></li>
                </ul>
            </div>
            <!-- user dropdown ends -->

            <!-- theme selector starts -->
            <div class="btn-group pull-right theme-container animated tada">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-tint"></i><span
                        class="hidden-sm hidden-xs"> Tema Değiştir</span>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu" id="themes">
                    <li><a data-value="classic" href="#"><i class="whitespace"></i> Classic</a></li>
                    <li><a data-value="cerulean" href="#"><i class="whitespace"></i> Cerulean</a></li>
                    <li><a data-value="cyborg" href="#"><i class="whitespace"></i> Cyborg</a></li>
                    <li><a data-value="simplex" href="#"><i class="whitespace"></i> Simplex</a></li>
                    <li><a data-value="darkly" href="#"><i class="whitespace"></i> Darkly</a></li>
                    <li><a data-value="lumen" href="#"><i class="whitespace"></i> Lumen</a></li>
                    <li><a data-value="slate" href="#"><i class="whitespace"></i> Slate</a></li>
                    <li><a data-value="spacelab" href="#"><i class="whitespace"></i> Spacelab</a></li>
                    <li><a data-value="united" href="#"><i class="whitespace"></i> United</a></li>
                </ul>
            </div>
            <!-- theme selector ends -->



        </div>
    </div>
    <!-- topbar ends -->
<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">


                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header">Menü</li>
                        <li><a class="ajax-link" href="index.php"><i class="glyphicon glyphicon-home"></i><span> Ana Sayfa</span></a>
                        </li>
                        <li><a class="ajax-link" href="index.php?islem=kullanici_bilgileri"><i class="glyphicon glyphicon-eye-open"></i><span> Kullanıcı Bilgileri</span></a>
                        </li>
                        <li><a class="ajax-link" href="index.php?islem=kisisel_bilgileri"><i
                                    class="glyphicon glyphicon-edit"></i><span> Kişisel Bilgileri</span></a></li>
                        <li><a class="ajax-link" href="index.php?islem=iletisim_bilgileri"><i class="glyphicon glyphicon-list-alt"></i><span> İletişim Bilgileri</span></a>
                        </li>
                        <li><a class="ajax-link" href="index.php?islem=ogrenim_bilgileri"><i class="glyphicon glyphicon-font"></i><span> Öğrenim Bilgileri</span></a>
                        </li>
						<li><a class="ajax-link" href="index.php?islem=ogrenim_bilgileri_yatay"><i class="glyphicon glyphicon-font"></i><span> Öğrenim Bilgileri (Yatay Geçiş Yapacaklar İçin)</span></a>
                        </li>
                        <li><a class="ajax-link" href="index.php?islem=sinav_bilgileri"><i class="glyphicon glyphicon-picture"></i><span> Sınav Bilgileri</span></a>
                        </li>
                        <li><a class="ajax-link" href="index.php?islem=basvuru_yap"><i class="glyphicon glyphicon-th"></i><span> Başvuru Yap</span></a></li>
                        </li>
						
                        <li><a href="cikis.php"><i class="glyphicon glyphicon-lock"></i><span> Çıkış</span></a>
                        </li>
                    </ul>
                  
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->

        <noscript>
            <div class="alert alert-block col-md-12">
                <h4 class="alert-heading">Warning!</h4>

                <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a>
                    enabled to use this site.</p>
            </div>
        </noscript>

        <div id="content" class="col-lg-10 col-sm-10">
            <!-- content starts -->
<!--mansur -->
<?php 

switch($_GET['islem'])
{
   default:
   case "":
      include "orta.php";
   break;
   
    case "kullanici_bilgileri":
      include "kullanici_bilgileri.php";
	  break;
   case "kisisel_bilgileri":
      include "kisisel_bilgileri.php";
   break;
   case "iletisim_bilgileri":
      include "iletisim_bilgileri.php";
   break;

   case "ogrenim_bilgileri":
      include "ogrenim_bilgileri.php";
   break;
   
   case "ogrenim_bilgileri_yatay":
      include "ogrenim_bilgileri_yatay.php";
   break;
   
     case "sinav_bilgileri":
      include "sinav_bilgileri.php";
   break;
   
   case "basvuru_listele":
      include "basvuru_listele1.php";
   break;
   
    
        case "basvuru_yap":
      include "basvuru_yap.php";
   break; 
   

}

?>
<!--mansur1 -->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

   

    <hr>

    

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright"><?php echo $ayarlar->footer; ?></p>

        
    </footer>

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
<?php echo $ayarlar->google; ?>


</body>
</html>

<?php  }  ?>















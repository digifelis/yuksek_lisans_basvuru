<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
ob_start();
session_start();
if(!isset($_SESSION["loginy"])){
echo "Bu sayfay&#305; g&ouml;r&uuml;nt&uuml;leme yetkiniz yoktur.";
header("Refresh: 1; url=giris.php");
}else{



?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "../ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "../ez_sql_mysql.php";
 
include("../ayar.php");
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
            <a class="navbar-brand" href="index.html"> <img alt="Yüksek lisans başvuru sistemi" src="<?php echo $ayarlar->logo; ?>" class="hidden-xs"/>
                <span>SİÜ-BS</span></a>

            <!-- user dropdown starts -->
            <div class="btn-group pull-right">
                <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    <i class="glyphicon glyphicon-user"></i><span class="hidden-sm hidden-xs"> Yönetici</span>
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
                        
                        
                        
                     <li><a class="ajax-link" href="index.php?islem=ilan_olustur"><i
                                    class="glyphicon glyphicon-plus"></i><span> İlan Oluştur</span></a></li>
					
					<li><a class="ajax-link" href="index.php?islem=ilan_listele"><i
                                    class="glyphicon glyphicon-list-alt"></i><span> İlan Listele</span></a></li>
									
                       
                        <li><a class="ajax-link" href="index.php?islem=kisilistesi"><i
                                    class="glyphicon glyphicon-edit"></i><span> Kişi Bilgileri</span></a></li>
									
						<li><a class="ajax-link" href="index.php?islem=ayarlar"><i
                                    class="glyphicon glyphicon-edit"></i><span> Ayarlar</span></a></li> 
									
                         <!--           
                         <li><a class="ajax-link" href="index.php?islem=hatalilar"><i
                                    class="glyphicon glyphicon-edit"></i><span> basvuru hatası verenler</span></a></li> 
                                    
                          <li><a class="ajax-link" href="index.php?islem=hatalilar1"><i
                                    class="glyphicon glyphicon-edit"></i><span> Diploma notu hatası olanlar</span></a>
                                    </li>                                  
                            
                                                     
                                      
                        <li><a class="ajax-link" href="index.php?islem=grupla"><i class="glyphicon glyphicon-list-alt"></i><span> Gruplama İşlemleri</span></a>
                        -->
                        
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
   
   case "ayarlar":
      include "ayarlar.php";
	  break;
   
   
    case "ilan_olustur":
      include "ilan_olustur.php";
	  break;
   case "ilan_listele":
      include "ilan_listele.php";
   break;
   case "ilan_duzelt":
      include "ilan_duzelt.php";
   break;

   case "ilan_sil":
      include "ilan_sil.php";
   break;
     case "basvuru_listele":
      include "basvuru_listele.php";
   break;
   
   case "basvuru_listele1":
      include "basvuru_listele1.php";
   break; 
   
   
        case "basvuru_yap":
      include "basvuru_yap.php";
   break; 
   
   case "kisilistesi":
      include "kisiler.php";
   break;
  
  case "kisi_duzelt":
      include "kisi_duzelt.php";
   break;
   
   case "hatalilar":
      include "hatalilar.php";
   break;
   
   case "hatali_sil":
      include "hatalilar.php";
   break;

   case "hatalilar1":
      include "hatalilar1.php";
   break;
   
    case "grupla":
      include "grupla.php";
   break;
   
   case "grupla_ilan":
      include "grupla_ilan.php";
   break;
   
}

?>
<!--mansur1 -->

    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

   

    <hr>

    

    <footer class="row">
        <p class="col-md-9 col-sm-9 col-xs-12 copyright">&copy; <a href="http://www.siirt.edu.tr" target="_blank">Siirt Üniversitesi BİDB</a> 2015</p>

        
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



</body>
</html>

<?php  }  ?>















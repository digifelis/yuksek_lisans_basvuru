<?php
session_start();
ob_start();
session_destroy();
echo "&Ccedil;&#305;k&#305;&#351; Yapt&#305;n&#305;z. Ana Sayfaya Y&ouml;nlendiriliyorsunuz";
header("Refresh: 1; url=giris.php");
ob_end_flush();
?>
<?php
error_reporting(E_ALL ^ E_NOTICE);
ini_set('error_reporting', E_ALL ^ E_NOTICE);
session_start();
ob_start();
?>
<?php
 
//ezSQL çekirdegini dahil ediyoruz.
include_once "ez_sql_core.php";
 
// ezSQL veritabani bilesenini cagiriyoruz.
include_once "ez_sql_mysql.php";
 
include("ayar.php");
$user1= mysql_real_escape_string($db->escape($_POST["username"]));
$pass1= mysql_real_escape_string($db->escape($_POST["password"]));
$email1= mysql_real_escape_string($db->escape($_POST["email"]));

$satir = $db->get_row("select tckimlik , sifre from kisiler where tckimlik='".$user1."' ");
$user=$satir->tckimlik;
$pass= $satir->sifre;
?>
<?php
function tckimlik_kontrol($tckimlik){ 
    $olmaz=array('11111111110','22222222220','33333333330','44444444440','55555555550','66666666660','7777777770','88888888880','99999999990'); 
    if($tckimlik[0]==0 or !ctype_digit($tckimlik) or strlen($tckimlik)!=11){ return false;  } 
    else{ 
        for($a=0;$a<9;$a=$a+2){ $ilkt=$ilkt+$tckimlik[$a]; } 
        for($a=1;$a<9;$a=$a+2){ $sont=$sont+$tckimlik[$a]; } 
        for($a=0;$a<10;$a=$a+1){ $tumt=$tumt+$tckimlik[$a]; } 
        if(($ilkt*7-$sont)%10!=$tckimlik[9] or $tumt%10!=$tckimlik[10]){ return false; } 
        else{  
            foreach($olmaz as $olurmu){ if($tckimlik==$olurmu){ return false; } } 
            return true; 
        } 
    } 
}

if(tckimlik_kontrol($user1)){  


//echo $user1."--".$pass1."--".$email1."<br>";
if($user1 != "" and $pass1 != "" and $email1 != "") {
if($user == "") {
	$pass1 = md5(sha1($pass1));
$db->query("insert into kisiler (tckimlik , sifre , email) values ('".$user1."' , '".$pass1."' , '".$email1."') ");
						if($db->rows_affected>0) {
							echo "Kay&#305;t &#304;&#351;lemi Ba&#351;ar&#305;l&#305;";
							header("Refresh: 1; url=giris.php?uyari=1");
						} else {
							echo "Hatalı işlem";
							header("Refresh: 1; url=kayit.php?uyari=1");
						}
}

if($user != "") {
	//echo "Bu T.C. Kimli&#287;i Zaten Kay&#305;tl&#305;";
	header("Refresh: 1; url=giris.php?uyari=2");
}
												} else {
											//	echo "Hatal&#305; i&#351;lem";
							header("Refresh: 1; url=kayit.php?uyari=2");	
												}
												
												
												} else { 
//echo "Hatal&#305; i&#351;lem";
header("Refresh: 1; url=kayit.php?uyari=3");
} 
ob_end_flush();
?>
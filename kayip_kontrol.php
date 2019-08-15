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
if($_POST){
$user1= mysql_real_escape_string($db->escape($_POST["username"]));
$email1= mysql_real_escape_string($db->escape($_POST["email"]));

$satir = $db->get_row("select tckimlik , sifre , adi, soyadi , email from kisiler where tckimlik='".$user1."' and email='".$email1."' ");
$user=$satir->tckimlik;
$pass= $satir->sifre;

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

			if($db->num_rows > 0 ) {

 $length = 32;
$string = "";
$characters = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789"; // change to whatever characters you want
while ($length > 0) {
    $string .= $characters[mt_rand(0,strlen($characters)-1)];
    $length -= 1;
}
 $sifirlama_anahtar = $string;
	
  $sifirlama_anahtar = sha1($_POST['email'] . $sifirlama_anahtar);
  $email = $_POST['email'];



	$isim			= $satir->adi;
	$soyisim		= $satir->soyadi;
	
	
	$mesaj			= '<p>Sayın&nbsp;' . $isim . ' ' . $soyisim . ',</p>
						<p>Şifremi sıfırlama adresi aşağıdadır...</p>
						<p>Şifre sıfırlama adresi:&nbsp; <a href="http://basvuru.siirt.edu.tr/sifre_yenile.php?anahtar=' . $sifirlama_anahtar . '">Tıklayınız</a></p>
						';
	$headers  = 'MIME-Version: 1.0' . "rn";
	$headers .= 'Content-type: text/html; charset=utf-8' . "rn";





			
/* mail gönderme başlangıç */


				require("mail/class.phpmailer.php");
				require("mail/class.smtp.php");
				
				$mail = new PHPMailer();
				$mail->IsSMTP();
				$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
				$mail->SMTPAuth = true;

				
				$mail->SMTPSecure = 'tls'; // Güvenli baglanti icin ssl normal baglanti icin tls
				$mail->Host = "smtp.live.com"; // Mail sunucusuna ismi
				$mail->Port = 25; // Gucenli baglanti icin 465 Normal baglanti icin 587
				$mail->IsHTML(true);
				$mail->SetLanguage("tr", "phpmailer/language");
				$mail->CharSet ="utf-8";
				$mail->Username = "bes-tas@hotmail.com"; // Mail adresimizin kullanicı adi
				$mail->Password = "Sude2014."; // Mail adresimizin sifresi
				$mail->SetFrom("bes-tas@hotmail.com", "Siirt Üniversitesi Başvuru Sistemi"); // Mail attigimizda gorulecek ismimiz
				$mail->AddAddress( $satir->email); // Maili gonderecegimiz kisi yani alici
				$mail->Subject = "Siirt Üniversitesi Başvuru Sistemi - Parola Hatırlatma"; // Konu basligi
				$mail->Body = $mesaj; // Mailin icerigi
			
				if(!$mail->Send()){
				echo "Mailer Error: ".$mail->ErrorInfo;
				} else {
				//echo "Mesaj gonderildi";
				$db->query("update kisiler set sifirlama_anahtar='".$sifirlama_anahtar."' where tckimlik='".$user."'  ");
				header("Refresh: 1; url=kayip_sifre.php?uyari=1");
				}



/* mail gönderme bitiş */
				
			} else {
			// hatalı tc yada email bilgisi
			header("Refresh: 1; url=kayip_sifre.php?uyari=2");
			}

} else {
	header("Refresh: 1; url=kayip_sifre.php?uyari=2");
	
}

}
ob_end_flush();
?>
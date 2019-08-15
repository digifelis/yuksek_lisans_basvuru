<?php
require("class.phpmailer.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 1; // hata ayiklama: 1 = hata ve mesaj, 2 = sadece mesaj
$mail->SMTPAuth = true;
$mail->SMTPSecure = 'ssl'; // Güvenli baglanti icin ssl normal baglanti icin tls
$mail->Host = "mail.siteismi.com"; // Mail sunucusuna ismi
$mail->Port = 465; // Gucenli baglanti icin 465 Normal baglanti icin 587
$mail->IsHTML(true);
$mail->SetLanguage("tr", "phpmailer/language");
$mail->CharSet  ="utf-8";
$mail->Username = "isim@siteismi.com"; // Mail adresimizin kullanicı adi
$mail->Password = "PASSWORD"; // Mail adresimizin sifresi
$mail->SetFrom("isim@siteismi.com", "Isim"); // Mail attigimizda gorulecek ismimiz
$mail->AddAddress("ahmetmakal@msn.com"); // Maili gonderecegimiz kisi yani alici
$mail->Subject = "Mesaj Basligi"; // Konu basligi
$mail->Body = "Mesaj icerigi"; // Mailin icerigi
if(!$mail->Send()){
	echo "Mailer Error: ".$mail->ErrorInfo;
} else {
	echo "Mesaj gonderildi";
}
?>
<!DOCTYPE HTML>
<html lang="tr-TR">
<head>
	<meta charset="UTF-8">
	<title>TC Kimlik Doğrulama</title>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript">
		function sorgula(){
			$('#sonuc').html('');
			var tcTemiz = $('#sorguForm input[name="tcno"]').val().trim();
			var adTemiz = $('#sorguForm input[name="ad"]').val().trim();
			var soyadTemiz = $('#sorguForm input[name="soyad"]').val().trim();
			var dtTemiz = $('#sorguForm input[name="dtarihi"]').val().trim();
			if(!tcTemiz || tcTemiz.length != 11){
				$('#sonuc').html('Geçersiz T.C. Kimlik Numarası!..');
			}else if(!dtTemiz || dtTemiz.length != 4){
				$('#sonuc').html('Geçersiz Doğum Tarihi!..');
			}else if(!tcTemiz || !adTemiz || !soyadTemiz || !dtTemiz){
				$('#sonuc').html('Boş Alan Bırakmayın!..');
			}else{
				$.ajax({
					type: 'POST',
					url: 'dogrula.php',
					data: {'tc_no' : tcTemiz, 'ad' : adTemiz, 'soyad' : soyadTemiz, 'dogum_yili' : dtTemiz},
					beforeSend : function(msg){
						$('#sonuc').html('Yükleniyor...');
					},
					success: function(msg){
						$('#sonuc').html(msg); 
					}
				});
			}
		}
	</script>
</head>

<body>

<form id="sorguForm" method="post" onsubmit="return false">
	<table>
		<tr>
			<td style="width:180px">T.C.</td>
			<td><input type="text" name="tcno" size="11" maxlength="11" /><br /></td>
		</tr>
		<tr>
			<td style="width:180px">Ad</td>
			<td><input type="text" name="ad" /><br /></td>
		</tr>
		<tr>
			<td style="width:180px">Soyad</td>
			<td><input type="text" name="soyad" /><br /></td>
		</tr>
			<tr style="width:180px"><td>Doğum Tarihi</td>
			<td><input type="text" name="dtarihi" size="4" maxlength="4" /><br /></td>
		</tr>
		<tr>
			<td style="width:180px; color:red; font-size:12px" id="sonuc"></td>
			<td><input type="button" onclick="sorgula()" value="Doğrula" /></td>
		</tr>
	</table>
</form>

</body>
</html>
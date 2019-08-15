<?php
if($_POST) {
	$uyruk = $db->escape($_POST[uyruk]);
	$uyruk_diger=$db->escape($_POST[uyruk_diger]);

	$adi=$db->escape($_POST[adi]);
	$soyadi=$db->escape($_POST[soyadi]);
	$dogum_yeri=$db->escape($_POST[dogum_yeri]);
	$gun=$db->escape($_POST[gun]);
	$ay=$db->escape($_POST[ay]);
	$yil=$db->escape($_POST[yil]);
	$askerlik=$db->escape($_POST[askerlik]);
	$cinsiyet=$db->escape($_POST[cinsiyet]);
	
	$uyari_s = 0;
	
	if($gun == "") { $uyari = "Doğum Tarihinde Gün Bilgisi Eksiktir<br>".$uyari; $uyari_s = 1 + $uyari_s; }
	if($ay == "") { $uyari = "Doğum Tarihinde Ay Bilgisi Eksiktir<br>".$uyari; $uyari_s = 1 + $uyari_s; }
	if($yil == "") { $uyari = "Doğum Tarihinde Yıl Bilgisi Eksiktir<br>".$uyari; $uyari_s = 1 + $uyari_s; }
	
	if($uyari_s == 0) {
	$db->query("update kisiler set uyruk='".$uyruk."' , uyruk_diger='".$uyruk_diger."'  , askerlik='".$askerlik."'  where tckimlik='".$_SESSION[user]."'  ");
/*
$db->query("update kisiler set uyruk='".$uyruk."' , uyruk_diger='".$uyruk_diger."' , adi='".$adi."' , soyadi='".$soyadi."' , dogum_yeri='".$dogum_yeri."' , d_gun='".$gun."' , d_ay='".$ay."' , d_yil='".$yil."' , cinsiyet='".$cinsiyet."' , askerlik='".$askerlik."'  where tckimlik='".$_SESSION[user]."'  ");
*/
	
	if($db->rows_affected>0) {
							echo '<div class="alert alert-success">
		<strong>İşlem Başarı ile Tamamlandı..<br>
               </strong>
      </div>';
							
						} else {
							echo '<div class="alert alert-success"><strong>Hatalı işlem</strong></div>';
						}

						
						} else {  
						
						
						echo '<div class="alert alert-danger">
		<strong>'.$uyari.'<br>
               </strong>
      </div>';
						
						
						}
						
}
$user1 = $db->escape($_SESSION[user]);
$satir = $db->get_row("select * from kisiler where tckimlik='".$user1."' ");
?>
<div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Kişisel Bilgiler</h2>

              
 </div>
 <form class="form-inline" role="form" method="post" >  
 <div class="box-content row">
                <div class="col-lg-7 col-md-12">
               
               <table width="508" border="0" >
         <tr>
         <td>
         
                <label>Uyruk</label>
                    <br />

                   
                        <select  class="form-control" style="width:80px;"  name="uyruk" >
                          <option  value="1" <?php if($satir->uyruk == 1) { echo "selected"; } else {echo "";}   ?> >T.C.</option>
                          <option  value="2" <?php if($satir->uyruk == 2) { echo "selected"; } else {echo "";}   ?>>Diğer</option>
                </select>
                  
         
         </td>
         <td>
         
                    <label >Doğum Tarihi</label><br>

                    
                        <select class="form-control" style="width:80px; display:inline;"  readonly="readonly"   name="gun"    >
                        <option <?php if($satir->d_gun == 0) { echo "selected"; } else {echo "";}   ?> value=""></option>
                        
      <option <?php if($satir->d_gun == 1) { echo "selected"; } else {echo "";}   ?> value="01">01</option>
      <option <?php if($satir->d_gun == 2) { echo "selected"; } else {echo "";}   ?> value="02">02</option>
      <option <?php if($satir->d_gun == 3) { echo "selected"; } else {echo "";}   ?> value="03">03</option>
      <option <?php if($satir->d_gun == 4) { echo "selected"; } else {echo "";}   ?> value="04">04</option>
      <option <?php if($satir->d_gun == 5) { echo "selected"; } else {echo "";}   ?> value="05">05</option>
      <option <?php if($satir->d_gun == 6) { echo "selected"; } else {echo "";}   ?> value="06">06</option>
      <option <?php if($satir->d_gun == 7) { echo "selected"; } else {echo "";}   ?> value="07">07</option>
      <option <?php if($satir->d_gun == 8) { echo "selected"; } else {echo "";}   ?> value="08">08</option>
      <option <?php if($satir->d_gun == 9) { echo "selected"; } else {echo "";}   ?> value="09">09</option>
      <option <?php if($satir->d_gun == 10) { echo "selected"; } else {echo "";}   ?> value="10">10</option>
      <option <?php if($satir->d_gun == 11) { echo "selected"; } else {echo "";}   ?> value="11">11</option>
      <option <?php if($satir->d_gun == 12) { echo "selected"; } else {echo "";}   ?> value="12">12</option>
      <option <?php if($satir->d_gun == 13) { echo "selected"; } else {echo "";}   ?> value="13">13</option>
      <option <?php if($satir->d_gun == 14) { echo "selected"; } else {echo "";}   ?> value="14">14</option>
      <option <?php if($satir->d_gun == 15) { echo "selected"; } else {echo "";}   ?> value="15">15</option>
      <option <?php if($satir->d_gun == 16) { echo "selected"; } else {echo "";}   ?> value="16">16</option>
      <option <?php if($satir->d_gun == 17) { echo "selected"; } else {echo "";}   ?> value="17">17</option>
      <option <?php if($satir->d_gun == 18) { echo "selected"; } else {echo "";}   ?> value="18">18</option>
      <option <?php if($satir->d_gun == 19) { echo "selected"; } else {echo "";}   ?> value="19">19</option>
      <option <?php if($satir->d_gun == 20) { echo "selected"; } else {echo "";}   ?> value="20">20</option>
      <option <?php if($satir->d_gun == 21) { echo "selected"; } else {echo "";}   ?> value="21">21</option>
      <option <?php if($satir->d_gun == 22) { echo "selected"; } else {echo "";}   ?> value="22">22</option>
      <option <?php if($satir->d_gun == 23) { echo "selected"; } else {echo "";}   ?> value="23">23</option>
      <option <?php if($satir->d_gun == 24) { echo "selected"; } else {echo "";}   ?> value="24">24</option>
      <option <?php if($satir->d_gun == 25) { echo "selected"; } else {echo "";}   ?> value="25">25</option>
      <option <?php if($satir->d_gun == 26) { echo "selected"; } else {echo "";}   ?> value="26">26</option>
      <option <?php if($satir->d_gun == 27) { echo "selected"; } else {echo "";}   ?> value="27">27</option>
      <option <?php if($satir->d_gun == 28) { echo "selected"; } else {echo "";}   ?> value="28">28</option>
      <option <?php if($satir->d_gun == 29) { echo "selected"; } else {echo "";}   ?> value="29">29</option>
      <option <?php if($satir->d_gun == 30) { echo "selected"; } else {echo "";}   ?> value="30">30</option>
      <option <?php if($satir->d_gun == 31) { echo "selected"; } else {echo "";}   ?> value="31">31</option>
                        </select>
                        
                        <select  class="form-control" style="width:80px; display:inline;"  readonly="readonly"  name="ay"    >
                        <option <?php if($satir->d_ay == 0) { echo "selected"; } else {echo "";}   ?> value=""></option>
                        
        <option <?php if($satir->d_ay == 1) { echo "selected"; } else {echo "";}   ?> value="01">01</option>
        <option <?php if($satir->d_ay == 2) { echo "selected"; } else {echo "";}   ?> value="02">02</option>
        <option <?php if($satir->d_ay == 3) { echo "selected"; } else {echo "";}   ?> value="03">03</option>
        <option <?php if($satir->d_ay == 4) { echo "selected"; } else {echo "";}   ?> value="04">04</option>
        <option <?php if($satir->d_ay == 5) { echo "selected"; } else {echo "";}   ?> value="05">05</option>
        <option <?php if($satir->d_ay == 6) { echo "selected"; } else {echo "";}   ?> value="06">06</option>
        <option <?php if($satir->d_ay == 7) { echo "selected"; } else {echo "";}   ?> value="07">07</option>
        <option <?php if($satir->d_ay == 8) { echo "selected"; } else {echo "";}   ?> value="08">08</option>
        <option <?php if($satir->d_ay == 9) { echo "selected"; } else {echo "";}   ?> value="09">09</option>
        <option <?php if($satir->d_ay == 10) { echo "selected"; } else {echo "";}   ?> value="10">10</option>
        <option <?php if($satir->d_ay == 11) { echo "selected"; } else {echo "";}   ?> value="11">11</option>
        <option <?php if($satir->d_ay == 12) { echo "selected"; } else {echo "";}   ?> value="12">12</option>
                        </select>
                        
                        <select  class="form-control" style="width:90px; display:inline;"  readonly="readonly"  name="yil"     >
                        
                        <option <?php if($satir->d_yil == 0) { echo "selected"; } else {echo "";}   ?> value=""></option>
                        
		<option <?php if($satir->d_yil == 2007) { echo "selected"; } else {echo "";}   ?> value="2007">2007</option>
		<option <?php if($satir->d_yil == 2006) { echo "selected"; } else {echo "";}   ?> value="2006">2006</option>
        <option <?php if($satir->d_yil == 2005) { echo "selected"; } else {echo "";}   ?> value="2005">2005</option>
        <option <?php if($satir->d_yil == 2004) { echo "selected"; } else {echo "";}   ?> value="2004">2004</option>
        <option <?php if($satir->d_yil == 2003) { echo "selected"; } else {echo "";}   ?> value="2003">2003</option>
        <option <?php if($satir->d_yil == 2002) { echo "selected"; } else {echo "";}   ?> value="2002">2002</option>
        <option <?php if($satir->d_yil == 2001) { echo "selected"; } else {echo "";}   ?> value="2001">2001</option>
        <option <?php if($satir->d_yil == 2000) { echo "selected"; } else {echo "";}   ?> value="2000">2000</option>
        <option <?php if($satir->d_yil == 1999) { echo "selected"; } else {echo "";}   ?> value="1999">1999</option>
        <option <?php if($satir->d_yil == 1998) { echo "selected"; } else {echo "";}   ?> value="1998">1998</option>
        <option <?php if($satir->d_yil == 1997) { echo "selected"; } else {echo "";}   ?> value="1997">1997</option>
        <option <?php if($satir->d_yil == 1996) { echo "selected"; } else {echo "";}   ?> value="1996">1996</option>
        <option <?php if($satir->d_yil == 1995) { echo "selected"; } else {echo "";}   ?> value="1995">1995</option>
        <option <?php if($satir->d_yil == 1994) { echo "selected"; } else {echo "";}   ?> value="1994">1994</option>
        <option <?php if($satir->d_yil == 1993) { echo "selected"; } else {echo "";}   ?> value="1993">1993</option>
        <option <?php if($satir->d_yil == 1992) { echo "selected"; } else {echo "";}   ?> value="1992">1992</option>
        <option <?php if($satir->d_yil == 1991) { echo "selected"; } else {echo "";}   ?> value="1991">1991</option>
        <option <?php if($satir->d_yil == 1990) { echo "selected"; } else {echo "";}   ?> value="1990">1990</option>
        <option <?php if($satir->d_yil == 1989) { echo "selected"; } else {echo "";}   ?> value="1989">1989</option>
        <option <?php if($satir->d_yil == 1988) { echo "selected"; } else {echo "";}   ?> value="1988">1988</option>
        <option <?php if($satir->d_yil == 1987) { echo "selected"; } else {echo "";}   ?> value="1987">1987</option>
        <option <?php if($satir->d_yil == 1986) { echo "selected"; } else {echo "";}   ?> value="1986">1986</option>
        <option <?php if($satir->d_yil == 1985) { echo "selected"; } else {echo "";}   ?> value="1985">1985</option>
        <option <?php if($satir->d_yil == 1984) { echo "selected"; } else {echo "";}   ?> value="1984">1984</option>
        <option <?php if($satir->d_yil == 1983) { echo "selected"; } else {echo "";}   ?> value="1983">1983</option>
        <option <?php if($satir->d_yil == 1982) { echo "selected"; } else {echo "";}   ?> value="1982">1982</option>
        <option <?php if($satir->d_yil == 1981) { echo "selected"; } else {echo "";}   ?> value="1981">1981</option>
        <option <?php if($satir->d_yil == 1980) { echo "selected"; } else {echo "";}   ?> value="1980">1980</option>
        <option <?php if($satir->d_yil == 1979) { echo "selected"; } else {echo "";}   ?> value="1979">1979</option>
        <option <?php if($satir->d_yil == 1978) { echo "selected"; } else {echo "";}   ?> value="1978">1978</option>
        <option <?php if($satir->d_yil == 1977) { echo "selected"; } else {echo "";}   ?> value="1977">1977</option>
        <option <?php if($satir->d_yil == 1976) { echo "selected"; } else {echo "";}   ?> value="1976">1976</option>
        <option <?php if($satir->d_yil == 1975) { echo "selected"; } else {echo "";}   ?> value="1975">1975</option>
        <option <?php if($satir->d_yil == 1974) { echo "selected"; } else {echo "";}   ?> value="1974">1974</option>
        <option <?php if($satir->d_yil == 1973) { echo "selected"; } else {echo "";}   ?> value="1973">1973</option>
        <option <?php if($satir->d_yil == 1972) { echo "selected"; } else {echo "";}   ?> value="1972">1972</option>
        <option <?php if($satir->d_yil == 1971) { echo "selected"; } else {echo "";}   ?> value="1971">1971</option>
        <option <?php if($satir->d_yil == 1970) { echo "selected"; } else {echo "";}   ?> value="1970">1970</option>
        <option <?php if($satir->d_yil == 1969) { echo "selected"; } else {echo "";}   ?> value="1969">1969</option>
        <option <?php if($satir->d_yil == 1968) { echo "selected"; } else {echo "";}   ?> value="1968">1968</option>
        <option <?php if($satir->d_yil == 1967) { echo "selected"; } else {echo "";}   ?> value="1967">1967</option>
        <option <?php if($satir->d_yil == 1966) { echo "selected"; } else {echo "";}   ?> value="1966">1966</option>
        <option <?php if($satir->d_yil == 1965) { echo "selected"; } else {echo "";}   ?> value="1965">1965</option>
        <option <?php if($satir->d_yil == 1964) { echo "selected"; } else {echo "";}   ?> value="1964">1964</option>
        <option <?php if($satir->d_yil == 1963) { echo "selected"; } else {echo "";}   ?> value="1963">1963</option>
        <option <?php if($satir->d_yil == 1962) { echo "selected"; } else {echo "";}   ?> value="1962">1962</option>
        <option <?php if($satir->d_yil == 1961) { echo "selected"; } else {echo "";}   ?> value="1961">1961</option>
        <option <?php if($satir->d_yil == 1960) { echo "selected"; } else {echo "";}   ?> value="1960">1960</option>
        <option <?php if($satir->d_yil == 1959) { echo "selected"; } else {echo "";}   ?> value="1959">1959</option>
        <option <?php if($satir->d_yil == 1958) { echo "selected"; } else {echo "";}   ?> value="1958">1958</option>
        <option <?php if($satir->d_yil == 1957) { echo "selected"; } else {echo "";}   ?> value="1957">1957</option>
        <option <?php if($satir->d_yil == 1956) { echo "selected"; } else {echo "";}   ?> value="1956">1956</option>
        <option <?php if($satir->d_yil == 1955) { echo "selected"; } else {echo "";}   ?> value="1955">1955</option>
        <option <?php if($satir->d_yil == 1954) { echo "selected"; } else {echo "";}   ?> value="1954">1954</option>
        <option <?php if($satir->d_yil == 1953) { echo "selected"; } else {echo "";}   ?> value="1953">1953</option>
        <option <?php if($satir->d_yil == 1952) { echo "selected"; } else {echo "";}   ?> value="1952">1952</option>
        <option <?php if($satir->d_yil == 1951) { echo "selected"; } else {echo "";}   ?> value="1951">1951</option>
                        </select>
                        
                   
              
             
             </td>
         </tr>
         <tr><td> 
                    <label >Cinsiyet                    </label>
<br />
                   
                        <select class="form-control" style="width:120px;"  readonly="readonly"   name="cinsiyet"     >
        <option <?php if($satir->cinsiyet == 1) { echo "selected"; } else {echo "";}   ?> value="1">Erkek</option>
        <option <?php if($satir->cinsiyet == 2) { echo "selected"; } else {echo "";}   ?> value="2">Kadın</option>
                        </select>
                   </td>
                <td> 
                    <label>Askerlik                    </label>
<br />
                   
                        <select class="form-control" style="width:130px;"  name="askerlik" >
               <option <?php if($satir->askerlik == 0 and $satir->cinsiyet == 1 ) { echo "selected"; } else {echo "";}   ?> value="0" selected="">Yapıldı</option>
        <option <?php if($satir->askerlik == 1) { echo "selected"; } else {echo "";}   ?> value="1">Yapılmadı</option>
        <option <?php if($satir->askerlik == 2 or $satir->cinsiyet == 2 ) { echo "selected"; } else {echo "";}   ?> value="2">Muaf</option>
	<option <?php if($satir->askerlik == 3) { echo "selected"; } else {echo "";}   ?> value="3">Tecilli</option>
	

                        </select>
              </td>
                </tr>
                
             </table>    
                
        
                    T.C. Kimlik No
                    <input type="text" class="form-control" name="tc"  readonly="readonly" value="<?php echo $_SESSION[user]; ?>" >
                
                <br>
                  Doğum Yeri&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control" name="dogum_yeri"  readonly="readonly"  value="<?php echo $satir->dogum_yeri; ?>">
               
                <br>
                
              Adı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control"  name="adi"  readonly="readonly"   value="<?php echo $satir->adi;?>">
               
                 <br>
                Soyadı&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" class="form-control"  name="soyadi"   readonly="readonly"   value="<?php echo $satir->soyadi;?>">
               
                 <br>     

                 <button type="submit" class=" btn btn-success btn-lg">&nbsp;Kaydet</button>
                
             
        </div>
         
      </form>       
            
        </div>
    </div>
    <!--/span-->

</div><!--/row-->


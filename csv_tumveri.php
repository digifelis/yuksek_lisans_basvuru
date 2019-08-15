<?php
$conn = mysql_connect("localhost","ylbasvuru","2a4y3a7y3");
mysql_select_db("zadmin_twitter",$conn);
mysql_set_charset('utf8',$conn);

$test_adi = "test0";
$ozellik = "50";
$filename = $test_adi."_".$ozellik.".csv";
//$fp = fopen('php://output', 'w');
$fp = fopen($filename, 'w');

$set_adi = $test_adi;
$dosya_adi = "tum_veri_deneme_1.txt";

$satir_sayisi = count(file($dosya_adi));
$file = fopen($dosya_adi,'r');

////////////////////////////////////////////////////////////////////////////
function keywordSorting($keywordsArray, $wordCount){
	
		$keywordsSorted0 = ''; // 1 word match 
		$keywordsSorted1 = ''; // 2 word phrase match 
		$keywordsSorted2 = ''; // 3 word phrase match 
		$keywordsSorted3 = ''; // 4 word phrase match 
			
		for ($i = 0; $i < count($keywordsArray[1]); $i++){
			// 1 word phrase match 
			if ($i+0 < $wordCount){
				$keywordsSorted0 .= $keywordsArray[1][$i].',';			
			} 
			// 2 word phrase match 
			if ($i+1 < $wordCount){
				$keywordsSorted1 .= $keywordsArray[1][$i].' '.$keywordsArray[1][$i+1].',';
			} 
			// 3 word phrase match 
			if ($i+2 < $wordCount){
				$keywordsSorted2 .= $keywordsArray[1][$i].' '.$keywordsArray[1][$i+1].' '.$keywordsArray[1][$i+2].',';			
			} 
			// 4 word phrase match 
			if ($i+3 < $wordCount){
				$keywordsSorted3 .= $keywordsArray[1][$i].' '.$keywordsArray[1][$i+1].' '.$keywordsArray[1][$i+2].' '.$keywordsArray[1][$i+3].',';
			} 
		}
		
		for ($i = 0; $i <= 3; $i++){
		
			// Build array form string. 
			${'keywordsSorted'.$i} = array_filter(explode(',', ${'keywordsSorted'.$i}));			
			${'keywordsSorted'.$i} = array_count_values(${'keywordsSorted'.$i});
			asort(${'keywordsSorted'.$i});
			arsort(${'keywordsSorted'.$i});	
			
			foreach (${'keywordsSorted'.$i} as $key => $value){
				${'keywordsSorted'.$i}[$key] = array($value, number_format((100 / $wordCount * $value),2));		
			}
		}	
		// return array
		return array($keywordsSorted0, $keywordsSorted1, $keywordsSorted2, $keywordsSorted3);
	}
////////////////////////////////////////////////////////////////////////////

$query = "select kelime from kelime_listesi where set_adi='".$set_adi."' order by adet desc limit ".$ozellik;
$result = mysql_query($query);
$numara = 1;
while ($row = mysql_fetch_row($result)) {

	$header[] = $row[0];
	$header_gecici[] = $numara;
	$numara++;
}

header('Content-type: application/csv');
header('Content-Disposition: attachment; filename='.$filename);


$header1 = $header;
$header_gecici[]="99999";
fputcsv($fp, $header_gecici);

while(!feof($file)){  
        $satir = fgets($file); 
		$veri = explode("|" , $satir);
		$wordStringFiltered = $veri[0];
		preg_match_all("/\b(\w+)\b/iu", $wordStringFiltered , $keywordsArray);
		$wordCount = count($keywordsArray[1]);
		$keywordsSortedArray = keywordSorting($keywordsArray, $wordCount);
		
		reset($keywordsSortedArray[0]);
		$i = 0;
		while (list($key, $val) = each($keywordsSortedArray[0])) {
			$new_key[$i] =$key;
			$new_key1[$i] =$val[0];
			$i++;
		}
		//print_r($new_key);
		for($x=0;$x<count($header1);$x++)
		{
			if(count($new_key)>0){
				$varmi = array_search($header1[$x], $new_key);
				if($varmi > -1) {$liste[$x]=$new_key1[$varmi];} else {$liste[$x]="0";}
				//echo $header1[$x]."--*".$varmi."--*".$new_key1[$varmi]."--*".$liste[$x]." ";
				
			}
			
			
		}

		
		
		if($veri[1]==1) {$liste[]=1;}
		if($veri[1]==2) {$liste[]=2;}
	
//echo "\n";	
	fputcsv($fp, $liste);
	
	unset($liste);
	unset($new_key);
	unset($new_key1);	
}
fclose($file);
exit;
?>
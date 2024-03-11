<?php
/*
 CODER : FURQONFLYNN
healthtools-service/bmi-calculate
sc api : sehatq.com
https://github.com/caturmahdialfurqon
*/
error_reporting(0);
system('clear');
$lb= "\033[1;36m"; $pt= "\033[0;37m"; $r = "\033[1;31m"; $gr = "\033[1;32m"; $y = "\33[1;33m";
function own($url, $ua, $data = null) {
    while (True){
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_FOLLOWLOCATION => 1,));
        if ($data) {
            curl_setopt_array($ch, array(
                CURLOPT_POST => 1,
                CURLOPT_POSTFIELDS => $data,));
        }
        curl_setopt_array($ch, array(
            CURLOPT_HTTPHEADER => $ua,
            CURLOPT_SSL_VERIFYPEER => 1,
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_COOKIEJAR => 'cookie.txt',
            CURLOPT_COOKIEFILE => 'cookie.txt',));
        $run = curl_exec($ch);
        curl_close($ch);
        if ($run) {
            return $run;
        } else {
            echo "\33[1;33mCheck Your Connection!\n";
            sleep(2);
            continue;
        }
    }
}

function x($x1,$x2,$xdata){
	$xget = explode($x2, explode($x1, $xdata)[1])[0];
	return $xget;
}

function timer($clk){
	$ti=time()+$clk;
	while(1) :
		echo "\r                        \r";
		$res=$ti-time();
		if($res < 1){break;}
		echo date('H:i:s',$res);
		sleep(1);
	endwhile;
	}
//===================================START====================================//

$api = "https://api.sehatq.com/v1/healthtools-service/sehatq/bmi-calculate";
$esui = array(
"Host: api.sehatq.com",
"Accept: application/json, text/plain, */*",
"Content-Type: application/json",
"User-Agent: Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36",
"Origin: https://www.sehatq.com",
"Referer: https://www.sehatq.com/tes-kesehatan/kalkulator-bmi",
"Accept-Language: id-ID,id;q=0.9,en-US;q=0.8,en;q=0.7,ta;q=0.6",
);
echo "
$y ------------------------
$pt         GENDER
$y ------------------------
$r [+] $lb MALE   = $y 1
$r [+] $lb FEMALE = $y 2
$y ------------------------
\n";
$gen = readline("$r [+] $pt Gender : $lb => $gr ");
$age = readline("$r [+] $pt Age    : $lb => $gr ");
$weight = readline("$r [+] $pt Weight : $lb => $gr ");
$height = readline("$r [+] $pt Height : $lb => $gr ");
$male = "1";
$female = "2";
if ($gen === $male) {
	$pen = "m";
	$m = "MALE";
	$list = "
	Kurus < 18
	Normal 18.00 - 24.99
	Kegemukan 25.00 - 26.99
	Obesitas >= 27";
} 
if ($gen === $female) {
	$vag = "f";
	$f = "FEMALE";
	$list = "
	Kurus < 17
	Normal 17.00 - 22.99
	Kegemukan 23.00 - 26.99
	Obesitas >= 27";
}
$alpha = "$pen$vag";
system('clear');
echo "
$y ------------------------------------------------------------------
$pt Credit Autor  : $y CaturMahdiAlFurqon
$pt Github        : $lb https://github.com/caturmahdialfurqon/
$pt Tools Version : $gr V.1.0
$y ------------------------------------------------------------------
$gr                    : BMI CALCULATOR :
$y ------------------------------------------------------------------\n";
echo "
$y ---------------------------------------
$pt              YOUR DETAIL
$y ---------------------------------------
$r [+] $pt Gender $r : $lb $m $f
$r [+] $pt Age    $r : $lb $age
$r [+] $pt Weight $r : $lb $weight
$r [+] $pt Height $r : $lb $height
$y ---------------------------------------
$pt              Category Score
$y ---------------------------------------
$gr              $list
$y ---------------------------------------\n";
$data = array (
  'gender' => $alpha,
  'age' => $age,
  'weight' => $weight,
  'height' => $height,
);
$json = json_encode($data);
$go = own($api,$esui,$json);
$var = json_decode($go);
//print_r($go);
$bmiscore = x('"bmiScore":',',',$go);
$bmiClassificationResult = x('"bmiClassificationResultLabel":"','",',$go);
$idealWeightMin = x('"idealWeightMin":',',',$go);
$idealWeightMax = x('"idealWeightMax":',',"',$go);
$rek = x('Rekomendasi:',',"tags',$go);
$row = strip_tags($rek);

echo "
$y ------------------------------------------------------------------
$gr                          : RESULT :
$y ------------------------------------------------------------------
$r [+] $pt BMI Score        $r : $lb $bmiscore
$r [+] $pt Label            $r : $lb $bmiClassificationResult
$r [+] $pt Ideal Weight MIN $r : $lb $idealWeightMin
$r [+] $pt Ideal Weight MAX $r : $lb $idealWeightMax
$r [+] $pt Recomendation    $r : $pt $row
$y ------------------------------------------------------------------
\n";

//===================================END====================================//















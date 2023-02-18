<?php
 
error_reporting(0);
 include "main.php";
 $ip = randIp();
 $ug=getug();
 function findColor($lotteryRs){
     $color = "";
     if($lotteryRs % 2 == 0){
            $color =  "red";
     }
  else{
      $color="green";
  }
  return $color;
}
 
$tok = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwaG9uZSI6Ijc5ODk0NTUyMDgiLCJwZXJtaXNzaW9uIjowLCJpZCI6Nzk5ODgsInVzZXJOYW1lIjoiOTE3OTg5NDU1MjA4IiwiaW50ZXJDb2RlIjoiOTEiLCJleHAiOjE2Nzc2NjgwMzd9.yzfWBYTfCDKMO7M-di9EszCqYVzw5DpBZ-4RmmY9H08";

 $url1='https://api.fiewin.com/fiewin/api/lottery/opened?lotteryName=FastParity&page=1&size=30';
 $data1="";
 $headers1[]='Host: api.fiewin.com';
 $headers1[]='Connection: keep-alive';
 $headers1[]='User-Agent: '.$ug.'';
 $headers1[]='Content-Type: application/json';
 $headers1[]='Accept: application/json';
 $headers1[]='Platform: web';
 $headers1[]='token: '.$tok.'';
 $headers1[]='Origin: https://www.fiewin.com';
 $headers1[]='Accept-Encoding: gzip, deflate, br';
 $headers1[]='Accept-Language: en-US,en;q=0.9';
   $res1=HttpCall($url1,$data1,$headers1,"GET",0);
   $json1=json_decode($res1,true);
   $cData = $json1['data']['list'];

   $prevRes = $cData[9]['openResult'];
   $preevRes = $cData[19]['openResult'];
   $preevLot = substr($cData[19]['lotteryNumber'], -1);
   $check1 = substr($preevRes + $prevRes , -1);
   $fpreevRes = $cData[10 + (($preevLot - 1) * 2)]['openResult'];
   $check2 = substr($fpreevRes + $preevRes , -1);
   $c1Color = findColor($check1);
   $c2Color = findColor($check2);
    $finalColor = "red";    
   if($c1Color == "green" && $c2Color == "green"){
       $finalColor = "red";
   }
   if($c1Color == "red" && $c2Color == "red"){
       $finalColor = "green";
   }
    if($c1Color == "green" && $c2Color == "red"){
         if($check1 > $check2){
             $finalColor = "green";
         }
         else{
             $finalColor = "red";
         }
    }
    if($c1Color == "red" && $c2Color == "green"){
         if($check1 > $check2){
             $finalColor = "red";
         }
         else{
             $finalColor = "green";
         }
    }


    $url1='https://api.fiewin.com/fiewin/api/lottery/probability?lotteryName=FastParity';
    $data1="";
    $headers1[]='Host: api.fiewin.com';
    $headers1[]='Connection: keep-alive';
    $headers1[]='User-Agent: '.$ug.'';
    $headers1[]='Content-Type: application/json';
    $headers1[]='Accept: application/json';
    $headers1[]='Platform: web';
    $headers1[]='token: '.$tok.'';
    $headers1[]='Origin: https://www.fiewin.com';
    $headers1[]='Accept-Encoding: gzip, deflate, br';
    $headers1[]='Accept-Language: en-US,en;q=0.9';
      $res1=HttpCall($url1,$data1,$headers1,"GET",0);
      $json1=json_decode($res1,true);
   
   
   $pData = $json1['data']['openResultWithCount'];
   
   $green = substr($pData['GREEN'], -1);
   $red = substr($pData['RED'], -1);
   $green = $green == 0 ? 10 : $green;
    $red = $red == 0 ? 10 : $red;
//    $green = $green > 5 ?20-$green : 10-$green;
//     $red = $red > 5 ?20-$red : 10-$red;

   if(($green == 3 && $red < 3) || ($green == 7  && $red < 7)){
       $finalColor == "red";
   }
   if(($red == 3 && $green < 3) || ($red == 7  && $green < 7)){
       $finalColor == "green";
   }
   if(($green == 8 && $red <= 8) || ($green == 4  && $red <= 4) || ($green == 9  && $red <= 9)){
       $finalColor == "red";
   }
   if(($red == 8 && $green <= 8) || ($red == 4  && $green <= 4) || ($red == 9  && $green <= 9)){
       $finalColor == "green";
   }
   if(($green == 5 && $red <= 6) || ($green == 10  && ($red <=10 || $red==1))){
       $finalColor == "red";
   }
   if(($red == 5 && $green <= 6) || ($red == 10  && ($green <=10 || $green==1))){
       $finalColor == "green";
   }


$currentLot = substr($cData[0]['lotteryNumber'], -3);
$currentLot++;
    echo " <input type='hidden' id='pr-color' value=$finalColor>
     <div class='prediction pt-$finalColor'><span>$currentLot</span> colour will be : <span>".strtoupper($finalColor)."</span> </div>";


?>
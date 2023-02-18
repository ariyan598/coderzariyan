<?php
 
 error_reporting(0);

 include "main.php";
 $ip = randIp();
 $ug=getug();


 function findClass($lotteryRs){
     $class = "";
     if($lotteryRs % 2 == 0){
            $class =  "lt-red";
     }
  else{
$class =  "lt-green";
        }
        if($lotteryRs == 0){
            $class =  "lt-vred";
        }
        if($lotteryRs == 5){
            $class =  "lt-vgreen";
        }
        return $class;
 }
 
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

   
   $latestLt = $cData[0];
   $latestLtNo = substr($latestLt['lotteryNumber'],-1);

for($i=30 - (11 - $latestLtNo) ; $i>=0; $i--){
   $lData = $cData[$i];

   $lotteryNo = $lData['lotteryNumber'];
   $lotteryRs = $lData['openResult'];
   $lotteryClass = findClass($lotteryRs);
   $lotteryTm = $lData['openTime'];
   $lotteryTm = date("H:i:s", floor($lotteryTm/1000));
   $lotteryNo =   substr( $lotteryNo, -3);
   echo "<div class='lt-item'>";
   echo "<div class='lt-no'>$lotteryNo</div>";
    echo "<div class='lt-rs $lotteryClass'>$lotteryRs</div>";
    echo "<div class='lt-tm'>$lotteryTm</div>";
    echo "</div>";
}

$fLtRs = findColor($latestLt['openResult']);
$ltNo =   substr( $latestLt['lotteryNumber'] + 1, -3);
$fLtTm = date("d-m || ", floor($latestLt['openTime']/1000));
$fLtTm1 = date("h:i:s", floor($latestLt['openTime']/1000));
$fLtTm2 = date("A", floor($latestLt['openTime']/1000));
$fLtTm = $fLtTm." ".$fLtTm1." ".$fLtTm2;

echo " <input type='hidden' id='fn-color' value=$fLtRs>
<input type='hidden' id='fn-time' value='$fLtTm'>
<input type='hidden' id='fn-num' value=".$latestLt['lotteryNumber'].">
        <div class='lt-item'>";
   echo "<div class='lt-no'>.. $ltNo</div>";
    echo "<div class='lt-rs lt-question'> ? </div>";
    echo "<div class='lt-tm'>$time</div>";
    echo "</div>";
?>
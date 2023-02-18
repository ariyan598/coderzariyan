
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
 

 $tok = "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJwaG9uZSI6Ijc5ODk0NTUyMDgiLCJwZXJtaXNzaW9uIjowLCJpZCI6Nzk5ODgsInVzZXJOYW1lIjoiOTE3OTg5NDU1MjA4IiwiaW50ZXJDb2RlIjoiOTEiLCJleHAiOjE2Nzc2NjgwMzd9.yzfWBYTfCDKMO7M-di9EszCqYVzw5DpBZ-4RmmY9H08";

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

$green = $pData['GREEN'];
$red = $pData['RED'];
$violet = $pData['VIOLET'];
echo "<div class='pro-clr'>
<div class='box'><div class='green btn'>GREEN</div> => <span class='gr-clr'>".$green."</span></div>
<div class='box'><div class='red btn'>RED</div> => <span class='red-clr'>".$red."</span></div>
<div class='box'><div class='violet btn'>VIOLET</div> => <span class='v-clr'>".$violet."</span></div>
</div>
";

echo "<div class='pro-nms'>";
for($i=0; $i<count($pData)-3; $i++){
  $class = findClass($i);
  echo "
  <div class='pro-nm'>
  <div class='lt-rs $class'>
  $i
  </div>
  =>
  <div class='ans'>
  ".$pData[$i]."
  </div>
  </div>
  ";
}
echo "</div>";
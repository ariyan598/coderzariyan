<?php

date_default_timezone_set('Asia/Kolkata');

$date = date('Y-m-d');
$time = date('H:i:s');
$hours = date('H');
$minutes = date('i');
$seconds = date('s');

function genName() {
    $fetch = file_get_contents('../data/names.txt');
    $data = explode(',', $fetch);
    $names = [];
    for($i = 1; $i < count($data); $i++) {
        if($i != 24 && $i != 59) {
            $names[$i]= str_replace('"', ' ', $data[$i]);
        }
    }
    $rand = rand(0, count($names)-1);
    $name = $names[$rand];
    return trim($name);
}


function HttpCall($url, $data, $headers, $method,$return) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER, $return);
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
    $output = curl_exec ($ch);
    return $output;
}


function numToSuffix($num) {
    if (!in_array(($num % 100),array(11,12,13))){
      switch ($num % 10) {
        // Handle 1st, 2nd, 3rd
        case 1:  return $num.'st';
        case 2:  return $num.'nd';
        case 3:  return $num.'rd';
      }
    }
    return $num.'th';
  }

function RandomString($length) { 
    $characters = '01234567890123456789abcdefghijklmnopqrstuvwxyz'; 
    $charactersLength = strlen($characters); 
    $randomString = ''; for ($i = 0; $i < $length; $i++) { $randomString .= $characters[rand(0, $charactersLength - 1)]; } return $randomString; }
   
    

function RandomHexString($length) { 
    $characters = '01234567890123456789abcdef'; 
    $charactersLength = strlen($characters); 
    $randomString = ''; for ($i = 0; $i < $length; $i++) { $randomString .= $characters[rand(0, $charactersLength - 1)]; } return $randomString; }
    
    function RandomNumber($length){
        $str="";
        for($i=0;$i<$length;$i++){
            $str.=mt_rand(0,9);
        }
        return $str;
    }
 
function randIp(){
    $ip =  rand(210,219).".";
    for($i=0;$i<3;$i++){
        $ip .= mt_rand(0,255).".";
    }
    $ip = substr($ip,0,-1);
    return $ip;
}

function saveData($file_name, $data){
    return file_put_contents($file_name, $data);
}

function getug()
{
   $user=['Windows','Android'] ;
$brand=['Acer','Apple','Asus','BenQ','BlackBerry','Bosch','Celkon','Coolpad','Dell','Gionee','Google','Haier','Honor','HP','HTC','HUAWEI','Infinix','Intex','Karbon','Lenovo',
'LG','Micromax','Nokia','Oneplus','Oppo','Panasonic','Philips','Realme','Samsung','Sony','vivo','Windows NT 10.0; Win64, x64','Xiaomi','ZTE'];
$bran=mt_rand(0,count($brand)-1);
$brand=$brand[$bran];
$ver=mt_rand(6,11);
$sion=mt_rand(0,9);
$version="$ver.$sion";
$ll3=mt_rand(100,456);
   $ug="Mozilla/5.0 ($brand $version) AppleWebKit/$ll3.36 (KHTML, like Gecko) Chrome/$ver.0.4430.212 Safari/$ll3.36 Edg/90.0.818.66";
 return $ug;
}


function indianIp(){
    $ipdata = ["223.255." . rand(244, 247) . "." . rand(0, 255) . "", "223." . rand(239, 244) . "." . rand(0, 255) . "." . rand(0, 255) . "", "221.135." . rand(252, 255) . "." . rand(0, 255) . "", "220.158." . rand(152, 187) . "." . rand(0, 255) . "", "219.91." . rand(128, 255) . "." . rand(0, 255) . "", "217.146." . rand(10, 12) . "." . rand(0, 255) . "", "216.237.117." . rand(128, 255) . "", "213.232.123." . rand(0, 255) . "", "213.227.184." . rand(0, 255) . "", "212.193.2." . rand(0, 255) . ""];
    return $ipdata[mt_rand(0, count($ipdata) - 1)];
}


function generateRandMail(){
    $fname = genName();
    $lname = genName();
    $domains = ["@vintomaper.com", "@labworld.org", "@mentonit.net"];
    return  $fname.$lname.rand(0, 999).$domains[rand(0, 2)];
}

//19.3514539
$lattitude = rand(10,79);
$lattitude = $lattitude.".".rand(111111,999999);

$longitude = rand(57,79);
$longitude = $longitude.".".rand(111111,999999);

$duid = RandomHexString(16);

$fname = genName();
$lname = genName();
$name = $fname.$lname;
$gmail = $fname.$lname.RandomNumber(3)."@gmail.com";
$mob =  rand(6,9).RandomNumber(9);
$ip = randIp();
$pass = $fname.$lname.RandomString(3);
$sPass = strtoupper(RandomString(3)).$lname."@".rand(111,999);
$ug = getug();
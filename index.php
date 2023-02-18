
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,user-scalable=no, initial-scale=1.0">
    <title>Fiewin Color Predictor | Iam Zaker</title>
</head>
<link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.15.1/css/pro.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<link rel="stylesheet" id="style-css" href="style.css">
<style>
    .credits{
        position: fixed;
        top: 50%;
        right: 0px;
        transform: translate(40%) rotate(-90deg);
        font-size: 20px;
        color: #eee;
        text-align: right;
        padding: 10px 20px;
        background: linear-gradient(to right, #ea1, #ea5);
        font-weight: bold;
        border-radius:20px 20px 0 0 ;
        box-shadow: 0 0 10px rgb(0,0,0,0.2);
    }input[type=text]{ width: 100%; padding: 12px 20px; margin: 8px 0; font-size: 20px;display: inline-block; border: 1px solid #ccff; border-radius: 4px; box-sizing: border-box;font-family: Bree Serif; }{top: 22px !important; left: 8px !important;}input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; font-weight: bold;border: none; border-radius: 4px; cursor: pointer; font-family: Bree Serif;font-size: 20px;} input[type=submit]:hover { background-color: #45A049; } 
</style>
<body>
<?
error_reporting(0);
if(!isset($_REQUEST['submit'])){

echo"<center><h2><font color=#2BFF8F size=6>Fiewin Prediction<h2><center>
<form method='POST' action=''> <input type='text' class='text' name='key' placeholder='Enter Your Access Code'requred>
<br>
<input type='submit' class='submit' name='submit' value='submit'></form><br>
<center><a href='www.fiewin.com/#/LR?no=luckymG4j&ic=Qqhp'><font color='#00D4FF' size='4'>Register Now<br>";}
if(isset($_REQUEST['submit'])){
$access='Iam_Zaker';
$key=$_REQUEST['key'];


  if($access==$key){  echo'</div>
    <div class="status">
      <div class="prediction-container">  <div class="prediction"><span>000</span> colour will be : <span>LOADING</span> </div></div>
        <div class="countdown">COUNTDOWN : <span>30s</span></div>
    </div>
    <div class="application"></div>
    <div class="main-container">
    <div class="prediction-history main">
        <h3 class="header">Prediction History :</h3>
        <div class="history">
        <table >
  <tr>
    <th>Id</th>
    <th>Lottery No</th>
    <th>Time</th>
    <th>Predicted Colour</th>
    <th>Resulted Colour</th>
    <tbody class="history-table"></tbody>
  </tr>
</table>
</div>
<div class="prediction-status">
    <center>
        <div id="t-win">Total Predictions Worked : <SPAN>0</SPAN></div>
        <div id="t-loss">Total Predictions Not Worked : <SPAN>0</SPAN></div>
    </center>
</div>
        </div>


<div class="probability-container main">
    <h3 class="header">Probability :</h3>
    <div class="probability">

    </div>
</div>
    </div>
</body>
<script src="main.js"></script>
</html>';}else{echo"Wrong Access Key";}}
?>
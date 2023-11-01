<?php
    session_start();
        ini_set('error_reporting', 0);
        ini_set('display_errors', 0);
    if($_SESSION["id"] == false && $_SESSION["mail"] ==  false){
		header("location: /../app/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>#CHRIST_Food</title>
	<link rel="stylesheet" type="text/css" href="/../app/index.css">
	<meta http-equiv="refresh" content="">
</head>
<body>
	<center><div id="logo">
        <a href="/../app/index.php">
        <img src="/../app/photos/logo.png" alt="CHRIST UNIVERSITY, GHAZIABAD">
        </a>
    </div></center>
	<br>
    <h4 id="title_of_joke">Joke of the day.</h4>
	<div id="joke">
		<?php
			$Str = array("Who is the fastest reader in the world? 9/11 victims, they went through 87 stories in 10 seconds!", 
			"What do you call a serial killer in the maternity ward?
			Answer: Spawn camper",
			"Why did Hitler kill himself? 
			He saw the gas bill.",
			"Today was a terrible day. 
			My ex got hit by a bus, and 
			I lost my job as a bus driver.");
			$randomIndex= rand(0,count($Str)-1);
			$randomStr = $Str[$randomIndex];
			echo $randomStr;
		?>
	</div><BR>
    <div id="para">
        <H1>ENJOY YOUR MEAL</H1>
        <h4>BY CHOOSING PROPER FOOD COURT</h4>
        <button onclick="window.location.href='PF/PF.php'" type="button" id="btnn">@PUNJABI_BITES</button><br><BR>
        <button onclick="window.location.href='TOD/TOD.php'" type="button" id="btnn">@TASTE_OF_DILLI</button><br><BR>
        <button onclick="window.location.href='SD/SD.php'" type="button" id="btnn">@SOUTHERN_DELIGHTS</button><br><BR>
    </div>
	<br>
	<center><div id="btn"><button onclick="window.location.href='/../app/HOME/upal.php'" id="login">BACK</button></div></center>
	
	<h4 id="dis">DISCLAIMER!</h4>
	<CENTER><pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE></CENTER>
	<center><div id="btn"><button onclick="window.location.href='/../app/login/logout.php'" id="login">SIGNOUT</button></div></center>
	<br>
</body>
</html>
<?php
    session_start();
        ini_set('error_reporting', 0);
        ini_set('display_errors', 0);
    if($_SESSION["id"] == false){
		header("location: /../app/index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Campus Navigator</title>
	<link rel="stylesheet" type="text/css" href="/../app/index.css">
	<meta http-equiv="refresh" content="">
</head>
<body>
	<center><div id="logo">
        <a href="/../app/index.php">
        <img src="/../app/photos/logo.png" alt="CHRIST UNIVERSITY, GHAZIABAD">
        </a>
    </div></center>
	<div id="salutation">
		<?php
        	date_default_timezone_set('Asia/Calcutta');
			$hour = date('G');
			if( $hour >= 5 && $hour <= 11){
				echo "GOOD MORNING Dear!\n";
			} else if ($hour >= 12 && $hour <= 18){
				echo "GOOD AFTERNOON Bro!\n";
			} else if ($hour >= 19 || $hour <= 4) {
				echo "GOOD EVENING Buddy!\n";
			}
			$user_id = $_SESSION["id"];
			echo " $user_id";
        ?>
	</div>
	<br>
	<h4 id="title_of_joke">Just "A" joke of the day.</h4>
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
	</div>
	<div id="para">
		<center><h1 id="services">SERVICES</h1></center>
		<button onclick="window.location.href='Features/F_T/fcl.php'" type="button" id="btnn">FACULTY CABIN LOCATOR</button><br>
		<button onclick="window.location.href='Features/food/C_F.php'" type="button" id="btnn">#CHRIST_FOODS</button><br>
		<button type="button" id="btnn">CLASSROOM LOCATOR</button><br>
		<button type="button" id="btnn">CLASSTEACHER AND CR POINTER</button><br>
		<button type="button" id="btnn">MAIL TO CR/CLASS TEAHCER</button><br>
		<button type="button" id="btnn">ANY COMPLAINT</button><br>
		<button type="button" id="btnn">HOSTEL REVIEWS</button><br>
		<button type="button" id="btnn">ATTENDANCE CALCULATOR</button><br>
		<button type="button" id="btnn">HIDDEN GEMS</button><br>
	</div>
	<h4 id="dis">DISCLAIMER!</h4>
	<pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE>
	<center><div id="btn"><button onclick="window.location.href='/../app/login/logout.php'" id="login">SIGNOUT</button></div></center>
	<br>
</body>
</html>
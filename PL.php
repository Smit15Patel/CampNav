<?php
    session_start();
        ini_set('error_reporting', 0);
        ini_set('display_errors', 0);
	if($_SESSION["id"] ==  true && $_SESSION["mail"] ==  false){
		header("location: /../app/HOME/upal.php");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        ?>
	</div>
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
	</div>
    <h3 id="login">Login</h3>
    <br>
	<?php if (isset($error_message)) { ?>
        <p><?php echo $error_message; ?></p>
    <?php } ?>
    <div>
        <form method="post" action="P_verification.php">
        <!--<div id="name"><center>Full Name: <input type="text" id="name" name="name" placeholder="Enter your name here" required></center> </div>-->
        <!--<div id="re_id"><center>Register No.: <input type="number" id="reg_id" name="reg_id" placeholder="21215000" required> </center></div><br>
        <div id="phone"><center>Phone No.: <input type="number" id="phone" name="phoneno" placeholder="9836382982" required> </center></div>-->
        <div id="mal"><center>Mail ID: <input type="mail" id="pass" name="mail" placeholder="professor_id@christuniversity.in" required> </center></div><br>
        <div id="login"><center><button type="submit" id="login" name="login_btn">LogIn</button></center></div>
        </form>
    </div>
    <br>
    <P id="color">Oops! you don't have account!
        Dont Worry Men... Here we go!
    </P>
	<center><div id="btn"><button onclick="window.location.href='/../app/signup/signup.php';" id="login">SIGNUP</button></div></center>
</body>
</html>
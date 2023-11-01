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
			$Str = array("Why did the vegetarian refuse to play cards with the non-vegans? Because they were afraid of a 'chicken dinner'!",
            "What Did The MUTTER Say To The PANEER? Tu CHEESE Badi Hai Mast Mast!!",
            "Marks don't matter, Panner-matar");
			$randomIndex= rand(0,count($Str)-1);
			$randomStr = $Str[$randomIndex];
			echo $randomStr;
		?>
	</div><BR>
    <div id="para">
        <h2>TASTE OF DILLI FOODCOURT</h2>    
        <p1>yeah, chaap's are good somewhere but ,can't compare to home food! Sorry.</p1> 
        <br><br><button onclick="window.location.href='V_TOD/V_TOD.php'" type="button" id="btnnn">Vegetarian</button>
        <p1>bhai tu vegetarian he?</p1><br>
        <p1>nah bhai, me toh chaap 'itarian hu...</p1>
        <button onclick="window.location.href='C_TOD/C_TOD.php'" type="button" id="btnnn">Chaap</button><br><br>
        <button onclick="window.location.href='T_TOD/T_TOD.php'" type="button" id="btnnn">Tikka</button>
        <p1>bhai panner ko toh fry hona parega aaj!</p1>
    </div>
	<br>
	<center><div id="btn"><button onclick="window.location.href='/../app/HOME/Features/food/C_F.php'" id="login">BACK</button></div></center>
	
	<h4 id="dis">DISCLAIMER!</h4>
	<CENTER><pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE></CENTER>
	<center><div id="btn"><button onclick="window.location.href='/../app/login/logout.php'" id="login">SIGNOUT</button></div></center>
	<br>
</body>
</html>
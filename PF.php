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
	<meta http-equiv="refresh" content="5">
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
            "I told my vegetarian friend a joke with eggs, and they cracked up while saying, 'At least it's not non-veg!'",
            "What do you call a vegetarian who accidentally eats eggs? An 'over-easy' convert!");
			$randomIndex= rand(0,count($Str)-1);
			$randomStr = $Str[$randomIndex];
			echo $randomStr;
		?>
	</div><BR>
    <div id="para">
        <h2>PUNJABI BITES FOODCOURT</h2>    
        <p1>yeah, north indian foods are good, somewhere but cant compare to home food! Sorry.</p1> 
        <br><br><button onclick="window.location.href='V_PF/V_PF.php'" type="button" id="btnnn">Vegetarian</button>
        <p1>bhai tu vegetarian he?</p1><br>
        <p1>nah bhai, me toh eggiterian hu...</p1>
        <button onclick="window.location.href='E_PF/E_PF.php'" type="button" id="btnnn">Eggitarian</button><br><br>
        <button onclick="window.location.href='NV_PF/NV_PF.php'" type="button" id="btnnn">Non Vegetarian</button>
        <p1>bhai leg-piece badiya tha!</p1>
    </div>
	<br>
	<center><div id="btn"><button onclick="window.location.href='/../app/HOME/Features/food/C_F.php'" id="login">BACK</button></div></center>
	
	<h4 id="dis">DISCLAIMER!</h4>
	<CENTER><pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE></CENTER>
	<center><div id="btn"><button onclick="window.location.href='/../app/login/logout.php'" id="login">SIGNOUT</button></div></center>
	<br>
</body>
</html>
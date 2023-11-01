<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Campus Navigator</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<meta http-equiv="refresh" content="">
</head>
<body>
	<center><div id="logo">
        <a href="index.php">
        <img src="photos/logo.png" alt="CHRIST UNIVERSITY, GHAZIABAD">
        </a>
    </div></center>
	<br>
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
	<center><div id="btn"><button onclick="window.location.href='/../app/login/login.php';" id="login">LOGIN</button>&nbsp;&nbsp;
	<button onclick="window.location.href='signup/signup.php';" id="login">SIGNUP</button></div></center><BR>
	<center><div id="btn"><button onclick="window.location.href='login/PL.php';" id="login">FACULTY LOGIN</button></div></center>
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
	<div id="para">
		<h5 id="see">gusses what's in navigator?</h5>
		<center><h1 id="services">SERVICES</h1></center>
		<pre id="paragrapgh">
1. FACULTY CABIN LOCATOR
<strong>(for blue and yellow form students 
wanted to know where the teacher is?)</strong><br>
2. REVIEWS OF FOODS
<strong>(on the real time, genuine taste)</strong>
(PUNJABI, 
SOUTHERN DELIGHTS, 
TASTE OF DILLI)<br>
3. <b>MENU</b> OF FOOD
<strong>(on the <b>real time</b>, Wanna eat?)
(BREAKFAST, LUNCH, DINNER)</strong><br>
4. CLASSROOM LOCATOR
<strong>(every students needed for study...)</strong><br>
5. CLASSTEACHER AND CR POINTER
<strong>(any complaint about another student 
who is out of your class, Well..
you can find his/her class teacher!)</strong><br>
6. MAIL TO CR/CLASS TEAHCER
<strong>(if you needed a help and you cant reach out
to your CR or Class Teacher,
Here we are for your help!)</strong><br>
7. ANY COMPLAINT
<b>Hey, Listen your problem means my problem!</b>
<strong>(you can freely tell us, beacuse we are here 
to help you and reach out through your 
problem, and fell free to message up BUDDY...)</strong><br>
8. HOSTEL REVIEWS
(we dont care if you want to take hostel!
<b>Hey, Listen first see, it has some restriction!<b>)<br>
9. <B>ATTENDANCE</B> CALCULATOR
(do you also want to know how much 
leave you can take?)<br>
<B>10. AND SOME HIDDEN GEMS !
(if you want to try here, here is your way
CONFIDENTIAL CONFESSION is all over now)
</B>
		</pre>
	</div>
	<center><button onclick="window.location.href='signup/signup.php';" id="login">SIGNUP</button></div></center>
	<h4 id="dis">DISCLAIMER!</h4>
	<p id="esy">Hey, buddy come here dont tell to anyone we have everything you needed come join us!</p>
	<pre id="esy">DON'T WORRY ABOUT PRIVACY...</pre>
</body>
</html>
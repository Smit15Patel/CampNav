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
            "I told my vegetarian friend a joke with eggs, and they cracked up while saying, 'At least it's not non-veg!'",
            "What do you call a vegetarian who accidentally eats eggs? An 'over-easy' convert!");
			$randomIndex= rand(0,count($Str)-1);
			$randomStr = $Str[$randomIndex];
			echo $randomStr;
		?>
	</div><BR>
    <div id="salutation">
		<?php
        	date_default_timezone_set('Asia/Calcutta');
			$hour = date('G');
			if( $hour >= 7 && $hour <= 9){
				echo "GOOD MORNING Dear!\n";
				echo "\nChecking for Breakfast?\n";
			} else if ($hour >= 9 && $hour <= 13){
				echo "GOOD AFTERNOON Bro!\n";
				echo "\nChecking for Lunch?\n";
			} else if ($hour >= 13 || $hour <= 21) {
				echo "GOOD EVENING Buddy!\n";
				echo "\nLooking for Dinner?\n";
			}
        ?>
	</div>
    <div id="para">
        <h2>PUNJABI FOODCOURT</h2>    
        <h3>NON VEG FOOD MENU</h3>   
        <table>
            <tr>
                <th>Breakfast</th>
                <th>
                    <?php
                        $currentDateTime = new DateTime('now');
                        $currentDate = $currentDateTime->format('Y-m-d');
                        $conn = new mysqli("localhost:3307", "root", "", "menu");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } 
                        $sql = "SELECT Breakfast FROM punjabi_menu WHERE today_date='$currentDate'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            echo $row["Breakfast"];
                        } else{
                            echo "Not decided";
                        } 
                        $conn->close();
                    ?>
                </th>
            </tr>
            <tr>
                <th>Lunch</th>
                <th><?php
                        $currentDateTime = new DateTime('now');
                        $currentDate = $currentDateTime->format('Y-m-d'); 
                        $conn = new mysqli("localhost:3307", "root", "", "menu");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } $sql = "SELECT Lunch FROM punjabi_menu WHERE today_date='$currentDate'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            echo $row["Lunch"];
                        } else{
                            echo "Not decided";
                        } 
                        $conn->close();
                    ?></th>
            </tr>
            <tr>
                <th>Dinner</th>
                <th><?php
                        $currentDateTime = new DateTime('now');
                        $currentDate = $currentDateTime->format('Y-m-d'); 
                        $conn = new mysqli("localhost:3307", "root", "", "menu");
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        } $sql = "SELECT Lunch FROM punjabi_menu WHERE today_date='$currentDate'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0){
                            $row = $result->fetch_assoc();
                            echo $row["Lunch"];
                        } else{
                            echo "Not decided";
                        } 
                        $conn->close();
                    ?></th>
            </tr>
        </table>   
    </div>
	<br>
    <center><button onclick="window.location.href='NV_PF_TR.php'" type="button" id="btnn">CHECK REVIEW</button>
    <button onclick="window.location.href='NV_PF_GR.php'" type="button" id="btnn">GIVE REVIEW</button>
    <div id="btn"><button onclick="window.location.href='/../app/HOME/Features/food/PF/PF.php'" id="login">BACK</button></div></center>
	
	<h4 id="dis">DISCLAIMER!</h4>
	<CENTER><pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE></CENTER>
	<center><div id="btn"><button onclick="window.location.href='/../app/login/logout.php'" id="login">SIGNOUT</button></div></center>
	<br>
</body>
</html>
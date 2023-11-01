<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Faculty Locator</title>
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
	</div>
    <br>
	<div id="para">
        <h2>FACULTY CABIN LOCATOR</h2>
        <form method="POST" action="">
            <input type="text" id="lbl1" name="pro_name" placeholder="ENTER HERE FACULTY NAME..." ><br><br>
            <input type="text" id="lbl1" name="pro_profession" placeholder="CLASS TEACHER OF..." ><br><br>
            <center><button type="submit" id="login" name="login_btn">Submit</button></center>
        <br>
		<table>
			<tr>
				<th>Professor Name:</th>
				<th><?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = strtoupper($_POST["pro_name"]);
						$class_of = $_POST["pro_profession"];
						if(!empty($name) ){	
							$conn = new mysqli("localhost:3307", "root", "", "camp_nav");
							if ($conn->connect_error) {
								die("Connection failed: " . $conn->connect_error);
							}
							$sql = "SELECT Prof_name FROM prof_info WHERE Prof_name LIKE'% $name %'";
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								while($row = $result->fetch_assoc()){
									$name = $row["Prof_name"];
									echo "\n$name,\n";}
							} else {
								echo "\nFaculty not found. \n";
							}
							$conn->close();
						}
					}
					?>
					</th>
			</tr>
			<tr>
				<th>Email ID:</th>
				<th>
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = strtoupper($_POST["pro_name"]);
						$class_of = $_POST["pro_profession"];

						$conn = new mysqli("localhost:3307", "root", "", "camp_nav");

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT Prof_mail_id FROM prof_info WHERE Prof_name LIKE'% $name %' ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$mail = $row["Prof_mail_id"];
								echo "\n$mail\n";
							}
						} else {
							echo "\nFaculty not found.\n";
						}
						$conn->close();
					}
					?>
				</th>
			</tr>
			<tr>
				<th>Cabin No.:</th>
				<th><?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = $_POST["pro_name"];
						$class_of = $_POST["pro_profession"];

						$conn = new mysqli("localhost:3307", "root", "", "camp_nav");

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT Prof_Cabin FROM prof_info WHERE Prof_name LIKE'% $name %' ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$cabin = $row["Prof_Cabin"];
								echo "\n$cabin\n";}
						} else {
							echo "\nFaculty not found.\n";
						}

						$conn->close();
					}
					?></th>
			</tr>
			<tr>
				<th>Class Teacher Of:</th>
				<th><?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {
						$name = $_POST["pro_name"];
						$class_of = $_POST["pro_profession"];

						$conn = new mysqli("localhost:3307", "root", "", "camp_nav");

						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						$sql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
						$result = $conn->query($sql);

						if ($result->num_rows > 0) {
							while($row = $result->fetch_assoc()){
								$profession = $row["Prof_Class_Teach"];
								echo "\n$profession\n";}
						} else {
							echo "\nFaculty not found.\n";
						}

						$conn->close();
					}
					?></th>
			</tr>
		</table>
		<br>
		<div id="rightNow">
			<?php 
				if ($_SERVER["REQUEST_METHOD"] == "POST") {
					$name = $_POST["pro_name"];
					$class_of = $_POST["pro_profession"];

					$conn = new mysqli("localhost:3307", "root", "", "camp_nav");

					if ($conn->connect_error) {
						die("Connection failed: " . $conn->connect_error);
					}

					$sql = "SELECT Prof_mail_id FROM prof_info WHERE Prof_name LIKE'% $name %' ";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
						$row = $result->fetch_assoc();
						$mail = $row["Prof_mail_id"];
						date_default_timezone_set('Asia/Calcutta');
						$time= date('H:i');
						//echo ("\n$time \n");
						$datetime = DateTime::createFromFormat('YmdHi', '201308131830');
						$day = "Wed";//$datetime->format('D');
						if($day == 'Mon'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30')
							{$mysql = "SELECT P4 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30')
							{$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_cabin_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from monday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
						elseif($day == 'Tue'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30'){
								$mysql = "SELECT P4 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30'){
								$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_Class_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from tuesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
						elseif($day == 'Wed'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30'){
								$mysql = "SELECT P4 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30'){
								$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_Class_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from wednesday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
						elseif($day == 'Thru'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30'){
								$mysql = "SELECT P4 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30'){
								$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_Class_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from thrusday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
						elseif($day == 'Fri'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30'){
								$mysql = "SELECT P4 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30'){
								$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_Class_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from friday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
						elseif($day == 'Sat'){
							if ($time >='8:30'){
								echo"\nRight now the Professor are in there cabin.\n";
							} elseif ($time <='8:30' && $time >='9:30'){
								$mysql = "SELECT P1 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P1"];
									echo "\n$class\n";
								}
								echo"\nThis is first period\n";
							} elseif ($time >='9:30' && $time <='10:30'){
								$mysql = "SELECT P2 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P2"];
									echo "\n$class\n";
								}
								echo"\nThis is Second period\n";
							} elseif ($time >='10:30' && $time <='11:30'){
								$mysql = "SELECT P3 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P3"];
									echo "\n$class\n";
								}
								echo"\nThis is Thrid period\n";
							} elseif ($time >='11:30' && $time <='12:30'){
								$mysql = "SELECT P4 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P4"];
									echo "\n$class\n";
								}
								echo"\nThis is Fourth period\n";
							} elseif ($time >='12:30' && $time <='13:30'){
								$mysql = "SELECT Prof_Class_Teach FROM prof_info WHERE Prof_name LIKE'% $name %' ";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["Prof_Class_Teach"];
									echo "\n$class\n";
								}
								echo"\nThis is Lunch Time\n";
							} elseif ($time >='13:30' && $time <='14:30'){
								$mysql = "SELECT P5 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P5"];
									echo "\n$class\n";
								}
								echo"\nThis is Fith Period\n";
							} elseif ($time >='14:30' && $time <='15:30'){
								$mysql = "SELECT P6 from saturday_tt where Prof_mail_id ='$mail'";
								$my_result = $conn->query($mysql);
								if ($my_result->num_rows>0){
									$row = $my_result->fetch_assoc();
									$class = $row["P6"];
									echo "\n$class\n";
								}
								echo"\nThis is sixth Period\n";
							}else{
								echo"\nRight now teacher are went to there HOME.\n";
							}
						}
					} else {
						echo "\nFaculty not found.\n";
					}

					$conn->close();
				}
			?>
		</div>
    </div>
	<pRE id="esy">
DUE TO ABSENCE OF PROFESSOR IF WE 
COUDN'T FIND IT PLEASE FORGIVE US...</pRE>
	<br>
	
	<center><a href="/../app/HOME/upal.php" id="href">BACK</a></center>
	<h4 id="dis">DISCLAIMER!</h4>
	<pRE id="esy">DON'T WORRY ABOUT PRIVACY...</pRE>
	<center><a href="/../app/login/logout.php" id="href">LOGOUT</a></center>
	<br>
</body>
</html>
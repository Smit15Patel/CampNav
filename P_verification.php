<?php
session_start();
$mail = $_POST['mail'];

$con = new mysqli("localhost:3307", "root","", "camp_nav");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
} else{
    $stmt = $con->prepare("SELECT * FROM prof_info WHERE Prof_mail_id = ?");
    $stmt->bind_param("i",$mail);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data=$stmt_result->fetch_assoc();
        $_SESSION["mail"] = $mail;
        header('Location:/../app/HOME/upal.php');//put prof page
    } else{
        echo '<script>alert("Your Mail is Incorrect Sorry Sir/Madam!")</script>';
        header('Location:/../app/login/login.php');
    }
}

?>
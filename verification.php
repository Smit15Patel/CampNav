<?php
session_start();
$reg_id = $_POST['reg_id'];
$password = $_POST['pass'];

$con = new mysqli("localhost:3307", "root","", "camp_nav");
if($con->connect_error){
    die("Failed to connect : ".$con->connect_error);
} else{
    $stmt = $con->prepare("SELECT * FROM user_infos WHERE user_reg__id = ?");
    $stmt->bind_param("i",$reg_id);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){
        $data=$stmt_result->fetch_assoc();
        if($data['user_password'] === $password){
            $_SESSION["id"] = $reg_id;
            header('Location:/../app/HOME/upal.php');
        } else {
            echo '<script>alert("Your Phone Number or Password is Incorrect!")</script>';
            header('Location:/../app/login/login.php');
        }
    } else{
        echo '<script>alert("Your Phone Number or Password is Incorrect!")</script>';
        header('Location:/../app/login/login.php');
    }
}

?>
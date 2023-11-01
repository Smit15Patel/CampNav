<?php
$user_nam = $_POST['name'];
$user_regno = $_POST['reg_id'];
$user_phoneno = $_POST['phoneno'];
$user_mail = $_POST['mail'];
$user_pas = $_POST['pass'];

if(!empty($user_nam) || !empty($user_regno) || !empty($user_phoneno) || !empty($user_mail) || !empty($user_pas)){
    $domains = array('bca.christuniversity.in');
    $pattern = "/^[a-z0-9._%+-]+@[a-z0-9.-]*(" . implode('|', $domains) . ")$/i";
    if (preg_match($pattern, $user_mail)) {
        echo 'valid';
        $host = "localhost:3307";
        $dbUsername = "root";
        $dbPassword = "";
        $dbname = "camp_nav";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
        } else {
            $SELECT = "SELECT user_phone_no From user_infos Where user_phone_no = ? Limit 1";
            $INSERT = "INSERT Into user_infos (user_name,user_reg__id, user_mail_id, user_phone_no , user_password) values(?,?,?,?,?)";

            $stmt = $conn->prepare($SELECT);
            $stmt->bind_param("i",$user_phoneno);
            $stmt->execute();
            $stmt->bind_result($user_phoneno);
            $stmt->store_result();
            $rnum = $stmt->num_rows;

            if($rnum==0){
                $stmt->close();
                $stmt = $conn->prepare($INSERT);
                $stmt->bind_param("sisis",$user_nam,$user_regno,$user_mail,$user_phoneno,$user_pas);
                $stmt->execute();
                echo '<script>alert("Your Phone Number is register now you can Login")</script>';
                header("location: /../app/login/login.php");
                
            } else{
                
                echo '<script>alert("Someone already resgister using this Phone Number")</script>';
                echo '<script>window.history.back();</script>';
                
            }
            $stmt->close();
            $conn->close();
        }
    } else {
        echo '<script>alert("You are not Christie")</script>';
        echo '<script>window.history.back();</script>';
    }
} else{
    echo '<script>alert("All field are required")</script>';
    die();
}

?>
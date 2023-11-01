<?php
    $Held_food = $_POST['Held_food'];
    $bool = $_POST['bool'];
    $more = $_POST['more'];
    //$reg_id = $_SESSION["id"];
    if(!empty($Held_food) || !empty($bool) || !empty($more) ){
        $conn = new mysqli("localhost:3307", "root", "", "review_food");
        if (mysqli_connect_error()){
            die('Connect Error('.mysqli_connect_error().')'.mysqli_connect_error());
        } else {
            $sql = "INSERT INTO punjabi_review(heeld_food, bool, more) VALUES ('$Held_food', '$bool', '$more')";
            if ($conn->query($sql) === TRUE) {
                header("location: ./NV_SD_TR.php");
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
            $conn->close();
        }
    }
    ?>
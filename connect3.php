<?php
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $passwordh = password_hash($password,PASSWORD_BCRYPT); 
    //echo $passwordh;

    $conn = new mysqli('127.0.0.1','root','mysqlroot@1234567', 'test');
        if($conn->connect_error){
        die('connection error:'.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into user2(username, email, password, confirmpassword) values(?,?,?,?)");
        if (!$stmt) {
            die('Error preparing statement: ' . $conn->error);
        }
        $stmt->bind_param("ssss",$username,$email,$passwordh,$confirmPassword);
        $stmt->execute();
        echo "sign up succesfull...";
        echo "Sign up successful. <a href='login3.html'>Click here</a> to go to the homepage.";        
        $stmt->close();
        $conn->close();
    }
?>
<?php
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password']; // Password entered by user

    $conn = new mysqli('127.0.0.1','root','mysqlroot@1234567', 'test');
    if($conn->connect_error){
        die('connection error: '.$conn->connect_error);
    } else {
        // Prepare and execute the query to retrieve the hashed password from the database
        $stmt = $conn->prepare("SELECT password FROM user2 WHERE username = ?");
        $stmt->bind_param("s", $inputUsername);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $row = $result->fetch_assoc();
            $storedPassword = $row['password']; // The hashed password retrieved from the database
            echo $storedPassword;
            // Verify the password
            if (password_verify($inputPassword, $storedPassword)) {
                // Password is correct
                header("Location:home.php");
            } else {
                // Password is incorrect
                echo "Incorrect username or password.";
            }
        } else {
            // No user found with the given username
            echo "Incorrect username or password.";
        }

        $stmt->close();
        $conn->close();
    }
?>
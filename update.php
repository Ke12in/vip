<?php
    require_once("connection.php");

    if (isset($_POST['update'])) 
    {   
        $user_id = mysqli_real_escape_string($con, $_GET['GetID']);
        $first = mysqli_real_escape_string($con, $_POST['first']); 
        $last = mysqli_real_escape_string($con, $_POST['last']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $repassword = mysqli_real_escape_string($con, $_POST['repassword']);

        if ($password !== $repassword) 
        {
            echo "Passwords do not match!";
        }
        else 
        {
 
            if (!password_verify($password, $current_password)) { 
                $hashedpassword = password_hash($password, PASSWORD_DEFAULT);
            } else {
                $hashedpassword = $password; 
            }

            $query = "UPDATE register SET first = '$first', last = '$last', email = '$email', password = '$hashedpassword' WHERE user_id = '$user_id'";
            $result = mysqli_query($con, $query);

            if ($result) 
            {
                header("Location: view.php");
                exit(); 
            }
            else
            {
                echo "Query failed: " . mysqli_error($con);
            }
        }
    } 
    else 
    {
        header("Location: view.php");
        exit(); 
    }
?>

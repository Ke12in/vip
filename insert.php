<?php
require_once("connection.php"); 

if (isset($_POST['submit'])) 
{
    if (empty($_POST['first']) || empty($_POST['last']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['repassword'])) 
    {
        echo "PLEASE FILL OUT ALL FIELDS";
    } 
    else 
    {

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

            $hashedpassword = password_hash($password, PASSWORD_DEFAULT);

            $query = "INSERT INTO register (first, last, email, password) VALUES ('$first', '$last', '$email', '$hashedpassword')";
            $results = mysqli_query($con, $query);

            if ($results) 
            {

                header("Location: view.php");
                exit();
            } 
            else 
            {
                echo "There was an error: " . mysqli_error($con);
            }
        }
    }
} 
else 
{
    header("location: register.html");
}
?>

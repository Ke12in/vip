<?php
require_once("connection.php");

if (isset($_GET['Del'])) 

{
   
    $user_id = mysqli_real_escape_string($con, $_GET['Del']);

    $query = "DELETE FROM register WHERE user_id = '".$user_id."'";

    $result = mysqli_query($con, $query);

    if ($result) {
        header("Location: view.php");
        exit(); 
    } else {
        echo "Query failed: " . mysqli_error($con);
    }
}

else
 
{
header("Location: view.php");
exit(); 
}

?>
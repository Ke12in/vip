<?php
    $con = mysqli_connect("127.0.0.1:3307", "kel-rt", "Kelvin18", "crud");
    
    if(!$con){
        die("Connection Error").mysqli_error();
    }
?>
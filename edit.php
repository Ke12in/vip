<?php
    require_once("connection.php");

    $UserID = $_GET['GetID'];

    $query = "SELECT * FROM register WHERE user_id = '".$UserID."'";
    $results = mysqli_query($con, $query); 

    while($row = mysqli_fetch_assoc($results))
        {
            $UserID = $row['user_id'];
            $FirstName = $row['first'];
            $LastName = $row['last'];
            $Email = $row['email'];
            $password = $row['password']; 
        }        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Registration Form</title>
    <link rel="stylesheet" href="./view.css">
</head>
<body>
    <div class="main">
        <h2>Update Registration Form</h2>
        <form action="update.php?GetID=<?php echo $UserID; ?>" method="post">
            <input type="hidden" name="user_id" value="<?php echo $UserID ?>">

            <div class="row">
                <div class="column">
                    <label for="first">First Name:</label>
                    <input type="text" id="first" name="first" value="<?php echo $FirstName ?>" required>
                </div>
                <div class="column">
                    <label for="last">Last Name:</label>
                    <input type="text" id="last" name="last" value="<?php echo $LastName ?>" required>
                </div>
            </div>
                <div class="column">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $Email ?>" required>
                </div>
            </div>

            <div class="row">
                <div class="column">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" pattern="^(?=.*\d)(?=.*[a-zA-Z])(?=.*[^a-zA-Z0-9])\S{8,}$" title="Password must contain at least one number, one alphabet, one symbol, and be at least 8 characters long" required>
                </div>
                <div class="column">
                    <label for="repassword">Re-type Password:</label>
                    <input type="password" id="repassword" name="repassword" required>
                </div>
            </div>
            <button type="submit" name="update">Update</button>
        </form>
    </div>
</body>
</html>

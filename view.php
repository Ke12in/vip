<?php
    require_once("php/connection.php"); 
    $query = "SELECT * FROM register";
    $result = mysqli_query($con, $query); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Registration Page</title>
    <link rel="stylesheet" href="./view.css">
</head>
<body>
    <div class="main">
        <div class="header">
            <h2>View Page</h2>
            <button type="button" name="submit" onclick="window.location.href='register.html'">+ Add New Record</button>
        </div>
        <P></p>
        <div class="table-container">
            <table>
                <tr>
                    <th>User_Id</th>
                    <th>First_Name</th>
                    <th>Last_Name</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>  
                <?php
                    while($row = mysqli_fetch_assoc($result))
                    {
                        $UserID = $row['user_id'];
                        $FirstName = $row['first'];
                        $LastName = $row['last'];
                        $Email = $row['email'];
                        ?>

                        <tr>
                            <td><?php echo $UserID ?></td>
                            <td><?php echo $FirstName ?></td>
                            <td><?php echo $LastName ?></td>
                            <td><?php echo $Email ?></td>
                            <td>
                            <button class="action-btn"><a href="edit.php?GetID=<?php echo $UserID?>">Edit</a></button>
                            |
                            <button class="delete-btn"><a href="delete.php?Del=<?php echo $UserID?>">Delete</a></button>
                            </td>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</body>
</html>

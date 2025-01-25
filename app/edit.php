<?php

// Include the database connection file
require_once "init.php";

// Get id from URL parameter
$id = $_GET['id'];


// Select data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM users WHERE id = $id");

// Fetch the next row of a result set as an associative array
$resultData = mysqli_fetch_assoc($result);

$name = $resultData['name'];
$age = $resultData['age'];
$email = $resultData['email'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Page</title>
</head>
<body>
    <h2>Welcome to</h2>
    <h4>Edit User Data Page</h4>
    <p>
        <a href="../public/index.php">Home</a>
    </p>
    <form action="editAction.php" method="post" name="edit">
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" value="<?php echo $name ?>"></td>
            </tr>
            <tr>
                <td>Age</td>
                <td><input type="number" name="age" value="<?php echo $age?>"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="text" name="email" value="<?php echo $email?>"></td>
            </tr>
            <tr>
                <td><input type="hidden" name="id" value="<?php echo $id?>"></td>
                <!-- jadi btn submit nanti kalo di submit maka data akn di kirim ke action yang ada di form -->
                <td><input type="submit" name="update" value="update"></td>
            </tr>
        </table>
    </form>
</body>
</html>
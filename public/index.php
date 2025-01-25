<?php 

// ambil koneksi ke database lewat init
require_once "../app/init.php";

// Fetch data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM users ORDER BY id DESC");
?>



<!-- bikin tampilan index pakai html -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOMEPAGE</title>
</head>
<body>
   <h2>Home Page</h2>
<p>
<a href="../app/add.php">tambah data</a>
</p>
<table width="80" border="0">
    <tr>
        <!-- th => table header (yang bagian atas) -->
        <th><strong>Name</strong></th>
        <th><strong>Age</strong></th>
        <th><strong>Email</strong></th>
        <th><strong>Action</strong></th>
    </tr>

    <?php
    	// Fetch the next row of a result set as an associative array
        while($res = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>".$res['name']."</td>";
            echo "<td>".$res['age']."</td>";
            echo "<td>".$res['email']."</td>";
            // button edit
            echo "<td><a href=\"../app/edit.php?id=$res[id]\">Edit</a> | 
			<a href=\"../app/delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>"; // btn delete
        }
    ?>
</table>
</body>
</html>
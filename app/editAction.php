<?php

// Include the database connection file
require_once "init.php";

// memeriksa apakah form telah dikirim oleh user dengan tombol update
if (isset($_POST['update'])) {

    // Escape special characters in a string for use in an SQL statement
    // untuk validasi bersihin karakter mencurigakan(sql injection)
    $id = mysqli_real_escape_string($mysqli, $_POST['id']); //mysqli_real_escape_string() digunakan untuk mencegah SQL Injection dengan cara menghindari karakter khusus dalam inputan user yang dapat merusak atau memanipulasi query SQL.
    $name = mysqli_real_escape_string($mysqli, $_POST['name']); //mysqli_real_escape_string() digunakan untuk mencegah SQL Injection dengan cara menghindari karakter khusus dalam inputan user yang dapat merusak atau memanipulasi query SQL.
    $age = mysqli_real_escape_string($mysqli, $_POST['age']); //mysqli_real_escape_string() digunakan untuk mencegah SQL Injection dengan cara menghindari karakter khusus dalam inputan user yang dapat merusak atau memanipulasi query SQL.
    $email = mysqli_real_escape_string($mysqli, $_POST['email']); //mysqli_real_escape_string() digunakan untuk mencegah SQL Injection dengan cara menghindari karakter khusus dalam inputan user yang dapat merusak atau memanipulasi query SQL.

    // Check for empty fields
    // cek apakah ada salah satu atau lebih field yang kosong
    if (empty($name) || empty($age) || empty($email)) {
        if (empty($name)) {
            echo "<font color='red'>Name field is empty.</font><br/>";
        }
        if (empty($age)) {
            echo "<font color='red'>Age field is empty.</font><br/>";
        }
        if (empty($email)) {
            echo "<font color='red'>Email field is empty.</font><br/>";
        }
    } else {
        // update database table
        $result = mysqli_query($mysqli, "UPDATE users SET `name` = '$name', `age` = '$age', `email` = '$email' WHERE `id` = $id");
        // Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='../public/index.php'>View Result</a>";
    }
} 

?>
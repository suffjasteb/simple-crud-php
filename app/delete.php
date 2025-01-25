<?php
require_once "init.php";

// Get id parameter value from URL
$id = $_GET['id'];

$result = mysqli_query($mysqli, "DELETE FROM users WHERE id = $id");

// redirect ke home page
header("location:../public/index.php");
?>
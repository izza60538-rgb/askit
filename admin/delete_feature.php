<?php
include '../db.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM features WHERE id=$id");

header("Location: features.php");
?>
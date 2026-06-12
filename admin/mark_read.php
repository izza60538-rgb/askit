<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include '../db.php';

$id = intval($_POST['id']);

mysqli_query(
    $conn,
    "UPDATE enquiries
     SET read_status='Read'
     WHERE id=$id"
);

header("Location: admin_dashboard.php");
exit();
?>
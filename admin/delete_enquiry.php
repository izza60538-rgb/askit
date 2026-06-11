<?php

include '../db.php';

if(isset($_GET['id']))
{
    $id = (int)$_GET['id'];

    mysqli_query(
        $conn,
        "DELETE FROM enquiries WHERE id = $id"
    );
}

header("Location: admin_dashboard.php");
exit();

?>
<?php

include '../db.php';

$name = "Administrator";
$email = "admin@healthconnect.com";

$password = password_hash("admin123", PASSWORD_DEFAULT);

$sql = "INSERT INTO users(name,email,password,role)
VALUES('$name','$email','$password','admin')";

if(mysqli_query($conn,$sql))
{
    echo "Admin Created Successfully";
}
else
{
    echo "Error: " . mysqli_error($conn);
}

?>
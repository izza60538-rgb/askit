<?php

include 'db.php';

if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];

    $sql = "INSERT INTO enquiries
            (name,email,phone,message)
            VALUES
            ('$name','$email','$phone','$message')";

    if(mysqli_query($conn,$sql))
    {
        echo "Message Sent Successfully";
    }
    else
    {
        echo "Error : " . mysqli_error($conn);
    }
}

?>
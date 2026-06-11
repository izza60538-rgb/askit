<?php
session_start();

$error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST['email'];
    $password = $_POST['password'];

    // Fixed Admin Credentials
    $admin_email = "admin@healthconnect.com";
    $admin_password = "admin123";

    if ($email == $admin_email && $password == $admin_password) {

        $_SESSION['admin'] = $email;

        header("Location: admin_dashboard.php");
        exit();

    } else {
        $error = "Invalid Email or Password";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <style>

        body{
            font-family: Arial;
            background:#f4f4f4;
            display:flex;
            justify-content:center;
            align-items:center;
            height:100vh;
        }

        .login-box{
            background:white;
            padding:30px;
            width:350px;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.2);
        }

        input{
            width:100%;
            padding:10px;
            margin:10px 0;
        }

        button{
            width:100%;
            padding:10px;
            background:#007bff;
            color:white;
            border:none;
            cursor:pointer;
        }

        .error{
            color:red;
        }

    </style>

</head>
<body>

<div class="login-box">

    <h2>Admin Login</h2>

    <?php if($error){ ?>
        <p class="error"><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">

        <input
        type="email"
        name="email"
        placeholder="Admin Email"
        required>

        <input
        type="password"
        name="password"
        placeholder="Password"
        required>

        <button type="submit">
            Login
        </button>

    </form>

</div>

</body>
</html>
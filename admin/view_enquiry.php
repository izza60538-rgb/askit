<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include '../db.php';

$id = intval($_GET['id']);

$result = mysqli_query(
    $conn,
    "SELECT * FROM enquiries WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);

if(!$row){
    die("Enquiry not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>View Enquiry</title>

    <style>

        body{
            font-family:Arial;
            background:#f4f6f9;
            padding:30px;
        }

        .box{
            background:white;
            padding:30px;
            border-radius:10px;
            max-width:700px;
            margin:auto;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .btn{
            background:green;
            color:white;
            padding:10px 15px;
            border:none;
            border-radius:5px;
            cursor:pointer;
        }

        .back{
            background:#007bff;
            color:white;
            padding:10px 15px;
            text-decoration:none;
            border-radius:5px;
        }

    </style>
</head>
<body>

<div class="box">

    <h2>Enquiry Details</h2>

    <p><strong>Name:</strong> <?php echo $row['name']; ?></p>

    <p><strong>Email:</strong> <?php echo $row['email']; ?></p>

    <p><strong>Phone:</strong> <?php echo $row['phone']; ?></p>

    <p><strong>Message:</strong></p>

    <p><?php echo nl2br($row['message']); ?></p>

    <br>

    <form action="mark_read.php" method="POST">

        <input
        type="hidden"
        name="id"
        value="<?php echo $row['id']; ?>">

        <button class="btn" type="submit">
            Mark As Read
        </button>

    </form>

    <br>

    <a class="back" href="admin_dashboard.php">
        Back To Dashboard
    </a>

</div>

</body>
</html>
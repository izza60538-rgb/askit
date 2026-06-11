<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include '../db.php';

$result = mysqli_query(
    $conn,
    "SELECT * FROM enquiries ORDER BY id DESC"
);

if (!$result) {
    die("Database Error: " . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Dashboard</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, sans-serif;
        }

        body{
            background:#f4f6f9;
        }

        .sidebar{
            width:250px;
            height:100vh;
            background:#007bff;
            position:fixed;
            left:0;
            top:0;
            color:white;
        }

        .sidebar h2{
            text-align:center;
            padding:25px 0;
            border-bottom:1px solid rgba(255,255,255,0.2);
        }

        .sidebar ul{
            list-style:none;
        }

        .sidebar ul li a{
            display:block;
            padding:15px 20px;
            color:white;
            text-decoration:none;
        }

        .sidebar ul li a:hover{
            background:#0056b3;
        }

        .content{
            margin-left:250px;
            padding:30px;
        }

        .admin-info{
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        .card{
            background:white;
            padding:20px;
            border-radius:10px;
            margin-bottom:20px;
            box-shadow:0 2px 10px rgba(0,0,0,0.1);
        }

        table{
            width:100%;
            border-collapse:collapse;
            background:white;
        }

        table th{
            background:#007bff;
            color:white;
            padding:12px;
        }

        table td{
            padding:12px;
            border:1px solid #ddd;
        }

        .delete-btn{
            background:red;
            color:white;
            padding:8px 12px;
            text-decoration:none;
            border-radius:5px;
        }

        .delete-btn:hover{
            background:darkred;
        }

    </style>
</head>

<body>

<div class="sidebar">

    <h2>HealthConnect</h2>

    <ul>
        <li>
            <a href="admin_dashboard.php">
                Enquiries
            </a>
        </li>

        <li>
            <a href="logout.php">
                Logout
            </a>
        </li>
    </ul>

</div>

<div class="content">

    <div class="admin-info">
        <h2>Welcome <?php echo $_SESSION['admin_name']; ?></h2>
        <p>Email: <?php echo $_SESSION['admin_email']; ?></p>
    </div>

    <div class="card">
        <h3>
            Total Enquiries :
            <?php echo mysqli_num_rows($result); ?>
        </h3>
    </div>

    <table>

        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

        <tr>

            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['message']; ?></td>
            <td><?php echo $row['created_at']; ?></td>

            <td>
                <a
                class="delete-btn"
                href="delete_enquiry.php?id=<?php echo $row['id']; ?>"
                onclick="return confirm('Delete this enquiry?')">
                    Delete
                </a>
            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>
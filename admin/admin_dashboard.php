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

    <link rel="stylesheet" href="admin_style.css">
    
</head>

<body>

    <?php include 'sidebar.php'; ?>

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
            <th>Status</th>
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

                <?php
                if($row['read_status'] == 'Read'){
                    echo "<span style='color:green;font-weight:bold;'>Read</span>";
                } else {
                    echo "<span style='color:red;font-weight:bold;'>Unread</span>";
                }
                ?>

            </td>

<td>

    <a
    href="view_enquiry.php?id=<?php echo $row['id']; ?>"
    style="background:green;color:white;padding:8px 12px;text-decoration:none;border-radius:5px;">
        View
    </a>

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
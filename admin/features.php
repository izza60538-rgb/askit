<?php
session_start();

if(!isset($_SESSION['admin_id'])){
    header("Location: admin_login.php");
    exit();
}

include '../db.php';

$result = mysqli_query($conn, "SELECT * FROM features");
?>

<!DOCTYPE html>
<html>
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage Features</title>

    <link rel="stylesheet" href="admin_style.css">

</head>
<body>

<?php include 'sidebar.php'; ?>

<div class="content">

    <div class="page-header">

        <h2>Manage Features</h2>

        <a href="add_feature.php" class="add-btn">
            + Add Feature
        </a>

    </div>

    <table>

        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Title</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        <?php while($row = mysqli_fetch_assoc($result)){ ?>

        <tr>

            <td>
                <?php echo $row['id']; ?>
            </td>

            <td>

                <img
                src="../uploads/<?php echo $row['image']; ?>"
                alt="Feature Image"
                width="60"
                height="60"
                style="object-fit:cover;border-radius:8px;">

            </td>

            <td>
                <?php echo $row['title']; ?>
            </td>

            <td>
                <?php echo $row['description']; ?>
            </td>

            <td>

                <a
                href="edit_feature.php?id=<?php echo $row['id']; ?>"
                class="edit-btn">
                    Edit
                </a>

                <a
                href="delete_feature.php?id=<?php echo $row['id']; ?>"
                class="delete-btn"
                onclick="return confirm('Delete this feature?')">
                    Delete
                </a>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
    </html>
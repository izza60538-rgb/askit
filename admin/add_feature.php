<?php
session_start();

if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

include '../db.php';

if(isset($_POST['submit'])){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $_FILES['image']['name'];

    move_uploaded_file(
        $_FILES['image']['tmp_name'],
        "../uploads/".$image
    );

    mysqli_query(
        $conn,
        "INSERT INTO features(title,description,image)
        VALUES('$title','$description','$image')"
    );

    header("Location: features.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Feature</title>

    <link rel="stylesheet" href="admin_style.css">
</head>
<body>

    <?php include 'sidebar.php'; ?>

    <div class="content">

        <h2>Add Feature</h2>

        <form method="POST" enctype="multipart/form-data">

            <input
            type="text"
            name="title"
            placeholder="Feature Title"
            required>

            <br><br>

            <textarea
            name="description"
            placeholder="Description"
            required></textarea>

            <br><br>

            <input
            type="file"
            name="image"
            required>

            <br><br>

            <button
            type="submit"
            name="submit">
            Save
        </button>

    </form>

</div>

</body>
</html>
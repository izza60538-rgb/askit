<?php
include '../db.php';

$id = $_GET['id'];

$result =
mysqli_query(
    $conn,
    "SELECT * FROM features WHERE id=$id"
);

$row = mysqli_fetch_assoc($result);

if(isset($_POST['update'])){

    $title = $_POST['title'];
    $description = $_POST['description'];

    $image = $row['image'];

    if(!empty($_FILES['image']['name'])){

        $image = $_FILES['image']['name'];

        move_uploaded_file(
            $_FILES['image']['tmp_name'],
            "../uploads/".$image
        );
    }

    mysqli_query(
        $conn,
        "UPDATE features SET
        title='$title',
        description='$description',
        image='$image'
        WHERE id=$id"
    );

    header("Location: features.php");
}
?>
<link rel="stylesheet" href="admin_style.css">
<h2>Edit Feature</h2>

<form method="POST" enctype="multipart/form-data">

    <input
    type="text"
    name="title"
    value="<?php echo $row['title']; ?>">

    <br><br>

    <textarea
    name="description"><?php echo $row['description']; ?></textarea>

    <br><br>

    <img
    src="../uploads/<?php echo $row['image']; ?>"
    width="80">

    <br><br>

    <input
    type="file"
    name="image">

    <br><br>

    <button
    type="submit"
    name="update">
    Update
</button>

</form>
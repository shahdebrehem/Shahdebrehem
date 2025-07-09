<?php
include 'start.php';

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id = intval($_GET['id']);

    $result = $conn->query("SELECT * FROM tab_api WHERE id=$id");

    if($result && $result->num_rows > 0){
        $data = $result->fetch_assoc();
    } else {
        $message = "⚠ No user found with ID $id.";
        include 'error_modal.php';
        exit();
    }
} else {
    header("Location: view_page.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; text-align: center;}
        form { display: inline-block; background: #fff; padding: 30px; border-radius: 8px;
               box-shadow: 0 0 10px #ccc; }
        input, button { margin: 10px 0; padding: 10px; width: 250px; }
        button { background: #007BFF; color: #fff; border: none; }
        a { display: block; margin-top: 20px; text-decoration: none; }
    </style>
</head>
<body>

<h2>Edit User ID: <?php echo $data['id']; ?></h2>

<form action="updata_back.php" method="post">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="text" name="name" value="<?php echo $data['name']; ?>" required><br>
    <input type="number" name="age" value="<?php echo $data['age']; ?>" required><br>
    <button type="submit" name="update">Update User</button>
</form>

<a href="view_page.php">← Back to Users List</a>

</body>
</html>
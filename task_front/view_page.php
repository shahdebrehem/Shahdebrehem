<?php
include 'start.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>All Users</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f5f5f5; padding: 20px; text-align: center;}
        table { margin: auto; border-collapse: collapse; width: 80%; background: #fff; }
        th, td { padding: 12px; border: 1px solid #ccc; }
        th { background: #333; color: #fff; }
        tr:nth-child(even) { background: #f9f9f9; }
        form { margin: 10px auto; padding: 15px; background: #fff; width: 300px; border-radius: 6px; box-shadow: 0 0 10px #ddd; }
        input, button { margin: 5px 0; padding: 10px; width: 90%; }
        button { border: none; cursor: pointer; }
        .delete-btn { background: crimson; color: #fff; }
        .edit-btn { background: #007BFF; color: #fff; }
        .add-btn { background: green; color: #fff; padding: 12px 20px; text-decoration: none; border-radius: 6px; display: inline-block; margin-bottom: 20px;}
        a { display: inline-block; margin-top: 20px; text-decoration: none; }
    </style>
</head>
<body>

<h2>All Users</h2>

<!-- زر الإضافة -->
<a href="add_form.php" class="add-btn">➕ Add New User</a>

<table>
    <tr>
        <th>ID</th><th>Name</th><th>Age</th>
    </tr>

    <?php
    $result = $conn->query("SELECT * FROM tab_api");
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['age']."</td>
            </tr>";
        }
    }else{
        echo "<tr><td colspan='3'>No data found</td></tr>";
    }
    ?>
</table>

<br><br>

<!-- Delete Form -->
<form action="delete_back.php" method="post">
    <h3>Delete User</h3>
    <input type="number" name="id" placeholder="Enter User ID" required>
    <button type="submit" name="delete" class="delete-btn">Delete</button>
</form>

<!-- Edit Form -->
<form action="updata_form.php" method="get">
    <h3>Edit User</h3>
    <input type="number" name="id" placeholder="Enter User ID" required>
    <button type="submit" class="edit-btn">Edit</button>
</form>

</body>
</html>
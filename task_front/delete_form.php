<!DOCTYPE html>
<html>
<head><title>Delete User</title></head>
<body>
    <h2>Delete User</h2>
    <form action="delete_back.php" method="post">
        <input type="number" name="id" placeholder="User ID" required><br>
        <button type="submit" name="delete">Delete User</button>
    </form>
    <a href="view_page.php">View All Users</a>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add New User</title>
    <style>
        body {
            background: #f7f7f7;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
            width: 350px;
            text-align: center;
        }
        h2 {
            margin-bottom: 20px;
            color: #333;
        }
        input {
            width: 90%;
            padding: 12px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }
        button {
            background: #007BFF;
            color: #fff;
            border: none;
            padding: 12px;
            width: 95%;
            border-radius: 6px;
            cursor: pointer;
            font-size: 15px;
            margin-top: 10px;
        }
        button:hover {
            background: #0056b3;
        }
        a {
            display: inline-block;
            margin-top: 20px;
            color: #444;
            text-decoration: none;
            font-size: 14px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<div class="form-container">
    <h2>Add New User</h2>
    <form action="add_back.php" method="post">
        <input type="text" name="name" placeholder="Enter User Name" required>
        <input type="number" name="age" placeholder="Enter User Age" required>
        <button type="submit" name="add">Add User</button>
    </form>
    <a href="view_page.php">🔍 View All Users</a>
</div>

</body>
</html>
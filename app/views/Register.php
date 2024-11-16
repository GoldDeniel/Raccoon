<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div>
        <h1>Register</h1>
        <form action="/Raccoon/public/login" method="POST">
            
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" required>

            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Register</button>
        </form>
    </div>
</body>
</html>
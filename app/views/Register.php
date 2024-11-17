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
        <form action="/Raccoon/public/register/register" method="POST">
            
            <label for="first_name">First Name:</label>
            <input type="text" name="first_name" id="first_name" required>

            <label for="last_name">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required>

            <label for="username">Username:</label>
            <input type="username" name="username" id="username" required>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password" required>

            <button type="submit">Register</button>
            <?php if (isset($data['error'])): ?>
                <p style="color: red;"><?php echo htmlspecialchars($data['error']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
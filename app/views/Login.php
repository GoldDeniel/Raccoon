<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div>
    <h1>Login</h1>
    <?php if (isset($data['error'])): ?>
        <p style="color: red;"><?php echo htmlspecialchars($data['error']); ?></p>
    <?php endif; ?>
    <form action="#" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <br>
        <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
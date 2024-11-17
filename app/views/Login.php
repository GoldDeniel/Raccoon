<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div class="login-container">
        <h1 class="login-title">Login</h1>
        
        <form action="<?php echo ROOT ?>/login/login" method="POST" class="login-form">
            <label for="username" class="login-label">Username:</label>
            <input type="text" id="username" name="username" required class="login-input">
            <br>
            <label for="password" class="login-label">Password:</label>
            <input type="password" id="password" name="password" required class="login-input">
            <br>
            <button type="submit" class="login-button">Login</button>
            <?php if (isset($data['error'])): ?>
                <p class="login-error"><?php echo htmlspecialchars($data['error']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
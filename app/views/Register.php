<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/register.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div class="register-container">
        <h1 class="register-title">Register</h1>
        <form action="/Raccoon/public/register/register" method="POST" class="register-form">
            <label for="first_name" class="register-label">First Name:</label>
            <input type="text" name="first_name" id="first_name" required class="register-input">

            <label for="last_name" class="register-label">Last Name:</label>
            <input type="text" name="last_name" id="last_name" required class="register-input">

            <label for="username" class="register-label">Username:</label>
            <input type="text" name="username" id="username" required class="register-input">

            <label for="password" class="register-label">Password:</label>
            <input type="password" name="password" id="password" required class="register-input">

            <button type="submit" class="register-button">Register</button>
            <?php if (isset($data['error'])): ?>
                <p class="register-error"><?php echo htmlspecialchars($data['error']); ?></p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
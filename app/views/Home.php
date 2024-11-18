<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/home.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div class="home-title-container">
        <h1 class="home-title">Welcome to the Home Page</h1>
    </div>
    <div class="home-container">
        <div class="content">
            <h2 class="h2-title">If you have problems, you can send feedback to our system administrator:</h2>
            <form action="/Raccoon/public/home/createFeedback" method="post" class="feedback-form">
                <label for="email" class="feedback-label">Email:</label>
                <input type="email" name="email" id="email" required class="feedback-input">
                <label for="phone" class="feedback-label">Phone:</label>
                <input type="phone" name="phone" id="phone" class="feedback-input">
                <label for="message" class="feedback-label">Message:</label>
                <textarea name="message" id="message" required class="feedback-textarea"></textarea>
                <input type="submit" value="Send" class="feedback-submit">
            </form>
        </div>
    </div>
    <?php include_once '../app/views/elements/footer.php'; ?>
</body>
</html>
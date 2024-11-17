<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
<?php include_once '../app/views/elements/header.php'; ?>
    <h1 class="feed-title">Feed</h1>

    <div class="feed-container">
        <?php if (!empty($data['posts'])): ?>
            <?php foreach ($data['posts'] as $post): ?>
                <div class="post">
                    <h2 class="post-title"><?php echo htmlspecialchars($post->title); ?></h2>
                    <p class="post-content"><?php echo htmlspecialchars($post->content); ?></p>
                </div>
        <?php endforeach; ?>
        
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>

        <div class="message-box-container">
            <form action="/Raccoon/public/feed/create" method="POST">
                <label for="title" class="message-title-label">Title:</label>
                <input type="text" name="title" id="title" required class="message-title-input-text">
                <br>
                <label for="content" class="message-content-lable">Content:</label>
                <textarea name="content" id="content" required class="message-content-textarea"></textarea>
                <button type="submit" class="submit-button">Post</button>
            </form>
        </div>
    </div>
            

</body>
</html>
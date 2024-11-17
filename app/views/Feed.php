<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/feed.css">
</head>
<body>
<?php include_once '../app/views/elements/header.php'; ?>
    <center>
        <h1 class="feed-title">Feed</h1>
    </center>

    <div class="feed-container">
        <div class="posts-container">

        <?php if (!empty($data['posts'])): ?>
            <?php foreach ($data['posts'] as $post): ?>
                <div class="post">
                    <h2 class="post-title"><?php echo htmlspecialchars($post->title); ?></h2>
                    <p class="post-content"><?php echo htmlspecialchars($post->content); ?></p>
                    <p class="post-author"><?php echo htmlspecialchars($post->author); ?></p>
                    <p class="post-date"><?php echo htmlspecialchars($post->created_at); ?></p>
                </div>
        <?php endforeach; ?>
        
        <?php else: ?>
            <p>No posts available.</p>
        <?php endif; ?>

        </div>
        <div class="message-box-container">
            <form action="/Raccoon/public/feed/create" method="POST">
                <label for="title" class="message-title-label">Title:</label>
                <input type="text" name="title" id="title" required class="message-title-input-text">
                <br>
                <label for="content" class="message-content-lable">Content:</label>
                <textarea name="content" id="content" required class="message-content-textarea"></textarea>
                

                <center>
                    <button type="submit" class="submit-button"><?php include_once '../app/views/elements/raccoon.php'; ?>Post</button>
                </center>
            </form>
        </div>
    </div>    
    

            

</body>
</html>
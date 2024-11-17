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
    </div>
            

</body>
</html>
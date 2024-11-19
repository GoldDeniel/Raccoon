<!DOCTYPE html>
<html>
<head>
    <title>Comments</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/contacts.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <div class="contact-container">
        <div class="content">
            <h2 class="h2-title">Here you can see the contacts, which were sent by the users</h2>
        </div>
        <div class="comment-container">
            <?php if (!empty($data['comments'])): ?>
                <?php foreach ($data['comments'] as $comment): ?>
                    <div class="comments">
                        <?php if($comment->mobile == "-"): ?>
                            <h2 class="comment-title"><?php echo htmlspecialchars($comment->email); ?></h2>
                        <?php else: ?>
                            <h2 class="comment-title"><?php echo htmlspecialchars($comment->email . " (" . $comment->mobile . ")"); ?></h2>
                        <?php endif; ?> 
                        <p class="comment-content"><?php echo htmlspecialchars($comment->text); ?></p>
                        <p class="comment-author"><?php echo htmlspecialchars($comment->author); ?></p>
                        <p class="comment-date"><?php echo htmlspecialchars($comment->created_at); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <?php include_once '../app/views/elements/footer.php'; ?>
</body>
</html>
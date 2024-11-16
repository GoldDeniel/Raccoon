<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <?php include_once '../app/views/elements/header.php'; ?>
    <h1>Feed:</h1>

    <?php
    if(isset($_SESSION['user'])){
        echo "<h2>Welcome ".$_SESSION['user']['name']."</h2>";
    }
    else{
        echo "<h2>Log in to see the Feed</h2>";
    }
    ?>

    <?php foreach($data as $post): ?>
        <div class="post">
            <h2><?php echo $post['title']; ?></h2>
            <p><?php echo $post['content']; ?></p>
        </div>
    <?php endforeach; ?>

</body>
</html>
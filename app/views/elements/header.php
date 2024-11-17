
<header>
    <nav>
        <ul>
            <li><a href="/Raccoon/public/home">Home</a></li>
            <li><a href="/Raccoon/public/feed">Feed</a></li>
            <?php if(isset($_SESSION['username'])): ?>
                <span class="user-info-container"><span class="user-info-static">Logged in as:</span> <span class="user-info-full-name"><?php echo $_SESSION['last_name'].' '.$_SESSION['first_name'].' ('.$_SESSION['username'].')'?></span></span>
                <li><a href="/Raccoon/public/login/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/Raccoon/public/login">Login</a></li>
                <li><a href="/Raccoon/public/register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>


<header>
    <nav>
        <ul>
            <li><a href="/Raccoon/public/home">Home</a></li>
            <li><a href="/Raccoon/public/feed">Feed</a></li>
            <?php if(isset($_SESSION['username'])): ?>
                <li><a href="/Raccoon/public/logout">Logout</a></li>
            <?php else: ?>
                <li><a href="/Raccoon/public/login">Login</a></li>
                <li><a href="/Raccoon/public/register">Register</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

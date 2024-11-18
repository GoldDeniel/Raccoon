<header class="header">
    <nav class="nav">
        <div class="nav-container">
            <a class="nav-link" href="/Raccoon/public/home">Home</a>
            <a class="nav-link" href="/Raccoon/public/feed">Feed</a>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] == 2): ?>
                <a class="nav-link" href="/Raccoon/public/comments">Comments</a>
            <?php endif; ?>
            <?php if (isset($_SESSION['username'])): ?>
                <div class="user-info-container">
                    <span class="user-info-static">Logged in as:</span>
                    <span class="user-info-full-name"><?php echo $_SESSION['last_name'] . ' ' . $_SESSION['first_name'] . ' (' . $_SESSION['username'] . ')' ?></span>
                </div>
                <a class="nav-link" href="/Raccoon/public/login/logout">Logout</a>
            <?php else: ?>
                <a class="nav-link" href="/Raccoon/public/login">Login</a>
                <a class="nav-link" href="/Raccoon/public/register">Register</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<?php if (PERFORMANCE_MODE): ?>
    <script>
        window.onload = function() {
            const allElements = document.querySelectorAll('*');
            allElements.forEach(element => {
                const computedStyle = window.getComputedStyle(element);
                if (computedStyle.backdropFilter !== 'none') {
                    element.style.backdropFilter = 'none'; // Disable backdrop filter
                }
            });

            const blockElement = document.querySelector('.block');
            if (blockElement) {
                blockElement.style.animation = performanceModeEnabled ? 'none' : 'steam 20s linear infinite';
            }
        };
    </script>
<?php endif; ?>

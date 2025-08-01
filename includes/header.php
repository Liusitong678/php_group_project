<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Style Plus</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
    <header class="site-header">
        <div class="nav-container">
            <div class="logo">
                <a href="index.php">STYLE+</a>
            </div>

            <nav class="main-nav">
                <a href="index.php">Home</a>
            </nav>

            <div class="user-nav">
                <?php if (isset($_SESSION['user'])): ?>
                    <a href="logout.php">Logout</a>
                <?php else: ?>
                    <a href="login.php">Login</a>
                    <a href="register.php">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </header>

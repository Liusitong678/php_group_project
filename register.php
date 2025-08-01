<?php
session_start();
require_once 'includes/db.php';
?>

<div class="wrapper">
    <?php include 'includes/header.php'; ?>

    <main class="auth-main">
        <div class="auth-card">
            <h2>Create Account</h2>
            <p>Join Style Plus for the best shopping experience</p>

            <?php
            $errors = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = trim($_POST['username']);
                $email = trim($_POST['email']);
                $password = $_POST['password'];
                $confirmPassword = $_POST['confirm_password'];

                if (empty($username) || empty($email) || empty($password) || empty($confirmPassword)) {
                    $errors[] = "All fields are required.";
                } elseif ($password !== $confirmPassword) {
                    $errors[] = "Passwords do not match.";
                } else {
                    $stmt = $pdo->prepare("SELECT id FROM users WHERE username = ?");
                    $stmt->execute([$username]);
                    if ($stmt->fetch()) {
                        $errors[] = "Username already exists.";
                    } else {
                        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
                        $stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
                        $stmt->execute([$username, $email, $hashedPassword]);
                        header("Location: login.php");
                        exit;
                    }
                }
            }
            ?>

            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                <input type="email" name="email" placeholder="Email" value="<?= htmlspecialchars($_POST['email'] ?? '') ?>">
                <input type="password" name="password" placeholder="Password">
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <button type="submit" class="button">Register</button>
            </form>

            <p>Already have an account? <a href="login.php">Login Here</a></p>

            <?php foreach ($errors as $error): ?>
                <p style="color:red;"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</div>

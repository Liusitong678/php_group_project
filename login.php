<?php
session_start();
require_once 'includes/db.php';
?>

<div class="wrapper">
    <?php include 'includes/header.php'; ?>

    <main class="auth-main">
        <div class="auth-card">
            <h2>Welcome Back</h2>
            <p>Login to your Style Plus account</p>

            <?php
            $errors = [];
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = trim($_POST['username']);
                $password = $_POST['password'];

                if (empty($username) || empty($password)) {
                    $errors[] = "Please enter both username and password.";
                } else {
                    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
                    $stmt->execute([$username]);
                    $user = $stmt->fetch();

                    if ($user && password_verify($password, $user['password'])) {
                        $_SESSION['user'] = [
                            'id' => $user['id'],
                            'username' => $user['username'],
                            'role' => $user['role']
                        ];
                        header("Location: index.php");
                        exit;
                    } else {
                        $errors[] = "Invalid username or password.";
                    }
                }
            }
            ?>

            <form method="POST" action="">
                <input type="text" name="username" placeholder="Username" value="<?= htmlspecialchars($_POST['username'] ?? '') ?>">
                <input type="password" name="password" placeholder="Password">
                <button type="submit" class="button">Login</button>
            </form>

            <p>Don't have an account? <a href="register.php">Register Here</a></p>

            <?php foreach ($errors as $error): ?>
                <p style="color:red;"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    </main>

    <?php include 'includes/footer.php'; ?>
</div>

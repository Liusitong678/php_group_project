<?php
session_start();
require_once 'includes/db.php';
?>
<div class="wrapper">
    <?php include 'includes/header.php'; ?>

    <main>
        <!-- Banner Section -->
        <section class="hero-banner">
            <div class="banner-overlay">
                <h1>Find Your Perfect Style</h1>
                <p>New Arrivals & Best Deals</p>
            </div>
        </section>

        <!-- Product Grid Section -->
        <section class="product-section">
            <h2>Our Products</h2>
            <div class="product-grid">
                <?php
                $stmt = $pdo->query("SELECT * FROM products LIMIT 10");
                while ($product = $stmt->fetch()):
                ?>
                    <div class="product-card">
                        <div class="product-image-wrapper">
                            <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>">
                        </div>
                        <h3><?= htmlspecialchars($product['name']) ?></h3>
                        <p>$<?= $product['price'] ?></p>
                        <a class="button" href="product.php?id=<?= $product['id'] ?>">View Details</a>
                    </div>
                <?php endwhile; ?>
            </div>
        </section>
    </main>

    <?php include 'includes/footer.php'; ?>
</div>

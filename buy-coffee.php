<?php
session_start();
$products = [
    ["id" => 1, "name" => "Espresso", "price" => 100, "image" => "image/espresso.png"],
    ["id" => 2, "name" => "Cappuccino", "price" => 150, "image" => "image/cappuccino.png"],
    ["id" => 3, "name" => "Latte", "price" => 200, "image" => "image/latte.png"],
];


include 'connect.php';

$products = [];
$result = $conn->query("SELECT * FROM products");
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_to_cart"])) {

    $product_id = $_POST["product_id"];
    $product_quantity = $_POST["quantity"];
    

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = [];
    }
    

    if (isset($_SESSION["cart"][$product_id])) {
        $_SESSION["cart"][$product_id] += $product_quantity;
    } else {
        $_SESSION["cart"][$product_id] = $product_quantity;
    }
    

    echo "<script>alert('Product added to cart!');</script>";
    echo "<script>window.location.href = 'buy-coffee.php';</script>";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Coffee</title>
    <link rel="stylesheet" href="css/style-buy.css">

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<header class="header">
    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="#" class="logo">nuclear coffee <i class="fas fa-mug-hot"></i></a>

    <nav class="navbar">
        <a href="home.php" class="navbar-link">home</a>
        <a href="about.php" class="navbar-link">about</a>
        
        <a href="buy-coffee.php" class="navbar-link">buy</a>
        <a href="review.php" class="navbar-link">review</a>
        <a href="account-settings.php" class="navbar-link">Account</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php" class="navbar-link">logout</a>
        <?php else: ?>
            <a href="register-login.php" class="navbar-link">login</a>
        <?php endif; ?>
    </nav>


    <a href="<?php echo isset($_SESSION['user_id']) ? 'logout.php' : 'register-login.php'; ?>" class="btn">
        <?php echo isset($_SESSION['user_id']) ? 'Log Out' : 'Login'; ?>
    </a>
</header>

    <main>
        <h1>Buy Your Favorite Coffee</h1>
        <div class="products">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                    <h3><?php echo $product['name']; ?></h3>
                    <p>Price: PHP <?php echo $product['price']; ?></p>
                    <form method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                        <label for="quantity-<?php echo $product['id']; ?>">Quantity:</label>
                        <input type="number" name="quantity" id="quantity-<?php echo $product['id']; ?>" value="1" min="1" required>
                        <button type="submit" name="add_to_cart" class="btn">Add to Cart</button>
                    </form>
                </div>
            <?php endforeach; ?>
        </div>

        <section class="cart">
        <h2>Your Cart</h2>
        <?php
        if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
            $total_price = 0;
            foreach ($_SESSION["cart"] as $product_id => $quantity) {
                $result = $conn->query("SELECT * FROM products WHERE id = $product_id");
                $product = $result->fetch_assoc();
                $total_price += $product['price'] * $quantity;
                echo "<p>{$product['name']} x $quantity - PHP " . ($product['price'] * $quantity) . "</p>";
            }
            echo "<p><strong>Total: PHP $total_price</strong></p>";
            echo "<a href='checkout.php' class='btn'>Proceed to Checkout</a>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }
        ?>
    </section>

    </main>


     <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>
    <script src="js/script2.js"></script>
</body>
</html>

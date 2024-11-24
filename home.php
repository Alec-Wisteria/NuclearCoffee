
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee</title>


    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


    <link rel="stylesheet" href="css/style.css">

</head>

<body>

<?php session_start(); ?>

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






    <section class="home" id="home">
        <div class="row">
            <div class="content">
                <h3>fresh coffee in the morning</h3>
                <a href="buy-coffee.php" class="btn">buy one now</a>
            </div>

            <div class="image">
                <img src="image/home-img-1.png" class="main-home-image" alt="">
            </div>
        </div>

        <div class="image-slider">
            <img src="image/home-img-1.png" alt="">
            <img src="image/home-img-2.png" alt="">
            <img src="image/home-img-3.png" alt="">
        </div>
    </section>

    <section class="footer">
        <div class="box-container">
            <div class="box">
                <h3>our branches</h3>
                <a href="https://www.google.com/maps/place/STI+College+Fairview/@14.7154866,121.0610894,
                17z/data=!4m6!3m5!1s0x3397b08c3aa74213:0x325214dc350bb0d1!8m2!3d14.7160003!4d121.0614864!16s%2Fm%2F0cwtv
                0r?entry=ttu&g_ep=EgoyMDI0MTExOS4yIKXMDSoASAFQAw%3D%3D" target="_blank"><i class="fas fa-arrow-right"></i> Regalado</a>
            </div>

            <div class="box">
                <h3>quick links</h3>
                <a href="home.php"><i class="fas fa-arrow-right"></i> home</a>
                <a href="about.php"><i class="fas fa-arrow-right"></i> about</a>
                <a href="review.php"><i class="fas fa-arrow-right"></i> review</a>
                <a href="account-settings.php"><i class="fas fa-arrow-right"></i> account</a>
            </div>

            <div class="box">
                <h3>contact info</h3>
                <a href="#"><i class="fas fa-phone"></i> +639085747963</a>
                <a href="#"><i class="fas fa-phone"></i> +639944556927</a>
                <a href="#"><i class="fas fa-envelope"></i> nuclear.coffee@gmail.com</a>
            </div>
        </div>

        <div class="credit">created by <span>Alec Wisteria</span> | all rights reserved</div>
    </section>


    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>


    <script src="js/script.js"></script>

</body>

</html>

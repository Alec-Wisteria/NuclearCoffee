<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Review</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="css/style-review.css">

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
    
    <section class="review" id="review">
        <h1 class="heading">reviews <span>what people says</span></h1>

        <div class="swiper review-slider">
            <div class="swiper-wrapper">
                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="image/pic-1.jpeg" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>masarap BOSS!<br></p>
                    <h3>andrae panim</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="image/sir-sam.png" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Masarap yung kape kahit na mahal pero all goods lang. Dahil dyan may plus 20 ka sa peta</p>
                    <h3>Sir Sam</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="image/maam-lia.jpg" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>All goods yung kape lalo na kapag libre</p>
                    <h3>ma'am lia</h3>
                    <span>satisfied client</span>
                </div>

                <div class="swiper-slide box">
                    <i class="fas fa-quote-left"></i>
                    <i class="fas fa-quote-right"></i>
                    <img src="image/gyatnos.jpg" alt="">
                    <div class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Satisfied talaga ako kasi 2 days na akong walang tulog dahil sa kape</p>
                    <h3>Earvin Michael Santos</h3>
                    <span>satisfied client</span>
                </div>
            </div>
            <div class="swiper-pagination"></div>
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
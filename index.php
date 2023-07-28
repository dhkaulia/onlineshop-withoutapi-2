<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Welcome</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sacramento&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
        integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="css/home-style.css" />
</head>

<body>
    <div class="main-container">
        <video autoplay loop muted>
            <source src="videos/bg.mp4" type="video/mp4" />
        </video>

        <div class="bg-overlay"></div>

        <nav>
            <div class="logo">
                <a href="index.php"> Bs Collection </a>
            </div>

            <div class="menu-button">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 8h16M4 16h16" />
                </svg>
            </div>
        </nav>

        <header class="hero-section">
            <h1>Bs Collection</h1>
            <p>Muka Kuning, Batam. Open at 7A.M - 7P.M</p>
            <a href="home.php" class="btn">Mulai Berbelanja</a>
        </header>

        <div class="social">
            <a href="https://facebook.com">
                <i class="fab fa-facebook"></i>
            </a>

            <a href="https://instagram.com">
                <i class="fab fa-instagram"></i>
            </a>
        </div>
    </div>

    <div class="mobile-menu-items">
        <div class="close-button">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </div>

        <ul class="menu-items">
            <li>
                <a href="#">Home</a>
            </li>

            <li>
                <a href="#">Blog</a>
            </li>

            <li>
                <a href="#">About</a>
            </li>

            <li>
                <a href="#">Contact</a>
            </li>
        </ul>
    </div>

    <script src="main.js"></script>
</body>

</html>
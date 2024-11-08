<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
    @font-face {
        font-family: "Montelifa-gelista";
        src: url("./fonts/Montelifa-Gelista.otf") format("opentype");
    }

    :root {
        --header-bg-color: rgba(8, 30, 30, 0.8);
        --hero-bg-color: #7387bd;
        --text-color: #f4f3ef;
        --cta-bg-color: #f4f3ef;
        --mauve: #cfbaf0ff;
        --champagne-pink: #fde4cfff;
        --pink-lavender: #f1c0e8ff;
        --hitam: #060606;
        --coklat-tua: #bd8282;
        --biru-muda: #8aaeda;
        --biru-tua: #7387bd;
        --putih-bersih: #fff;
        --biru-muda1: #a6b3da;
    }

    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

    html,
    body {
        margin: 0;
        padding: 0;
        overflow-x: hidden;
        box-sizing: border-box;
    }

    *,
    *::before,
    *::after {
        box-sizing: inherit;
    }

    body {
        margin: 0;
        font-family: "Poppins", sans-serif;
        background-color: var(--biru-muda1);
        color: var(--text-color);
        display: flex;
        flex-direction: column;

    }

    .header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 20px 60px;
        position: fixed;
        top: 0;
        width: 100%;
        background-color: #06060666;
        z-index: 1000;
        backdrop-filter: blur(10px);
    }

    .logo img {
        width: 100px;
        height: auto;
    }

    .nav-menu {
        align-items: center;
        display: flex;
        gap: 56.3px;
    }

    .nav-item {
        color: var(--text-color);
        text-decoration: none;
        font-weight: 700;
    }

    .nav-item:hover {
        color: var(--biru-muda1);
    }

    .nav-menu .button {
        align-items: center;
        padding: 8px 16px;
        border: none;
        background-color: var(--biru-muda);
        color: #FFF;
        border-radius: 4px;
        cursor: pointer;
        text-decoration: none;
        margin-left: 8px;
    }

    .nav-menu .button:hover {
        background-color: var(--biru-tua);
    }

    .hero {
        display: flex;
        height: 100vh;
        padding: 0;
    }

    .hero-text {
        padding: 5vw;
        padding-left: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-right: 50px;
        background-color: var(--hero-bg-color);
    }

    .hero-heading {
        font-size: 65px;
        font-weight: 900;
        line-height: 78px;
        margin: 0;
        letter-spacing: -2.5px;
    }

    .hero-heading sup {
        font-family: "Montelifa-gelista", sans-serif;
        font-size: 40px;
        font-weight: 400;
        letter-spacing: -2.5px;
        vertical-align: top;
    }

    .hero-subheading {
        font-size: 16px;
        font-weight: 400;
        line-height: 22px;
        letter-spacing: 0.5px;
        margin: 20px 0;
        max-width: 500px;
    }

    .cta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: var(--biru-muda1);
        color: var(--text-color);
        padding: 10px 20px;
        border-radius: 10px;
        text-decoration: none;
        transition: background-color 0.3s;
        position: relative;
    }

    .cta:hover {
        color: var(--biru-tua);
        background-color: var(--cta-hover-bg-color);
    }

    .cta svg {
        margin-left: 8px;
        fill: white;
        transition: transform 0.2s;
        margin-left: auto;
    }

    .cta img {
        vertical-align: middle;
        padding-left: 5px;
    }

    .hero-image {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        overflow: hidden;
        position: relative;
    }

    .hero-image img {
        width: 100%;
        height: 100vh;
        object-fit: cover;
    }

    .hero-image img {
        position: relative;
        z-index: 0;
    }

    .background-video {
        position: absolute;
        top: 50;
        left: 50;
        width: 50%;
        height: auto;
        object-fit: cover;
        z-index: 1;
    }

    /* New Content Section */
    .content-section {
        background: linear-gradient(to bottom, var(--biru-muda1), var(--pink-lavender));
        padding: 50px;
        text-align: center;
    }

    .content-section h1 {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        color: var(--white-bg);
        font-size: 36px;
        margin-bottom: 20px;
    }

    .content-section p {
        color: var(--hitam);
        font-size: 21px;
        max-width: 800px;
        margin: 0 auto 15px;
        line-height: 1.6;
    }

    .gambar-konten {
        margin: 10px 10px 10px 0;
        flex-wrap: wrap;
        display: flex;
        gap: 5px;
        justify-content: center;
        align-items: flex-start;
    }

    .gambar-konten img {
        width: 200px;
        height: 200px;
        object-fit: cover;
        max-width: 30%;
        border-radius: 10px;
        width: 20%;
        margin: 10px;
        flex-basis: calc(25% - 20px);
    }

    .isi-konten {
        display: flex;
        justify-content: center;
        background-color: var(--mauve);
    }

    .teks-konten {
        padding-left: 20px;
        flex: 1;
        display: flex;
        flex-direction: column;
        justify-content: center;
        padding-right: 50px;
    }

    .teks-konten h2 {
        font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        text-align: center;
        font-size: 50px;
        margin-bottom: 10px;
        color: #5a416d;
    }

    .teks-konten p {
        color: #7387bd;
        font-size: medium;
        margin-left: 130px;
        text-align: center;
        max-width: 500px;
        font-weight: 600;
    }

    .gambar-isi-konten {
        flex: 1;
    }

    .gambar-isi-konten img {
        height: 100vh;
        width: 100%;
        object-fit: cover;
    }

    .gambar-isi-konten {
        position: relative;
        z-index: 0;
    }

    .button button {
        font-style: inherit;
        background-color: var(--hero-bg-color);
        color: var(--putih-bersih);
        border: none;
        padding: 10px 20px;
        text-align: center;
        font-size: 16px;
        border-radius: 10px;
        cursor: pointer;
        transition: background-color 0.3s;
        margin-left: 350px;
    }

    .image-banner h1 {
        color: #7387bd;
        font-size: 110px;
        font-weight: 900;
        letter-spacing: -4px;
        line-height: .8;
        text-transform: uppercase;
        text-align: center;
    }

    .info-section img {
        width: 100px;
    }

    .button button:hover {
        background-color: #5a416d;
    }

    .image-banner {
        text-align: center;
        padding: 50px;
        background-color: var(--champagne-pink);
    }

    .content-image-banner {
        background-color: var(--champagne-pink);
        position: relative;
        display: flex;
        justify-content: center;
    }

    .content-image-banner img {
        margin-bottom: 50px;
        max-width: 800px;
        height: auto;
        display: block;
    }

    .info-section {
        padding: 20px;
        text-align: center;
    }

    .cta-banner {
        display: inline-flex;
        align-items: center;
        text-decoration: none;
        color: #7387bd;
    }

    .overlay {
        margin-bottom: 200px;
        position: absolute;
        top: 0;
        left: 50%;
        width: 800px;
        height: 533.238px;
        display: flex;
        flex-direction: column;
        justify-content: center;
        align-items: center;
        color: white;
        text-align: center;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        margin: 0 auto;
        transform: translateX(-50%);
    }

    .overlay h1 {
        color: var(--white-bg);
        margin-bottom: 10px;
        font-size: 2rem;
    }

    .overlay p {
        font-size: 1em;
        margin: 10px 0;
    }

    .sign-in-button {
        margin-top: 10px;
        display: inline-block;
        padding: 10px 20px;
        background-color: var(--biru-tua);
        color: white;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .sign-in-button:hover {
        color: #060606;
        background-color: var(--biru-muda1);
    }

    /* Footer Styling */
    .footer {
        padding: 20px;
        background-color: #f3f3f3;
        border-top: 1px solid #ddd;
        width: 100%;
        box-sizing: border-box;
    }

    .menu-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding-left: 20px;
        padding-right: 20px;
        width: 100%;
    }

    .logo-footer {
        flex: 1;
        text-align: left;
    }

    .logo-footer img {
        height: 100px;

    }

    .footer .tentang-kami a {
        text-decoration: none;
        color: var(--hero-bg-color);
        font-weight: bold;
        flex: 1;
        text-align: center;
    }

    .footer .tentang-kami a:hover {
        text-decoration: underline;
        color: var(--coklat-tua) !important;

    }

    .footer-social {
        flex: 1;
        text-align: right;
    }

    .footer-social a {
        font-size: 20px;
        margin: 0 10px;
    }

    .footer-social a:hover {
        color: var(--coklat-tua) !important;
    }

    .copyright {
        font-size: 14px;
        color: #555;
        text-align: center;
        margin-top: 10px;
    }

    .hamburger {
        display: none;
        flex-direction: column;
        gap: 5px;
        cursor: pointer;
        position: absolute;
        top: 20px;
        right: 20px;
        z-index: 1001;
    }

    .hamburger div {
        width: 30px;
        height: 4px;
        background-color: var(--text-color);
        transition: 0.3s;
    }

    .nav-menu {
        display: flex;
        align-items: center;
        gap: 56.3px;
    }

    .nav-menu.active {
        display: flex;
    }

    @media (max-width: 768px) {
        .header {
            padding: 10px;
        }

        .logo img {
            width: 80px;
        }

        .nav-menu {
            display: none;
            position: absolute;
            top: 60px;
            left: 0;
            right: 0;
            background-color: rgba(8, 30, 30, 0.9);
            flex-direction: column;
            padding: 20px;
            z-index: 1000;
        }

        .nav-menu.active {
            pading: 20px;
            display: flex;
        }

        .hamburger {
            display: flex;
        }

        .logo img {
            width: 80px;
        }

        .nav-item {
            padding: 10px;
            color: var(--text-color);
        }

        .nav-item:hover {
            color: var(--biru-muda1);
        }

        .nav-menu .button {
            width: 100%;
            margin-top: 10px;
        }

        .hero {
            flex-direction: column;
            height: auto;
        }

        .hero-text {
            padding: 5vw;
            padding-left: 20px;
            padding-right: 20px;
        }

        .hero-heading {
            font-size: 36px;
        }

        .hero-subheading {
            font-size: 14px;
        }

        .cta {
            padding: 6px 12px;
        }

        .hero-image img {
            width: 100%;
            height: auto;
        }

        .background-video {
            width: 100%;
            height: auto;
        }

        .content-section {
            padding: 30px;
        }

        .content-section h1 {
            font-size: 28px;
        }

        .content-section p {
            font-size: 18px;
        }

        .gambar-konten {
            flex-wrap: wrap;
            justify-content: center;
        }

        .gambar-konten img {
            width: 100%;
            height: auto;
            max-width: 80%;
        }

        .teks-konten h2 {
            font-size: 36px;
        }

        .teks-konten p {
            font-size: 16px;
            margin: 0 20px;
            text-align: center;
        }

        .button button {
            font-size: 14px;
            margin-left: 0;
            width: 100%;
            padding: 10px 20px;
        }

        .footer {
            padding: 20px;
        }

        .menu-footer {
            flex-direction: column;
            text-align: center;
        }

        .footer-social {
            margin-top: 20px;
        }

        .footer-social a {
            font-size: 18px;
            margin: 0 10px;
        }

        .copyright {
            font-size: 12px;
        }

        .image-banner h1 {
            font-size: 20px;
            letter-spacing: 1px;
            line-height: 2rem;
        }

        .overlay p {
            width: 90px;
            font-size: 15px;
            word-wrap: break-word;
        }
    </style>

</head>

<body>
    <header class="header">
        <div class="logo">
            <img src="assets/logo.png" alt="ECHOARTWORKLogo" />
        </div>
        <nav class="nav-menu">
            <a href="help.php" class="nav-item">Help</a>
            <a href="#" class="nav-item">FAQ</a>
            <a href="logres.php">
                <button class="nav-item button">Login</button>
            </a>
            <a href="logres.php">
                <button class="nav-item button">Register</button>
            </a>
        </nav>
        <div class="hamburger">
            <i class="fas fa-bars"></i>
        </div>
    </header>
    <div class="hero">
        <div class="hero-text">
            <h1 class="hero-heading">
                ECHOARTWORK <sup>the</sup><br />NEW WAY<br />OF THE ART
            </h1>
            <p class="hero-subheading">
                Temukan inspirasi tanpa batas di EchoArtworks! Setiap karya membawa
                cerita unik yang siap untuk dijelajahi
            </p>
            <a href="#" class="cta">
                Jelajahi Koleksi
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14"
                    id="Magnifying-Glass--Streamline-Core" height="16" width="16">
                    <desc>
                        Magnifying Glass Streamline Icon: https://streamlinehq.com
                    </desc>
                    <g id="magnifying-glass--glass-search-magnifying">
                        <path id="Ellipse 651" fill="#8fbffa" d="M1 6a5 5 0 1 0 10 0A5 5 0 1 0 1 6" stroke-width="1">
                        </path>
                        <path id="Union" fill="#2859c5" fill-rule="evenodd"
                            d="M2 6c0 -2.20914 1.79086 -4 4 -4s4 1.79086 4 4 -1.79086 4 -4 4 -4 -1.79086 -4 -4Zm4 -6C2.68629 0 0 2.68629 0 6s2.68629 6 6 6c1.29578 0 2.49562 -0.4108 3.47642 -1.1092l2.81648 2.8165c0.3905 0.3905 1.0237 0.3905 1.4142 0 0.3905 -0.3905 0.3905 -1.0237 0 -1.4142l-2.8164 -2.81645C11.5892 8.49581 12 7.29588 12 6c0 -3.31371 -2.68629 -6 -6 -6Z"
                            clip-rule="evenodd" stroke-width="1"></path>
                    </g>
                </svg>
            </a>
        </div>
        <div class="hero-image">
            <video autoplay muted loop class="background-video">
                <source src="video/cewe.mp4" type="video/mp4" />
                Your browser does not support the video tag.
            </video>
            <img src="assets/pexels-karolina-grabowska-4862892.jpg " alt="Hero Image" />
        </div>
    </div>
    <div class="content-section">
        <h1>Mencari Sebuah Ide</h1>
        <p>
            Apa yang ingin kamu coba kali ini? Cari ide yang kamu minati, dan
            temukan inspirasi baru.
        </p>
        <div class="gambar-konten">
            <img src="assets/pexels-bt3gl-3894157.jpg" alt="gambar-konten" />
            <img src="assets/pexels-theshuttervision-18425133.jpg" alt="gambar-konten" />
            <img src="assets/pexels-hicret-159589735-29158931.jpg" alt="gambar-konten" />
            <img class="gambar-bawah" src="assets/pexels-lucasleonelsuarez-21358010.jpg" alt="gambar-konten-bawah" />
            <img class="gambar-bawah" src="assets/cewe.jpg" alt="gambar-konten-bawah" />
            <img class="gambar-bawah" src="assets/pexels-rbrigant44-747101.jpg" alt="gambar-konten-bawah" />
            <img class="gambar-bawah" src="assets/pexels-avyansh-mittal-242487266-15232115.jpg"
                alt="gambar-konten-bawah" />
            <img class="gambar-bawah" src="assets/pexels-alberto-cano-593119770-29181204.jpg"
                alt="gambar-konten-bawah" />
            <img class="gambar-bawah" src="assets/pexels-didsss-29142304.jpg" alt="gambar-konten-bawah" />
        </div>
    </div>
    <div class="isi-konten">
        <div class="gambar-isi-konten">
            <img src="assets/pexels-yulia-pribytkova-76505330-12748911.jpg" alt="gambar-isi-konten" />
        </div>
        <div class="teks-konten">
            <h2>Simpan Ide Yang Anda Suka</h2>
            <p>
                Bagian terbaik dari EchoArtworks adalah menemukan hal dan ide baru dari orang-orang di seluruh dunia.
            </p>
            <div class="button">
                <button onclick="window.location.href='index1.php'">Explore</button>
            </div>
        </div>
    </div>
    <div class="image-banner">
        <h1> Daftar Untuk Mendapatkan Ide Anda</h1>
    </div>
    <div class="content-image-banner">
        <img src="assets/burung.jpg" alt="Banner Image">
        <div class="overlay">
            <h1>Sign In Sekarang!</h1>
            <p>Lihat dan eksplor koleksi foto yang ada di EchoArtworks dan mulailah sukai apa yang kamu ingin cari,
                bergabunglah untuk melihat lebih banyak koleksi kami</p>
            <a href="logres.php" class="sign-in-button">Sign In</a>
        </div>
    </div>
    </div>

    <!-- Footer Section -->
    <div class="footer">
        <div class="menu-footer">
            <a href="" class="logo-footer"><img src="assets/logo.png" alt="logo"></a>
            <div class="tentang-kami">
                <a href="aboutus.php">Tentang Kami</a>
            </div>
            <div class="footer-social">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="copyright">
            <p>&copy; 2024 by ECHOARTWORK</p>
        </div>
    </div>
    <script>
    const hamburger = document.querySelector('.hamburger');
    const navMenu = document.querySelector('.nav-menu');

    hamburger.addEventListener('click', () => {
        navMenu.classList.toggle('active');
    });
    </script>
</body>

</html>
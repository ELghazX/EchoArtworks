<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="styles/help.css">
</head>

<body>
    <header>

        <?php include("navbar.php") ?>

        <div class="banner">
            <img src="assets/bgblue.jpg">
            <div class="banner-text">
                <h1>JOIN US</h1>
                <p>pls suport as.</p>
            </div>
        </div>
    </header>

    <main>
        <section class="content">
            <h2>Join a community dedicated to exploring Earth's epic journey through art.</h2>
            <p>"
                EchoArtwork is a space of awe, preserving an irreplaceable record of Earth's ever-changing physical, biological,
                and cultural diversity. Join us today, and together we will fuel curiosity and inspire the next generation of knowledge
                seekers through active exploration and the discovery of art that connects us to a constantly evolving world."</p>
        </section>
    </main>

    <div class="container">
        <div class="left-side">
            <img src="assets/miaw.jpg">
        </div>
        <div class="right-side">
            <div class="item" onclick="toggleContent('contentisi1')">
                <a>Apasih echoArtworks?</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi1" class="contentisi">
                <p>Lihat, Belajar, dan Jelajahi Seni Bersama. Bergabunglah untuk
                    bertemu teman dan menikmati dunia seni modern dan kontemporer, dengan berbagai manfaat.</p>
                </p>

            </div>

            <div class="item" onclick="toggleContent('contentisi2')">
                <a>Cara membuat akun</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi2" class="contentisi">
                <p>
                    <br>Pada beranda, akan ada petunjuk untuk log in/ regis akun. Klik tombol log masuk/regis, lalu buatlah akun anada!<br>
                    <br>Setelah menekan tombol, masukkan username yang unik, email, dan password yang kuat! akun anda pun berhasill dibuat<br>
                </p>

            </div>

            <div class="item" onclick="toggleContent('contentisi3')">
                <a>Cara posting foto</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi3" class="contentisi">
                <p> <br>Setelah log in, anda akan dapat memposting foto dengan mengklik tanda tambah pada navbar.
                    <br>
                    <br>Apabila anda belum log in, anda tidak akan dapat memosting apapun<br>
                </p>
            </div>

            <div class="item" onclick="toggleContent('contentisi4')">
                <a>Cara mengedit/menghapus postingan</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi4" class="contentisi">
                <p><br>Untuk mengedit postingan anda dapat melalui profil dengan mengklik postingan yang ingin diedit, atau dapat melalui postingan lansung<br>
                    <br>Untuk menghapus postingan juga anda dapat menghapus melalui postingan lansung ataupun melalui user profi. Namun ketahuilah jika menghapus postingan tidak akan dapat dipulihkan lagi<br>
                </p>
                <br>
            </div>

            <div class="item" onclick="toggleContent('contentisi5')">
                <a>Mengapa akun saya terhapus?</a>
                <i class="fas fa-plus"></i>
            </div>
            <div id="contentisi5" class="contentisi">
                <p><br>Akun anda terhapus? bermakna ada postingan anda yang tidak sesuai dengan ketentuan ataupun di luar peraturan dari echoartwork<br>
                </p>
                <br>
            </div>
        </div>
    </div>

    <?php include("footer.php") ?>

    <script src="script/help.js"></script>

</body>

</html>
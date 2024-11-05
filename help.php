<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Help Page</title>
    <link rel="stylesheet" href="styles/help.css">
</head>

<body>
    <header>
        <?php include 'navbar.php'; ?>
        <h1>Butuh Bantuan? Kami Siap Membantu!</h1>
    </header>
    <main>
        <section class="video-tutorial">
            <h2>Tonton Tutorial Kami</h2>
            <iframe src="https://www.youtube.com/embed/your-video-id" frameborder="0" allowfullscreen></iframe>
        </section>

        <section class="faq">
            <h2>Pertanyaan Umum</h2>
            <div class="accordion">
                <div class="item">
                    <button>Bagaimana cara mengubah kata sandi?</button>
                    <div class="content">
                        <p>Untuk mengubah kata sandi, pergi ke pengaturan akun</p>
                    </div>
                </div>
                <div class="item">
                    <button>Bagaimana cara menghapus akun saya?</button>
                    <div class="content">
                        <p>Untuk menghapus akun, Anda perlu menghubungi layanan pelanggan</p>
                    </div>
                </div>
                <div class="item">
                    <button>Bagaimana cara swag?</button>
                    <div class="content">
                        <p>tanya elly</p>
                    </div>
                </div>
                <div class="item">
                    <button>Bagaimana cara sigma?</button>
                    <div class="content">
                        <p>tanya wulan</p>
                    </div>
                </div>
                <div class="item">
                    <button>Bagaimana cara menikmati hidup?</button>
                    <div class="content">
                        <p>bersyukur</p>
                    </div>
                </div>
        </section>

        <section class="contact-form">
            <h2>Hubungi Kami</h2>
            <form>
                <input type="text" placeholder="Nama" required>
                <input type="email" placeholder="Email" required>
                <textarea placeholder="Pesan" required></textarea>
                <button type="submit">Kirim</button>
            </form>
        </section>
    </main>
    <footer>
        <p>© 2024 echoArtworks</p>
    </footer>
    <script>
        document.querySelectorAll('.accordion button').forEach(button => {
            button.addEventListener('click', () => {
                const content = button.nextElementSibling;
                content.style.display = content.style.display === 'block' ? 'none' : 'block';
            });
        });
    </script>
</body>

</html>
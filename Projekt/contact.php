<!DOCTYPE html>
<html lang="hr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Stranica o tehnologiji umjetne inteligencije">
    <meta name="keywords" content="umjetna inteligencija, AI, LLM, strojno učenje, automatizacija, agenti, racunalna vizija, duboko učenje">
    <meta name="author" content="Armando Gabor">
    <link href="style.css" rel="stylesheet">
    <title>Umjetna inteligencija</title>
</head>
<body>
    <header>
        <img src="images/banner.png" alt="Banner o umjetnoj inteligenciji" class="banner">
        <nav>
            <ul>
                <li><a href="index.php">Početna stranica</a></li>
                <li><a href="news.php">Novosti</a></li>
                <li><a href="contact.php">Kontakt</a></li>
                <li><a href="about.php">O nama</a></li>
                <li><a href="gallery.php">Galerija</a></li>
            </ul>
        </nav>
    </header>
    <main>
        <h1>Kontakt forma</h1>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2781.797289129755!2d15.966938677207498!3d45.795288711285735!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4765d68b441ce2df%3A0x54e2a03adf42446f!2sTehni%C4%8Dko%20veleu%C4%8Dili%C5%A1te%20u%20Zagrebu!5e0!3m2!1shr!2shr!4v1732299926933!5m2!1shr!2shr" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <form action="" method="post">
            <label for="ime">Ime:</label>
            <input type="text" id="ime" name="ime" required>

            <label for="prezime">Prezime:</label>
            <input type="text" id="prezime" name="prezime" required>

            <label for="email">E-mail adresa:</label>
            <input type="email" id="email" name="email" required>

            <label for="drzava">Država:</label>
            <select id="drzava" name="drzava">
                <option value="hr">Hrvatska</option>
                <option value="ba">Bosna i Hercegovina</option>
                <option value="rs">Srbija</option>
            </select>

            <label for="opis">Opis:</label>
            <textarea id="opis" name="opis" rows="10" cols="60"></textarea>

            <input type="submit" value="Pošalji" class="submit">
        </form>
        
    </main>

    <footer>
        <div>
            <p>&copy; 2024 Armando Gabor. Sva prava pridržana.
                <a href="https://github.com/Armando-Gabor/NTPWS">
                    <img src="images/github.png" alt="GitHub" class="social-icon">
                </a>
            </p>
        </div>
    </footer>
</body>
</html>


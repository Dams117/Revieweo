<?php
require_once '../config/Database.php';
require_once '../models/Critique.php';

$database = new Database();
$db = $database->getConnection();

// On utilise les vrais noms : contenu, date_creation et User.pseudo
$stmt = $db->prepare("SELECT critique.*, User.pseudo 
                      FROM critique 
                      JOIN User ON critique.id_user = User.id 
                      ORDER BY critique.date_creation DESC LIMIT 3");
$stmt->execute();
$dernieres_critiques = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dune: Part Two - SCENEVIEW</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Graphik:wght@400;700&family=Roboto+Condensed:wght@700&display=swap" rel="stylesheet">
    
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark pt-3">
  <div class="container">
    <a class="navbar-brand" href="../views/home.php">SCENEVIEW</a> <!-- CORRECTION 1 : Lien vers l'accueil -->
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
 <a class="navbar-brand" href="index.php" style="color: #ff8000 !important;">SCENEVIEW</a>
</button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ms-auto gap-3">
        <!-- CORRECTION 2 : Lien vers ta page login -->
        <li class="nav-item"><a class="nav-link" href="../views/login.php">Sign In</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Films</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Lists</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="hero-wrap">
    <div class="hero-image"></div>
    <div class="hero-gradient"></div>
</div>

<div class="container content-section"> 
    <div class="row justify-content-center">
        <div class="col-md-3">
    <img src="IMG_0823.jpg" class="movie-poster" alt="Dune 2">
    
    <div class="movie-stats">
        <div class="stat-item">
            <span class="icon">👁</span> 3.9M
        </div>
        <div class="stat-item">
            <span class="icon">❤</span> 1.6M
        </div>
    </div>
</div>

        <div class="col-md-6 movie-info">
            <h1 class="movie-title">Dune: Part Two</h1>
            <p class="director-line">2024 Directed by <span class="director-name">Denis Villeneuve</span></p>
            
            <p class="tagline">Long live the fighters.</p>
            <p class="synopsis">
                Follow the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a path of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, Paul endeavors to prevent a terrible future only he can foresee.
            </p>
            <div class="movie-tabs-container mt-5">
    <ul class="nav nav-tabs custom-tabs">
        <li class="nav-item">
            <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cast">Cast</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#details">Details</button>
        </li>
        <li class="nav-item">
            <button class="nav-link" data-bs-toggle="tab" data-bs-target="#genres">Genres</button>
        </li>
    </ul>

    <div class="tab-content pt-3">
        <div class="tab-pane fade show active" id="cast">
    <div class="cast-wrapper collapsed" id="castWrapper">
        <div class="tag-cloud">
            <span class="tag">Timothée Chalamet</span>
            <span class="tag">Zendaya</span>
            <span class="tag">Rebecca Ferguson</span>
            <span class="tag">Javier Bardem</span>
            <span class="tag">Josh Brolin</span>
            <span class="tag">Austin Butler</span>
            <span class="tag">Florence Pugh</span>
            <span class="tag">Dave Bautista</span>
            <span class="tag">Christopher Walken</span>
            <span class="tag">Léa Seydoux</span>
            <span class="tag">Stellan Skarsgård</span>
            <span class="tag">Charlotte Rampling</span>
            <span class="tag">Souheila Yacoub</span>
            <span class="tag">Abdelkarim Hussein Seli Mohamed Hassanin</span>
            <span class="tag">Joseph Beddelem</span>
            <span class="tag">Xavier Alba Royo</span>
            <span class="tag">Rachid Abbad</span>
            <span class="tag">Affif Ben Badra</span>
            <span class="tag">Botond Bóta</span>
            <span class="tag">Abdelaziz Boumane</span>
            <span class="tag">Abdellah Echahbi</span>
            <span class="tag">Zouhair Elakkari</span>
            <span class="tag">Noureddine Hajoujou</span>
            <span class="tag">Mohamed Mouraoui</span>
            <span class="tag">Adil Achraf Sayd</span>
            <span class="tag">Hamza Sayd</span>
            <span class="tag">Hopi Grace</span>
            <span class="tag">Havin Fathi</span>
            <span class="tag">Kincsö Pethö</span>
            <span class="tag">Cat Simmons</span>
            <span class="tag">Burt Caesar</span>
            <span class="tag">Remi Fadare</span>
            <span class="tag">Amer El-Erwadi</span>
            <span class="tag">Tedroy Newell</span>
            <span class="tag">Oxa Hazel</span>
            <span class="tag">Hajiyeva Pakiza</span>
            <span class="tag">Leon Herbert</span>
            <span class="tag">Sima Rostami</span>
            <span class="tag">Yvonne Campbell</span>
            <span class="tag">Joseph Charles</span>
            <span class="tag">Vic Zander</span>
            <span class="tag">Dylan Baldwin</span>
            <span class="tag">Marcia Tucker</span>
            <span class="tag">Nicola Brome</span>
            <span class="tag">Kathy Owen</span>
            <span class="tag">Huw Novelli</span>
            <span class="tag">Moe Bar-El</span>
            <span class="tag">Serhat Metin</span>
            <span class="tag">Amra Mallassi</span>
            <span class="tag">Adam Bloom</span>
            <span class="tag">Luis Alkmim</span>
            <span class="tag">Jordan Long</span>
            <span class="tag">Omar A.K.</span>
            <span class="tag">Zdeněk Dvořáček</span>
            <span class="tag">Billy Clements</span>
            <span class="tag">Anton Valensi</span>
            <span class="tag">Lex Daniel</span>
            <span class="tag">Dominic McHale</span>
            <span class="tag">Paul Boyle</span>
            <span class="tag">Niall White</span>
            <span class="tag">Tony Cook</span>
            <span class="tag">Gábor Szemán</span>
            <span class="tag">Jonathan Gunning</span>
            <span class="tag">Will Irvine</span>
            <span class="tag">Alan Mehdizadeh</span>
            <span class="tag">Rex Adams</span>
            <span class="tag">Molly Mcowan</span>
            <span class="tag">Ana Cilas</span>
            <span class="tag">Kajsa Mohammar</span>
            <span class="tag">Sára Bácsfalvi</span>
            <span class="tag">Zsófia Kocsis</span>
            <span class="tag">Matthew Sim</span>
            <span class="tag">Steve Wall</span>
            <span class="tag">Italo Amerighi</span>
            <span class="tag">Tim Hilborne</span>
            <span class="tag">Cecile Sinclair</span>
            <span class="tag">Tracy Coogan</span>
            <span class="tag">Zoe Kata Kaska</span>
            <span class="tag">Jimmy Walker</span>
            <span class="tag">Rand Faris</span>
            <span class="tag">Fouad Humaidan</span>
            <span class="tag">Manaf Irani</span>
            <span class="tag">Dora Kápolnai-Schvab</span>
            <span class="tag">Joelle</span>
            <span class="tag">Anya Taylor-Joy</span>
            <span class="tag">Hector Kingsley Bhattacharjee</span>
        </div>
    </div>
    
    <div class="mt-3">
        <button type="button" class="tag show-all-btn" id="showAllBtn">SHOW ALL...</button>
    </div>
</div>


        <div class="tab-pane fade" id="details">
            <div class="detail-row">
                <span class="detail-label">STUDIO</span>
                <div class="tag-cloud"><span class="tag">Legendary Pictures</span></div>
            </div>
            <div class="detail-row">
                <span class="detail-label">COUNTRY</span>
                <div class="tag-cloud"><span class="tag">USA</span></div>
            </div>
            <div class="detail-row">
                <span class="detail-label">LANGUAGE</span>
                <div class="tag-cloud"><span class="tag">English</span></div>
            </div>
        </div>

        <div class="tab-pane fade" id="genres">
            <div class="detail-row">
                <span class="detail-label">GENRES</span>
                <div class="tag-cloud">
                    <span class="tag">Adventure</span>
                    <span class="tag">Science Fiction</span>
                </div>
            </div>
            <div class="detail-row mt-3">
                <span class="detail-label">THEMES</span>
                <div class="tag-cloud">
                    <span class="tag">Epic Heroes</span>
                    <span class="tag">Humanity And The World Around Us</span>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>

<div class="reviews-section mt-5">
    <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3" style="border-color: #445566 !important;">
        <span class="small text-uppercase fw-bold text-white-50" style="letter-spacing: 1px;">Popular Reviews</span>
        <a href="#" class="small text-decoration-none text-white-50">MORE</a>
    </div>

    <div class="review-item border-bottom">
        <div class="review-header">
            <span class="reviewer-name">Claire</span>
            <span class="review-stars">★★★★★</span>
        </div>
        <p class="review-text">
            One of those movie going experiences i’ll cherish for the rest of my life
        </p>
        <div class="review-footer">
            <span class="likes-count">❤ 60,463 likes</span>
        </div>
    </div>

        <div class="review-item border-bottom">
        <div class="review-header">
            <span class="reviewer-name">Maria</span>
            <span class="review-stars">★★★★</span>
        </div>
        <p class="review-text">
            My favorite part of the film is when timothée and austin butler have a literal knife fight
        </p>
        <div class="review-footer">
            <span class="likes-count">❤ 56,950 likes</span>
        </div>
    </div>
    <div class="review-item border-bottom">
        <div class="review-header">
            <span class="reviewer-name">Reece</span>
            <span class="review-stars">★★★★★</span>
        </div>
        <p class="review-text">
            Just peak, I’m so curious to see how they handle chani and Paul following that ending
        </p>
        <div class="review-footer">
            <span class="likes-count">❤ 38,585 likes</span>
        </div>
    </div>

    <div class="review-item">
        <div class="review-header">
            <span class="reviewer-name">Bryan</span>
            <span class="review-stars">★★★★</span>
        </div>
        <p class="review-text">
            Need a friend like Stilgar to hype me up all the time
        </p>
        <div class="review-footer">
            <span class="likes-count">❤ 36,619 likes</span>
        </div>
    </div>

    <div class="review-item">
        <div class="review-header">
            <span class="reviewer-name">Kartsen</span>
            <span class="review-stars">★★★★★</span>
        </div>
        <p class="review-text">
            Austin butler is so bald. i've never seen anyone be so bald in my life. so moisturised and bald. he was glowing more than edward in twilight. what's your megamind head skin care routine, elvis boy
        </p>
        <div class="review-footer">
            <span class="likes-count">❤ 33,093 likes</span>
        </div>
    </div>
</div>

        <div class="col-md-3">
            <div class="action-box">
    <div class="action-header">
        <span class="label">RATINGS</span>
        <span class="count">117K FANS</span>
    </div>
    <div class="rating-row">
        <div class="stars-hover">
            <span>★</span><span>★</span><span>★</span><span>★</span><span>★</span>
        </div>
        <div class="rating-number">4.4</div>
    </div>

    <div class="button-row">
        <!-- CORRECTION 3 : Le bouton devient un lien cliquable -->
        <a href="../views/login.php" class="btn btn-primary w-100" style="text-decoration: none;">Sign in to rate</a>    
    </div>


    <div class="links-row">
        <a href="#">Share</a>
        <a href="#">Review</a>
    </div>
</div>
        </div>
    </div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const castWrapper = document.getElementById('castWrapper');
    const showAllBtn = document.getElementById('showAllBtn');

    if (showAllBtn && castWrapper) {
        showAllBtn.addEventListener('click', function() {
            if (castWrapper.classList.contains('collapsed')) {
                castWrapper.classList.remove('collapsed');
                castWrapper.classList.add('expanded');
                this.textContent = 'SHOW LESS...';
            } else {
                castWrapper.classList.remove('expanded');
                castWrapper.classList.add('collapsed');
                this.textContent = 'SHOW ALL...';
            }
        });
    }
});
</script>
</body>
</html>
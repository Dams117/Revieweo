<?php
require_once '../config/Database.php';
require_once '../models/Critique.php';

$database = new Database();
$db = $database->getConnection();

$stmt = $db->prepare("
    SELECT critique.*, User.pseudo 
    FROM critique 
    JOIN User ON critique.id_user = User.id 
    ORDER BY critique.date_creation DESC 
    LIMIT 3
");
$stmt->execute();
$dernieres_critiques = $stmt->fetchAll(PDO::FETCH_ASSOC);

$reviews = [
    ['name' => 'Claire',  'stars' => 5, 'text' => "One of those movie going experiences i'll cherish for the rest of my life", 'likes' => '60,463'],
    ['name' => 'Maria',   'stars' => 4, 'text' => "My favorite part of the film is when Timothée and Austin Butler have a literal knife fight", 'likes' => '56,950'],
    ['name' => 'Reece',   'stars' => 5, 'text' => "Just peak. I'm so curious to see how they handle Chani and Paul following that ending", 'likes' => '38,585'],
    ['name' => 'Bryan',   'stars' => 4, 'text' => "Need a friend like Stilgar to hype me up all the time", 'likes' => '36,619'],
    ['name' => 'Karsten', 'stars' => 5, 'text' => "Austin Butler is so bald. I've never seen anyone be so bald in my life. So moisturised and bald. He was glowing more than Edward in Twilight. What's your Megamind head skin care routine, Elvis boy", 'likes' => '33,093'],
];

$cast = [
    'Timothée Chalamet', 'Zendaya', 'Rebecca Ferguson', 'Javier Bardem',
    'Josh Brolin', 'Austin Butler', 'Florence Pugh', 'Dave Bautista',
    'Christopher Walken', 'Léa Seydoux', 'Stellan Skarsgård', 'Charlotte Rampling',
    'Souheila Yacoub', 'Anya Taylor-Joy',
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dune: Part Two — SCENEVIEW</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inter:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- ===================== NAVBAR ===================== -->
<nav class="navbar navbar-expand-lg navbar-dark pt-3">
    <div class="container">
        <a class="navbar-brand" href="../views/home.php">SCENEVIEW</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto gap-3">
                <li class="nav-item"><a class="nav-link" href="../views/login.php">Sign In</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Films</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Lists</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- ===================== HERO ===================== -->
<div class="hero-wrap">
    <div class="hero-image"></div>
    <div class="hero-gradient"></div>
</div>

<!-- ===================== MAIN CONTENT ===================== -->
<div class="container content-section">
    <div class="row justify-content-center">

        <!-- LEFT: Poster + Stats -->
        <div class="col-md-3">
            <img src="IMG_0823.jpg" class="movie-poster img-fluid" alt="Dune: Part Two poster">
            <div class="movie-stats mt-3 d-flex gap-3">
                <span class="stat-item"><span class="icon">👁</span> 3.9M</span>
                <span class="stat-item"><span class="icon">❤</span> 1.6M</span>
            </div>
        </div>

        <!-- CENTER: Movie Info + Tabs + Reviews -->
        <div class="col-md-6">
            <h1 class="movie-title">Dune: Part Two</h1>
            <p class="director-line">
                2024 — Directed by <span class="director-name">Denis Villeneuve</span>
            </p>
            <p class="tagline">Long live the fighters.</p>
            <p class="synopsis">
                Follow the mythic journey of Paul Atreides as he unites with Chani and the Fremen while on a path of revenge against the conspirators who destroyed his family. Facing a choice between the love of his life and the fate of the known universe, Paul endeavors to prevent a terrible future only he can foresee.
            </p>

            <!-- Tabs -->
            <div class="movie-tabs-container mt-5">
                <ul class="nav nav-tabs custom-tabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#cast" role="tab">Cast</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#details" role="tab">Details</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" data-bs-toggle="tab" data-bs-target="#genres" role="tab">Genres</button>
                    </li>
                </ul>

                <div class="tab-content pt-3">

                    <!-- Cast Tab -->
                    <div class="tab-pane fade show active" id="cast" role="tabpanel">
                        <div class="cast-wrapper collapsed" id="castWrapper">
                            <div class="tag-cloud">
                                <?php foreach ($cast as $actor): ?>
                                    <span class="tag"><?= htmlspecialchars($actor) ?></span>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button type="button" class="tag show-all-btn" id="showAllBtn">SHOW ALL...</button>
                        </div>
                    </div>

                    <!-- Details Tab -->
                    <div class="tab-pane fade" id="details" role="tabpanel">
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

                    <!-- Genres Tab -->
                    <div class="tab-pane fade" id="genres" role="tabpanel">
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
                                <span class="tag">Humanity &amp; The World Around Us</span>
                            </div>
                        </div>
                    </div>

                </div><!-- /.tab-content -->
            </div><!-- /.movie-tabs-container -->

            <!-- Reviews -->
            <div class="reviews-section mt-5">
                <div class="d-flex justify-content-between align-items-center border-bottom pb-2 mb-3" style="border-color: #445566 !important;">
                    <span class="small text-uppercase fw-bold text-white-50" style="letter-spacing: 1px;">Popular Reviews</span>
                    <a href="#" class="small text-decoration-none text-white-50">MORE</a>
                </div>

                <?php foreach ($reviews as $review): ?>
                    <div class="review-item border-bottom">
                        <div class="review-header">
                            <span class="reviewer-name"><?= htmlspecialchars($review['name']) ?></span>
                            <span class="review-stars"><?= str_repeat('★', $review['stars']) ?></span>
                        </div>
                        <p class="review-text"><?= htmlspecialchars($review['text']) ?></p>
                        <div class="review-footer">
                            <span class="likes-count">❤ <?= $review['likes'] ?> likes</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div><!-- /.reviews-section -->

        </div><!-- /.col-md-6 -->

        <!-- RIGHT: Actions -->
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
                    <a href="../views/login.php" class="btn btn-primary w-100">Sign in to rate</a>
                </div>
                <div class="links-row">
                    <a href="#">Share</a>
                    <a href="#">Review</a>
                </div>
            </div>
        </div>

    </div><!-- /.row -->
</div><!-- /.container -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', () => {
    const castWrapper = document.getElementById('castWrapper');
    const showAllBtn  = document.getElementById('showAllBtn');

    if (!castWrapper || !showAllBtn) return;

    showAllBtn.addEventListener('click', () => {
        const isCollapsed = castWrapper.classList.contains('collapsed');
        castWrapper.classList.toggle('collapsed', !isCollapsed);
        castWrapper.classList.toggle('expanded', isCollapsed);
        showAllBtn.textContent = isCollapsed ? 'SHOW LESS...' : 'SHOW ALL...';
    });
});
</script>
</body>
</html>
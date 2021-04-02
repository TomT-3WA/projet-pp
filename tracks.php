<?php
include 'includes/header.phtml';

?>
    <nav>
        <a href="home.php" class="nav-home">Accueil</a>
        <a href="tracks.php" class="nav-active nav-tracks">Tracks</a>
        <a href="#" class="nav-pepe">L'artiste</a>
        <a href="contact.php" class="nav-contact">Nous Contacter</a>
    </nav>
</header>
<body>
    <main class="container">
        <section class="section-tracks">
            <h1>Tracks</h1>
            <article class="offre">
                <i class="fas fa-percent"></i>
                <h2>Offre Spéciale</h2>
                <h3>1 instrumentale achetée<br> = <br><b>1 instrumentale offerte</b></h3>
            </article>
            <div class="browse">
                <div class="row tracks-header">
                    <div class="col-4 browse-header-title">
                        <i class="fas fa-stream"></i>
                        <span>Titre</span>
                    </div>
                    <div class="col-1 browse-header-duration">
                        <i class="fas fa-clock"></i>
                        <span>Durée</span>
                    </div>
                    <div class="col-1 browse-header-tempo">
                        <i class="fas fa-music"></i>
                        <span>BPM</span>
                    </div>
                </div>
                <div class="tracks">
                    <!-- Track 1 -->
                    <div class="row track track-1">
                        <div class="col-4 browse-tracks-title track-1">
                            <img src="https://picsum.photos/52"/>
                            <div>
                                <a href="#">Bigot</a><br>
                                <span>New School</span>
                            </div>
                        </div>
                        <div class="col-1 browse-tracks-duration track-1">4:03</div>
                        <div class="col-1 browse-tracks-tempo track-1">130</div>
                        <div class="col-4 browse-tracks-actions track-1">
                            <a href="#"><i class="fas fa-download"></i></a>
                            <a href="#"><i class="fas fa-share-square"></i></a>
                            <button type="button">
                                <i class="fas fa-cart-plus"></i>
                                <span>29.99 €</span>
                            </button>
                        </div>
                    </div>
                    <!-- Track 2 -->
                    <div class="row track track-2">
                        <div class="col-4 browse-tracks-title track-2">
                            <img src="https://picsum.photos/52"/>
                            <div>
                                <a href="#">Breeze'O</a><br>
                                <span>Chill</span>
                            </div>
                        </div>
                        <div class="col-1 browse-tracks-duration track-2">2:46</div>
                        <div class="col-1 browse-tracks-tempo track-2">130</div>
                        <div class="col-4 browse-tracks-actions track-2">
                            <a href="#"><i class="fas fa-download"></i></a>
                            <a href="#"><i class="fas fa-share-square"></i></a>
                            <button type="button">
                                <i class="fas fa-cart-plus"></i>
                                <span>29.99 €</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        
<?php
include 'includes/footer.phtml';

?>
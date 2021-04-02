<?php
include 'includes/header.phtml';

?>
    <nav>
        <a href="home.phtml" class="nav-home">Accueil</a>
        <a href="tracks.phtml" class="nav-tracks">Tracks</a>
        <a href="#" class="nav-pepe">L'artiste</a>
        <a href="contact.php" class="nav-active nav-contact">Nous Contacter</a>
    </nav>
</header>
<body>
    <main class="container">
        <div class="div-form">
            <form>
                <input type="text" name="nom" placeholder="Nom"/>
                <input type="email" name="email" placeholder="Email"/>
                <input type="text" name="sujet" placeholder="Sujet"/>
                <input type="text" name="msg" placeholder="Message"/>
                <input type="submit" value="Envoyer"/>
            </form>
        </div>
    </main>
</body>

<?php
include 'includes/footer.phtml';

?>
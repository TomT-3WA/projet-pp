<?php
include 'includes/header.phtml';

?>
    <nav>
        <a href="home.php" class="nav-active nav-home">Accueil</a>
        <a href="tracks.php" class="nav-tracks">Tracks</a>
        <a href="#" class="nav-pepe">L'artiste</a>
        <a href="contact.php" class="nav-contact">Nous Contacter</a>
    </nav>
</header>
<body>
    <main class="container">
        <h1>Cherchez parmis mes tracks</h1>
        <div class="search">
            <form class="form-search">
                <div class="vl"></div>
                <input type="text" name="search" id="input-search" placeholder="Recherchez"/>
                <button class="btn-search"><i class="fas fa-search"></i></button>
            </form>
        </div>
        <div class="slider">
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Breeze'O<br>
                        2:46</figcaption>
                    </figure>
                    <audio src="media/audio/BREEZE'O.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Bigot<br>
                        4:03</figcaption>
                    </figure>
                    <audio src="media/audio/bigot.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Shawty Penthouse<br>
                        2:42</figcaption>
                    </figure>
                    <audio src="media/audio/iron-steeze-shawty-penthouse.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Luftair<br>
                        3:33</figcaption>
                    </figure>
                    <audio src="media/audio/luftair.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Moon<br>
                        3:20</figcaption>
                    </figure>
                    <audio src="media/audio/moon.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Poulet Chris<br>
                        3:15</figcaption>
                    </figure>
                    <audio src="media/audio/poulet-chris.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Regards<br>
                        3:20</figcaption>
                    </figure>
                    <audio src="media/audio/regards.mp3" controls></audio>
                </div>
            </div>
            <div>
                <div class="details">
                    <figure>
                        <a href="#"><img src="https://picsum.photos/150"></a>
                        <figcaption>Thinked'Up<br>
                        2:05</figcaption>
                    </figure>
                    <audio src="media/audio/THINKED'UP.mp3" controls></audio>
                </div>
            </div>
        </div>
        <section class="how-works">
            <h2>Comment ??a marche ?</h2>
            <article>
                <h3>Faites un recherche</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat.</p>
                <p>Typi non habent claritatem insitam; est usus legentis
                in iis qui facit eorum claritatem. Investigationes
                demonstraverunt lectores legere me lius quod ii legunt saepius.
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum.</p>
            </article>
            <article>
                <h3>Ajoutez ?? votre panier</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat.</p>
                <p>Typi non habent claritatem insitam; est usus legentis
                in iis qui facit eorum claritatem. Investigationes
                demonstraverunt lectores legere me lius quod ii legunt saepius.
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum.</p>
            </article>
            <article>
                <h3>T??l??chargez votre fichier</h3>
                <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit,
                sed diam nonummy nibh euismod tincidunt ut laoreet dolore
                magna aliquam erat volutpat. Ut wisi enim ad minim veniam,
                quis nostrud exerci tation ullamcorper suscipit lobortis nisl
                ut aliquip ex ea commodo consequat.</p>
                <p>Typi non habent claritatem insitam; est usus legentis
                in iis qui facit eorum claritatem. Investigationes
                demonstraverunt lectores legere me lius quod ii legunt saepius.
                Claritas est etiam processus dynamicus, qui sequitur mutationem
                consuetudium lectorum.</p>
            </article>
        </section>
        
<?php
include 'includes/footer.phtml';

?>
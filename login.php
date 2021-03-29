<?php

declare(strict_types=1);

// Appel du service de Gestion de la Session
require 'class/UserSession.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST)) {
    // Appel de la class Form, pour contrôller les datas
    require 'class/Form.php';
    // DB
    require 'class/Database.php';
    // Extraction des données du form, dans des variables distinctes
    extract($_POST);
    
    // LOGIN
    // Tentative de connexion
    // On s'assure que les clés des champs necessaires sont accessibles
    if(array_key_exists('nom', $_POST) && array_key_exists('mdp', $_POST)) {
        
        // Envoi des données
        $FormValidator = new Form($pdo, $nom, $mdp);
        // Tentative de validation
        if($FormValidator->login()) {
            // Init session
            UserSession::init();
            // Inscription dans la session
            UserSession::connectUser($FormValidator->userModel->getPseudo(), 'u'); // 'u' pour 'user'
            
            // Redirection
            header('Location: views/member.phtml');
            exit;
        } else {
            // Gestion des erreurs `$errorMsg` $_SESSION['errors']
            $error = $FormValidator->getError();
        }
    } else if (count($_POST) > 2) {
        // Signin
        // Envoi le form
        // Envoi des données
        $FormValidator = new Form($pdo, $pseudo, $mdp, $photo_utilisateur="");
        // Tentative de validation
        if(!$FormValidator->signin()) {
            // Redirection
            // Sinon -> redir signin/
            header('Location: views/signin.phtml');
            exit;
        } else {
            // Si ok -> redir login/
            // Redirection
            header('Location: login.php');
            exit;
        }
        
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && array_key_exists('session', $_GET)) {
    // Deconnexion
    if ($_GET['session'] === 'logout') {
        UserSession::disconnectUser(UserSession::getUserConnected());
    }
}
?>
<?php
include 'includes/header.phtml';

?>
    <p class="hidden">
        <?php if (isset($error) && count($error) > 0): ?>
            <!-- Form or Model ** ?? -->
            <?= $error[0] ?>
        <?php endif; ?>
    </p>
        <div id="login-box">
            <h1>Se Connecter</h1>
            <form method="post">
                <input type="hidden" name="login">
                <input type="text" id="login" name="pseudo" placeholder="Pseudo" />
                <input type="password" id="password" name="mdp" placeholder="Mot de passe" />
                <input type="submit" value="Se Connecter" />
            </form>
        </div>
        
<?php
include 'includes/footer.phtml';

?>
<!--
    <div class="wrapper fadeInDown">
        <div id="formContent">
             Tabs Titles 
            
             Icon 
            <div class="fadeIn first">
                <img src="#" id="icon" alt="User Icon" />
            </div>
            
             Login Form 
            <form class="form" method="post" enctype="multipart/form-data">
                <input type="hidden" name="login">
                <input type="text" id="login" class="form-control" name="name" placeholder="login">
                <input type="text" id="password" class="form-control" name="pwd" placeholder="pwd">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>
        </div>
        <a href="views/signin.phtml" class="btn btn-info">S'inscrire</a>
    </div>
    
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
-->
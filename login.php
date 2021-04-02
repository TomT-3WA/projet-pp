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
    if(array_key_exists('pseudo', $_POST) && array_key_exists('mdp', $_POST)) {

        // Envoi des données
        $FormValidator = new Form($pdo, $name, $pwd);
        // Tentative de validation
        if($FormValidator->login()) {
            // Init session
            UserSession::init();
            // Inscription dans la session
            UserSession::connectUser($FormValidator->userModel->getNickName(), 'u'); // 'u' pour 'user'

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
        $FormValidator = new Form($pdo, $nickName, $pwd, $email, $avatar="");
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
</header>
<body>
    <main>
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
                <a href="views/signin.phtml" class="btn-signin">S'inscrire</a>
            </div>
    </main>
</body>
<?php
include 'includes/footer.phtml';

?>
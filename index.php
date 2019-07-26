<?php
require ('controller/frontend.php');
require ('controller/backend.php');

try {
    session_start();

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post($_GET['id']);
            }
            else {
                throw new Exception('Aucun idenditifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'registration')
        {
            if ($_GET['sent'] == 'no') {
                registration();
            }
            elseif ($_GET['sent'] == 'yes')
            {
                if (!empty($_POST['pseudo']) && !empty($_POST['mail']) && !empty($_POST['password']) && !empty($_POST['confirm_pass']))
                {
                    if ($_POST['password'] == $_POST['confirm_pass'])  {
                        addUser($_POST['pseudo'], $_POST['password'], $_POST['mail']);
                    }
                    else
                    {
                        throw new Exception('Merci de confirmer le mot de passe.');
                    }
                }
                else {
                    throw new Exception('Veuillez remplir les informations requises pour l\'inscription');
                }
            }
            else {
                registration();
            }
        }
        elseif ($_GET['action'] == 'registered') {
            registered();
        }
        elseif ($_GET['action'] == 'connect') {
            if (!empty($_POST['pseudo']) && !empty($_POST['password']))
            {
                connection($_POST['pseudo'], $_POST['password']);
            }
            else
            {
                throw new Exception('Merci de renseigner un pseudo et un mot de passe valide.');
            }
        }
        elseif ($_GET['action'] == 'disconnect')
        {
            disconnect();
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_SESSION['user_id']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['title'], $_SESSION['user_id'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'comment_edit' && isset($_SESSION['user_id']))
        {
            if (isset($_GET['id']) && $_GET['id'] > 0)
            {
                updateComment($_GET['id'], $_SESSION['user_id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaires envoyé');
            }
        }
        elseif ($_GET['action'] == 'comment_updated')
        {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (isset($_GET['id_comment']) && $_GET['id_comment'] > 0) {
                    if (!empty($_POST['title']) && !empty($_SESSION['user_id']) && !empty($_POST['content'])) {
                        updatedComment($_GET['id_comment'], $_SESSION['user_id'], $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis.');
                    }
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'report') {
            if (isset($_SESSION['user_id']) && isset($_GET['id']) && $_GET['id'] > 0) {
                report($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'reported') {
            if (isset($_SESSION['user_id']) && isset($_GET['id']) && isset($_POST['reason']) && $_GET['id'] > 0) {
                reported($_GET['id'], $_POST['reason']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        else {
            listPosts();
        }
    }
    else {
        listPosts();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('view/errorView.php');
}

<?php
require ('controller/frontend.php');
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listPosts();
        }
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            }
            else {
                throw new Exception('Aucun idenditifiant de billet envoyé');
            }
        }
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['content'])) {
                    addComment($_GET['id'], $_POST['title'], $_POST['author'], $_POST['content']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis.');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
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

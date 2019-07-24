<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $posts = $postManager->getListPosts();

    $navbar = 'view/frontoffice/navbar.php';
    require('view/frontoffice/listPostsView.php');
}

function post()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $commentManager = new Gaetan\P4\Model\CommentManager();

    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getListComments($_GET['id']);

    $navbar = 'view/frontoffice/navbar.php';
    require('view/frontoffice/postView.php');
}

function addComment($postId, $title, $author, $content)
{
    $data = [
    'postId' => $postId,
    'title' => $title,
    'author' => $author,
    'content' => $content
    ];
    $comment = new Gaetan\P4\Model\Comment($data);
    $commentManager = new Gaetan\P4\Model\CommentManager();

    $affectedLines = $commentManager->add($comment);

    if ($affectedLines == false) {
        throw new Exception('Impossible d\'ajouter le commentaire.');
    }
    else {
        header('Location: index.php?action=post&id=' . $postId);
    }
}

function registration()
{
    $navbar = 'view/frontoffice/navbar.php';
    require('view/frontoffice/registrationView.php');
}

function addUser($pseudo, $password, $mail)
{
    $chopPass = password_hash($password, PASSWORD_DEFAULT);
    $role = 'common_user';
    $data = [
        'role' => $role,
        'pseudo' => $pseudo,
        'password' => $chopPass,
        'mail' => $mail
    ];
    $userManager = new Gaetan\P4\Model\UserManager();

    if (!$userManager->exists($_POST['pseudo'])) {
        $user = new Gaetan\P4\Model\User($data);
        $affectedLines = $userManager->add($user);
        if ($affectedLines == false) {
            throw new Exception('Impossible d\'enregistrer l\'utilisateur');
        }
        else {
            header('Location: index.php');
        }
    }
    else {
        throw new Exception('Ce pseudo existe déjà, merci d\'en choisir un autre ');
    }
    /*
    Use exists with $_POST['pseudo'], if true send data to UserManager->add, else throw exception
    */
}

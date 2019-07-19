<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');

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

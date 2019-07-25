<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $posts = $postManager->getListPosts();

    require('view/frontoffice/listPostsView.php');
}

function post($postId)
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $commentManager = new Gaetan\P4\Model\CommentManager();

    $post = $postManager->getPost($postId);
    $comments = $commentManager->getListComments($postId);

    require('view/frontoffice/postView.php');
}

function addComment($postId, $title, $userId, $content)
{
    $report = 0;

    $data = [
    'postId' => $postId,
    'title' => $title,
    'userId' => $userId,
    'content' => $content,
    'report' => $report
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
    require('view/frontoffice/registrationView.php');
}
function registered()
{

}

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

function getByType($type)
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $posts = $postManager->getPostsByType($type);

    require('view/frontoffice/listPostsView.php');
}

function registration()
{
    require('view/frontoffice/registrationView.php');
}
function registered()
{
    require('view/frontoffice/registeredView.php');

}

function updateComment($commentId, $userId)
{
    $commentManager = new Gaetan\P4\Model\CommentManager();
    if ($commentManager->exists($commentId))
    {
        $comment = $commentManager->getComment($commentId);
        if ($comment->userId() == $userId) {
            require('view/frontoffice/updateCommentView.php');
        }
        else {
            throw new Exception('Identifiant incorrect.');
        }
    }
    else {
        throw new Exception('Identifiant incorrect.');
    }
}

function report($commentId)
{
    $commentManager = new Gaetan\P4\Model\CommentManager();
    $comment = $commentManager->getComment($commentId);
    require('view/frontoffice/reportView.php');
}

function newPost()
{
    require('view/backoffice/newPostView.php');
}

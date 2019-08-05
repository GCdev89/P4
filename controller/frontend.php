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
    if ($postManager->exists($postId)) {
        $post = $postManager->getPost($postId);
        $comments = $commentManager->getListComments($postId);

        require('view/frontoffice/postView.php');
    }
    else {
        throw new Exception('Identifiant incorrect.');
    }

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

function userProfile($userId)
{
    $userManager = new Gaetan\P4\Model\UserManager();
    if ($userManager->exists($userId)) {
        $user = $userManager->getUser($userId);
        require('view/frontoffice/userProfileView.php');
    }
    else {
        throw new Exception('Identifiant incorrect.');
    }
}


function newPost()
{
    require('view/backoffice/newPostView.php');
}

function updateListPosts()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $posts = $postManager->getListPosts();

    require('view/backoffice/updateListPostView.php');

}

function updatePost($id)
{
    $postManager = new Gaetan\P4\Model\PostManager();
    if ($postManager->exists($id))
    {
        $post = $postManager->getPost($id);
        require('view/backoffice/updatePostView.php');
    }
    else {
        throw new Exception('Identifiant de billet incorrect.');
    }
}

function moderation()
{
    $commentManager = new Gaetan\P4\Model\CommentManager();
    $reportCount = $commentManager->countReport();
    $comments = $commentManager->getReportedList();

    require('view/backoffice/moderationView.php');
}

function usersList()
{
    $userManager = new Gaetan\P4\Model\UserManager();
    $users = $userManager->getListUsers();

    require('view/backoffice/listUsersView.php');
}

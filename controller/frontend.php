<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

function listPosts()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $postCount = $postManager->count();
    $postsByPage = 3;
    $countPages = ceil($postCount / $postsByPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $postsByPage;
    $posts = $postManager->getListPosts($start, $postsByPage);
    $action = 'list_posts';
    $isActive = 'home';

    require('view/frontoffice/pagination.php');
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

    $postCount = $postManager->countByType($type);
    $postsByPage = 3;
    $countPages = ceil($postCount / $postsByPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $postsByPage;
    $posts = $postManager->getPostsByType($type, $start, $postsByPage);
    $action = 'list_posts';
    $isActive = $type;

    require('view/frontoffice/paginationByType.php');
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
    $isActive = 'newPost';
    require('view/backoffice/newPostView.php');
}

function updateListPosts()
{
    $postManager = new Gaetan\P4\Model\PostManager();
    $postCount = $postManager->count();
    $postsByPage = 3;
    $countPages = ceil($postCount / $postsByPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $postsByPage;
    $posts = $postManager->getListPosts($start, $postsByPage);
    $isActive = 'update_list_posts';
    $action = 'list_posts';
    $isTypeActive = 'all';

    require('view/frontoffice/pagination.php');
    require('view/backoffice/updateListPostsView.php');

}

function getByTypeUpdate($type)
{
    $postManager = new Gaetan\P4\Model\PostManager();

    $postCount = $postManager->countByType($type);
    $postsByPage = 3;
    $countPages = ceil($postCount / $postsByPage);
    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $postsByPage;
    $posts = $postManager->getPostsByType($type, $start, $postsByPage);
    $action = 'update_list_posts';

    $isActive = 'update_list_posts';
    $isTypeActive = $type;


    require('view/frontoffice/paginationByType.php');
    require('view/backoffice/updateListPostsView.php');
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
    $reportsByPage = 20;
    $countPages = ceil($reportCount / $reportsByPage);

    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $reportsByPage;

    $comments = $commentManager->getReportedList($start, $reportsByPage);
    $action = 'moderation';
    $isActive = 'moderation';

    require('view/frontoffice/pagination.php');
    require('view/backoffice/moderationView.php');
}

function usersList()
{
    $userManager = new Gaetan\P4\Model\UserManager();
    $usersCount =$userManager->count();
    $usersByPage = 20;
    $countPages = ceil($usersCount / $usersByPage);

    if (isset($_GET['page']) && $_GET['page'] > 0 && $_GET['page'] <= $countPages) {
        $currentPage = intval($_GET['page']);
    }
    else {
        $currentPage = 1;
    }
    $start = ($currentPage - 1) * $usersByPage;
    $users = $userManager->getListUsers($start, $usersByPage);

    $action = 'users_list';
    $isActive = 'users';

    require('view/frontoffice/pagination.php');
    require('view/backoffice/listUsersView.php');
}

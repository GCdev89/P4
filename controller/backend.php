<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');
require_once('model/ReportManager.php');

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
            $userConnected = $userManager->getUser($pseudo);
            $_SESSION['user_id'] = $userConnected->id();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['role'] = $userConnected->role();
            header('Location: index.php?action=registered');
        }
    }
    else {
        throw new Exception('Ces identifiants ne sont pas disponnibles, merci d\'en choisir un autre ');
    }
}

function connection($pseudo, $password)
{
    $userManager = new Gaetan\P4\Model\UserManager();
    $user = $userManager->getUser($pseudo);

    if (!empty($user)) {
        $isPasswordCorrect = password_verify($password, $user->password());

        if ($isPasswordCorrect) {
            $_SESSION['user_id'] = $user->id();
            $_SESSION['pseudo'] = $pseudo;
            $_SESSION['role'] = $user->role();
            header('Location: index.php');
        }
        else {
            throw new Exception('Mauvais identifiant ou mot de passe');
        }
    }
    else {
        throw new Exception('Mauvais identifiant ou mot de passe');
    }
}

function disconnect()
{
    $_SESSION = array();
    session_destroy();
    header('Location: index.php');
}

function addComment($postId, $title, $userId, $content)
{
    $data = [
    'postId' => $postId,
    'title' => $title,
    'userId' => $userId,
    'content' => $content,
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

function updatedComment($commentId, $userId, $title, $content)
{
    $commentManager = new Gaetan\P4\Model\CommentManager();
    if ($commentManager->exists($commentId))
    {
        $comment = $commentManager->getComment($commentId);
        if ($comment->userId() == $userId) {
            $data = ['id' => $commentId,
                    'userId' => $userId,
                    'title' => $title,
                    'content' => $content];
            $commentUpdated = new Gaetan\P4\Model\Comment($data);
            $affectedLines = $commentManager->update($commentUpdated);
            if ($affectedLines == false) {
                throw new Exception('Impossible de modifier le commentaire.');
            }
            else {
                header('Location: index.php?action=post&id=' . $comment->postId());
            }
        }
        else {
            throw new Exception('Identifiant incorrect.');
        }
    }
    else {
        throw new Exception('Identifiant incorrect.');
    }
}

function deleteComment($userId, $commentId)
{
    $commentManager = new Gaetan\P4\Model\CommentManager();
    if ($commentManager->exists($commentId)) {
        $comment = $commentManager->getComment($commentId);
        if ($comment->userId() == $userId) {
            $affectedLines = $commentManager->delete($commentId);
            if ($affectedLines == false) {
                throw new Exception('Il vous est impossible de faire cette action');
            }
            else {
                header('Location: index.php?action=post&id=' . $comment->postId());
            }
        }
        else {
            throw new Exception('Il vous est impossible de faire cette action');
        }
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}

function reported($commentId, $reason)
{
    $commentManager = new Gaetan\P4\Model\CommentManager();

    if ($commentManager->exists($commentId))
    {
        $data = ['userId' => $_SESSION['user_id'],
                'commentId' => $commentId,
                'reason' => $reason];
        $report = new Gaetan\P4\Model\Report($data);
        $reportManager = new Gaetan\P4\Model\ReportManager();
        $affectedLines = $reportManager->add($report);

        if ($affectedLines == false) {
            throw new Exception('Impossible de modifier le commentaire.');
        }
        else {
            $comment = $commentManager->getComment($commentId);
            header('Location: index.php?action=post&id=' . $comment->postId());
        }
    }
    else {
        throw new Exception('Identifiant incorrect.');
    }
}

function addPost($userId, $type, $title, $content)
{
    $data = ['userId' => $userId,
            'type' => $type,
            'title' => $title,
            'content' => $content];
    $post = new Gaetan\P4\Model\Post($data);
    $postManager = new Gaetan\P4\Model\PostManager();

    $affectedLines = $postManager->add($post);

    if ($affectedLines == false) {
        throw new Exception('Impossible d\'ajouter le commentaire.');
    }
    else {
        header('Location: index.php?action=listPosts');
    }
}

function updatedPost($id, $type, $title, $content)
{
    $postManager = new Gaetan\P4\Model\PostManager();
    if ($postManager->exists($id))
    {
        $data = ['id' => $id,
                'type' => $type,
                'title' => $title,
                'content' => $content];
        $post = new Gaetan\P4\Model\Post($data);
        $affectedLines = $postManager->update($post);
        if ($affectedLines == false) {
            throw new Exception('Impossible de modifier le billet.');
        }
        else {
            header('Location: index.php');
        }
    }
    else {
        throw new Exception('Identifiant de billet incorrect.');
    }
}

function deletePost($userId, $postId)
{
    $postManager = new Gaetan\P4\Model\PostManager();
    if ($postManager->exists($postId)) {
        $post = $postManager->getPost($postId);
        if ($post->userId() == $userId) {
            $affectedLines = $postManager->delete($postId);
            if ($affectedLines == false) {
                throw new Exception('Il vous est impossible de faire cette action');
            }
            else {
                header('Location: index.php?action=updateListPosts');
            }
        }
        else {
            throw new Exception('Il vous est impossible de faire cette action');
        }
    }
    else {
        throw new Exception('Aucun identifiant de billet envoyé');
    }
}

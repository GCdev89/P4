<?php
require_once('model/Manager.php');
require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/UserManager.php');

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
            header('Location: index.php?action=registered');
        }
    }
    else {
        throw new Exception('Ce pseudo existe déjà, merci d\'en choisir un autre ');
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

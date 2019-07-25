<?php ob_start(); ?>

<a class="navbar-brand" href="index.php">Super Blog</a>
<ul class="navbar-nav flex-row mr-auto ml-4 mt-2 mt-lg-0">
    <li class="nav-item pr-3"><a class="nav-link" href="index.php">Accueil</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Chapitres</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Annonces</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Général</a></li>
</ul>
<?php
if (isset($_SESSION['user_id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role']))
{
    echo
     '<p class="text-light mr-4 py-auto">Bonjour ' . $_SESSION['pseudo'] . '</p>
     <a href="index.php?action=disconnect" class="btn btn-outline-danger">Déconnexion</a>';
}
else
{
    echo
    '<form class="form-inline" action="index.php?action=connect" method="post" >
        <input class="form-control mr-2" type="text" name="pseudo" placeholder="Pseudo"/>
        <input class="form-control mr-2" type="password" name="password" placeholder="Mot de passe" />
        <button class="btn btn-outline-success" type="submit">Connexion</button>
    </form>
    <a href="index.php?action=registration&amp;sent=no" class="ml-3 btn btn-outline-warning">Inscription</a>';
}
?>

<?php $nav = ob_get_clean(); ?>

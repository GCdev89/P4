<?php ob_start(); ?>

<a class="navbar-brand font-italic text-warning" href="index.php">Billet simple pour l'Alaska</a>
<ul class="navbar-nav flex-row mr-auto ml-3 mt-2 mt-lg-0">
    <li class="nav-item pr-3"><a class="nav-link" href="index.php">Accueil</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="index.php?action=getByType&amp;type=chapter">Chapitres</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="index.php?action=getByType&amp;type=announcement">Annonces</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="index.php?action=getByType&amp;type=general">Général</a></li>
</ul>
<?php if (isset($_SESSION['user_id']) && isset($_SESSION['pseudo'])): ?>
    <p class="text-light mr-4"><span class="badge badge-info mr-3 my-0 p-2"><a href="index.php?action=user_profile" class=" text-decoration-none text-light"><?= htmlspecialchars($_SESSION['pseudo'])?></a></span>
    <a href="index.php?action=disconnect" class="m-0 btn btn-outline-danger">Déconnexion</a></p>
    <?php else: ?>
        <form class="form-inline" action="index.php?action=connect" method="post" >
            <input class="form-control mr-2" type="text" name="pseudo" placeholder="Pseudo"/>
            <input class="form-control mr-2" type="password" name="password" placeholder="Mot de passe" />
            <button class="btn btn-outline-success" type="submit">Connexion</button>
        </form>
        <a href="index.php?action=registration&amp;sent=no" class="ml-3 btn btn-outline-warning">Inscription</a>
<?php endif; ?>

<?php $nav = ob_get_clean(); ?>

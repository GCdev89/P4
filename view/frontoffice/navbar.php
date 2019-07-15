<?php ob_start(); ?>
<a class="navbar-brand" href="index.php">Super Blog</a>
<ul class="navbar-nav flex-row mr-auto ml-4 mt-2 mt-lg-0">
    <li class="nav-item pr-3"><a class="nav-link" href="index.php">Accueil</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Chapitres</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Annonces</a></li>
    <li class="nav-item pr-3"><a class="nav-link" href="#">Général</a></li>
</ul>
<form class="form-inline" action="traitement.php">
    <input class="form-control mr-2" type="text" name="pseudo" placeholder="Pseudo"/>
    <input class="form-control mr-2" type="password" name="password" placeholder="Password" />
    <button class="btn btn-outline-primary" type="submit">Connexion</button>
</form>
<?php $nav = ob_get_clean(); ?>

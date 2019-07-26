<?php
$title = 'Blog Listes des billets';
$h1 = 'Vous êtes inscrit'
?>

<?php ob_start(); ?>
<div class="col-4 mx-auto px-auto">
    <p>Bienvenue sur le blog <?= $_SESSION['pseudo'] ?></p>
    <p>Cliquez pour revenir à la <a href="index.php">liste des articles</a>.</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('view/frontoffice/navbar.php'); ?>
<?php require('template.php'); ?>

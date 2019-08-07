<?php
$h1 = '<h1 class="display-5  font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="col-lg-4 mx-auto px-auto bg-light rounded">
    <p>Bienvenue sur le blog <?= $_SESSION['pseudo'] ?></p>
    <p>Cliquez pour revenir à la <a href="index.php">liste des articles</a>.</p>
</div>

<?php $content = ob_get_clean(); ?>

<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

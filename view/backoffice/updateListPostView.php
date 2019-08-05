<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="row mx-auto px-auto">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link text-light font-weight-bold bg-dark active" href="#">Tous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark font-weight-bold" href="#">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark font-weight-bold" href="#">Annonces</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-dark font-weight-bold" href="#">Général</a>
            </li>
        </ul>
<?php foreach ($posts as $aPost): ?>
    <div class="row mt-3">
        <div class="col-12 my-auto">
            <div class="row d-flex justify-content-between bg-info text-light rounded-top">
                <p class="m-2 pt-1 pb-0"><span class="h4"><?= htmlspecialchars($aPost->title())?></span> par : <?=htmlspecialchars($aPost->userPseudo())?>, le : <?=htmlspecialchars($aPost->date())?></p>
                <p class="m-2"><span class="badge badge-dark m-2 p-2"><?= $aPost->type()?></span><a href="index.php?action=updatePost&amp;id=<?= $aPost->id()?>" class="btn btn-outline-dark btn-sm">Modifier</a></p>
            </div>
            <div class="row">
                <div class="post_content_overlay col-12 p-0">
                    <div class="px-3 py-1 post_content" ><?=$aPost->content()?></div>
                </div>
            </div>
        </div>
    </div>
<?php endforeach; ?>

</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

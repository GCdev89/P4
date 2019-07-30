<?php
$title = 'Blog Listes des billets';
$h1 = 'Le blog'
?>

<?php ob_start(); ?>
<div class="mx-auto px-auto">
    <div class="row">
        <ul class="nav nav-pills">
            <li class="nav-item">
                <a class="nav-link active" href="#">Tous</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Chapitres</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Annonces</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Général</a>
            </li>
        </ul>
    </div>
<?php foreach ($posts as $aPost): ?>
    <div class="row mt-3">
        <div class="col-12 my-auto">
            <div class="row  pt-2 bg-info text-light">
                <p class="pl-3 pt-1 pb-0"><span class="h4"><?= htmlspecialchars($aPost->title())?></span> par : <?=htmlspecialchars($aPost->userPseudo())?>, le : <?=htmlspecialchars($aPost->date())?></p>
            </div>
            <div class="row">
                <div class="post_overlay col-12 p-0">
                    <div class="px-3 py-1 post" ><?=$aPost->content()?></div>
                </div>
            </div>
            <div class="row">
                <p class="col-4"><a href="index.php?action=updatePost&amp;id=<?= $aPost->id()?>">Modifier</a></p>
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

<?php ob_start(); ?>
<div class="row mx-auto px-auto">
    <ul class="nav nav-pills">
        <li class="nav-item ">
            <a class="nav-link font-weight-bold <?php if(isset($isTypeActive) && $isTypeActive == 'all'){echo'active bg-dark';}else{echo'text-dark';} ?>" href="index.php?action=update_list_posts">Tous</a>
        </li>
        <li class="nav-item">
            <a class="nav-link font-weight-bold <?php if(isset($isTypeActive) && $isTypeActive == 'chapter'){echo'active bg-dark';}else{echo'text-dark';} ?>" href="index.php?action=update_list_posts&amp;type=chapter">Chapitres</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link font-weight-bold <?php if(isset($isTypeActive) && $isTypeActive == 'announcement'){echo'active bg-dark';}else{echo'text-dark';} ?>" href="index.php?action=update_list_posts&amp;type=announcement">Annonces</a>
        </li>
        <li class="nav-item ">
            <a class="nav-link font-weight-bold <?php if(isset($isTypeActive) && $isTypeActive == 'general'){echo'active bg-dark';}else{echo'text-dark';} ?>" href="index.php?action=update_list_posts&amp;type=general">Général</a>
        </li>
    </ul>
<?php foreach ($posts as $aPost): ?>
    <div class="row mt-3 mx-auto">
        <div class="post col-lg-12 my-auto">
            <div class="row d-flex justify-content-between bg-dark text-light rounded-top">
                <p class="m-2 pt-1 pb-0"><span class="h4"><?= htmlspecialchars($aPost->title())?></span> par : <?=htmlspecialchars($aPost->userPseudo())?>, le : <?=htmlspecialchars($aPost->date())?></p>
                <p class="my-md-auto"><span class="badge badge-info m-2 my-md-auto p-2"><?= $aPost->type()?></span><a href="index.php?action=updatePost&amp;id=<?= $aPost->id()?>" class="btn btn-outline-light btn-sm">Modifier</a></p>
            </div>
            <div class="row">
                <div class="post_content_overlay col-lg-12 p-0">
                    <div class="px-3 py-1 post_content" ><?=$aPost->content()?></div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>

<?php if (isset($countPages)): ?>
    <?= $pagination ?>
<?php endif; ?>

</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

<?php
$title = 'Blog Listes des billets';
$h1 = 'Le blog'
?>



<?php ob_start(); ?>
<div class="mx-auto px-auto">
<?php
foreach ($posts as $aPost) {
    echo
    '<div class="row mt-3">
    <div class="col-12 my-auto">
        <div class="row  pt-2 bg-info text-light">
            <p class="pl-3 pt-1 pb-0"><span class="h4">' . htmlspecialchars($aPost->title()) . '</span> par : ' .  htmlspecialchars($aPost->userPseudo()) . ', le : ' .  htmlspecialchars($aPost->date()) .'</p>
        </div>
        <div class="row">
            <div class="post_overlay col-12 p-0">
                <div class="col-12 px-3 py-1 post" >' .  $aPost->content() . '</div>
            </div>
        </div>
        <div class="row">
            <p class="col-4"><a href="index.php?action=post&amp;id=' . $aPost->id() .'">Commentaires</a></p>
        </div>
    </div>
</div>';
}
?>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

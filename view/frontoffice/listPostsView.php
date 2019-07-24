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
        <div class="row bg-info text-light">
            <p class="pl-3">' . htmlspecialchars($aPost->title()) . ' par : ' .  htmlspecialchars($aPost->userPseudo()) . ', le : ' .  htmlspecialchars($aPost->date()) .'</p>
        </div>
        <div class="row">
            <p class="pl-3 pb-2 bg-light" >' .  htmlspecialchars($aPost->content()) . '</p>
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
<?php require($navbar); ?>
<?php require('template.php'); ?>

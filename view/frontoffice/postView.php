<?php $title = "Blog Commentaires"; ?>

<?php ob_start(); ?>

<div class="row mt-3">
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <div class="col-12 my-auto">
        <div class="row bg-info text-light">
            <p class="pl-2"> <?= htmlspecialchars($post->title()) ?> par :  <?= htmlspecialchars($post->author()) ?> le : <?= htmlspecialchars($post->datePost()) ?> </p>
        </div>
        <div class="row">
            <p class="p-2 bg-light" ><?= htmlspecialchars($post->content()) ?></p>
        </div>
    </div>
</div>
<h2 class="mt-3 mb-5">Commentaires</h2>

<div class="row">
<?php
foreach ($comments as $aComment) {

    echo
    '<div class="col-11 mx-auto my-auto">
        <div class="row bg-warning text-light">
            <p class="pl-2">' . htmlspecialchars($aComment->title()) . ' par : ' . htmlspecialchars($aComment->author()) . ' le : ' . htmlspecialchars($aComment->dateComment()) .'</p>
        </div>
        <div class="row">
            <p class="p-2 col-12 bg-light" >' . htmlspecialchars($aComment->content()) .'</p>
        </div>
    </div>';
}
?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require($navbar); ?>
<?php require('template.php'); ?>

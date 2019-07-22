<?php $title = "Blog Commentaires"; ?>

<?php ob_start(); ?>

<div class="row mt-3">
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <div class="col-12 my-auto">
        <div class="row bg-info text-light">
            <p class="pl-2"> <?= htmlspecialchars($post->title()) ?> par :  <?= htmlspecialchars($post->userId()) ?> le : <?= htmlspecialchars($post->date()) ?> </p>
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
            <p class="pl-2">' . htmlspecialchars($aComment->title()) . ' par : ' . htmlspecialchars($aComment->userId()) . ' le : ' . htmlspecialchars($aComment->date()) .'</p>
        </div>
        <div class="row">
            <p class="p-2 col-12 bg-light" >' . htmlspecialchars($aComment->content()) .'</p>
        </div>
    </div>';
}
?>
</div>
<div class="row mt-4">
    <form action="index.php?action=addComment&amp;id=<?= htmlspecialchars($post->id()) ?>" method="post" class="mx-auto mb-5 p-2 bg-light">
        <div class="form-group">
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div class="form-group" >
            <label for="title">Titre du commentaire</label><br />
            <input type="text" id="title" name="title" />
        </div>
        <div class="form-group">
            <label for="content">Commentaire</label><br />
            <textarea id="content" name="content"></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" />
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require($navbar); ?>
<?php require('template.php'); ?>

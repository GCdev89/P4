<?php
$title = 'Blog Commentaires';
$h1 = 'Signaler un commentaire'
?>

<?php ob_start(); ?>
<div class="col-12 mx-auto px-auto">
    <div class="row mt-3">
        <p><a href="index.php?action=post&amp;id=<?= htmlspecialchars($comment->postId()); ?>">Retour au billet</a></p>
        <div class="row col-12 mt-4">
            <div class="col-11 mx-auto my-auto">
                <div class="row bg-warning text-light">
                    <p class="pl-2"> <?=htmlspecialchars($comment->title())?> . par : <?= htmlspecialchars($comment->userPseudo())?>  le : <?= htmlspecialchars($comment->date())?></p>
                </div>
                <div class="row">
                    <p class="p-2 col-12 bg-light" ><?= htmlspecialchars($comment->content())?></p>
                </div>
            </div>
        </div>
        <div class="row col-12 mt-4">
            <p>Vous voulez signaler ce commentaire ?</p>
            <div class="row col-12 mt-4">
                <form action="index.php?action=reported&amp;id=<?= htmlspecialchars($comment->id()); ?>" method="post" class="form-inline">
                    <div class="form-group">
                        <label for="reason">Quelle est la raison du signalement ?</label>
                        <select name="reason" id="reason" class="form-control ml-3">
                            <option value="NULL" selected="selected"></option>
                            <option value="discrimination">Discriminatoire</option>
                            <option value="hate">Propos haineux</option>
                            <option value="else">Autre</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning ml-3" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

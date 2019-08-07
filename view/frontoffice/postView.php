<?php ob_start(); ?>
<div class="row mt-3 mx-auto px-auto">
    <p><a href="index.php">Retour à la liste des billets</a></p>
    <div class="col-12 my-auto post">
        <div class="row d-flex justify-content-between bg-info text-light rounded-top">
            <p class="m-2"><span class="h4"><?= htmlspecialchars($post->title()) ?></span>  par : <?=htmlspecialchars($post->userPseudo()) ?>, le : <?= htmlspecialchars($post->date()) ?> </p>
            <p class="badge badge-dark m-2 p-2"><?= $post->type()?></p>
        </div>
        <div class="row">
            <div class="post_content_overlay col-12 p-0">
                <div class="m-2 post_content" ><?= $post->content() ?></div>
            </div>
        </div>
    </div>
    <div class="row mx-auto">
        <h2 class="mt-4 mb-5">Commentaires</h2>
    <?php foreach ($comments as $aComment): ?>
        <div class="col-11 mx-auto my-2">
            <div class="row d-flex justify-content-between bg-secondary text-light rounded-top">
                <p class="m-2"><?= htmlspecialchars($aComment->title())?> par : <?= htmlspecialchars($aComment->userPseudo())?> le : <?= htmlspecialchars($aComment->date())?></p>
                <?php if (isset($_SESSION['user_id'])): ?>
                    <?php if ($_SESSION['user_id'] == $aComment->userId()): ?>
                        <p class="m-2"><a href="index.php?action=comment_edit&amp;id=<?= $aComment->id()?>" class="btn btn-outline-light btn-sm">Modifier</a></p>
                    <?php else: ?>
                        <?php if ($aComment->report() == 1): ?>
                            <p class="m-2">En attente de modération.</p>
                        <?php else: ?>
                            <p class="m-2"><a href="index.php?action=report&amp;id=<?= $aComment->id()?>" class="btn btn-outline-warning btn-sm">Signaler</a></p>
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>
                </div>
                <div class="row">
                    <div class="p-2 col-12 bg-light rounded-bottom" ><?= $aComment->content()?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['pseudo'])): ?>
        <div class="row col-11 mx-auto mt-4">
            <form action="index.php?action=addComment&amp;id=<?= htmlspecialchars($post->id())?>" method="post" class="col-12 mx-auto mb-5 p-auto bg-light rounded">
                <div class="form-group" >
                    <label for="title">Titre du commentaire</label><br />
                    <input type="text" id="title" name="title" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="content">Commentaire</label><br />
                    <textarea id="content" name="content" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

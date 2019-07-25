<?php
$title = 'Blog Commentaires';
$h1 = 'Commentaires'
?>

<?php ob_start(); ?>
<div class="col-12 mx-auto px-auto">
    <div class="row mt-3">
        <p><a href="index.php?action=post&amp;id=<?= htmlspecialchars($comment->postId()); ?>">Retour au billet</a></p>
        <div class="row col-12 mt-4">
            <form action="index.php?action=comment_updated&amp;id=<?= $comment->postId(); ?>&amp;id_comment=<?= $comment->id(); ?>" method="post" class="col-8 mx-auto mb-5 p-auto bg-light">
                <div class="form-group" >
                    <label for="title">Titre du commentaire</label><br />
                    <input type="text" id="title" name="title" value="<?= $comment->title(); ?>" class="form-control" />
                </div>
                <div class="form-group">
                    <label for="content">Commentaire</label><br />
                    <textarea id="content" name="content" class="form-control"><?= $comment->content(); ?></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontoffice/navbar.php'); ?>
<?php require('template.php'); ?>

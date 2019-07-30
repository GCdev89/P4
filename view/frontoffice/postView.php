<?php
$title = 'Blog Commentaires';
$h1 = 'Commentaires'
?>

<?php ob_start(); ?>
<div class="mx-auto px-auto">
    <div class="row mt-3">
        <p><a href="index.php">Retour à la liste des billets</a></p>
        <div class="col-12 my-auto">
            <div class="row bg-info text-light">
                <p class="pl-2"> <?= htmlspecialchars($post->title()) ?> par : <?=htmlspecialchars($post->userPseudo()) ?>, le : <?= htmlspecialchars($post->date()) ?> </p>
            </div>
            <div class="row">
                <div class="px-3 py-1 bg-light" ><?= $post->content() ?></div>
            </div>
        </div>
    </div>
    <h2 class="mt-3 mb-5">Commentaires</h2>

    <div class="row">
    <?php
    foreach ($comments as $aComment) {

        echo
        '<div class="col-11 mx-auto my-2">
            <div class="row bg-warning text-light">
                <p class="pl-2">' . htmlspecialchars($aComment->title()) . ' par : ' . htmlspecialchars($aComment->userPseudo()) . ' le : ' . htmlspecialchars($aComment->date()) .'</p>
            </div>
            <div class="row">
                <div class="p-2 col-12 bg-light" >' . $aComment->content() .'</div>
            </div>
        </div>';
        if (isset($_SESSION['user_id']))
        {
            if ($_SESSION['user_id'] == $aComment->userId())
            {
                echo
                '<p><a href="index.php?action=comment_edit&amp;id=' . $aComment->id() .'" class="btn btn-outline-primary">Modifier</a></p>';
            }
            else {
                echo
                '<p><a href="index.php?action=report&amp;id=' . $aComment->id() .'" class="btn btn-outline-warning">Signaler</a></p>';
            }
        };
    }
    ?>
    </div>

    <?php if (isset($_SESSION['user_id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role']))
    {
        echo
        '<div class="row mt-4">
            <form action="index.php?action=addComment&amp;id=' . htmlspecialchars($post->id()) . '" method="post" class="col-8 mx-auto mb-5 p-auto bg-light">
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
        </div>';
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

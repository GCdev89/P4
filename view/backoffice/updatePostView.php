<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="row col-12">
    <p><a href="index.php?action=updateListPost">Retour à la liste des billets</a></p>

    <form action="index.php?action=updatedPost&amp;id=<?= htmlspecialchars($post->id()) ?>" method="post" class="col-12 mx-auto mb-5 p-auto bg-dark text-light rounded">
        <div class="form-group">
            <label for="type">Type de billet</label>
            <select name="type" id="type" class="form-control col-2">
                <option value="<?= htmlspecialchars($post->type())?>" selected="selected"><?= htmlspecialchars($post->type())?></option>
                <option value="chapter">Chapitre</option>
                <option value="announcement">Annonce</option>
                <option value="general">Général</option>
            </select>
        </div>
        <div class="form-group" >
            <label for="title">Titre</label><br />
            <input type="text" id="title" name="title" value="<?= htmlspecialchars($post->title())?>" class="form-control" />
        </div>
        <div class="form-group">
            <label for="content">Contenu</label><br />
            <textarea id="content" name="content" class="form-control"><?=$post->content()?></textarea>
        </div>
        <div class="form-group d-flex justify-content-around mb-2">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a href="index.php?action=delete_post&amp;id=<?= $post->id()?>" class="btn btn-danger">Supprimer</a>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

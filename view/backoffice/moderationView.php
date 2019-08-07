<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="row col-12">
    <div class="col-12 mx-auto my-2 bg-dark text-light">
        <p>Commentaires à modérer  <span class="badge badge-warning"><?= $reportCount ?></span></p>
    </div>
    <table class="table table-striped table-dark">
        <thead>
            <th scope="col">Auteur</th>
            <th scope="col">Titre du commentaire</th>
            <th scope="col">Contenu</th>
            <th scope="col">Date de création</th>
        </thead>
        <tbody>
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $aComment): ?>
                    <tr>
                        <td><?=htmlspecialchars($aComment->userPseudo())?></td>
                        <td><?=htmlspecialchars($aComment->title())?></td>
                        <td><?=$aComment->content()?></td>
                        <td><?=htmlspecialchars($aComment->date())?></td>
                        <td><a href="index.php?action=ignore&amp;id=<?=htmlspecialchars($aComment->id())?>" class="btn btn-primary btn-sm">Ignorer</a></td>
                        <td><a href="index.php?action=delete_reported&amp;id=<?=htmlspecialchars($aComment->id())?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
    <?php if (isset($countPages)): ?>
        <?= $pagination ?>
    <?php endif; ?>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

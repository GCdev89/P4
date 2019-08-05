<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="col-12 mx-auto px-auto">
    <div class="row">
        <table class="table table-striped table-dark">
            <thead>
                <th scope="col">Pseudo</th>
                <th scope="col">Role</th>
                <th scope="col">Mail</th>
                <th scope="col">Date de création</th>
                <th scope="col">Action</th>                
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->pseudo() ?></td>
                        <td><?= $user->role() ?></td>
                        <td><?= $user->mail() ?></td>
                        <td><?= $user->date() ?></td>
                        <?php if ($user->role() != 'admin'): ?>
                        <td><a href="index.php?action=delete_user&amp;id=<?=htmlspecialchars($user->id())?>" class="btn btn-danger btn-sm">Supprimer</a></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

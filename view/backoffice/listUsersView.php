<?php
$title = 'Blog';
$h1 = 'Liste des utilisateurs'
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
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user->pseudo() ?></td>
                        <td><?= $user->role() ?></td>
                        <td><?= $user->mail() ?></td>
                        <td><?= $user->date() ?></td>
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

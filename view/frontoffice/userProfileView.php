<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
?>

<?php ob_start(); ?>
<div class="col-12 mx-auto px-auto">
    <div class="row">
        <table class="table table-striped table-dark">
            <thead>
                <th scope="col">Pseudo</th>
                <th scope="col">Mail</th>
                <th scope="col">Date de création</th>
            </thead>
            <tbody>
                <tr>
                    <td><?= $user->pseudo() ?></td>
                    <td><?= $user->mail() ?></td>
                    <td><?= $user->date() ?></td>

                </tr>
            </tbody>
        </table>
    </div>
    <div class="row mt-3 mx-auto px-auto">
        <div class="col-md-4 mr-4">
            <h3>Modifier votre mail</h3>
            <form class="form ml-2" action="index.php?action=update_mail" method="post" >
                <div class="form-group">
                    <input class="form-control mr-2" type="mail" name="mail" placeholder="Nouveau mail"/>
                </div>
                <div class="form-group">
                    <input class="form-control mr-2" type="password" name="password" placeholder="Mot de passe" />
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Modifier</button>

                </div>
            </form>
        </div>
        <div class="col-md-4 ml-4">
            <h3>Modifier votre mot de passe</h3>
            <form class="form ml-2" action="index.php?action=update_password" method="post" >
                <div class="form-group">
                    <input class="form-control mr-2" type="password" name="password" placeholder="Mot de passe" />
                </div>
                <div class="form-group">
                    <input class="form-control mr-2" type="password" name="new_password" placeholder="Nouveau mot de passe"/>
                </div>
                <div class="form-group">
                    <input class="form-control mr-2" type="password" name="confirm_new_password" placeholder="Confirmer le nouveau mot de passe" />
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit">Modifier</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

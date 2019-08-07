<?php
$h1 = '<h1 class="display-5 font-italic text-dark">Billet simple pour l\'Alaska</h1>';
$controlScript = '<script src="public/js/controlRegistration.js"></script>';
?>

<?php ob_start(); ?>
<div class="row col-12">
    <div id="registrationHelp" class="col-4 mt-5 mx-auto mb-5 pb-0 px-auto bg-light rounded">
        <p class="h5 mt-2 mb-5">Pour vous inscrire vous devez :</p>
        <ul class="list-group">
            <li id="registrationPseudo" class="list-group-item">Renseigner un Pseudo</li>
            <li id="registrationMail" class="list-group-item">Renseigner une adresse mail valide</li>
            <li id="registrationPassword" class="list-group-item">Renseigner un mot de passe compris entre 8 et 14 caractères</li>
            <li id="registrationVerifPassword" class="list-group-item">Vérifier le mot de passe</li>
        </ul>
    </div>
    <div class="col-md-4 mx-auto px-auto">
        <form action="index.php?action=registration&amp;sent=yes" method="post" id="register" class="col-12 mx-auto mt-5 px-auto py-2 bg-light rounded">
            <div class="form-group">
                <label for="pseudo">Pseudo</label><br />
                <input type="text" id="pseudo" name="pseudo" class="form-control" required="required" />
            </div>
            <div class="form-group" >
                <label for="mail">Adresse email</label><br />
                <input type="email" id="mail" name="mail" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label><br />
                <input type="password" id="password" name="password" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <label for="confirm_pass">Confirmation du mot de passe</label><br />
                <input type="password" id="confirm_password" name="confirm_password" class="form-control" required="required" />
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-success ">Inscription</button>
            </div>
        </form>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('template.php');

<?php
$title = 'Blog Listes des billets';
$h1 = 'Inscription'
?>



<?php ob_start(); ?>
<div class="col-4 mx-auto px-auto">
    <form action="index.php?action=registration&amp;sent=yes" method="post" class="col-12 mx-auto mt-5 px-auto py-2 bg-light">
        <div class="form-group">
            <label for="pseudo">Pseudo</label><br />
            <input type="text" id="pseudo" name="pseudo" class="form-control" />
        </div>
        <div class="form-group" >
            <label for="mail">Adresse email</label><br />
            <input type="email" id="mail" name="mail" class="form-control" />
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label><br />
            <input type="password" id="password" name="password" class="form-control" />
        </div>
        <div class="form-group">
            <label for="confirm_pass">Confirmation du mot de passe</label><br />
            <input type="password" id="confirm_pass" name="confirm_pass" class="form-control" />
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-success ">Inscription</button>
        </div>
    </form>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('view/frontoffice/navbar.php'); ?>
<?php require('template.php'); ?>

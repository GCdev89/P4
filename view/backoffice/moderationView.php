<?php
$title = 'Blog';
$h1 = 'Modération'
?>

<?php ob_start(); ?>
<div class="col-12 mx-auto px-auto">
    <div class="row">
    <?php foreach ($reports as $aReport): ?>
        <div class="col-11 mx-auto my-2">
            <div class="row bg-warning text-light">
                <p class="pl-2"> <?=htmlspecialchars($aReport->title())?> le : <?=htmlspecialchars($aReport->date())?></p>
            </div>
            <div class="row">
                <div class="p-2 col-12 bg-light" ><?=$aReport->content()?></div>
            </div>
        </div>
    <?php endforeach; ?>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php
require('view/frontoffice/navbar.php');
require('view/backoffice/adminBar.php');
require('view/frontoffice/template.php');

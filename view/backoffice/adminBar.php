<?php ob_start(); ?>
<?php if (isset($_SESSION['role'])): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <div class="col-1 fixed-top mt-5 p-3 navbar-dark bg-dark">
            <h4 class="h5 text-light">Administration</h4>
            <ul class="navbar-nav">
                <li class="nav-item"><a href="index.php?action=new" class="nav-link">Nouveau billet</a></li>
                <li class="nav-item"><a href="index.php?action=updateListPosts" class="nav-link">Editer billet</a></li>
                <li class="nav-item"><a href="index.php?action=moderation" class="nav-link">Modération</a></li>
                <li class="nav-item"><a href="index.php?action=users_list" class="nav-link">Utilisateurs</a></li>
            </ul>
        </div>
    <?php endif; ?>
<?php endif; ?>


<?php $adminBar = ob_get_clean(); ?>

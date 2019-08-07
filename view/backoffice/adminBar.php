<?php ob_start(); ?>
<?php if (isset($_SESSION['role'])): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <div id="admin_bar" class="col-1 fixed-top p-3 navbar-dark bg-dark">
            <h4 class="h5 text-light">Administration</h4>
            <ul class="navbar-nav">
                <li class="nav-item <?php if(isset($isActive) && $isActive == 'newPost'){echo'active';} ?>"><a href="index.php?action=new" class="nav-link">Nouveau billet</a></li>
                <li class="nav-item <?php if(isset($isActive) && $isActive == 'update_list_posts'){echo'active';} ?>"><a href="index.php?action=update_list_posts" class="nav-link">Editer billet</a></li>
                <li class="nav-item <?php if(isset($isActive) && $isActive == 'moderation'){echo'active';} ?>"><a href="index.php?action=moderation" class="nav-link">Modération</a></li>
                <li class="nav-item <?php if(isset($isActive) && $isActive == 'users'){echo'active';} ?>"><a href="index.php?action=users_list" class="nav-link">Utilisateurs</a></li>
            </ul>
        </div>
    <?php endif; ?>
<?php endif; ?>


<?php $adminBar = ob_get_clean(); ?>

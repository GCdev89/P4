<?php ob_start(); ?>
<?php if (isset($_SESSION['role'])): ?>
    <?php if ($_SESSION['role'] == 'admin'): ?>
        <h4 class="h5 text-light">Administration</h4>
        <ul class="navbar-nav">
            <li class="nav-item"><a href="#" class="nav-link">Accueil</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Nouveau Billet</a></li>
            <li class="nav-item"><a href="#" class="nav-link">Modération</a></li>
        </ul>
    <?php endif; ?>
<?php endif; ?>


<?php $adminBar = ob_get_clean(); ?>

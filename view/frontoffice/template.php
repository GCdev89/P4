<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <link href="style.css" rel="stylesheet" />
    </head>

    <body>

        <nav class="navbar sticky-top navbar-dark bg-dark">
            <?= $nav ?>
        </nav>
        <div class="container-fluid">
            <div class="col-1 fixed-top mt-5 p-3 navbar-dark bg-dark">
                <h4 class="text-light">Archives</h3>
                <ul class="navbar-nav">
                    <li class="nav-item pr-3"><a class="nav-link" href="#">Chapitres</a></li>
                    <li class="nav-item pr-3"><a class="nav-link" href="#">Annonces</a></li>
                    <li class="nav-item pr-3"><a class="nav-link" href="#">Général</a></li>
                </ul>
            </div>
            <div class="col-md-8 mx-auto">
                <h1 class="page-header ml-4 my-4"><?= $h1 ?></h1>
                <div class="row">
                    <?= $content ?>
                </div>
            </div>
        </div>

    </body>
</html>

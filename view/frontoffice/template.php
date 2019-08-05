<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Billet simple pour l\'Alaska</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="public/tinymce/tinymce.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
          selector: '#content'
        });
        </script>

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/styleMain.css" rel="stylesheet" />
    </head>

    <body>

        <nav class="navbar sticky-top navbar-dark bg-dark">
            <?= $nav ?>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <?= $adminBar ?>
                <div class="jumbotron mx-auto mt-4 px-auto">
                    <div class="container">
                        <?= $h1 ?>
                    </div>
                </div>

                <div class="row col-12">
                    <div class="col-md-8 mx-auto">
                            <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($registerScript)) {
            echo $registerScript;
        } ?>

    </body>
</html>

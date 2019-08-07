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

        <nav class="navbar navbar-expand-md sticky-top navbar-dark bg-dark">
            <?= $nav ?>
        </nav>
        <div class="container-fluid">
            <div class="row">
                <?= $adminBar ?>
                <div class="jumbotron mx-auto mt-4 px-auto">
                    <div class="container">
                        <h1 class="display-5  font-italic text-warning">Billet simple pour l'Alaska</h1>
                    </div>
                </div>


                <div class="row col-md-12">
                    <div class="col-md-8 mx-auto">
                            <?= $content ?>
                    </div>
                </div>
            </div>
        </div>
        <?php if (isset($controlScript)) {
            echo $controlScript;
        } ?>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </body>
</html>

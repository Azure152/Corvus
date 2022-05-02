<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corvus | Homeworks</title>
        <?php include_once APPROOT.'/public/layouts/links.php' ?>
    </head>
    <body id="body">
        <main id="main">
            <div class="page-content homework pd-2">
                <a href="<?php echo "/corvus/extras/create" ?>" class="btn btn-extra more">
                    <span class="more"> <i class="fa-solid fa-plus fa-Sxxl"></i> </span>
                </a>
                <?php 
                    foreach ($data as $exta):
                ?>
                    <a href="<?php echo "/corvus/extras/edit/{$exta['id']}"  ?>" class="btn btn-homework">
                        <span class="title"><?php echo $exta['title'] ?></span>
                        <div class="dates">
                            <span><b>Inicia: </b><?php echo $exta['date_start'] ?></span>
                            <span><b>Plazo Maxiamo: </b><?php echo $exta['date_end'] ?></span>
                        </div>
                    </a>
                <?php 
                    endforeach;
                ?>
            </div>
            <?php include_once APPROOT.'/public/layouts/navLateral.php' ?>
        </main>
    </body>
</html>
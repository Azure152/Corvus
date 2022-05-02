<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corvus | Homeworks</title>
        <?php include_once APPROOT.'/public/layouts/links.php' ?>
        <link rel="stylesheet" href="<?php echo SERVER_URL ?>/public/css/modal.css">
    </head>
    <body id="body">
        <main id="main">
            <div class="page-content homework pd-2">
                <a href="/corvus/homeworks/create" class="btn btn-homework more">
                    <span class="more"> <i class="fa-solid fa-plus fa-Sxxl"></i> </span>
                </a>
                <?php 
                    foreach ($data as $homework):
                ?>
                    <a href="<?php echo "/corvus/homeworks/edit/{$homework['id']}"  ?>" class="btn btn-homework">
                        <span class="title"><?php echo $homework['title'] ?></span>
                        <div class="dates">
                            <span><b>Plazo Maxiamo: </b><?php echo $homework['date_term'] ?></span>
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
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corvus | College</title>
        <?php include_once APPROOT . '/public/layouts/links.php' ?>
        <script src="<?php echo SERVER_URL ?>/public/js/filter.js" defer></script>
    </head>
    <body id="body">
        <main id="main">
            <div class="page-content project-category">
                <div class="box mg-2">
                    <h1 class="title">
                        <b>Proyectos Universidad</b>
                        <label>
                            <fieldset class="field-input-container">
                                <form action="" method="get">
                                    <select class="orderBy" name="orderBy" id="">
                                        <option value="title">Titulo </option>
                                        <option value="date_end">Fecha (proxima) </option>
                                    </select>
                                    <input type="submit" name="" class="project-filter">
                                </form>
                            </fieldset> 
                        </label>
                    </h1>
                    <div class="content">
                        <?php
                            foreach($data as $project):
                        ?>
                            <a href="<?php echo SERVER_URL . '/projects/edit/' . $project['id'] ?>" class="btn btn-project" value="<?php echo $project['id'] ?>">
                                <span class="title"><?php echo $project['title'] ?></span>
                                <div class="dates">
                                    <span><b>Plazo Maxiamo: </b><?php echo $project['date_end'] ?></span>
                                </div>
                            </a>
                        <?php
                            endforeach;
                        ?>
                    </div>
                </div>
            </div>
            <?php include_once APPROOT . '/public/layouts/navLateral.php' ?>
        </main>
    </body>
</html>
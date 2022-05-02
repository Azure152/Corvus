<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Corvus | Project</title>
        <?php include_once APPROOT .'/public/layouts/links.php' ?>
    </head>
    <body id="body">
        <main id="main">
            <div class="page-content project-create project-edit fx-fullCenter">
                <div class="box mg-2 wt-50">
                    <h1 class="title pd-0_5">Editar proyecto</h1>
                    <form action="<?php echo "/corvus/extras/update/{$data['id']}" ?>" method="post">
                        <div class="form-content">
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Titulo: </legend>
                                    <input type="text" name="title" id="" placeholder="Titulo o nombre del proyecto" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}" value="<?php echo $data['title'] ?>">
                                </fieldset>
                            </label>
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Incia: </legend>
                                    <input type="date" name="date_start" id="" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}" value="<?php echo $data['date_start'] ?>">
                                </fieldset>
                            </label>
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Plazo: </legend>
                                    <input type="date" name="date_end" id="" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}" value="<?php echo $data['date_end'] ?>">
                                </fieldset>
                            </label>
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Categoria: </legend>
                                    <textarea name="summary" id="summary" cols="30" rows="5"><?php echo $data['summary'] ?></textarea>
                                </fieldset>
                            </label>
                        </div>
                        <div class="buttons-container">
                            <button type="submit" class="btn btn-primary" name="request" value="update">Guardar cambios</button>
                            <button type="reset" class="btn btn-warning">Resetear Campos</button>
                                <button type="submit" formaction="<?php echo "/corvus/extras/delete/{$data['id']}" ?>" class="btn btn-danger" name="request" value="delete">Eliminar Tarea</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include_once APPROOT.'/public/layouts/navLateral.php' ?>
        </main>
    </body>
</html>
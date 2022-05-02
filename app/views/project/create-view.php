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
            <div class="page-content project-create fx-fullCenter">
                <div class="box mg-2 wt-50">
                    <h1 class="title pd-0_5">Agregar proyecto</h1>
                    <form action="" method="post">
                        <div class="form-content">
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Titulo: </legend>
                                    <input type="text" name="title" id="" placeholder="Titulo o nombre del proyecto" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}">
                                </fieldset>
                            </label>
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>URL: </legend>
                                    <input type="text" name="url" id="" placeholder="URL del proyecto" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}">
                                </fieldset>
                            </label>
                            <label>
                                <fieldset class="field-input-container">
                                    <legend>Plazo: </legend>
                                    <input type="date" name="date_end" id="" pattern="[a-zA-Z0-9ñÑ_+-/].{1,}">
                                </fieldset>
                            </label>
                            <label for="category">
                                <fieldset class="field-input-container">
                                    <legend>Categoria: </legend>
                                    <select name="category" id="category">
                                        <option value="1">Proyecto Personal</option>
                                        <option value="2">Proyecto Universidad</option>
                                    </select>
                                </fieldset>
                            </label>
                        </div>
                        <div class="buttons-container">
                            <button type="submit" class="btn btn-primary">Agregar proyecto</button>
                            <button type="reset" class="btn btn-warning">Limpiar Campos</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php include_once APPROOT.'/public/layouts/navLateral.php' ?>
        </main>
    </body>
</html>
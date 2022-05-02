/* <=== ==================================================================
    Seccion de funciones
================================================================== ===> */

/* <== ====== Funcion crear un modal de tarea  ======  ==> */

async function getOne() {
    let dataFetch = { 
        'id' : 1, 
        'table' : 'projects', 
        'functionName' : 'getOne' 
    };

    fetch( 'http://127.0.0.1/corvus/app/libraries/functions.php', {
        method : 'POST',
        cache : 'no-cache',
        body : JSON.stringify(dataFetch)
    })
    .then(res => res.text())
    .then(res => console.log(res))
}

/* <== ====== Funcion crear un modal de tarea  ======  ==> */
function modalEditProject() {
    const modalBack = document.createElement('div');
    modalBack.classList.add('modalBack');
    modalBack.innerHTML = `
        <div class="box wt-60 modal">
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
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <button type="reset" class="btn btn-warning">Limpiar Campos</button>
                    <button type="button" class="btn btn-danger modalClose">Cerrar</button>
                </div>
            </form>
        </div>
    `;
    document.querySelector('#body').appendChild(modalBack);
}

/* <== ====== Funcion para cerrar un modal ======  ==> */

function modalClose() {
    document.querySelector('.modalBack').classList.add('remove');
    setTimeout(()=>{
        document.querySelector('#body').removeChild(document.querySelector('.modalBack'));

    }, 1000)
}


/* <=== ==================================================================
    Seccion de eventos
================================================================== ===> */

document.querySelectorAll('.btn-project').forEach(element => {
    element.addEventListener('click', (e)=>{
        modalEditProject();
        element.disabled = true;
        const modal = document.querySelector('.modal');
        modal.querySelector('.modalClose').addEventListener('click', ()=>{
            modalClose();
            element.disabled = false;
        })  
    })
});

// getOne()
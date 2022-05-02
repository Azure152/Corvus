/* <=== ==================================================================
    Seccion de funciones
================================================================== ===> */

/* <== ====== Funcion crear un modal de tarea  ======  ==> */
function modalMoreHomework() {
    const modalBack = document.createElement('div');
    modalBack.classList.add('modalBack');
    modalBack.innerHTML = `
        <div class="box wt-60 modal">
            <form action="" method="post">
                <div class="form-content">
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Titulo: </legend>
                            <input type="text" name="title" id="" pattern="[a-zA-Z0-9ñÑ-+] {1, }" placeholder="Titulo o nombre de la tarea" required>
                        </fieldset>
                    </label>
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Plazo maximo: </legend>
                            <input type="date" name="title" id="" pattern="[a-zA-Z0-9ñÑ-+] {1, }" required>
                        </fieldset>
                    </label>
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Resumen: </legend>
                            <textarea name="" id="" cols="30" rows="2" pattern="[a-zA-Z0-9ñÑ-+] {1, }" required></textarea>
                        </fieldset>
                    </label>
                </div>
                <div class="buttons-container">
                    <button type="submit" class="btn btn-primary">Agregar Tarea</button>
                    <button type="reset" class="btn btn-warning">Limpiar Campos</button>
                    <button type="button" class="btn btn-danger modalClose">Cerrar</button>
                </div>
            </form>
        </div>
    `;
    document.querySelector('#body').appendChild(modalBack);
}

/* <== ====== Funcion crear un modal de extras ======  ==> */
function modalMoreHomework() {
    const modalBack = document.createElement('div');
    modalBack.classList.add('modalBack');
    modalBack.innerHTML = `
        <div class="box wt-60 modal">
            <form action="" method="post">
                <div class="form-content">
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Titulo: </legend>
                            <input type="text" name="title" id="" pattern="[a-zA-Z0-9ñÑ_+-].{1,}" placeholder="Titulo o nombre de la tarea" required>
                        </fieldset>
                    </label>
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Fecha Inicio: </legend>
                            <input type="date" name="title" id="" pattern="[a-zA-Z0-9ñÑ_+-].{1,}" required>
                        </fieldset>
                    </label>
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Fecha fin: </legend>
                            <input type="date" name="title" id="" pattern="[a-zA-Z0-9ñÑ_+-].{1,}" required>
                        </fieldset>
                    </label>
                    <label>
                        <fieldset class="field-input-container">
                            <legend>Resumen: </legend>
                            <textarea name="" id="" cols="30" rows="2" pattern="[a-zA-Z0-9ñÑ_+-].{1,}" required></textarea>
                        </fieldset>
                    </label>
                </div>
                <div class="buttons-container">
                    <button type="submit" class="btn btn-primary">Agregar Tarea</button>
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
    Seccion de Eventos
================================================================== ===> */

if ( document.querySelector('.btn-homework.more') != null ) {
    document.querySelector('.btn-homework.more').addEventListener('click', (e)=>{
        modalMoreHomework();
        e.currentTarget.disabled = true;
        const modal = document.querySelector('.modal');
        modal.querySelector('.modalClose').addEventListener('click', ()=>{
            modalClose();
            document.querySelector('.btn-homework.more').disabled = false;
        })  
    })
}

if ( document.querySelector('.btn-extra.more') != null ) {
    document.querySelector('.btn-extra.more').addEventListener('click', (e)=>{
        modalMoreHomework();
        e.currentTarget.disabled = true;
        const modal = document.querySelector('.modal');
        modal.querySelector('.modalClose').addEventListener('click', ()=>{
            modalClose();
            document.querySelector('.btn-extra.more').disabled = false;
        })  
    })
}
<?php 

/* <=== =====================================================
    Clase Controlador de Tareas
===================================================== ===> */

class ExtraController extends Controller {

    /* <=== ========= Metodo - Mostrar tareas =========  ===> */
    public function index() {
        self::model('Extra');
        $data = Extra::getAll();
        self::view('extra/index', $data);
    }

    /* <=== ========= Metodo - Crear tarea =========  ===> */
    public function create() {
        self::view('extra/create');
    }

    /* <=== ========= Metodo - Almacenar tarea =========  ===> */
    public function store() {
        self::model('Extra');
        Extra::store();
    }

    /* <=== ========= Metodo - Editar tarea =========  ===> */
    public function edit($id) {
        self::model('Extra');
        $data = Extra::getOne($id);
        self::view('extra/edit', $data);
    }

    /* <=== ========= Metodo - Editar tarea =========  ===> */
    public function update($id) {
        self::model('Extra');
        Extra::update($id);
        // self::view('Extra/edit', $data);
    }
    /* <=== ========= Metodo - Eliminar tarea =========  ===> */
    public function delete($id) {
        self::model('Extra');
        Extra::destroy($id);
    }
}
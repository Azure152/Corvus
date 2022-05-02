<?php 

/* <=== =====================================================
    Clase Controlador de Tareas
===================================================== ===> */

class HomeworkController extends Controller {

    /* <=== ========= Metodo - Mostrar tareas =========  ===> */
    public function index() {
        self::model('Homework');
        $data = Homework::getAll();
        self::view('homework/index', $data);
    }

    /* <=== ========= Metodo - Crear tarea =========  ===> */
    public function create() {
        self::view('homework/create');
    }

    /* <=== ========= Metodo - Almacenar tarea =========  ===> */
    public function store() {
        self::model('Homework');
        Homework::store();
    }

    /* <=== ========= Metodo - Editar tarea =========  ===> */
    public function edit($id) {
        self::model('Homework');
        $data = Homework::getOne($id);
        self::view('homework/edit', $data);
    }

    /* <=== ========= Metodo - Editar tarea =========  ===> */
    public function update($id) {
        self::model('Homework');
        Homework::update($id);
        // self::view('homework/edit', $data);
    }
    /* <=== ========= Metodo - Eliminar tarea =========  ===> */
    public function delete($id) {
        self::model('Homework');
        Homework::destroy($id);
    }
}
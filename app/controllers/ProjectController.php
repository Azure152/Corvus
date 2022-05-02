<?php 

/* <=== =====================================================
    Clase Controlador de projects
===================================================== ===> */

class ProjectController extends Controller {

    /* <=== ========= Metodo - Todos los proyectos =========  ===> */
    public function all() {
        self::model('Project');
        if ( isset($_GET['orderBy']) OR !empty($_GET['orderBy']) ):
            $orderBy = $_GET['orderBy'];
            $data = Project::projectCategoryModel('', $orderBy);
        else: 
            $data = Project::projectCategoryModel('all');
        endif;
        self::view('project/all', $data);   
    }

    /* <=== ========= Metodo - Proyectos personales =========  ===> */
    public function personal() {
        self::model('Project');
        if ( isset($_GET['orderBy']) OR !empty($_GET['orderBy']) ):
            $orderBy = $_GET['orderBy'];
            $data = Project::projectCategoryModel(1, $orderBy);
        else: 
            $data = Project::projectCategoryModel(1);
        endif;
        self::view('project/personal', $data);   
    }

    /* <=== ========= Metodo - Proyectos universitarios =========  ===> */
    public function college() {
        self::model('Project');
        if ( isset($_GET['orderBy']) OR !empty($_GET['orderBy']) ):
            $orderBy = $_GET['orderBy'];
            $data = Project::projectCategoryModel(2, $orderBy);
        else: 
            $data = Project::projectCategoryModel(2);
        endif;
        self::view('project/college', $data);   
    }

    /* <=== ========= Metodo - Crear proyecto =========  ===> */
    public function create() {
        self::view('project/create');
    }

    /* <=== ========= Metodo - Almacenar proyecto =========  ===> */
    public function store() {
        self::model('Project');
        if (Project::storeModel()):
            self::redirect('/');
        else:
            self::view('others/error');
        endif;
    }

    /* <=== ========= Metodo - Editar proyecto =========  ===> */
    public function edit($id) {
        self::model('Project');
        $data = Project::getOne($id);
        if (!empty($data)):
            self::view('project/edit', $data[0]);
        else:
            self::view('others/error');
        endif;
    }

    /* <=== ========= Metodo - Actualizar proyecto =========  ===> */
    public function update($id) {
        self::model('Project');
        Project::updateModel($id);
    }

    /* <=== ========= Metodo - Eliminar proyecto =========  ===> */
    public function delete($id) {
        self::model('Project');
        Project::destroyModel($id);
    }

}
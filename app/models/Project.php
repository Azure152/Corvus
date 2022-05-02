<?php 

/* <=== =====================================================
    Clase Proyectos 
===================================================== ===> */

class Project extends Model {

    /* <=== ========= Metodo - Almacenar datos en la BD =========  ===> */
    public static function storeModel() {
        $title = $_REQUEST['title'];
        $url = $_REQUEST['url'];
        $data_end = $_REQUEST['date_end'];
        $category = $_REQUEST['category'];
        $icon = 'fa-file';

        $conn = self::openConnection();

        $sql = $conn->prepare('INSERT INTO projects (title, link, date_end, category, icon) VALUES (?, ?, ?, ?, ?)');
        $sql->bind_param('sssss', $title, $url, $data_end, $category, $icon);
        $sql->execute();

        if ($conn->affected_rows > 0 ):
            self::closeConnection($conn);
            return True;
        endif;

        self::closeConnection($conn);
    }

    /* <=== ========= Metodo - Obtener un registro de la BD =========  ===> */
    public static function getOne($id) {
        $conn = self::openConnection();

        $sql = $conn->prepare('SELECT * FROM projects WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $sql->bind_result($result[], $result[], $result[], $result[], $result[], $result[]);

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'url' => $result[2],
                'date_end' => $result[3],
                'category' => $result[4]
            ];
        endwhile;

        self::closeConnection($conn);

        if ( !isset($data) || empty($data) ):
            $data = [];
        endif;

        return $data;
    }

    /* <=== ========= Metodo - Obtener proyectos de una categoria =========  ===> */
    public static function projectCategoryModel($id_category, $orderBy = 'title') {
        $conn = self::openConnection();

        if ( $orderBy == 'date_end' ):
            $order = 'DESC';
        else:
            $order = 'ASC';
        endif;

        if ( $id_category == 'all' ):
            $sql = $conn->prepare("SELECT * FROM projects ORDER BY {$orderBy} {$order}");
            $sql->execute();
            $sql->bind_result($result[], $result[], $result[], $result[], $result[], $result[]);
        else:
            $sql = $conn->prepare("SELECT * FROM projects WHERE category = ? ORDER BY {$orderBy} {$order}");
            $sql->bind_param('i', $id_category);
            $sql->execute();
            $sql->bind_result($result[], $result[], $result[], $result[], $result[], $result[]);
        endif;

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'url' => $result[2],
                'date_end' => $result[3],
                'category' => $result[4]
            ];
        endwhile;

        if ( !isset($data) || empty($data) ):
            $data = [];
        endif;

        self::closeConnection($conn);
        return $data;
    }

    /* <=== ========= Metodo - Actualizar un registro en la BD =========  ===> */
    public static function updateModel($id) {
        $requestMethod = $_REQUEST['request'];

        if ($requestMethod == 'update'):
            $title = $_REQUEST['title'];
            $url = $_REQUEST['url'];
            $data_end = $_REQUEST['date_end'];
            $category = $_REQUEST['category'];

            $conn = self::openConnection();
    
            $sql = $conn->prepare("UPDATE projects SET title = ?, link = ?, date_end = ?, category = ? WHERE id = {$id} LIMIT 1");
            $sql->bind_param('sssi', $title, $url, $data_end, $category);
            $sql->execute();
    
            if ($conn->affected_rows > 0 ):
                self::closeConnection($conn);
                return self::redirect('/projects/all');
            else: 
                self::redirect('/error');
            endif;
            self::closeConnection($conn);
        else:
            self::redirect('/error');
        endif;

    }

    /* <=== ========= Metodo - Actualizar un registro en la BD =========  ===> */
    public static function destroyModel($id) {
        if ($requestMethod == 'delete'):
            $conn = self::openConnection();

            $sql = $conn->prepare("DELETE FROM projects WHERE id = ?");
            $sql->bind_param('i', $id);
            $sql->execute();

            if ($con->affected_rows > 0):
                self::closeConnection($conn);
                return self::redirect('/projects/all');
            else: 
                return self::redirect('/error');
            endif;

        else:
            return self::redirect('/error');
        endif;

    }
}
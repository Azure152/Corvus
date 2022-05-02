<?php 

/* <=== =====================================================
    Clase Tareas 
===================================================== ===> */

class Homework extends Model {

    /* <=== ========= Metodo - Obtener todos lo registros de la BD =========  ===> */
    public static function getAll() {
        $conn = self::openConnection();
        
        $sql = $conn->prepare('SELECT * FROM homeworks ORDER BY date_term DESC');
        $sql->execute();
        $sql->bind_result($result[], $result[], $result[], $result[]);

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'summary' => $result[2],
                'date_term' => $result[3]
            ];
        endwhile;

        self::closeConnection($conn);

        if ( !isset($data) || empty($data) ):
            $data = [];
        endif;

        return $data;
    }

    /* <=== ========= Metodo - Obtener un registro de la BD =========  ===> */
    public static function getOne($id) {
        $conn = self::openConnection();
        
        $sql = $conn->prepare('SELECT * FROM homeworks WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $sql->bind_result($result[], $result[], $result[], $result[]);

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'summary' => $result[2],
                'date_term' => $result[3]
            ];
        endwhile;

        self::closeConnection($conn);

        if ( !isset($data) || empty($data) ):
            $data = [];
        endif;

        return $data[0];
    }

    /* <=== ========= Metodo - Almacenar datos en la BD =========  ===> */
    public static function store() {
        $title = $_REQUEST['title'];
        $date_term = $_REQUEST['date_end'];
        $summary = $_REQUEST['summary'];

        $conn = self::openConnection();
        
        $sql = $conn->prepare('INSERT INTO homeworks (title, summary, date_term) VALUES (?, ?, ?)');
        $sql->bind_param('sss', $title, $summary, $date_term);
        $sql->execute();

        if ($conn->affected_rows > 0):
            self::redirect('/homeworks');
        endif;

        self::closeConnection($conn);
    }
    
    /* <=== ========= Metodo - Almacenar datos en la BD =========  ===> */
    public static function update($id) {
        if ($_REQUEST['request'] == 'update'):
            $title = $_REQUEST['title'];
            $date_term = $_REQUEST['date_end'];
            $summary = $_REQUEST['summary'];
    
            $conn = self::openConnection();
            
            $sql = $conn->prepare("UPDATE homeworks SET title = ?, summary = ?, date_term = ? WHERE id = ?");
            $sql->bind_param('sssi', $title, $summary, $date_term, $id);
            $sql->execute();
    
            if ($conn->affected_rows > 0):
                self::redirect('/homeworks');
            else:
                return self::redirect('/error');
            endif;
    
            self::closeConnection($conn);
        else:
            return self::redirect('/error');
        endif;
    }

    /* <=== ========= Metodo - Almacenar datos en la BD =========  ===> */
    public static function destroy($id) {
        if ($_REQUEST['request'] == 'delete'):
            $conn = self::openConnection();

            $sql = $conn->prepare("DELETE FROM homeworks WHERE id = ?");
            $sql->bind_param('i', $id);
            $sql->execute();

            if ($conn->affected_rows > 0):
                self::closeConnection($conn);
                self::redirect('/homeworks');
            else: 
                self::closeConnection($conn);
                return self::redirect('/error');
            endif;
        endif;
    }
    
}
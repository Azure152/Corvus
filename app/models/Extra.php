<?php 

/* <=== =====================================================
    Clase Tareas 
===================================================== ===> */

class Extra extends Model {

    /* <=== ========= Metodo - Obtener todos lo registros de la BD =========  ===> */
    public static function getAll() {
        $conn = self::openConnection();
        
        $sql = $conn->prepare('SELECT * FROM extras ORDER BY date_end DESC');
        $sql->execute();
        $sql->bind_result($result[], $result[], $result[], $result[], $result[]);

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'summary' => $result[2],
                'date_start' => $result[3],
                'date_end' => $result[4]
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
        
        $sql = $conn->prepare('SELECT * FROM extras WHERE id = ?');
        $sql->bind_param('i', $id);
        $sql->execute();
        $sql->bind_result($result[], $result[], $result[], $result[], $result[]);

        while ($sql->fetch()):
            $data[] = [
                'id' => $result[0],
                'title' => $result[1],
                'summary' => $result[2],
                'date_start' => $result[3],
                'date_end' => $result[4]
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
        $date_start = $_REQUEST['date_start'];
        $date_end = $_REQUEST['date_end'];
        $summary = $_REQUEST['summary'];

        $conn = self::openConnection();
        
        $sql = $conn->prepare('INSERT INTO extras (title, summary, date_start, date_end) VALUES (?, ?, ?, ?)');
        $sql->bind_param('ssss', $title, $summary, $date_start, $date_end);
        $sql->execute();

        if ($conn->affected_rows > 0):
            self::redirect('/extras');
        endif;

        self::closeConnection($conn);
    }
    
    /* <=== ========= Metodo - Almacenar datos en la BD =========  ===> */
    public static function update($id) {
        if ($_REQUEST['request'] == 'update'):
            $title = $_REQUEST['title'];
            $date_start = $_REQUEST['date_start'];
            $date_end = $_REQUEST['date_end'];
            $summary = $_REQUEST['summary'];
    
            $conn = self::openConnection();
            
            $sql = $conn->prepare("UPDATE extras SET title = ?, summary = ?, date_start = ?, date_end = ? WHERE id = ? LIMIT 1");
            $sql->bind_param('ssssi', $title, $summary, $date_start, $date_end, $id);
            $sql->execute();
    
            if ($conn->affected_rows > 0):
                self::redirect('/extras');
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

            $sql = $conn->prepare("DELETE FROM extras WHERE id = ? LIMIT 1");
            $sql->bind_param('i', $id);
            $sql->execute();

            if ($conn->affected_rows > 0):
                self::closeConnection($conn);
                self::redirect('/extras');
            else: 
                self::closeConnection($conn);
                return self::redirect('/error');
            endif;
        endif;
    }
    
}
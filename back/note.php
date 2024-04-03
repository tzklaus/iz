<?php

require_once 'config.php';

class Note
{
    private $mysqli;
    private $title;
    private $content;

    public function __construct($title = '', $content = '')
    {
        $this->mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB);
        
        if ($this->mysqli->connect_error) {
            die("Ошибка: невозможно подключиться: " . $this->mysqli->connect_error);
        }
        
        if($title && $content){

            $this->title = $title;
            $this->content = $content;
        }
    }
    
    function getList(){
        $notesList = [];
        $res = $this->mysqli->query("
            SELECT * FROM notes
        ");
        while($row = $res->fetch_assoc()){
            $notesList[] = $row;
        }

        return $notesList;
    }

    public function create()
    {
        $createdNote = [];
        $flag = $this->mysqli->query("
            INSERT INTO notes (title, content) 
            VALUES ('$this->title', '$this->content')
        ");
        if($flag){
            $last_id = $this->mysqli->insert_id;
            $res = $this->mysqli->query("
                SELECT * FROM notes
                WHERE id = $last_id
            ");
            $row = $res->fetch_assoc();
            $createdNote = $row;
        } else {
            die ('Ошибка '.$this->mysqli->error);
        }
        return $createdNote;
    }

    public function delete($id){
        $this->mysqli->query("
            DELETE FROM notes
            WHERE id = $id
        ");
    }

    public function update($id, $title, $content){
        $updatedNote = [];
        $this->mysqli->query("
            UPDATE notes
            SET
                title = '$title',
                content = '$content'
            WHERE 
                id = $id
        ");
        $res = $this->mysqli->query("
            SELECT * FROM notes
            WHERE id = $id
        ");
        $row = $res->fetch_assoc();
        $updatedNote = $row;

        return $updatedNote;
    }

}

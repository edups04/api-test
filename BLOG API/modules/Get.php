<?php
class Get{

    protected $pdo;

    public function __construct(\PDO $pdo){
        $this -> pdo = $pdo;
    }
       
    public function getStudents(){
        //code for retrieving data on DB
        return "This is some student records retrieved from db";
    }

    public function getClasses(){
        //code for retrieving data on DB
        return "This is some classes records retrieved from db";
    }

    public function getFaculty(){
        //code for retrieving data on DB
        return "This is some Faculty records retrieved from db";
    }

    public function getQuests(){
        //code for retrieving data on DB
        return "This is some Quests records retrieved from db";
    }

    public function getShows($id = null){
        $sqlString = "SELECT * FROM cards_tbl";
        if($id != null){
            $sqlString .= " WHERE id=" . $id;
        }

        
        $data = array();
        $errmsg = "";
        $code = 0;

        try{
            if($result = $this->pdo->query($sqlString)->fetchAll()){
                foreach($result as $record){
                    array_push($data, $record);
                }
                $result = null;
                $code = 200;
                return array("code" => $code, "data" => $data);
            }
            else{
                $errmsg = "No data found";
                $code = 404;
            }
        }
        catch(\PDOException $e){
            $errmsg = $e -> getMessage();
            $code = 403;
        }

        return array("code" => $code, "errmsg" => $errmsg);
    }
}

?>
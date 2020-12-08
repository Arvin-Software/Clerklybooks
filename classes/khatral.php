<?php
//Khatral API version 1.5 Build 10/12/2019|01:06PM Australia ACDT
//This is a database handler class that is used to handle all the database queyr with condition checking and many more
//This is a improved version of a previously deprecated Softquery API
class Khatral{
    private static function connect(){
        // $pdo = new PDO('mysql:host=localhost;dbname=tick;charset=utf8', 'root', '');
        $pdo = new PDO('mysql:host=localhost;dbname=tickacc1;charset=utf8', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;    

    }
    public static function khquery($query, $params){
        $statement = self::connect()->prepare($query);
        $statement->execute($params);
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
        
    }
    public static function khquerypar($query){
        $statement = self::connect()->prepare($query);
        $statement->execute();
        if(explode(' ', $query)[0] == 'SELECT'){
            $data = $statement->fetchAll();
            return $data;
        }
        
    }
    public static function khdisplay(){
        echo 'Test Succeeded and khatral operating normally';
    }
}
?>
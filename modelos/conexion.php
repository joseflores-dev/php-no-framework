<?php


Class conexion{



    static public function conectar(){
       
        $dba = new PDO("mysql:host=localhost;dbname=pasteleria",
        "root",
        "");

        $dba->exec("set names utf8");
        
        return $dba;


    }
}
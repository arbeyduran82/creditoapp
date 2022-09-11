<?php
if ($peticionAjax) {
    require_once "../config/SERVER.php";
}else {
    require_once "./config/SERVER.php";
}

class generalModel{
    /*-----   Funcion para conectar a la base de datos  ----*/
    protected static function Conectar(){
        $Conexion = new PDO(SGBD, USER, PASS);
        $Conexion->exec("SET CHARACTER SET utf8");
        return $Conexion;

    }

    /*-----   Funcion para realizar consultas simples  ----*/
    protected static function ejecutar_Consulta_Simple($Consulta){
        $Sql= self::Conectar()->prepare($Consulta);
        $Sql->execute();
        return $Sql;
    }
}
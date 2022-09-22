<?php
require_once "SERVER.php";
 /*-----   Clase para conectar a la base de datos  ----*/
class Conectar{
    protected $_bd;
    function __construct(){
        $this->_bd=new mysqli(SERVER, USER, PASS, DB);
        if ($this->_bd->connect_errno) {
           echo"error al conectar" .$this->_bd->connect_errno;
           return;
        }
    }
} 
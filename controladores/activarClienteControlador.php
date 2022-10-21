<?php
require_once "../modelos/clienteModelo.php";
$$idactivo=$_GET ['idactivo'];    
$consul=new  Clientes ();
$reg=$consul-> activarclientes($$idactivo);

if(!$reg)
{
    print"<script>alert(\"Cliente eliminar\");
    window.location='' ;</script>"; 
}else
{
    print"<script>alert(\"no se puede eliminar\");
    window.location='' ;</script>"; 
}
?>
<?php
require_once "../modelos/clienteModelo.php";
$id=$_GET ['id'];    
$consul=new  Clientes ();
$reg=$consul-> eliminarclientes ($id);

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
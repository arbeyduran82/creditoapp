<?php

require_once '../modelos/clienteModelo.php';


if(isset($_POST['registroCliente']))
{  
    $documento=$_POST['txtcedulacl'];
    $nombre=$_POST['txtnombrecl'];
    $apellido=$_POST['txtapellidocl'];
    $celular=$_POST['txtcelularcl'];
    $direccion=$_POST['txtadireccioncl'];

    $cliente=new Clientes();
    $reg=$cliente-> registrocliente($documento,$nombre, $apellido, $celular, $direccion);
    if ($reg) {
        echo "<script>alert(\"Cliente registrada con exito\");
      windows.location='../cliente-lista'; </script>";
     } else {
        echo "<script>alert(\"Error al registrar el cliente\");
      windows.location='../cliente-nuevo'; </script>";
     }
}






?>
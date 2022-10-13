<?php


require_once '../modelos/clienteModelo.php';
if(isset($_POST['actualizarCliente']))
{
    $id=$_POST['txtcedulacla'];
    $nombre=$_POST['txtnombrecla'];
    $apellido=$_POST['txtapellidocla'];
    $celular=$_POST['txtcelularcla'];
    $direccion=$_POST['txtadireccioncla'];

    $cliente=new Clientes();
    $reg=$cliente-> actualizacliente($id,$nombre, $apellido, $celular, $direccion);

    if ($reg) {
      echo "<script>alert(\"Cliente actualizado con exito\");
    windows.location=''; </script>";
   } else {
      echo "<script>alert(\"Error al registrar el Cliente\");
    windows.location=''; </script>";
   }

}
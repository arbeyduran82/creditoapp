<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class Clientes extends Conectar 
{
    protected $cli_id;
    protected $nombrecl;
    protected $apellidocl;
    protected $celularcl;
    protected $direccioncl;
    protected $estadocl;

  
    public function consultabasica($cli_id){
      $sql= "SELECT cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion FROM clientes WHERE cli_estado = 1 AND  cli_id='$cli_id'";
      $resultado=$this->_bd->query($sql);
      if($resultado->num_rows>0){
          while($row=$resultado->fetch_assoc()){
              $resultadoset[]=$row;
          }
      }
      return $resultadoset;
     }
    public function registrocliente($cli_id,$nombrecl,$apellidocl,$celularcl,$direccioncl){
     $sql="SELECT cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion FROM clientes WHERE cli_estado = 1 AND  cli_id ='$cli_id;'";      
     $result=$this->_bd->query($sql);
     $lista=mysqli_fetch_assoc($result);
    
     if($lista>0){
        
          echo "<script>alert(' Cliente ya esta registrado');
          window.location='../cliente-lista/';
          </script>";
        }else{
            $insertar="INSERT INTO clientes (cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion,cli_estado) VALUES('".$cli_id."','".$nombrecl."','".$apellidocl."','".$celularcl."','".$direccioncl."',1)";
            $result=$this->_bd->query($insertar);
            if(!$result){
            
             print "<script>alert(\"Fallo al ingresar los datos .\");
                    window.location='../cliente-nuevo/';</script>";  
          } else
           {
         
            print "<script>alert(\"Cliente registrado .\");
             window.location='../cliente-lista?pagina=1' ;</script>"; 
             $result->close();
             $this->_bd->close();

            }

          }
      }
          /*Esta funcion recibe parametros por medio del controladores del paginador
        de clientes*/
      public function listarclientespagina($iniciar = 1, $Clientes_x_pagina = 3){
        $sql1="SELECT * FROM clientes ";
        $resul=$this->_bd->query($sql1);
        if($resul->num_rows>0){
          while ($row = $resul->fetch_assoc()) {
            $resultset[]=$row;
          }
        }
        return $resultset;
      }
      public function listarcliente($iniciar = 0, $Clientes_x_pagina = 3)
      {
          $sql1 = "SELECT cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion FROM clientes WHERE cli_estado = 1 ORDER BY cli_id LIMIT $iniciar, $Clientes_x_pagina;";
          $resul=$this->_bd->query($sql1);
          error_reporting(0);
          if($resul->num_rows > 0)
          {
              while($row = $resul->fetch_assoc())
              {
                  $resultadoset[]=$row;
              }
          }
  
          return $resultadoset;
  
      }
      public function eliminarclientes($id)
      {
        $query="UPDATE clientes SET cli_estado = 0 WHERE cli_id='$id'";
      $resul=$this->_bd->query($query);
      if($resul)
      {
        print"<script>alert(\"Registro del cliente fue  \");
        window.location='../cliente-lista/' ;</script>"; 
      }else 
      {
        print"<script>alert(\"No se puede  eliminado el registro del cliente \");
        window.location='../cliente-lista/' ;</script>";    
       }
      }
      public function buscarcliente($busquedacliente, $iniciar = 0, $Clientes_x_pagina = 3){
      $consulta1 = "SELECT cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion FROM clientes WHERE cli_estado = 1 AND cli_id LIKE '%$busquedacliente%' LIMIT $iniciar, $Clientes_x_pagina;";
      $busquedacliente=$this->_bd->query($consulta1);
      
        if($busquedacliente->num_rows >0)
        {
          while($row=$busquedacliente->fetch_assoc())
          {
            $resultset[]=$row;
      
          }
          return $resultset;
        }
      }
      public function actualizacliente($cli_id,$nombrecl,$apellidocl,$celularcl,$direccioncl){ 
      $consulta="UPDATE clientes SET cli_id='$cli_id', cli_nombre='$nombrecl', cli_apellido='$apellidocl',  cli_telefono='$celularcl', cli_direccion='$direccioncl' WHERE cli_id='$cli_id'";
      $resultado=$this->_bd->query($consulta);
      if($resultado){
          print "<script>alert(\"Registro del cliente actualizado\");
          window.location='../cliente-lista/';</script>";  
      }
      else
      {
          print "<script>alert(\"El registri del cliente no fue actualizado\");
          window.location='../cliente-lista/';</script>";
      }
  }
  public function actualiza($estadocl){ 
    $consulta6="UPDATE clientes SET cli_estado='$estadocl',  WHERE cli_id='$cli_id'";
    $resultado6=$this->_bd->query($consulta);
    if($resultado6){
        print "<script>alert(\"Registro del cliente actualizado\");
        window.location='../cliente-lista/';</script>";  
    }
    else
    {
        print "<script>alert(\"El registri del cliente no fue actualizado\");
        window.location='../cliente-lista/';</script>";
    }
  }
    public function contarfilasart(){
      $sql="SELECT count(cli_id) as cantidad FROM clientes WHERE cli_estado = 1";
      $resultado=$this->_bd->query($sql);
  
      while($row = mysqli_fetch_array($resultado)) {
        $Total = $row['cantidad'];
      }
      return $Total;
  
    }
    public function contarfilasart1(){
      $sql="SELECT count(cli_id) as cantidad FROM clientes WHERE cli_estado = 0";
      $resultado=$this->_bd->query($sql);
  
      while($row = mysqli_fetch_array($resultado)) {
        $Total = $row['cantidad'];
      }
      return $Total;
  
    }
    public function clienteinactivo($busquedacliente, $iniciar = 0, $Clientes_x_pagina = 3){
      $consulta1 = "SELECT cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion FROM clientes WHERE cli_estado = 0 AND cli_id LIKE '%$busquedacliente%' LIMIT $iniciar, $Clientes_x_pagina;";
      $busquedacliente=$this->_bd->query($consulta1);
      
        if($busquedacliente->num_rows >0)
        {
          while($row=$busquedacliente->fetch_assoc())
          {
            $resultset[]=$row;
      
          }
          return $resultset;
        }
      }
      public function activarclientes($idactivo)
      {
        $query1="UPDATE clientes SET cli_estado = 1 WHERE cli_id='$idactivo'";
      $resul1=$this->_bd->query($query1);
      if($resul1)
      {
        print"<script>alert(\"Registro del cliente fue  \");
        window.location='../cliente-lista/' ;</script>"; 
      }else 
      {
        print"<script>alert(\"No se puede  eliminado el registro del cliente \");
        window.location='../cliente-lista/' ;</script>";    
       }
      }
   
}  
?>


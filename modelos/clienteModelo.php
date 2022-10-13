<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class Clientes extends Conectar 
{
    protected $cli_id;
    protected $nombrecl;
    protected $apellidocl;
    protected $celularcl;
    protected $direccioncl;

  
    public function consultabasica($cli_id){
      $sql= "SELECT * FROM clientes WHERE cli_id='$cli_id'";
      $resultado=$this->_bd->query($sql);
      if($resultado->num_rows>0){
          while($row=$resultado->fetch_assoc()){
              $resultadoset[]=$row;
          }
      }
      return $resultadoset;
     }
    public function registrocliente($cli_id,$nombrecl,$apellidocl,$celularcl,$direccioncl){
     $sql="SELECT * FROM clientes WHERE cli_id ='$cli_id;'";      
     $result=$this->_bd->query($sql);
     $lista=mysqli_fetch_assoc($result);
    
     if($lista>0){
        
          echo "<script>alert(' Cliente ya esta registrado');
          window.location='../cliente-lista/';
          </script>";
        }else{
            $insertar="INSERT INTO clientes (cli_id, cli_nombre, cli_apellido, cli_telefono, cli_direccion)VALUES('".$cli_id."','".$nombrecl."','".$apellidocl."','".$celularcl."','".$direccioncl."')";
            $result=$this->_bd->query($insertar);
            if(!$result){
            
             print "<script>alert(\"Fallo al ingresar los datos .\");
                    window.location='../cliente-nuevo/';</script>";  
          } else
           {
         
            print "<script>alert(\"Cliente registrado .\");
             window.location='../cliente-lista/' ;</script>"; 
             $result->close();
             $this->_bd->close();

            }

          }
      }
      public function listarcliente()
      {
          $sql1 = "SELECT * FROM clientes ORDER BY cli_id";
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
      $query="DELETE FROM clientes WHERE cli_id='$id'";
      $resul=$this->_bd->query($query);
      if($resul)
      {
        print"<script>alert(\"Registro del cliente fue  eliminado\");
        window.location='../cliente-lista/' ;</script>"; 
      }else 
      {
        print"<script>alert(\"No se puede  eliminado el registro del cliente \");
        window.location='../cliente-lista/' ;</script>";    
       }
      }
      public function buscarcliente($busquedacliente){
      $consulta1 = "SELECT * FROM clientes WHERE cli_id LIKE '%$busquedacliente%'";
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
}  
?>


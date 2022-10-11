<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";

class Clientes extends Conectar 
{
    protected $documentocl;
    protected $nombrecl;
    protected $apellidocl;
    protected $celularcl;
    protected $direccioncl;

    public function __construct(){
      parent::__construct();
    }
    public function registrocliente($documentocl,$nombrecl,$apellidocl,$celularcl,$direccioncl){
     $sql="SELECT * FROM clientes WHERE cli_documento ='$documentocl'";
     $result=$this->_bd->query($sql);
     $lista=mysqli_fetch_assoc($result);
    
     if($lista>0){
        
          echo "<script>alert(' cliente ya esta registrado');
          window.location='../cliente-lista/';
          </script>";
        }else{
            $insertar="INSERT INTO clientes (cli_documento, cli_nombre, cli_apellido, cli_telefono, cli_direccion)VALUES('".$documentocl."','".$nombrecl."','".$apellidocl."','".$celularcl."','".$direccioncl."')";
            $result=$this->_bd->query($insertar);
            if(!$result){
            
             print "<script>alert(\"fallo al ingresar los datos .\");
                    window.location='../cliente-nuevo/';</script>";  
          } else
           {
         
            print "<script>alert(\"cliente registrado .\");
             window.location='../cliente-lista/' ;</script>"; 
             $result->close();
             $this->_bd->close();

            }

          }
      }
      public function listarcliente()
      {
          $sql1 = "SELECT * FROM clientes ORDER BY cli_documento";
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
      $query="DELETE FROM clientes WHERE cli_documento='$id'";
      $resul=$this->_bd->query($query);
      if($resul)
      {
        print"<script>alert(\"registro del cliente fue  eliminado\");
        window.location='../cliente-lista/' ;</script>"; 
      }else 
      {
        print"<script>alert(\"no se puede  eliminado el registro \");
        window.location='../cliente-lista/' ;</script>";    
       }
      }
    public function buscarcliente($busquedacliente){
      $consulta1 = "SELECT * FROM clientes WHERE cli_documento LIKE '%$busquedacliente%'";
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
      
    
    public function ObtenerCliente($id)
    {
        $query1 = "SELECT * FROM clientes WHERE cli_id='$id'";
        $resul = $this->_bd->query($query1);
        
        if($resul->num_rows > 0)
        {
            while($row = $resul->fetch_assoc())
            {
                $resultadoset[] = $row;
            }
        }

        return $resultadoset[0];
    }
    public function actualizacliente($documentocl,$nombrecl,$apellidocl,$celularcl,$direccioncl){ 
      $consulta="UPDATE clientes SET cli_documento='$documentocl', cli_nombre='$nombrecl', cli_apellido='$apellidocl',  cli_telefono='$celularcl', cli_direccion='$direccioncl' WHERE cli_documento='$documentocl'";
      $resultado=$this->_bd->query($consulta);
      if($resultado){
          print "<script>alert(\"cliente actualizada\");
          window.location='../cliente-lista/';</script>";  
      }
      else
      {
          print "<script>alert(\"cliente no actualizada\");
          window.location='../cliente-lista/';</script>";
      }
  }
}  
?>


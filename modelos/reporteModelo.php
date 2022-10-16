<?php
require_once $_SERVER['DOCUMENT_ROOT']."/creditoapp/config/Conexion.php";


    class Reportes extends Conectar
    {
        //Funcion reporte y listar de clientes financieros
            public function listarclientesfinancieros()
            {
                $sql="select * from clientes";
                $resultado=$this->_bd->query($sql);
                if($resultado->num_rows>0)
                {
                    while($row=$resultado->fetch_assoc())
                    {
                        $resultadoset[]=$row;
                    }
                }

                return $resultadoset;
            }

        
        //Funcion reporte y listar creditos en estado solicitud
            public function reportesolicitudes()
            {
               
                $sql="SELECT * FROM creditos WHERE cre_estado LIKE 'estudio%'";
                $resultado=$this->_bd->query($sql);
                if($resultado->num_rows>0)
                {
                    while($row=$resultado->fetch_assoc())
                    {
                        $resultadoset[]=$row;
                    }
                }
      
                return $resultadoset;
            
             }
        
        //Funcion reporte y listar credito en estado aprobados
             public function reporteaprobados()
            {
               
                $sql="SELECT * FROM creditos WHERE cre_estado LIKE 'aprobado%'";
                $resultado=$this->_bd->query($sql);
                if($resultado->num_rows>0)
                {
                    while($row=$resultado->fetch_assoc())
                    {
                        $resultadoset[]=$row;
                    }
                }
                return $resultadoset;
            
             }
        
        //Funcion reporte y listar credito en estado aprobados
        public function reportefinalizados()
        {
           
            $sql="SELECT * FROM creditos WHERE cre_estado LIKE 'finalizado%'";
            $resultado=$this->_bd->query($sql);
            if($resultado->num_rows>0)
            {
                while($row=$resultado->fetch_assoc())
                {
                    $resultadoset[]=$row;
                }
            }

            return $resultadoset;
        
         }

         //Funcion reporte y listar historial de pago
         Public function buscarcedulahistorial($busquedacedula)
        {
            $sql = "SELECT * FROM pagos WHERE cre_codigo LIKE '%$busquedacedula%'";
            $busquedacedula = $this->_bd->query($sql);

            if($busquedacedula->num_rows>0)
            {
                while($row = $busquedacedula->fetch_assoc())
                {
                    $resulset[] = $row;
                }

                return $resulset;
            }
            else
                {
                    print "<script>alert(\"ERROR: No existen pagos registrados por este cliente\");
                    window.location='../reporte-historial/';</script>";
                }
        }


        public function reporteestadocredito($busquedacedulaestado)
        {
           
            $sql="SELECT * FROM creditos WHERE cli_id LIKE '%$busquedacedulaestado%'";
            $resultado=$this->_bd->query($sql);

            if($resultado->num_rows>0)
            {
                while($row=$resultado->fetch_assoc())
                {
                    $resultadoset[]=$row;
                }
            }
            else
                {
                    print "<script>alert(\"ERROR: No existe credito registrado a este cliente\");
                    window.location='../reporte-estado/';</script>";
                }
            return $resultadoset;
        
         }

         public function reportepazysalvo($busquedacedulapazysalvo)
         {
            
             $sql="SELECT * FROM creditos WHERE cli_id LIKE '%$busquedacedulapazysalvo%'";
             $resultado=$this->_bd->query($sql);
 
             if($resultado->num_rows>0)
             {
                 while($row=$resultado->fetch_assoc())
                 {
                     $resultadoset[]=$row;
                 }
             }
             else
                 {
                     print "<script>alert(\"ERROR: No existe credito registrado a este cliente\");
                     window.location='../reporte-pazysalvo/';</script>";
                 }
             return $resultadoset;
         
          }

    }
?>

    

    
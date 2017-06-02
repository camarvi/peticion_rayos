<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
CAMBIAR DATOS 
-->

<?php



require_once ("common.inc.php");


   
//LEO LAS VARIABLES QUE ME PASAN POR GET PARA 
//OBTENER LOS DATOS DEL PACIENTE

if (isset ($_GET['nuhsa'])){
   
    $an= $_GET['nuhsa'];   
    $centro=$_GET['centro'];
    $cnp=$_GET['cnpprofesional'];
    
}



 if (isset ($_POST['registrar'])) {

     
        $an=$_POST['an'];
        $centro=$_POST['centro'];
      
        $cnp=$_POST['cnp'];
      
     
        $separar =explode('/',$_POST["fecha"]);
        $dia=trim($separar[0]);
        $mes=trim($separar[1]);
        $anio=trim($separar[2]);
        $fechaok=$anio . "-" . $mes . "-" . $dia;
        
  
    if (isset ($_POST['obs'])) { 
        $obs=  trim(html_entity_decode($_POST['obs'])) ;
        
    }  else {$obs=""; }
    
    
 $nuevapeticion=new Peticion(array(
        "REVISADA"=>"0",
        "AN"=>$_POST["an"],
        "CNP"=>$_POST["cnp"],
        "OBS"=>html_entity_decode($_POST["obs"]),
        "CENTRO"=>$_POST["centro"],
        "FECHA"=>$fechaok));
    $nuevapeticion->nueva_peticion();
          
 
    ?>
<script lang="javascript">
    alert("PETICION REGISTRADA CORRECTAMENTE")
</script>
 <?php 
 }
 ?>
 
<html>
    <head>
        <meta charset="UTF-8">
   
      <title> Peticion Estudio Radiologia</title>
<meta name="author" content="carlos" />




 <link href="estilos.css" rel="stylesheet" type="text/css"/>

 
 <script type="text/javascript" >
 
 
 function cerrar(){
     
     windows.close();
 }
 
 function valida_fecha(fecha) {
 
    //var expresion_fecha=/^\d{2}-\d{2}-\d{4}$/;
    var expresion_fecha2=/^([0][1-9]|[12][0-9]|3[01])(\/|-)([0][1-9]|[1][0-2])\2(\d{4})$/;
     var vfecha=fecha;
    //var vemail=document.getElementById("email").value;
    
    var longitud=vfecha.length;
     
    if (longitud>0) { 
     if (expresion_fecha2.test(vfecha)==false){
        alert("FECHA NO VALIDA");  
        return false;
     
      } 
  }
 
 }
 
</script>


</head>
    
<header>    
  <h1><u>Petici&oacute;n Estudio Radiologia</u></h1>
  <h3>Distrito Sanitario Almer&iacute;a</h3>
 
</header>       

    <body>
    
       <form action="index.php" method="post">
           <input type="hidden" name="centro" id="centro" value="<?php echo $centro?>"/>
           <input type="hidden" name="cnp" id="cnp" value="<?php echo $cnp?>"/>
      
         
          <fieldset>  
          <legend>Datos Peticion</legend>
            <div class="datos_personales">
              <label>NUHSA:</label>
              <input type="text" id="an" name="an" size="10" value="<?php echo $an; ?>" readonly="readonly"/> 
              <label>Fecha placa:</label>
              <input type="text" id="fecha" name="fecha" size="10" onblur="valida_fecha(this.value)" value="<?php echo date('d/m/Y'); ?>"/> 
        
            </div> 
            
            <div class="datos_personales">  
                <textarea id="obs" name="obs" cols="80" rows="5">
                </textarea>     
             </div> 
          
           </fieldset>         
           
           <button type="submit" id="registar" name="registrar" class="botoncentrado" onclick="cerrar()">
                 Registrar
            </button>
           
       </form>    
    
    
    </body>
</html>

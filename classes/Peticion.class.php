<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author carlos
 */

include_once 'DataObject.class.php';

class Peticion extends DataObject{
    //put your code here
    
      protected  $data=array(
        "COD"=>"",
        "AN"=>"",
        "CNP"=>"",
        "CENTRO"=>"",
        "FECHA"=>"",
        "OBS"=>"",
        "REVISADA"=>""
        );
               

  public function nueva_peticion() {

        $conn=parent::connect();
        $sql=SQL_INSERTA_PETICION;

             
        try {
            $st=$conn->prepare($sql);
          
            $st->bindValue(":AN",$this->data["AN"], PDO::PARAM_STR);
            $st->bindValue(":CNP",$this->data["CNP"], PDO::PARAM_STR);
            $st->bindValue(":CENTRO",$this->data["CENTRO"], PDO::PARAM_STR);
            $st->bindValue(":FECHA",$this->data["FECHA"], PDO::PARAM_STR);
            $st->bindValue(":OBS",$this->data["OBS"], PDO::PARAM_STR);
            $st->bindValue(":REVISADA", 0,PDO::PARAM_INT);

            $st->execute();
            parent::disconnect($conn);

       //   $lasid=$conn->lastInsertId();
           // $lasid2=$st->fetch(PDO::FETCH_ASSOC);
         //   return $lasid2["IDCURSO"];
          $conn=null;


        } catch (PDOException $e) {
            parent::disconnect($conn);
            die ("Query failed: " . $e->getMessage());

        }

    }
     
      
      
      
}

?>

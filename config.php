<?php
/* 
 * DEFINO LAS CONSTANTES QUE UTILIZO EN EL PROGRAMA
 */

// DATOS CONEXON POR MYSQL
//define("DB_DSN","mysql:host=10.8.65.9;dbname=SUCESOS");
//define("DB_DSN","mysql:dbname=web");
   


// CONEXION AL SERVIDOR SQL SERVER


define("DB_DSN","dblib:host=10.······;dbname=------");


define("DB_USERNAME", "#####");
define("DB_PASSWORD", "######");
define("PAGE_SIZE", 5);
    

//Definicion Tablas BD
define("TBL_PETICION","PETICION_ESTUDIO_RAYOS");



define( "ROOT", $_SERVER['HTTP_HOST']);
define("RAIZ", "http://" . $_SERVER['HTTP_HOST'] );

  
//consultas sql




define("SQL_INSERTA_PETICION","INSERT INTO " . TBL_PETICION . " (AN,CNP,CENTRO,FECHA,OBS,
    REVISADA) VALUES (:AN,:CNP,:CENTRO,:FECHA,:OBS,:REVISADA)");



?>
     

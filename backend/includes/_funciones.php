<?php
  require_once '_db.php';

  if(isset($_POST["accion"])){
    switch ($_POST["accion"]) {

      case "cerrar_sesion":
        cerrar_sesion();
      break;
      case "insertar_depto":
        insertar_depto();
      break;
    }
  }


  function cerrar_sesion(){
    echo 1;
  }

  function insertar_depto(){
    global $db;
    extract($_POST);

    $insertar=$db ->insert("departamentos",["dpto_nom" => $nom,
                                            "dpto_fa" => date("Y").date("m").date("d")]);

    if($insertar){
      echo 1;
    }else{
      echo 2;
    }
  }



?>

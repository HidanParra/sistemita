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
      case "insertar_admin":
        insertar_admin();
      break;
      case "insertar_equipo":
        insertar_equipo();
      break;
  }


  function cerrar_sesion(){
    echo 1;
  }

//FUNCIONES DE INSERCION
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

  function insertar_admin(){
    global $db;
    extract($_POST);

    $insertar =$db ->insert("administradores", ["adm_nom" => $nom,
                                                "adm_email"=>$email,
                                                "adm_pass"=>$pass,
                                                "adm_fa"=> date("Y").date("m").date("d")]);

   if($insertar){
      echo 1;
    }else{
      echo 2;
    }

  }

  function insertar_equipo(){
    global $db;
    extract($_POST);

      $insertar=$db ->insert("equipos",["epo_nom" => $nom,
                                        "epo_sn" => $snu,
                                        "epo_fa" => date("Y").date("m").date("d")]);

    if($insertar){
      echo 1;
    }else{
      echo 2;
    }
  }





?>

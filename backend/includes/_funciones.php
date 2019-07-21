<?php
  require_once '_db.php';

  if(isset($_POST["accion"])){
    switch ($_POST["accion"]) {
      //SESION
      case "cerrar_sesion":
        cerrar_sesion();
      break;
      //DEPARTAMENTOS
      case "insertar_depto":
        insertar_depto();
      break;
      case "editar_depto":
        editar_depto();
      break;
      case "consultar_depto":
        consultar_depto();
      break;
      case "eliminar_depto":
        eliminar_depto();
      break;
      //ADMINISTRADORES
      case "insertar_admin":
        insertar_admin();
      break;
      case "eliminar_admin":
        eliminar_admin();
      break;
      case "consultar_admin":
        consultar_admin();
      break;
      case "editar_admin":
        editar_admin();
      break;
      //EQUIPOS
      case "insertar_equipo":
        insertar_equipo();
      break;
      case "editar_equipo":
        editar_equipo();
      break;
      case "eliminar_equipo":
          eliminar_equipo();
      break;
      case "consultar_equipo":
        consultar_equipo();
      break;
      //USUARIOS
      case "insertar_user":
        insertar_user();
      break;
      case "consultar_user":
        consultar_user();
      break;
      case "eliminar_user":
        eliminar_user();
      break;
      case "editar_user":
        editar_user();
      break;
  }
}

  //FUNCIONES DE SESION
  function cerrar_sesion(){
    echo 1;
  }

//FUNCIONES DE DEPARTAMENTO
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

    function consultar_depto(){
      global $db;
      extract($_POST);

      $consultar = $db -> get("departamentos","*",["AND" => ["dpto_id"=>$id]]);
      echo json_encode($consultar);

    }

    function editar_depto(){
      global $db;
      extract($_POST);


        $editar=$db ->update("departamentos",["dpto_nom" => $nom,],
                                             ["dpto_id"=>$id]);

    }

  function eliminar_depto(){
        global $db;
        extract($_POST);
        $eliminar = $db->delete("departamentos",["dpto_id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

//FUNCIONES DE ADMINISTRADORES
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

  function editar_admin(){
    global $db;
    extract($_POST);


      $editar=$db ->update("administradores",["adm_nom" => $nom,
                                              "adm_email" => $email,
                                              "adm_pass" => $pass,],
                                              ["adm_id"=>$id]);
  }

  function consultar_admin(){
    global $db;
    extract($_POST);

    $consultar = $db -> get("administradores","*",["AND" => ["adm_id"=>$id]]);
    echo json_encode($consultar);

  }

  function eliminar_admin(){
        global $db;
        extract($_POST);
        $eliminar = $db->delete("administradores",["adm_id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

//FUNCIONES DE EQUIPO
  function insertar_equipo(){
    global $db;
    extract($_POST);

      $insertar=$db ->insert("equipos",["epo_nom" => $nom,
                                        "epo_sn" => $snu,
                                        "epo_tip" =>$lista,
                                        "epo_fa" => date("Y").date("m").date("d")]);

    if($insertar){
      echo 1;
    }else{
      echo 2;
    }
  }

  function consultar_equipo(){
    global $db;
    extract($_POST);

    $consultar = $db -> get("equipos","*",["AND" => ["epo_id"=>$id]]);
    echo json_encode($consultar);

  }

  function editar_equipo(){
    global $db;
    extract($_POST);


      $editar=$db ->update("equipos",["epo_nom" => $nom,
                                      "epo_sn" => $snu,
                                      "epo_tip" => $lista,],
                                      ["epo_id"=>$id]);

  }

  function eliminar_equipo(){
        global $db;
        extract($_POST);
        $eliminar = $db->delete("equipos",["epo_id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

//FUNCIONES DE USUARIOS
function insertar_user(){
  global $db;
  extract($_POST);

    $insertar=$db ->insert("persona",["per_nom" => $nom,
                                      "per_dpto" =>$lista,
                                      "per_pto" => $pto,
                                      "per_fa" => date("Y").date("m").date("d")]);

  if($insertar){
    echo 1;
  }else{
    echo 2;
  }
}

function consultar_user(){
  global $db;
  extract($_POST);

  $consultar = $db -> get("persona","*",["AND" => ["per_id"=>$id]]);
  echo json_encode($consultar);

}

function editar_user(){
  global $db;
  extract($_POST);


    $editar=$db ->update("persona",["per_nom" => $nom,
                                    "per_dpto" => $lista,
                                    "per_pto" => $pto,],
                                    ["per_id"=>$id]);

}

function eliminar_user(){
      global $db;
      extract($_POST);
      $eliminar = $db->delete("persona",["per_id" => $id]);
      if($eliminar){
          echo "Registro eliminado";
      }else{
          echo "registro eliminado";
      }
  }

?>

$(document).ready(function(){
//CERRAR SESION
$("#logout").click(function(){
    let obj={
        "accion":"cerrar_sesion"
    }

    $.ajax({
        url:"backend/includes/_funciones.php",
        datatype:"json",
        type:"post",
        data:obj,
        success:function(data){
            if(data==1){
                alert("hdsgsdjh");
            }
        }
    });
});

//BOTON ACTIVAR FORMULARIO
$("#nuevo").click(function(){
  //alert("puto");
  $("#modal").modal("show");
  $("#formulario").trigger("reset");
});

//BOTON INSERTAR O GUARDAR
$("#guardarDep").click(function(){
  //alert("puto");
  nom=$("#nom").val();
  obj={
    accion: "insertar_depto",
    nom: nom
  }

  if($(this).data("edicion")==1){
  obj["accion"]="editar_depto";
     obj["id"]=$(this).data("id");
   $(this).removeData("edicion").removeData("id");
  }

  if(nom==""){
    alert("No dejes campos vacios");
    return;
  }else{
    $.ajax({
      url: "backend/includes/_funciones.php",
      type: "post",
      datatype: "json",
      data: obj,
      success: function(data){
        if(data==1){}
      }
    })
    location.reload();
  }
});

$("#guardarEpo").click(function(){
  //alert("puto 23");
  nom=$("#nom").val();
  snu=$("#snu").val();
  obj={
    accion: "insertar_equipo",
    nom: nom,
    snu: snu
  }

  if(nom == "" || snu==""){
    alert("No dejes campos vacios");
    return;
  }else{
    $.ajax({
      url: "backend/includes/_funciones.php",
      type: "post",
      datatype: "json",
      data: obj,
      success: function(data){
        if(data==1){alert("skrull");}
      }
    })

  }
  location.reload();
});

$("#guardarAdm").click(function(){
  //alert("puto 45");
  nom=$("#nom").val();
  email=$("#email").val();
  pass=$("#pass").val();
  obj={
    accion: "insertar_admin",
    nom: nom,
    email: email,
    pass:pass
  }

  if(nom=="" || email=="" || pass==""){
    alert("No dejes campos vacios");
    return;
  }else{
    $.ajax({
      url: "backend/includes/_funciones.php",
      type: "post",
      datatype: "json",
      data: obj,
      success: function(data){
        if(data==1){alert("djfhad");}
      }
    })
    location.reload();
  }

});

//BOTON DE EDICION depto
$(document).on("click", ".editar_depto", function(){
  id=$(this).data("id");
  obj={
    "accion" : "consultar_depto",
    "id" : $(this).data("id")
  }
  $.post("backend/includes/_funciones.php", obj, function(data){
    $("#nom").val(data.dpto_nom);
  }, "JSON");
  $("#guardarDep").text("Actualizar").data("edicion", 1).data("id", id);
  $(".modal-title").text("Editar Departamento");
  $("#modal").modal("show");

});


$(document).on("click", ".eliminar_depto", function(){
  id=$(this).data("id");
  let obj = {
        "accion" : "eliminar_depto",
        "id" : id
    }

  $.ajax({
      url: "backend/includes/_funciones.php",
      type: "POST",
      dataType: "json",
      data: obj,
      success: function(data){
          if(data==1){alert("logrado");}else{alert("no logrado");}
      }
  })
  location.reload();
});
//FIN DOCUMENT READY
});

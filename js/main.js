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

//BOTON GUARDAR
$("#guardarDep").click(function(){
  //alert("puto");
  nom=$("#nom").val();
  obj={
    accion: "insertar_depto",
    nom: nom
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
        if(data==1){alert("djfhad");}
      }
    })
    location.reload();
  }
});



//FIN DOCUMENT READY
});

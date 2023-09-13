function MNuevoProfesional() {
  $("#modal-xl").modal("show")
  let obj = ""
  $.ajax({
    type: "POST",
    url: "CProfesional/MNuevoProfesional",
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}
function RegUsuario() {
  let formData = new FormData($("#FRegProfesional")[0])
  $.ajax({
    type: "POST",
    url: "CProfesional/RegProfesional",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      Swal.fire({
        icon: "success",
        showConfirmButton: false,
        title: "Profesional Registrado",
        timer: 1000
      })
      setTimeout(function () {
        location.reload()
      }, 1200)
    }
  })
}

function previsualizar() {
  let imagen = document.getElementById("imgUsuario").files[0]

  if (imagen["type"] != "image/png" && imagen["type"] != "image/jpeg") {
    Swal.fire({
      icon: "error",
      showConfirmButton: true,
      title: "La imagen debe ser formato PNG o JPG"
    })
  } else {
    let datosImagen = new FileReader
    datosImagen.readAsDataURL(imagen)
    $(datosImagen).on("load", function (event) {
      let rutaImagen = event.target.result
      $(".previsualizar").attr("src", rutaImagen)
    })
  }

}

function MEliProfesional(id) {
  Swal.fire({
    title: "Esta seguro de eliminar el usuario?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: "Confirmar",
    denyButtonText: "Cancelar"
  }).then((result) => {
    //la funcion para eliminar
    var obj = ""
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "CProfesional/EliProfesional/" + id,
        data: obj,
        success: function (data) {
          setTimeout(function () {
            location.reload()
          }, 1000)
        }
      })
    }
  })
}

function MArchProfesional(id) {
  Swal.fire({
    title: "Esta seguro de Archivar el usuario?",
    showDenyButton: true,
    showCancelButton: false,
    confirmButtonText: "Confirmar",
    denyButtonText: "Cancelar"
  }).then((result) => {
    //la funcion para eliminar
    var obj = ""
    if (result.isConfirmed) {
      $.ajax({
        type: "POST",
        url: "CProfesional/ArchProfesional/" + id,
        data: obj,
        success: function (data) {
          setTimeout(function () {
            location.reload()
          }, 1000)
        }
      })
    }
  })
}

function MEditProfesional(id) {
  $("#modal-xl").modal("show")
  let obj = ""
  $.ajax({
    type: "POST",
    url: "CProfesional/MEditProfesional/" + id,
    data: obj,
    success: function (data) {
      $("#content-default").html(data)
    }
  })
}

function EditProfesional(id) {
  let formData = new FormData($("#FEditProfesional")[0])
  $.ajax({
    type: "POST",
    url: "CProfesional/EditProfesional/" + id,
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
      Swal.fire({
        icon: "success",
        showConfirmButton: false,
        title: "Usuario actualizado",
        timer: 1000
      })
      setTimeout(function () {
        location.reload()
      }, 1200)
    }
  })
}
<footer class="main-footer">
  <strong> <b class="text-primary">Software de Seguimiento a Titulados</b>.</strong>

  <div class="float-right d-none d-sm-inline-block">
    <b>Versión</b> 1.0
  </div>
</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="<?php echo base_url(); ?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?php echo base_url(); ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="<?php echo base_url(); ?>/assets/dist/js/adminlte.js"></script>

<!-- OPTIONAL SCRIPTS -->
<!-- <script src="/assets/plugins/chart.js/Chart.min.js"></script> -->
<!-- AdminLTE for demo purposes -->
<!-- <script src="/assets/dist/js/demo.js"></script> -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="/assets/dist/js/pages/dashboard3.js"></script> -->


<!-- DataTables  & Plugins -->
<script src="<?php echo base_url(); ?>/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="<?php echo base_url(); ?>/assets/plugins/sweetalert2/sweetalert2.min.js"></script>

<script src="<?php echo base_url(); ?>/assets/js/profesional.js"></script>

<script>
  $(function() {
    var t = $("#DataTableUsuario").DataTable({
      columnDefs: [{
        searchable: false,
        orderable: false,
        targets: 0,
      }, ],
      order: [
        [0, 'off']
      ],
      "responsive": true,
      "lengthChange": true,
      "autoWidth": false,
      language: {
        "decimal": "",
        "emptyTable": "No hay información",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
        "infoEmpty": "Mostrando 0 a 0 de 0 Entradas",
        "infoFiltered": "(Filtrado de _MAX_ total entradas)",
        "infoPostFix": "",
        "thousands": ",",
        "lengthMenu": "Mostrar _MENU_ Entradas",
        "loadingRecords": "Cargando...",
        "processing": "Procesando...",
        "search": "Buscar:",
        "zeroRecords": "Sin resultados encontrados",
        "paginate": {
          "first": "Primero",
          "last": "Ultimo",
          "next": "Siguiente",
          "previous": "Anterior"
        }
      }
    });
    t.on('order.dt search.dt', function() {
      let i = 1;

      t.cells(null, 0, {
        search: 'applied',
        order: 'applied'
      }).every(function(cell) {
        this.data(i++);
      });
    }).draw();
  });
</script>
<!-- /.modal -->
<div class="modal fade" id="modal-xl">
  <div class="modal-dialog modal-xl">
    <div class="modal-content" id="content-default">

    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
  $(document).ready(function() {
    $('.product-image-thumb').on('click', function() {
      var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
    })
  })
</script>

<!------------------------------------------------- /.MENSAJES SWALERT2--------------------------------->
<?php
if (session('cambia_pass.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Contraseña Cambiada!',
      'Se cambio la Contraseña Correctamente',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('adicionar.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Guardado!',
      'Registro almacenado exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('editar.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Editado!',
      'Registro modificado exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('archivar.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Archivado!',
      'Registro archivado exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('reingresar.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Reincorporado!',
      'Registro Reingresado exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('eliminar_def.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Eliminado!',
      'Registro eliminado exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<?php
if (session('resetear.mensaje') == 'ok') {
?>
  <script>
    Swal.fire(
      'Restablecido!',
      'Contraseña Reiniciada exitosamente.',
      'success'
    )
  </script>
<?php
}
?>
<script>
  $('.formulario-nuevo').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Guardar Formulario?',
      text: "Esta seguro de que todos los datos son correctos!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI',
      cancelButtonText: 'NO'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })

  });
</script>
<script>
  $('.formulario-editado').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Editar Formulario?',
      text: "Esta seguro de que todos los datos son correctos!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI',
      cancelButtonText: 'NO'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  });
</script>
<script>
  $('.formulario-eliminar').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Esta seguro de Eliminar el registro?',
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI',
      cancelButtonText: 'NO'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  });
</script>
<script>
  $('.formulario-resetear').submit(function(e) {
    e.preventDefault();
    Swal.fire({
      title: 'Reestablecer contraseña?',
      text: "Esta seguro reiniciar la contraseña!",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'SI',
      cancelButtonText: 'NO'
    }).then((result) => {
      if (result.isConfirmed) {
        this.submit();
      }
    })
  });
</script>
<script type="text/javascript">
  function validarExt() {
    var archivoInput = document.getElementById('imgUsuario');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.jpeg|.jpg)$/i;
    if (!extPermitidas.exec(archivoRuta)) {
      Swal.fire({
        icon: "error",
        showConfirmButton: true,
        title: "La imagen debe ser formato JPG"
      })
      // alert('Asegurese de haber seleccionado un PDF');
      archivoInput.value = '';
      return false;
    } else {
      //PRevio del PDF
      if (archivoInput.files && archivoInput.files[0]) {
        var visor = new FileReader();
        visor.onload = function(e) {
          document.getElementById('visorArchivo').innerHTML =
            '<center><embed src="' + e.target.result + '" width="150" height="150" /></center>';
        };
        visor.readAsDataURL(archivoInput.files[0]);
      }
    }
  }
</script>
<script type="text/javascript">
  function validarArch() {
    var archivoInput = document.getElementById('archivo');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.pdf)$/i;
    if (!extPermitidas.exec(archivoRuta)) {
      Swal.fire({
        icon: "error",
        showConfirmButton: true,
        title: "El Archivo debe ser formato PDF"
      })
      // alert('Asegurese de haber seleccionado un PDF');
      archivoInput.value = '';
      return false;
    } else {
      //PRevio del PDF
      if (archivoInput.files && archivoInput.files[0]) {
        var visor = new FileReader();
        visor.onload = function(e) {
          document.getElementById('visor').innerHTML =
            '<center><embed src="' + e.target.result + '" width="100%" height="100%" type="application/pdf" /></center>';
        };
        visor.readAsDataURL(archivoInput.files[0]);
      }
    }
  }
</script>
<script type="text/javascript">
  function validarArchExcel() {
    var archivoInput = document.getElementById('archivo');
    var archivoRuta = archivoInput.value;
    var extPermitidas = /(.xlsx)$/i;
    if (!extPermitidas.exec(archivoRuta)) {
      Swal.fire({
        icon: "error",
        showConfirmButton: true,
        title: "El Archivo debe ser formato Excel (.xlsx)"
      })
      // alert('Asegurese de haber seleccionado un PDF');
      archivoInput.value = '';
      return false;
    } else {
      //PRevio del PDF
      if (archivoInput.files && archivoInput.files[0]) {
        var visor = new FileReader();
        visor.onload = function(e) {
          document.getElementById('visor').innerHTML =
            '<center><embed src="' + e.target.result + '" width="100%" height="100%" type="application/pdf" /></center>';
        };
        visor.readAsDataURL(archivoInput.files[0]);
      }
    }
  }
</script>

</body>

</html>
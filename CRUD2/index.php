<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD EN PHP</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- estilos personalizados-->
    <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
    <div class="container fondo">
        <h1 class="text-center">CRUD EN PHP</h1>
        <h1 class="text-center">WWW.SINMIEDOALEXITO.COM.CO</h1>

        <div class="row">
            <div class="col-2 offset-10">
                <div class="text-center">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#modalUsuario" id="botonCrear">
                        <i class="bi bi-person-plus"></i> Crear
                    </button>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="table-responsive">

            <table id="datos_usuario" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Telefono</th>
                        <th>E-Mail</th>
                        <th>Imagen</th>
                        <th>Fecha Creacion</th>
                        <th>Telefono</th>
                        <th>Editar</th>
                        <th>Borrar</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>

    <!---------------------------MODAL---------------------------------------------------->

    <div class="modal fade" id="modalUsuario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Registro Datos</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>


                <!---------------------------CREAMOS UN FORMULARIO---------------------------------------------------->
                <form method="POST" id="formulario" enctype="multipart/form-data">
                    <div class="modal-content">
                        <div class="modal-body">
                            <label for="nombre">Ingrese el Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control">
                            <br />
                            <label for="apellidos">Ingrese los Apellidos</label>
                            <input type="text" name="apellidos" id="apellidos" class="form-control">
                            <br />
                            <label for="telefono">Ingrese el numero telefonico</label>
                            <input type="text" name="telefono" id="telefono" class="form-control">
                            <br />
                            <label for="email">Ingrese el E-mail</label>
                            <input type="email" name="email" id="email" class="form-control">
                            <br />
                            <label for="imagen">Seleccione un Imagen</label>
                            <input type="file" name="imagen_usuario" id="imagen_usuario" class="form-control">
                            <span id="imagen-subida"></span>
                            <br />

                        </div>
                        <div class="modal-footer">
                            <input type="hidden" name="id_usuario" id="id_usuario">
                            <input type="hidden" name="operacion" id="operacion">
                            <input type="submit" name="action" id="action" class="btn btn-success"
                                value="Crear">
                        </div>
                </form>


            </div>

        </div>
    </div>
    </div>





    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-2.1.8/b-3.1.2/b-html5-3.1.2/b-print-3.1.2/datatables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   <!--<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-JobWAqYk5CSjWuVV3mxgS+MmccJqkrBaDhk8SKS1BW+71dJ9gzascwzW85UwGhxiSyR7Pxhu50k+Nl3+o5I49A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
<!---
    <script type="text/javascript">
        //codigo para listar informacion en la tabla crea la paginacion y el boton busqueda
        $(document).ready(function() {
            var dataTable = $('#datos_usuario').DataTable({
                    "processing":true,
                    "serverSide":true,
                    "order": [],
                    "ajax":{
                          url: "obtener_unregistro.php",
                          type: "POST"

                },
                "columnsDefs":[
                    {
                    "targets": [,3, 4],
                    "orderable": false
                },
                ]
            });
        });
        
    </script>
--->

<!---codigo realizado por chatgpt------->


<script type="text/javascript">
     // Inicializar DataTable con paginación, búsqueda y orden

    $(document).ready(function() {
            $('#datos_usuario').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": {
                    url: "obtener_unregistro.php", // Cambia a la URL de tu archivo PHP
                    type: "POST"
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nombre" },
                    { "data": "apellidos" },
                    { "data": "telefono" },
                    { "data": "email" },
                    { "data": "imagen", "orderable": false, "searchable": false },
                    { "data": "fecha_creacion" },
                    { "data": "telefono" },
                    { "data": "editar", "orderable": false, "searchable": false },
                    { "data": "borrar", "orderable": false, "searchable": false }
                ],
                "language": {
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de _MAX_ registros en total)",
                    "search": "Buscar:",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                },
                "pageLength": 10
            });
        });



</script>



</body>

</html>
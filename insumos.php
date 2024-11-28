<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>INSUMOS</title>
  <link rel="icon" type="image/ico" href="icon/2.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/insumo.css">

</head>

<body>

  <script>
    //Selecciona el botón para abrir/cerrar el menú y el nav
    const menuToggle = document.getElementById('menuToggle');
    const sidenav = document.getElementById('mySidenav');
    const mainContent = document.querySelector('main');
    const otherContent = document.querySelectorAll('.content'); // Todos los divs de la página

    // Función para abrir/cerrar el menú y mover el contenido
    menuToggle.addEventListener('click', function() {
      sidenav.classList.toggle('open');
      mainContent.classList.toggle('shifted');

      // Desplaza todos los otros divs que tengan la clase 'content'
      otherContent.forEach(div => {
        div.classList.toggle('shifted');
      });

      this.classList.toggle('open'); // Cambia el estado del botón de menú
    });
  </script>



  <!-- Menu Toggle Button -->
  <div class="menu-toggle" id="menuToggle">
    <i class="bi bi-list"></i>
  </div>

  <!-- Side Navigation -->
  <nav>
    <div class="sidenav" id="mySidenav"><br>
      <img src="icon/5.ico" alt="">
      <a class="degradado" href="index.php">Inicio <i class="bi bi-house"></i></a>
      <a class="degradado" href="#">Ventas <i class="bi bi-bag"></i></a>
      <div class="dropdown">
        <a class="degradado" href="ordenes.php">Ordenes <i class="bi bi-list-ul"></i></a>
        <div class="dropdown-content">
          <a href="registarordenes.php" class="degradado">Registrar Orden <i class="bi bi-archive"></i></a>
          <a href="salidas.php" class="degradado">Salidas <i class="bi bi-box-arrow-right"></i></a>
        </div>
      </div>
      <a class="degradado" href="envios.php">Envios <i class="bi bi-scooter"></i></a>
      <div class="dropdown">
        <a class="degradado" href="#">Inventario <i class="bi bi-clipboard-data"></i></a>
        <div class="dropdown-content">
          <a href="insumos.php" class="degradado">Insumos <i class="bi bi-archive"></i></a>
          <a href="proveedores.php" class="degradado">Proveedores <i class="bi bi-people"></i></a>
          <a href="categoria.php" class="degradado">Registrar Categoria <i class="bi bi-bookmarks"></i></a>
          <a href="entradas.php" class="degradado">Entradas <i class="bi bi-box-arrow-in-left"></i></a>
        </div>
      </div>
      <br><br><br><br>
      <hr>
      <br>
      <a class="degradado" href="LPkaef.html"><b> Cerrar Sesión <i class="bi bi-arrow-bar-right"></i></b></a>
    </div>
  </nav>

  <main>
    <h5>Bienvenid@ </h5>
    <form id="searchForm" onsubmit="search(event)" class="search-form">
      <label for="buscador">
        <input type="text" id="buscar" placeholder="Buscar..">
        <button type="submit" style="border: none; background: none;"><i class="bi bi-search"></i>
        </button>
      </label>
    </form>
    <div class="icons">
      <h5>
        <i id="noti" class="bi bi-bell"></i>
        <i id="user" class="bi bi-person-circle"></i>
        <a href="/error500.html">Administrador</a>
      </h5>

    </div>
  </main>



  <script>
    document.getElementById('menuToggle').addEventListener('click', function() {
      var sidenav = document.getElementById('mySidenav');
      sidenav.classList.toggle('open');
      this.classList.toggle('open');
    });

    function search(event) {
      event.preventDefault();
      const searchTerm = document.getElementById('searchInput').value;
      console.log('Búsqueda realizada: ', searchTerm);
    }
  </script>

    <!-- ------------------------------------------------------------------------------ -->
    <div class="table_insumo">
        
        <br>
        <center>
            <h5><b>INSUMOS</b></h5>
        </center>
        <!-- Sección de botones de acciones -->
        <div class="action-buttons mb-4 text-center">
            <!-- Botón para abrir el modal de agregar insumo -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarInsumo">
                Agregar Insumo <i class="bi bi-plus-circle"></i>
            </button>
        </div>

        <!-- Contenedor principal para la tabla y los modales -->
        <div class="container mt-4" id="tablaDentro">
            <!-- Tabla de insumos -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">     Cod</th>
                            <th scope="col">     Nombre</th>
                            <th scope="col">     Cantidad</th>
                            <th scope="col">    Cod Categoria</th>
                            <th scope="col">    Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Incluir el archivo de conexión
                        include('connection1.php');

                        // Llamar a la función de conexión
                        $con = connection(); // Asignar el resultado a la variable $con

                        // Consulta para obtener los insumos
                        $sql = "SELECT cod_insumo, nomb_insumo, cnt_insumo, cod_categoria FROM insumo";
                        $result = mysqli_query($con, $sql);

                        // Verificar si hay registros
                        if (mysqli_num_rows($result) > 0) {
                            // Mostrar los insumos en la tabla
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row['cod_insumo'] . "</td>";
                                echo "<td>" . $row['nomb_insumo'] . "</td>";
                                echo "<td>" . $row['cnt_insumo'] . "</td>";
                                echo "<td>" . $row['cod_categoria'] . "</td>";
                                echo "<td>
                                    <!-- Botón de Entrada -->
                                    <button class='btn btn-primary' title='Entrada' onclick=\"openModalEntrada('" . $row['cod_insumo'] . "');\">
                                        <i class='bi bi-box-arrow-in-down'></i>
                                    </button>
                                    <!-- Botón de Salida -->
                                    <button class='btn btn-info' title='Salida' onclick=\"openModalSalida('" . $row['cod_insumo'] . "');\">
                                        <i class='bi bi-box-arrow-up'></i>
                                    </button>
                                   <!-- Botón de Editar -->
                                    <button class='btn btn-warning' title='Editar' onclick=\"openModalEditar('" . $row['cod_insumo'] . "', '" . $row['nomb_insumo'] . "', " . $row['cnt_insumo'] . ", " . $row['cod_categoria'] . ");\">
                                        <i class='bi bi-pencil-fill'></i>
                                    </button>
                                    <!-- Botón de Eliminar -->
                                    <a href='delete_insumo.php?id=" . $row['cod_insumo'] . "' class='btn btn-danger' title='Eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este insumo?\")'>
                                        <i class='bi bi-trash-fill'></i>
                                    </a>
                                </td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5'>No hay insumos registrados</td></tr>";
                        }

                        mysqli_close($con);
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- Fin del contenedor principal -->

        <!-- Modal para Agregar Insumo -->
        <div class="modal fade" id="modalAgregarInsumo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Insumo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_insumo.php" method="post">
                            <div class="form-group mb-3">
                                <label for="nombre-insumo" class="col-form-label">Nombre del Insumo:</label>
                                <input type="text" class="form-control" id="nombre-insumo" name="nomb_insumo" required>
                            </div>
                            <div class="form-group">
                                <label for="cantidad-insumo" class="col-form-label">Cantidad:</label>
                                <input type="number" class="form-control" id="cantidad-insumo" name="cnt_insumo" required>
                            </div>
                            <div class="form-group">
                                <label for="cod-categoria" class="col-form-label">Cod Categoria:</label>
                                <input type="number" class="form-control" id="cod-categoria" name="cod_categoria" required>
                            </div>
                            <br>
                            <hr><br>
                            <div class="modal-footer d-flex justify-content-center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                <input type="submit" value="Agregar Insumo" class="btn btn-success mx-2 shadow">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal para Registrar Entrada -->
        <div class="modal fade" id="modalEntrada" tabindex="-1" aria-labelledby="modalEntradaLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEntradaLabel">Registrar Entrada</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="insert_entrada.php" method="post">
                            <input type="hidden" id="entrada-cod-insumo" name="cod_insumo"> <!-- Campo oculto para el código del insumo -->
                            <div class="form-group">
                                <label for="cod_proveedor">Código Proveedor:</label>
                                <input type="number" class="form-control" id="cod_proveedor" name="cod_proveedor" required>
                            </div>
                            <div class="form-group">
                                <label for="cod_insumo">Código Insumo:</label>
                                <input type="number" class="form-control" id="cod_insumo" name="cod_insumo" required>
                            </div>
                            <div class="form-group">
                                <label for="cnt_entrada">Cantidad de Entrada:</label>
                                <input type="number" class="form-control" id="cnt_entrada" name="cnt_entrada" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_caducidad">Fecha de Caducidad:</label>
                                <input type="date" class="form-control" id="fecha_caducidad" name="fecha_caducidad" required>
                            </div>
                            <div class="modal-footer d-flex justify-content-center">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Agregar Entrada" class="btn btn-success">
                    </div>
                                        </form>
                    </div>

                </div>
            </div>
        </div>

     <!-- Modal para Registrar Salida -->
<div class="modal fade" id="modalSalida" tabindex="-1" aria-labelledby="modalSalidaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSalidaLabel">Registrar Salida</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="insert_salida.php" method="post">
                    <input type="hidden" name="cod_insumo" id="salida-cod-insumo">
                    <div class="form-group">
                                <label for="cod_insumo">Código Insumo:</label>
                                <input type="number" class="form-control" id="cod_insumo" name="cod_insumo" required>
                            </div>
                    <div class="form-group">
                        <label for="cnt_salida">Cantidad de Salida:</label>
                        <input type="number" class="form-control" id="cnt_salida" name="cnt_salida" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Registrar Salida" class="btn btn-success">
                    </div>                </form>
            </div>
        </div>
    </div>
</div>


    <!-- Modal de edición de insumo -->
    <div class="modal fade" id="modalEditarInsumo" tabindex="-1" aria-labelledby="modalEditarInsumoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarInsumoLabel">Editar Insumo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarInsumo" method="post" action="edit_insumo.php">
                        <input type="hidden" id="editarCodInsumo" name="cod_insumo">
                        <div class="mb-3">
                            <label for="editarNombreInsumo" class="form-label">Nombre del Insumo</label>
                            <input type="text" class="form-control" id="editarNombreInsumo" name="nombre_insumo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarCantidadInsumo" class="form-label">Cantidad</label>
                            <input type="number" class="form-control" id="editarCantidadInsumo" name="cantidad_insumo" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarCodCategoria" class="form-label">Código de Categoría</label>
                            <input type="text" class="form-control" id="editarCodCategoria" name="cod_categoria" required>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        function openModalEntrada(codInsumo) {
            document.getElementById('entrada-cod-insumo').value = codInsumo; // Asegúrate de que este campo existe
            var modal = new bootstrap.Modal(document.getElementById('modalEntrada'));
            modal.show();
        }

        function openModalSalida(codInsumo) {
    document.getElementById('salida-cod-insumo').value = codInsumo;
    var modal = new bootstrap.Modal(document.getElementById('modalSalida'));
    modal.show();
}

        function openModalEditar(codInsumo, nombreInsumo, cantidadInsumo, codCategoria) {
            // Llena los campos del modal con la información del insumo seleccionado
            document.getElementById('editarCodInsumo').value = codInsumo;
            document.getElementById('editarNombreInsumo').value = nombreInsumo;
            document.getElementById('editarCantidadInsumo').value = cantidadInsumo;
            document.getElementById('editarCodCategoria').value = codCategoria;

            // Abre el modal
            var myModal = new bootstrap.Modal(document.getElementById('modalEditarInsumo'));
            myModal.show();
        }
    </script>




</body>

</html>
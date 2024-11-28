<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>domicilios</title>
  <link rel="icon" type="image/ico" href="icon/2.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/envios.css">

</head>

<body>

  <script>
    //Selecciona el botón para abrir/cerrar el menú y el nav
    const menuToggle = document.getElementById('menuToggle');
    const sidenav = document.getElementById('mySidenav');
    const mainContent = document.querySelector('main');
    const otherContent = document.querySelectorAll('.content'); // Todos los divs de la página

    // Función para abrir/cerrar el menú y mover el contenido
    menuToggle.addEventListener('click', function () {
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
      <a class="degradado" href="ventas.php">Ventas <i class="bi bi-bag"></i></a>
      <div class="dropdown">
        <a class="degradado" href="ordenes.php">Ordenes <i class="bi bi-list-ul"></i></a>
        <div class="dropdown-content">
          <a href="registarordenes.php" class="degradado">Registrar Orden <i class="bi bi-archive"></i></a>
          <a href="salidas.php" class="degradado">Salidas <i class="bi bi-box-arrow-right"></i></a>
        </div>
      </div>
      <a class="degradado" href="envios.php">Domiciliario <i class="bi bi-scooter"></i></a>
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
      <hr><br><br><br><br><br><br><br>
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
        <a href="/error500.html">Estefania Villa</a>
      </h5>

    </div>
  </main>



  <script>
    document.getElementById('menuToggle').addEventListener('click', function () {
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

  </div>
  <div class="table_envios">
    <br>
    <center>
      <h5><b>Envios</b></h5>
    </center>
  
    <!-- Contenedor principal para la tabla y los modales -->
    <div class="container mt-4">

    <div class="action-buttons mb-4 text-center">
            <!-- Botón para abrir el modal de asignar envio -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAsignarEnvio">
                Asignar Envio <i class="bi bi-plus-circle"></i>
            </button>
        </div>
          <?php
            include("connection1.php");
            $con = connection();

      // Consulta 
            $sql = "SELECT * FROM asignacionenvio";
            $query = mysqli_query($con, $sql);
          ?>
      <!-- Tabla de envios -->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">COD</th>
              <th scope="col">COD ADMINISTRADOR</th>
              <th scope="col">COD DOMICILIARIO</th>
              <th scope="col">COD PRODUCCION</th>
              <th scope="col">Fecha Asignada</th>
              <th scope="col"> Accion </th>
              
            </tr>
          </thead>
          <tbody>
      <?php
      // Verifica si hay resultados en la consulta
      if (mysqli_num_rows($query) > 0) {
          // Itera sobre los resultados y crea una fila para cada registro
          while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr>
                  <th scope='row'>" . $row['cod_asignacion'] . "</th>
                  <td>" . $row['cod_admin'] . "</td>
                  <td>" . $row['cod_domi'] . "</td>
                  <td>" . $row['cod_producto'] . "</td>
                  <td>" . $row['fecha_hora_asignada	'] . "</td>
                  <td>
                      <!-- Botón de Eliminar -->
                      <a href='delete_asignacion.php?id=" . $row['cod_asignacion'] . "' class='btn btn-danger' title='Eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta Asignacion?\")'>
                          <i class='bi bi-trash-fill'></i>
                      </a>
                  </td>
              </tr>";
          }
      } else {
          echo "<tr><td colspan='6' class='text-center'>No hay Asignacion</td></tr>";
      }
      ?>
      </tbody>
        </table>
      </div>

    </div> <!-- Fin del contenedor principal -->
    <div class="modal fade" id="modalAsignarEnvio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Asignar Envio</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario que envía los datos a insert_envi.php -->
                <form id="formAsignacionEnvio" action="insert_envios.php" method="post">
                    <div class="form-group mb-3">
                        <label for="cod_admin" class="col-form-label">Codigo Administrador:</label>
                        <input type="number" class="form-control" id="cod_admin" name="cod_admin" required>
                    </div>
                    <div class="form-group">
                        <label for="cod_domi" class="col-form-label">Codigo Domiciliario:</label>
                        <input type="number" class="form-control" id="cod_domi" name="cod_domi">
                    </div>
                    <div class="form-group">
                        <label for="cod_producto" class="col-form-label">Codigo Produccion:</label>
                        <input type="number" class="form-control" id="cod_producto" name="cod_producto" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_hora_asignada" class="col-form-label">Fecha y Hora Asignada:</label>
                        <input type="datetime-local" class="form-control" id="fecha_hora_asignada" name="fecha_hora_asignada" required>
                    </div>
                    <div class="modal-footer d-flex justify-content-center">
                        <!-- El botón de submit dentro del formulario -->
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal de Editar Asignacion -->
<div class="modal fade" id="modalEditarAsignacion" tabindex="-1" aria-labelledby="modalEditarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarLabel">Editar Asignacion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                      <div class="form-group mb-3">
                        <label for="cod-admin" class="col-form-label">Codigo Administrador:</label>
                        <input type="number" class="form-control" id="cod-admin" required>
                    </div>
                    <div class="form-group">
                        <label for="cod-domi" class="col-form-label">Codigo Domiciliario:</label>
                        <input type="number" class="form-control" id="cod-domi" required>
                    </div>
                    <div class="form-group">
                      <label for="cod-producc" class="col-form-label">Codigo Producto:</label>
                      <input type="number" class="form-control" id="cod-producc" required>
                  </div>
                  <div class="form-group">
                      <label for="fecha_hora_asignada" class="col-form-label">Fecha y Hora Asignada:</label>
                      <input type="date" class="form-control" id="fecha_hora_asignada" required>
                  </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-warning">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

   <!-- Script para eliminar insumo (ejemplo básico) -->
    <script>
        function confirmDelete(id) {
            const confirmAction = confirm("¿Estás seguro de que deseas eliminar esta Asignacion?");
            if (confirmAction) {
                console.log("Asignacion " + id + " eliminada.");
            } else {
                console.log("Acción cancelada.");
            }
        }
    </script>
</body>
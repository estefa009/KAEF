<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ventas</title>
  <link rel="icon" type="image/ico" href="icon/2.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/ventas.css">

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
      <a class="degradado" href="#">Ventas <i class="bi bi-bag"></i></a>
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
  <div class="table_ventas">
    <br>
    <center>
      <h5><b>Ventas</b></h5>
    </center>
  
    <!-- Contenedor principal para la tabla y los modales -->
    <div class="container mt-4">

    <div class="action-buttons mb-4 text-center">
            <!-- Botón para abrir el modal de asignar envio -->
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalVenta">
                Agregar Venta <i class="bi bi-bag-plus-fill"></i>
            </button>
        </div>
          <?php
            include("connection1.php");
            $con = connection();

      // Consulta 
            $sql = "SELECT * FROM venta";
            $query = mysqli_query($con, $sql);
          ?>
      <!-- Tabla de envios -->
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">COD</th>
              <th scope="col">COD CLIENTE</th>
              <th scope="col">COD PAGO</th>
              <th scope="col">Fecha y Hora</th>
              <th scope="col">Cantidad</th>
              <th scope="col">Descripcion</th>
              <th scope="col">Precio de la venta</th>
              <th scope="col">Precio Iva </th>
              <th scope="col">Precio Total </th>
              <th scope="col">Acciones</th>  
            </tr>
          </thead>
          <tbody>

          <tr>
                        <th scope="row">1</th>
                        <td>1</td>
                        <td>2</td>
                        <td>10/09/2024</td>
                        <td>3</td>
                        <td> Donas xs</td>
                        <td> 6000</td>
                        <td> 1050</td>
                        <td> 7050</td>
                        <td>
                       <button class='btn btn-info' onclick='enableEdit'><i class='bi bi-pencil-square'></i></button> <br></br>
                        <button class='btn btn-warning'><i class='bi bi-archive-fill'></i></button>
                </td>
                        
                    </tr>
      <?php
      // Verifica si hay resultados en la consulta
      if (mysqli_num_rows($query) > 0) {
          // Itera sobre los resultados y crea una fila para cada registro
          while ($row = mysqli_fetch_assoc($query)) {
              echo "<tr>
                  <th scope='row'>" . $row['cod_venta'] . "</th>
                  <td>" . $row['cod_cliente'] . "</td>
                  <td>" . $row['cod_pago'] . "</td>
                  <td>" . $row['fecha_hora'] . "</td>
                  <td>" . $row['cnt_vnt'] . "</td>
                  <td>" . $row['descripcion	'] . "</td>
                  <td>" . $row['prec_vent	'] . "</td>
                  <td>" . $row['precioIva_vent	'] . "</td>
                  <td>" . $row['preciTo_vent	'] . "</td>
                  <td>
                       <button class='btn btn-light' onclick='enableEdit(" . $row['cod_venta'] . ")'>Editar</button><i class='bi bi-pencil-square'></i>
                        <button class='btn btn-warning' onclick='sendToHistorial(" . $row['cod_venta'] . ")'>Archivar</button><i class='bi bi-archive-fill'></i>
                </td>
              </tr>";
          }
      } else {
          echo "<tr><td colspan='10' class='text-center'>No hay Ventas</td></tr>";
      }
      ?>
      </tbody>
        </table>
      </div>

    </div> <!-- Fin del contenedor principal -->
    <div class="modal fade" id="modalVenta" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Formulario que envía los datos a insert_venta.php -->
                <form id="formAsignacionEnvio" action="insert_venta.php" method="post">
                    <div class="form-group mb-3">
                        <label for="cod_cliente" class="col-form-label">Codigo Cliente:</label>
                        <input type="number" class="form-control" id="cod_cliente" name="cod_cliente" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="cod_pago" class="col-form-label">Codigo Pago:</label>
                        <input type="number" class="form-control" id="cod_pago" name="cod_pago" required>
                    </div>
                    <div class="form-group">
                        <label for="fecha_hora" class="col-form-label">Fecha y Hora:</label>
                        <input type='datetime-local' class="form-control" id="fecha_hora" name="fecha_hora">
                    </div>
                    <div class="form-group">
                        <label for="cnt_vnt" class="col-form-label">Cantidad:</label>
                        <input type="number" class="form-control" id="cnt_vnt" name="cnt_vnt" required>
                    </div>
                    <div class="form-group">
                        <label for="descripcion" class="col-form-label">Descripcion:</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" required>
                    </div>
                    <div class="form-group">
                        <label for="prec_vent" class="col-form-label">Precio de Venta:</label>
                        <input type="number" class="form-control" id="prec_vent" name="prec_vent" required>
                    </div>
                    <div class="form-group">
                        <label for="precioIva_vent" class="col-form-label">IVA:</label>
                        <input type="number" class="form-control" id="precioIva_vent" name="precioIva_vent" required>
                    </div>
                    <div class="form-group">
                        <label for="preciTo_vent" class="col-form-label">Precio Total:</label>
                        <input type="number" class="form-control" id="preciTo_vent" name="preciTo_vent" required>
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
<script>
function enableEdit(cod_venta) {
    const fields = document.querySelectorAll(`input[name='cod_cliente[${cod_venta}]'],input[name='cod_pago[${cod_venta}]'], input[name='fecha_hora[${cod_venta}]'], input[name='cnt_vnt[${cod_venta}]'], input[name='descripcion[${cod_venta}]'], input[name='prec_vent[${cod_venta}]'], input[name='precioIva_vent[${cod_venta}]'], input[name='preciTo_vent[${cod_venta}]']`);
    fields.forEach(field => {
        field.disabled = false;
    });

    const editButton = document.querySelector(`button[onclick='enableEdit(${cod_venta})']`);
    editButton.textContent = 'Guardar';
    editButton.setAttribute('onclick', `saveData(${cod_venta})`);
}

function saveData(cod_venta) {
    const cod_cliente = document.querySelector(`input[name='cod_cliente[${cod_venta}]']`).value;
    const cod_pago = document.querySelector(`input[name='cod_pago[${cod_venta}]']`).value;
    const fecha_hora = document.querySelector(`input[name='fecha_hora[${cod_venta}]']`).value;
    const cnt_vnt = document.querySelector(`input[name='cnt_vnt[${cod_venta}]']`).value;
    const descripcion = document.querySelector(`input[name='descripcion[${cod_venta}]']`).value;
    const prec_vent = document.querySelector(`input[name='prec_vent[${cod_venta}]']`).value;
    const precioIva_vent = document.querySelector(`input[name='precioIva_vent[${cod_venta}]']`).value;
    const preciTo_vent = document.querySelector(`input[name='preciTo_vent[${cod_venta}]']`).value;

    console.log("Venta COD: " + cod_venta + ","Pago COD: " + cod_pago + ", Fecha Entrega: " + fecha_hora + ", Cantidad: " + cnt_vnt + ", Descripcion: " + descripcion + ", Precio de: "+prec_vent + ", IVA: "+ precioIva_vent + ", TOTAL: " + preciTo_vent );
}

function sendToOdenes(cod_envio) {
    const fecha_hora_entrega = document.querySelector(`input[name='fecha_hora_entrega[${cod_envio}]']`).value;
    const tarifa = document.querySelector(`input[name='tarifa[${cod_envio}]']`).value;
    const estado = document.querySelector(`input[name='estado[${cod_envio}]']`).value;

    // Redirigir a historial_envios.html con los datos
    const url = `historial_envios.html?cod_envio=${cod_envio}&fecha_hora_entrega=${encodeURIComponent(fecha_hora_entrega)}&tarifa=${encodeURIComponent(tarifa)}&estado=${encodeURIComponent(estado)}`;
    window.location.href = url;
}
</script>

</body>
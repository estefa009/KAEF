<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>domiciliario</title>
  <link rel="icon" type="image/ico" href="icon/2.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/Mis_Domicilios.css">

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
      <img src="icon/5.ico" alt="" >
      <a class="degradado" href="Mis_Domicilios.php">Mis Domicilios <i class="bi bi-scooter"></i></a>
      <div class="dropdown">
        <a class="degradado" href="historial_envios.html">Historial de Envios <i class="bi bi-clipboard-data"></i></a>
      </div>
      <br><br><br><br>
      <hr><br><br><br><br>
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
        <a href="/error500.html">Domiciliario</a>
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
  <div class="table_envios">
    <br>
    <center>
        <h5><b>Mis Domicilios</b></h5>
    </center>
    <div class="container mt-4">
        <?php
        include("connection1.php");
        $con = connection();

        // Consulta para obtener los envíos
        $sql = "SELECT * FROM envio";
        $query = mysqli_query($con, $sql);
        ?>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">COD ASIGNACION</th>
                        <th scope="col">Fecha y Hora Asignada</th>
                        <th scope="col">Fecha y Hora Entrega</th>
                        <th scope="col">Tarifa</th>
                        <th scope="col">Segunda Fecha</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Verifica si hay resultados en la consulta
                    if (mysqli_num_rows($query) > 0) {
                        while ($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>
                                <td>" . $row['cod_asignacion'] . "</td>
                                <td>" . $row['fecha_hora_asignada'] . "</td>
                                <td>
                                    <input type='datetime-local' class='form-control' name='fecha_hora_entrega[" . $row['cod_envio'] . "]' value='" . $row['fecha_hora_entrega'] . "' disabled>
                                </td>
                                <td>
                                    <input type='text' class='form-control' name='tarifa[" . $row['cod_envio'] . "]' value='" . $row['tarifa_envio'] . "' disabled>
                                </td>
                                <td>
                                    <input type='datetime-local' class='form-control' name='segunda_fecha[" . $row['cod_envio'] . "]' value='" . $row['segunda_fecha_entrega'] . "' disabled>
                                </td>
                                <td>
                                    <input type='text' class='form-control' name='estado[" . $row['cod_envio'] . "]' value='" . $row['estado_envio'] . "' disabled>
                                </td>
                                <td>
                                    <button class='btn btn-primary' onclick='enableEdit(" . $row['cod_envio'] . ")'>Editar</button><i class='bi bi-pencil-square'></i>
                                    <button class='btn btn-warning' onclick='sendToHistorial(" . $row['cod_envio'] . ")'>Archivar</button><i class='bi bi-archive-fill'></i>
                                </td>
                            </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='7' class='text-center'>No hay envíos disponibles.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div> <!-- Fin del contenedor principal -->
</div>

<script>
function enableEdit(cod_envio) {
    const fields = document.querySelectorAll(`input[name='fecha_hora_entrega[${cod_envio}]'], input[name='tarifa[${cod_envio}]'], input[name='segunda_fecha[${cod_envio}]'], input[name='estado[${cod_envio}]']`);
    fields.forEach(field => {
        field.disabled = false;
    });

    const editButton = document.querySelector(`button[onclick='enableEdit(${cod_envio})']`);
    editButton.textContent = 'Guardar';
    editButton.setAttribute('onclick', `saveData(${cod_envio})`);
}

function saveData(cod_envio) {
    const fecha_hora_entrega = document.querySelector(`input[name='fecha_hora_entrega[${cod_envio}]']`).value;
    const tarifa = document.querySelector(`input[name='tarifa[${cod_envio}]']`).value;
    const segunda_fecha = document.querySelector(`input[name='segunda_fecha[${cod_envio}]']`).value;
    const estado = document.querySelector(`input[name='estado[${cod_envio}]']`).value;

    console.log("Envío COD: " + cod_envio + ", Fecha Entrega: " + fecha_hora_entrega + ", Tarifa: " + tarifa + ", Segunda Fecha: " + segunda_fecha + ", Estado: " + estado);
}

function sendToHistorial(cod_envio) {
    const fecha_hora_entrega = document.querySelector(`input[name='fecha_hora_entrega[${cod_envio}]']`).value;
    const tarifa = document.querySelector(`input[name='tarifa[${cod_envio}]']`).value;
    const segunda_fecha = document.querySelector(`input[name='segunda_fecha[${cod_envio}]']`).value;
    const estado = document.querySelector(`input[name='estado[${cod_envio}]']`).value;

    // Redirigir a historial_envios.html con los datos
    const url = `historial_envios.html?cod_envio=${cod_envio}&fecha_hora_entrega=${encodeURIComponent(fecha_hora_entrega)}&tarifa=${encodeURIComponent(tarifa)}&segunda_fecha=${encodeURIComponent(segunda_fecha)}&estado=${encodeURIComponent(estado)}`;
    window.location.href = url;
}
</script>

    
</body>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>salidas</title>
  <link rel="icon" type="image/ico" href="icon/2.ico">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="css/salidas.css">

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





  <div class="table_salida">
    <br>
    <center>
      <h5><b>SALIDAS</b></h5>
    </center>

    <div class="container mt-4">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">COD</th>
            <th scope="col">Cod Insumo</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha y Hora</th>
            <th scope="col">ACCIÓN</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // Conexión a la base de datos
          $con = new mysqli("localhost", "root", "", "kaef3");

          // Verificar la conexión
          if ($con->connect_error) {
            die("Error de conexión: " . $con->connect_error);
          }

          // Consulta SQL para obtener las salidas
          $sql = "SELECT salida.cod_salida, salida.cod_insumo, salida.cnt_salida, salida.fecha_hora_salida
                  FROM salida 
                  INNER JOIN insumo ON salida.cod_insumo = insumo.cod_insumo";

          // Ejecutar la consulta
          if ($result = $con->query($sql)) {
            if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($row['cod_salida']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cod_insumo']) . "</td>";
                echo "<td>" . htmlspecialchars($row['cnt_salida']) . "</td>";
                echo "<td>" . htmlspecialchars($row['fecha_hora_salida']) . "</td>";
                echo "<td>
                        <button class='btn btn-danger' title='Eliminar' onclick='confirmDelete(" . htmlspecialchars($row['cod_salida']) . ")'>
                            <i class='bi bi-trash-fill'></i>
                        </button>
                      </td>";
                echo "</tr>";
              }
            } else {
              echo "<tr><td colspan='5'>No se encontraron resultados.</td></tr>";
            }
          } else {
            die("Error en la consulta SQL: " . $con->error);
          }

          // Cerrar la conexión
          $con->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <script>
    function confirmDelete(id) {
      const confirmAction = confirm("¿Estás seguro de que deseas eliminar esta salida?");
      if (confirmAction) {
        window.location.href = `delete_salida.php?id=${id}`;
      }
    }
  </script>



</body>

</html>




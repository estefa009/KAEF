<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>proveedores</title>
    <link rel="icon" type="image/ico" href="icon/2.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/proveedores.css">

</head>

<body>

    <script>
        //Selecciona el botón para abrir/cerrar el menú y el nav
        const menuToggle = document.getElementById('menuToggle');
        const sidenav = document.getElementById('mySidenav');
        const mainContent = document.querySelector('main');
        const otherContent = document.querySelectorAll('.content'); // Todos los divs de la página

        // Función para abrir/cerrar el menú y mover el contenido
        menuToggle.addEventListener('click', function() {            sidenav.classList.toggle('open');
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
                <a href="/error500.html">Carlexy Aragort</a>
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
    <div class="table_proveedores">
        <br>
        <center>
            <h5><b>PROVEEDORES</b></h5>
        </center>


        <!-- Contenedor principal para la tabla y los modales -->
        <div class="container mt-4">

            <!-- Sección de botones de acciones -->
            <div class="action-buttons mb-4 text-center">
                <!-- Botón para abrir el modal de agregar insumo -->
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalAgregarProveedor">
                    Agregar proveedor <i class="bi bi-plus-circle"></i>
                </button>
            </div>

            <?php
            include("connection1.php");
            $con = connection();

            // Consulta para obtener los proveedores
            $sql = "SELECT * FROM proveedor";
            $query = mysqli_query($con, $sql);
            ?>

            <!-- Tabla de proveedores -->
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Cod</th>
                            <th scope="col">Nombre del Proveedor</th>
                            <th scope="col">Teléfono y/o Celular</th>
                            <th scope="col">Novedad</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Verifica si hay resultados en la consulta
                        if (mysqli_num_rows($query) > 0) {
                            // Itera sobre los resultados y crea una fila para cada registro
                            while ($row = mysqli_fetch_assoc($query)) {
                                echo "<tr>
                  <th scope='row'>" . $row['cod_proveedor'] . "</th>
                  <td>" . $row['nom_proveedor'] . "</td>
                  <td>" . $row['telefono_proveedor'] . "</td>
                  <td>" . $row['novedad_proveedor'] . "</td>
                  <td>
                      <!-- Botón de Editar -->
                  <button class='btn btn-warning' title='Editar' onclick=\"openModalEditar('" . htmlspecialchars($row['cod_proveedor']) . "', '" . htmlspecialchars($row['nom_proveedor']) . "', '" . htmlspecialchars($row['telefono_proveedor']) . "', '" . htmlspecialchars($row['novedad_proveedor']) . "');\">
                  <i class='bi bi-pencil-fill'></i></button>

                      <!-- Botón de Eliminar -->
                      <a href='delete_proveedor.php?id=" . $row['cod_proveedor'] . "' class='btn btn-danger' title='Eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar este proveedor?\")'>
                          <i class='bi bi-trash-fill'></i>
                      </a>
                  </td>
              </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No hay proveedores disponibles</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>



        </div> <!-- Fin del contenedor principal -->


        <div class="modal fade" id="modalAgregarProveedor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor </h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulario que envía los datos a insert_proveedor.php -->
                        <form id="formAgregarProveedor" action="insert_proveedor.php" method="post">
                            <div class="form-group mb-3">
                                <label for="nombre-proveedor" class="col-form-label">Nombre del Proveedor:</label>
                                <input type="text" class="form-control" id="nombre-proveedor" name="nom_proveedor" required>
                            </div>
                            <div class="form-group">
                                <label for="telefono-proveedor" class="col-form-label">Teléfono:</label>
                                <input type="number" class="form-control" id="telefono-proveedor" name="telefono_proveedor">
                            </div>
                            <div class="form-group">
                                <label for="novedad-proveedor" class="col-form-label">Novedad:</label>
                                <input type="text" class="form-control" id="novedad-proveedor" name="novedad_proveedor" required>
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


        <!-- Modal de edición de proveedor -->
        <div class="modal fade" id="modalEditarProveedor" tabindex="-1" aria-labelledby="modalEditarProveedorLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalEditarProveedorLabel">Editar Proveedor</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="formEditarProveedor" method="post" action="edit_proveedor.php">
                            <input type="hidden" id="editarCodProveedor" name="cod_proveedor">
                            <div class="mb-3">
                                <label for="editarNombreProveedor" class="form-label">Nombre del Proveedor</label>
                                <input type="text" class="form-control" id="nom_proveedor" name="nom_proveedor" required>
                            </div>
                            <div class="mb-3">
                                <label for="editarTelefono" class="form-label">Teléfono</label>
                                <input type="number" class="form-control" id="telefono_proveedor" name="telefono_proveedor" required>
                            </div>
                            <div class="mb-3">
                                <label for="editarNovedad" class="form-label">Novedad</label>
                                <input type="text" class="form-control" id="novedad_proveedor" name="novedad_proveedor" required>
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
        <!-- Script para eliminar proveedor (ejemplo básico) -->
        <script>


function openModalEditar(cod_proveedor, nom_proveedor, telefono_proveedor, novedad_proveedor) {
    console.log(cod_proveedor, nom_proveedor, telefono_proveedor, novedad_proveedor);
    
    document.getElementById('editarCodProveedor').value = cod_proveedor;
    document.getElementById('nom_proveedor').value = nom_proveedor;
    document.getElementById('telefono_proveedor').value = telefono_proveedor.toString();
    document.getElementById('novedad_proveedor').value = novedad_proveedor;
    
    var modalEditar = new bootstrap.Modal(document.getElementById('modalEditarProveedor'));
    modalEditar.show();
}


            function confirmDelete(id) {
                const confirmAction = confirm("¿Estás seguro de que deseas eliminar este proveedor?");
                if (confirmAction) {
                    console.log("Proveedor " + id + " eliminado.");
                } else {
                    console.log("Acción cancelada.");
                }
            }
        </script>



</body>

</html>
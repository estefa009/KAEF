<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="icon" type="image/ico" href="icon/2.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/categoria.css">

</head>

<body>

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

    <!-- Contenedor flex para la tabla y el formulario -->
    <div class="d-flex justify-content-between">
        <!-- Tabla -->
        <?php
        include("connection1.php");
        $con = connection();

        // Consulta para obtener los datos de la tabla "categoriainsumo"
        $sql = "SELECT * FROM categoriainsumo";
        $query = mysqli_query($con, $sql);
        ?>

        <div class="table-responsive me-3">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Cod</th>
                        <th scope="col">Nombre de la Categoria</th>
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
                            <th scope='row'>" . $row['cod_categoria'] . "</th>
                            <td>" . $row['nom_categoria'] . "</td>
                            <td>
                <!-- Botón de Editar -->
                               

                                        <button class='btn btn-warning' title='Editar' onclick=\"openModalEditar('" . $row['cod_categoria'] . "', '" . $row['nom_categoria'] . "');\">
        <i class='bi bi-pencil-fill'></i>
    </button>

    <!-- Botón de Eliminar -->
    <a href='delete_categoria.php?id=" . $row['cod_categoria'] . "' class='btn btn-danger' title='Eliminar' onclick='return confirm(\"¿Estás seguro de que deseas eliminar esta categoría?\")'>
        <i class='bi bi-trash-fill'></i>
    </a>
                            </td>
                        </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='3' class='text-center'>No hay categorías disponibles</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>


        <!-- Formulario de Agregar Categoria -->
        <div class="agregar">
            <div class="container mt-4">
                <form action="insert_categoria.php" method="post">
                    <h3 class="text-center mb-4">Agregar Categoria</h3>
                    <div class="form-group mb-3">
                        <select class="form-control" name="nom_categoria" id="nom_categoria" required>
                            <option value="" disabled selected>Selecciona un nombre</option>
                            <option value="LACTEOS">LACTEOS</option>
                            <option value="HARINAS">HARINAS</option>
                            <option value="COBERTURAS">COBERTURAS</option>
                            <option value="TOPPINGS">TOPPINGS</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </div>
                </form>

            </div>
        </div>


    </div>

    <!-- Modal de editar categoria -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1" aria-labelledby="modalEditarCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalEditarCategoriaLabel">Editar Categoria</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarCategoria" method="post" action="edit_categoria.php">
                        <input type="hidden" id="editarCodCategoria" name="cod_categoria">
                        <div class="mb-3">
                            <label for="editarNombreCategoria" class="form-label">Nombre de Categoria</label>
                            <input type="text" class="form-control" id="editarNombreCategoria" name="nom_categoria" required>
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



    <script>
        document.getElementById('menuToggle').addEventListener('click', function() {
            var sidenav = document.getElementById('mySidenav');
            sidenav.classList.toggle('open');
            this.classList.toggle('open');
        });

        function openModalEditar(codCategoria, nombreCategoria) {
            document.getElementById('editarCodCategoria').value = codCategoria;
            document.getElementById('editarNombreCategoria').value = nombreCategoria;

            // Abre el modal
            var myModal = new bootstrap.Modal(document.getElementById('modalEditarCategoria'));
            myModal.show();
        }


        function search(event) {
            event.preventDefault();
            const searchTerm = document.getElementById('buscar').value; // Cambiado a 'buscar'
            console.log('Búsqueda realizada: ', searchTerm);
        }
    </script>
</body>

</html>
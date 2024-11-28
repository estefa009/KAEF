<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="icon" type="image/ico" href="icon/2.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/styles.css">
   
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
                <a class="degradado" href="">Ordenes <i class="bi bi-list-ul"></i></a>
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
        <div class="icons"><h5>
            <i id="noti" class="bi bi-bell"></i>
            <i id="user" class="bi bi-person-circle"></i>
            <a href="/error500.html"> Administrador</a>
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

    <!-- Contenedor de ventas -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-md-6 text-center mt-3">
                <div class="vent_semanal p-3 shadow-sm bg-light">
                    <h5><i class="bi bi-bag-heart-fill"></i> <br>Ventas Semanales</h5>
                    <h4><b>$230,320</b></h4>
                </div>
            </div>
            <div class="col-12 col-md-6 text-center mt-3">
                <div class="vent_mensual p-3 shadow-sm bg-light">
                    <h5><i class="bi bi-calendar-check"></i> <br>Ventas Mensuales</h5>
                    <h4><b>$30,328.55</b></h4>
                </div>
            </div>
        </div>
    </div>

    <!-- Contenedor de gráficos -->
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-12 col-lg-6 text-center" id="contGraph1">
                <div class="Graph1 p-3 shadow-sm bg-light">
                    <h3>Insumos más Gastados</h3>
                    <div class="d-flex justify-content-center mt-3">
                        <button style="border-radius: 20px" id="downloadPdf" class="btn btn-outline-danger mx-1"><i class="bi bi-file-earmark-pdf"></i></button>
                        <button style="border-radius: 20px" id="downloadWord" class="btn btn-outline-primary mx-1"><i class="bi bi-file-earmark-word"></i></button>
                        <button style="border-radius: 20px" id="downloadExcel" class="btn btn-outline-success mx-1"><i class="bi bi-file-earmark-excel"></i></button>
                    </div>
                    <canvas id="myChart" width="150" height="60" class="mt-4"></canvas>
                </div>
            </div>

            <div class="col-12 col-lg-6 text-center mt-4">
                <div class="Graph2 p-3 shadow-sm bg-light">
                    <h3>Productos más vendidos</h3>
                    <canvas id="mas_vendidos" width="150" height="60" class="mt-4"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts para gráficos -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="./scripts/scripts.js"></script>
    <script src="./scripts/script_archivos.js"></script>
    <script src="./scripts/mas_vendidos.js"></script>

</body>

</html>

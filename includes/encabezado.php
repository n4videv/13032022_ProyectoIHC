<!doctype html>
<html lang="es">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Cruz de Mayo</title>
</head>

<body >
    <div style="background-color: transparent; height:100vh; background-repeat: no-repeat; background-image: url(assets/images/img_farma.webp); background-size: cover; background-position: center; background-attachment: fixed;">
        <!-- HEADER -->
        <nav class="navbar navbar-expand-lg navbar-light mb-5" style="background-color: #2ab6e0;">
            <div class="container-fluid">
                <!-- LOGO -->
                <a class="navbar-brand" href="#">
                    <img src="assets/images/logo.png" alt="" style="width: 300px;"></a>
                <!-- creo que no sirve pero por si acaso no tocas :v -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#encabezado_enlaces"
                    aria-controls="encabezado_enlaces" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <!-- LISTA DE ENLACES -->
                <div class="collapse navbar-collapse" id="encabezado_enlaces">
                    <!-- LISTA -->
                    <ul class="navbar-nav">
                        <!-- CATEGORIAS -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="encabezado_categorias" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Categorias
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="encabezado_categorias">
                                <li><a class="dropdown-item" href="#">Farmacia</a></li>
                                <li><a class="dropdown-item" href="#">Salud</a></li>
                                <li><a class="dropdown-item" href="#">Belleza</a></li>
                                <li><a class="dropdown-item" href="#">Productos naturales</a></li>
                                <li><a class="dropdown-item" href="#">Cuidado personal</a></li>
                            </ul>
                        </li>
                        <!-- FARMACIA -->
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Farmacia</a>
                        </li>
                        <!-- PROTECCION COVID -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Protección COVID</a>
                        </li>
                        <!-- CONOCENOS -->
                        <li class="nav-item">
                            <a class="nav-link" href="#">Conocenos</a>
                        </li>
                    </ul>
                </div>
                <!-- BUSQUEDA -->
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Buscar" aria-label="Search">
                    <button class="btn btn-outline-dark" type="submit">Buscar</button>
                </form>
                <!-- CARRITO DE COMPRAS -->
                <a class="nav-link" href="#"><img src="assets/images/shopping car.png" alt=""></a>
            </div>
        </nav>

  

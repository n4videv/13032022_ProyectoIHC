<?php include "includes/encabezado.php" ?>

<div class="container-fluid">
    <div class="row justify-content-center">
        <!-- IMAGEN -->
        <div class="col-md-5 p-5 m-3 bg-secondary">
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <img src="assets/images/profile-user-lg.png" alt="Usuario" class="img-fluid">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-8">
                    <p class="h5 text-center pt-3">Riquelme, Juan Roman</p>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-sm-6 bg-light">
                    <p class="h6 text-center pt-3 pb-2">Estado:Activo</p>
                </div>
            </div>
        </div>
        <!-- DATOS -->
        <div class="col-md-5 p-5 m-3 bg-light">
            <!-- NOMBRE -->
            <div class="mb-3">
                <label for="nombre" class="form-label ">Nombre</label>
                <input type="text" class="form-control" id="nombre" value="Juan Roman" disabled readonly>
            </div>
            <!-- APELLIDO -->
            <div class="mb-3">
                <label for="apellido" class="form-label ">Apellidos</label>
                <input type="text" class="form-control" id="apellido" value="Riqueme" disabled readonly>
            </div>
            <!-- SEXO -->
            <div class="mb-3">
                <label for="sexo" class="form-label ">Sexo</label>
                <br>
                <div class="form-check form-check-inline col-sm-5">
                    <input class="form-check-input" type="radio" name="sexo" id="masculino" checked>
                    <label class="form-check-label" for="masculino">
                        Masculino
                    </label>
                </div>
                <div class="form-check form-check-inline col-sm-5">
                    <input class="form-check-input" type="radio" name="sexo" id="femenino">
                    <label class="form-check-label" for="femenino">
                        Femenino
                    </label>
                </div>
            </div>
            <!-- CELULAR -->
            <div class="mb-3">
                <label for="celular" class="form-label ">Celular</label>
                <input type="text" class="form-control" id="celular" value="966698098" disabled readonly>
            </div>
            <!-- DIRECCION -->
            <div class="mb-3">
                <label for="direccion" class="form-label ">Dirección</label>
                <input type="text" class="form-control" id="direccion" value="La victoria" disabled readonly>
            </div>
        </div>
    </div>
</div>

<?php include "includes/pie_pagina.php" ?>
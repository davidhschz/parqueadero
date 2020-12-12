<?php 
    require("controllerContract.php");
    require("../Session.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-5">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Parqueadero - <?php $someThing = (isset($_SESSION["parking"])) ? print($_SESSION["parking"]) : print("Seleccione sede");?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Sedes
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item disabled " href="../parking/switchController.php?val=1">Sede 1</a></li>
                            <li><a class="dropdown-item disabled " href="../parking/switchController.php?val=2">Sede 2</a></li>
                        </ul>
                    </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Features</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Pricing</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <h1><?php echo $_SESSION["parking"];?></h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value="EL PEPE ">
                    </div>
                    <div class="mb-3">
                        <label for="lastname" class="form-label">Apellido</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" value="ETE SEEH">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Teléfono</label>
                        <input type="tel" class="form-control" id="phone" name="phone" value="3443443444">
                    </div>
                    <div class="mb-3">
                        <label for="document" class="form-label">Documento de identidad</label>
                        <input type="text" class="form-control" id="document" name="document" value="12442424">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" value="asd@gmail.com">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="address" name="address" value="cr554">
                    </div>
                    <div class="mb-3">
                        <label for="plateNumber" class="form-label">Número de placa</label>
                        <input readonly type="text" class="form-control" id="plateNumber" name="plateNumber" value= <?php echo $_GET['plateNumber']?>>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input readonly type="text" class="form-control" id="color" name="color" value= <?php echo $_GET['color']?>>
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Marca</label>
                        <input readonly type="text" class="form-control" id="brand" name="brand" value= <?php echo $_GET['brand']?>>
                    </div>
                    <div class="mb-3">
                        <label for="vehicleType" class="form-label">Tipo de vehículo</label>
                        <input readonly type="text" class="form-control" id="vehicleType" name="vehicleType" value= <?php echo $_GET['vehicleType']?>>
                    </div>
                    <div class="mb-3">
                        <label for="months" class="form-label">Número de meses</label>
                        <input type="number" class="form-control" id="months" name="months">
                    </div>
                    <input name="id_parking" type="hidden" value=<?php echo $_SESSION['parking']?>>
                    <input name="id_vehicle" type="hidden" value=<?php echo $_GET['id_vehicle']?>>

                    <button type="submit" class="btn btn-primary" name="createcontractbtn">Crear Contrato</button>
                    <button type="button" class="btn btn-primary" name="erase">Borrar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
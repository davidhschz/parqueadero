<?php 
    require("../Session.php");
    require("controllerConfirmReg.php");
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
    <main>
        <div class="container">
            <div class="row">
                <div class="col-sm-7 mx-auto">
                    <p class="fs-2 fw-bolder">Registrar entrada del vehículo al parqueadero?</p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-7 mx-auto">
                    <form method="POST">
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
                            <div id="vtypehelp" class="form-text">1.Carro 2.Moto 3.Bicicleta-Monopatín 4.Otro</div>
                        </div>
                        <input name="id_vehicle" type="hidden" value=<?php echo $_GET['id_vehicle'] ?>>
                        <div class="d-grid gap-2">
                            <button class="btn btn-primary" type="submit" name="registervehiclebtn">Registrar</button>
                            <a href="../index/index.php"><button class="btn btn-primary" type="button">Ir a inicio</button></a>
                        </div>
                    </form>    
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </main>
</body>
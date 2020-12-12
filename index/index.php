<?php 
require("controllerIndex.php");
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
                            <li><a class="dropdown-item" href="../parking/switchController.php?val=1">Sede 1</a></li>
                            <li><a class="dropdown-item" href="../parking/switchController.php?val=2">Sede 2</a></li>
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
                    <form method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" id="plate" name="plate" placeholder="Número de placa. Ej. AXF458">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name= "plateNumber">Ingresar</button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-7 mx-auto">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">Id vehículo</th>
                            <th scope="col">Placa</th>
                            <th scope="col">Contrato</th>
                            <th scope="col">Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($searchVehicule)) : ?>
                            <?php while($result = mysqli_fetch_row($searchVehicule)) {?>
                                <?php print($result[0]);?>
                                <tr>
                                    <th scope="row"><?php print($result[0]);?></th>
                                    <td><?php print($result[1]);?></td>
                                    <td><?php print($result[3]);?></td>
                                    <td>
                                        <form method="post">
                                        <input name="idvehicle" type="hidden" value=<?php print($result[0]);?>>
                                        <input name="idparking" type="hidden" value=<?php print $_SESSION['parking'];?>>
                                        <button class="btn btn-success btn-sm" type="submit" name="confirmentrybtn">Confirmar</button>
                                        <button class="btn btn-primary btn-sm" type="submit">Editar</button>
                                        <button class="btn btn-info btn-sm" type="submit" name="createContractbtn">Generar contrato</button>
                                        </form>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endif ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
        <form method="GET">
                        <div class="input-group">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="submit" name= "confirmentrybtn">Ingresar</button>
                            </span>
                        </div>
                    </form>
        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>


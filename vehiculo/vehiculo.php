<?php
require("../index/controllerIndex.php");
require("controllerVehicle.php");
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
    <div class="container">
        <div class="row">
            <div class="col-sm-6 mx-auto">
                <h1><?php echo $_SESSION["parking"];?></h1>
                <form method="POST">
                    <div class="mb-3">
                        <label for="plateNumber" class="form-label">Número de placa</label>
                        <input readonly type="text" class="form-control" id="plateNumber" name="plateNumber" value= <?php echo $_GET['plate']?>>
                    </div>
                    <div class="mb-3">
                        <label for="color" class="form-label">Color</label>
                        <input type="text" class="form-control" id="color" name="color" value="RED">
                    </div>
                    <div class="mb-3">
                        <label for="brand" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="brand" name="brand" value="Toyota">
                    </div>
                    <div class="mb-3">
                        <select class="form-select" name="vehicleType" aria-label="Default select example" default="1">
                            <option selected>Seleccionar tipo vehículo</option>
                            <option value="1">Carro</option>
                            <option value="2">Moto</option>
                            <option value="3">Bicicleta-Monopatín</option>
                            <option value="4">Otro</option>
                        </select>
                    </div>
                    <input name="id_parking" type="hidden" value=<?php $id_parking = (isset($_SESSION["parking"])) ? print($_SESSION["parking"]) : print("1"); ?> />
                    <button type="submit" class="btn btn-primary" name="normalbtn">Ingreso normal</button>
                    <button type="submit" class="btn btn-primary" name="contractbtn">Ingreso contrato</button>
                    <button type="button" class="btn btn-primary">Limpiar</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</body>
</html>
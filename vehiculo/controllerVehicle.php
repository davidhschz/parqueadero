<?php 
require("../Model.php");
// require("../Session.php");
if (isset($_POST['normalbtn'])) {
    $plateNumber = $_POST['plateNumber'];
    $color = $_POST['color'];
    $brand = $_POST['brand'];
    $vehicleType = $_POST['vehicleType'];
    $id_parking = $_POST['id_parking'];

    switch ($vehicleType) {
        case '1':
            $vehicle = "Carro";
            break;
        case '2':
            $vehicle = "Moto";
            break;
        case '3':
            $vehicle = "Bicicleta-Monopatín";
            break;
        case '4':
            $vehicle = "Otros";
            break;
    }
    var_dump($plateNumber);
    var_dump($color);
    var_dump($brand);
    var_dump($vehicleType);
    var_dump($id_parking);
    var_dump($vehicle);

    $parsedIdParking = intval("$id_parking");
    $query = "SELECT platenumber FROM vehicle WHERE platenumber = $plateNumber";
    $searchVehicule = mysqli_query($Conexion, $query);
    if (mysqli_num_rows($searchVehicule) < 1) {
        try {
            $query = "INSERT INTO vehicle(platenumber, brand, vehicle_type, color) VALUES ('$plateNumber', '$brand', $vehicleType, '$color')";
            $insertVehicle = mysqli_query($Conexion, $query);
            $last_idvehicle = mysqli_insert_id($Conexion);
            var_dump($last_idvehicle);
            $query_register_entrance = "INSERT INTO registry (id_vehicle1, id_parking1) VALUES ($last_idvehicle, $parsedIdParking)";
            var_dump($query_register_entrance);
            $register_entrance = mysqli_query($Conexion, $query_register_entrance);
            echo "<script> alert('El vehículo se registro exitosamente') </script>";
        } catch (Exception $e) {
            echo $e;
        }
    }else{
        echo "<script> alert('El vehículo ya se encuentra registrado.') </script>";
        header("Location: ../index\index.php");
    }
}
if (isset($_POST['contractbtn'])){
    $plateNumber = $_POST['plateNumber'];
    $color = $_POST['color'];
    $brand = $_POST['brand'];
    $vehicleType = $_POST['vehicleType'];
    $id_parking = $_POST['id_parking'];

    switch ($vehicleType) {
        case '1':
            $vehicle = "Carro";
            break;
        case '2':
            $vehicle = "Moto";
            break;
        case '3':
            $vehicle = "Bicicleta-Monopatín";
            break;
        case '4':
            $vehicle = "Otros";
            break;
    }

    header("Location: ../contract/contract.php?plateNumber=$plateNumber&color=$color&brand=$brand&vehicleType=$vehicle&id_parking=$id_parking");
}
?>
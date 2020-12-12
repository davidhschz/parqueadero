<?php 
require("../Model.php");
// variables
$query_plate = "";
if (isset($_GET["plateNumber"])) {
    $query_plate = $_GET["plate"];
    $query = "select id_vehicle, platenumber, brand, id_contract1 from vehicle where platenumber = $query_plate";
    $searchVehicule = mysqli_query($Conexion, $query);
    if (mysqli_num_rows($searchVehicule) < 1) {
        header("Location: ../vehiculo/vehiculo.php?plate=$query_plate");
    }
}

if (isset($_POST['confirmentrybtn'])) {
    $stringId_vehicle = $_POST['idvehicle'];
    $stringId_parking = $_POST['idparking'];
    $id_vehicle = intval($stringId_vehicle);
    $id_parking = intval($stringId_parking);
    var_dump($id_vehicle);
    var_dump($id_parking);
    $queryRegisterEntry = "INSERT INTO registry (id_vehicle1, id_parking1) VALUES ($id_vehicle, $id_parking)";
    $registerEntry = mysqli_query($Conexion, $queryRegisterEntry);
    echo "<script> alert('Entrada de vehículo registrada correctamente') </script>";
}

if (isset($_POST['createContractbtn'])) {
    $stringId_vehicle = $_POST['idvehicle'];
    $stringId_parking = $_POST['idparking'];
    $id_vehicle = intval($stringId_vehicle);
    $id_parking = intval($stringId_parking);
    var_dump($id_vehicle);
    var_dump($id_parking);
    try {
        $query_search_vehicle = "SELECT platenumber, brand, color, vehicle_type FROM vehicle WHERE id_vehicle = $id_vehicle";
        $searchVehicle = mysqli_query($Conexion, $query_search_vehicle);
        while($result = mysqli_fetch_row($searchVehicle)){
        $plateNumber = $result[0];
        $brand = $result[1];
        $color = $result[2];
        $vehicleType = $result[3];
        header("Location: ../contract/contract.php?plateNumber=$plateNumber&color=$color&brand=$brand&vehicleType=$vehicleType&id_parking=$id_parking&id_vehicle=$id_vehicle");
        }
    } catch (mysqli_sql_exception $e) {
    throw $e;
    die;
    }
    /*var_dump($plateNumber);
    var_dump($brand);
    var_dump($color);
    var_dump($vehicleType);*/
}
?>
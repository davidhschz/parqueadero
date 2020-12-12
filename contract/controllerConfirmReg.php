<?php 
    require("../Model.php");
    if (isset($_POST['registervehiclebtn'])) {
        $id_parking = $_SESSION['parking'];
        $id_vehicle = $_POST['id_vehicle'];
        $parsedIdParking = intval($id_parking);
        var_dump($parsedIdParking);
        var_dump($id_vehicle);
        try {
            $query_register_entrance = "INSERT INTO registry (id_vehicle1, id_parking1) VALUES ($id_vehicle, $parsedIdParking)";
            var_dump($query_register_entrance);
            $register_entrance = mysqli_query($Conexion, $query_register_entrance);
        } catch (mysqli_sql_exception $e) {
            throw $e;
            die;
        }
        echo "<script> alert('Registro de entrada realizado correctamente') </script>";
        header("Location: ../index/index.php");
    }
?>
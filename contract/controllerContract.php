<?php 
    require("../Model.php");
    if (isset($_POST['createcontractbtn'])) {
        try {
            $plateNumber = $_POST['plateNumber'];
            $color = $_POST['color'];
            $brand = $_POST['brand'];
            $vehicleType = $_POST['vehicleType'];
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $phoneNumber = $_POST['phone'];
            $document = $_POST['document'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $id_parking = $_POST['id_parking'];
            $months = $_POST['months'];
            $monthlyPayment = 50000;
            $last_idclient = "";
            $id_vehicle = $_POST['id_vehicle'];
            var_dump($plateNumber);
            var_dump($color);
            var_dump($brand);
            var_dump($vehicleType);
            var_dump($name);
            var_dump($lastname);
            var_dump($phoneNumber);
            var_dump($document);
            var_dump($email);
            var_dump($address);
            var_dump($id_parking);
    
            switch ($vehicleType) {
                case 'Carro':
                    $vehicle = "1";
                    break;
                case 'Moto':
                    $vehicle = "2";
                    break;
                case 'Bicicleta-Monopatín':
                    $vehicle = "3";
                    break;
                case 'Otros':
                    $vehicle = "4";
                    break;
            }

            // Insertar datos CLIENTE
            $query_register_client = "SELECT document FROM client WHERE document = '$document'";
            var_dump($query_register_client);
            $searchClient = mysqli_query($Conexion, $query_register_client);
            var_dump($searchClient);
            if (mysqli_num_rows($searchClient) < 1) {
                $query_insert_client = "INSERT INTO client(name, lastname, phone, document, email, address) VALUES ('$name', '$lastname', '$phoneNumber', '$document', '$email', '$address')";
                var_dump($query_insert_client);
                $insertClient = mysqli_query($Conexion, $query_insert_client);
                var_dump($insertClient);
                $last_idclient = mysqli_insert_id($Conexion);
                echo "<h2>";
                print("<h2>");
                var_dump($last_idclient);
                print("</h2>");
                echo "</h2>";
            } else {
                echo "<script> alert('El cliente ya se encuentra registrado.') </script>";
            }
    
            //Insertar datos VEHÍCULO
            $query_search_vehicle = "SELECT platenumber FROM vehicle WHERE platenumber = $plateNumber";
            var_dump($query_search_vehicle);
            $searchVehicule = mysqli_query($Conexion, $query_search_vehicle);
            var_dump($searchVehicule);
            if (mysqli_num_rows($searchVehicule) < 1) {
                $query_insert_vehicle = "INSERT INTO vehicle(platenumber, brand, color, id_client1, vehicle_type) VALUES ('$plateNumber', '$brand', '$color', $last_idclient, $vehicle)";
                var_dump($query_insert_vehicle);
                $insertVehicle = mysqli_query($Conexion, $query_insert_vehicle);
                var_dump($insertVehicle);
                $last_idvehicle = mysqli_insert_id($Conexion);
            } else {
                echo "<script> alert('El vehículo ya se encuentra registrado.') </script>";
                /*header("Location: ../index\index.php");*/
            }
    
            //Insertar datos CONTRATO
            $parsedMonths = intval($months);
            $payment = $monthlyPayment * $parsedMonths;
            $query_insert_contract = "INSERT INTO contract(active, cost, contract_enddate, id_vehicle2, id_parking2) VALUES (1, $payment, (select now() + interval $parsedMonths month), 
            $id_vehicle , $id_parking )";
            var_dump($query_insert_contract);
            $insertContract = mysqli_query($Conexion, $query_insert_contract);
            var_dump($insertContract);
            $last_idContract = mysqli_insert_id($Conexion);

            //Actualizar id_client en VEHÍCULO
            $query_update_vehicle = "UPDATE vehicle SET id_contract1 = $last_idContract WHERE platenumber = $plateNumber";
            var_dump($query_update_vehicle);
            $updateVehicle = mysqli_query($Conexion, $query_update_vehicle); 
            var_dump($updateVehicle);

            // Cerrar conexion
            mysqli_close($Conexion);
            var_dump($vehicle);
            /*header("Location: confirmRegistry.php?plateNumber=$plateNumber&brand=$brand&color=$color&last_idclient=$last_idclient&vehicleType=$vehicle&id_vehicle=$last_idvehicle");*/
        } catch (mysqli_sql_exception $e) {
            throw $e;
            die;
        }
    }
?>


<?php 
    class Vehicle {
        public $idVehicle;
        public $platenumber;
        public $brand;
        public $vehicleType;
        public $idClient1;
        public $idContract;
        public $Color;

        function set_idVehicle($idVehicle){
            $this->idVehicle = $idVehicle;
        }

        function get_idVehicle(){
            return $this->idVehicle;
        }
    }
?>
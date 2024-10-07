<?php

class Vehicles extends Veh_vehicles {

    private $_plates = [];  // Datos de veh_vehicle_plates
    private $_fuels = [];   // Datos de veh_fuels
    private $_insurers = [];  // Datos de veh_insurers
    private $_drivers = [];  // Datos de veh_drivers
    private $_traffic_tickets = [];  // Datos de veh_vehicles_traffic_tickets
    private $_activity = [];  // Datos de veh_vehicle_activities
    private $_insurance = [];  // Datos de veh_vehicle_insurances

// Método para agregar un conductor por ID
    function addDriver($driver_id) {
        array_push($this->_drivers, $driver_id);
    }

// Método para agregar todos los conductores asociados a un vehículo específico
    function addDrivers($vehicle_id) {
// Busca todos los drivers asociados al vehículo dado por su ID y los agrega
        $drivers = $this->searchVehicleDriversByVehicleId($vehicle_id);

        foreach ($drivers as $driver) {
            $this->addDriver($driver['driver_id']);
        }
    }

// Función de búsqueda ficticia (ejemplo)
    function searchVehicleDriversByVehicleId($vehicle_id) {
// Simulación de una función que busca en la tabla veh_vehicles_drivers
// Se espera que esta función retorne un array de conductores
        return veh_vehicles_drivers_search_by_vehicle_id($vehicle_id);
    }

////////////////////////////////////////////////////////////////////////////
// Getters y Setters para cada propiedad

    function getPlates() {
        return $this->_plates;
    }

    function setPlates(array $plates) {
        $this->_plates = $plates;
    }

    function addPlate($plate) {
        array_push($this->_plates, $plate);
    }

    function getFuels() {
        return $this->_fuels;
    }

    function setFuels(array $fuels) {
        $this->_fuels = $fuels;
    }

    function addFuel($fuel) {
        array_push($this->_fuels, $fuel);
    }

    function getInsurers() {
        return $this->_insurers;
    }

    function setInsurers(array $insurers) {
        $this->_insurers = $insurers;
    }

    function addInsurer($insurer) {
        array_push($this->_insurers, $insurer);
    }

    function getDrivers() {
        return $this->_drivers;
    }

    function setDrivers(array $drivers) {
        $this->_drivers = $drivers;
    }

    function getTrafficTickets() {
        return $this->_traffic_tickets;
    }

    function setTrafficTickets(array $traffic_tickets) {
        $this->_traffic_tickets = $traffic_tickets;
    }

    function addTrafficTicket($traffic_ticket) {
        array_push($this->_traffic_tickets, $traffic_ticket);
    }

    function getActivity() {
        return $this->_activity;
    }

    function setActivity(array $activity) {
        $this->_activity = $activity;
    }

    function addActivity($activity) {
        array_push($this->_activity, $activity);
    }

    function getInsurance() {
        return $this->_insurance;
    }

    function setInsurance(array $insurance) {
        $this->_insurance = $insurance;
    }

    function addInsurance($insurance) {
        array_push($this->_insurance, $insurance);
    }

    function getDriversList() {
        return $this->_drivers;
    }

    function setDriversList(array $drivers) {
        $this->_drivers = $drivers;
    }
}

<?php

/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Magia_PHP 0.0.1
 * Factuz.com
 * Robinson Coello 
 * www.coello.be
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/PHPClass.php to edit this template
 */

/**
 * Description of Veh_drivers
 *
 * @author robin
 */
class Driver extends Employees {

    private $_driver_licenses = [];
    private $_assigned_vehicles = [];

    function __construct() {

        parent::__construct();

        $this->setDriver_licenses();

        $this->setAssigned_vehicles();
    }

    public function setAssigned_vehicles() {


        $vehicles = veh_vehicles_drivers_list_by_driver_id($this->_contact_id);

        if (is_array($vehicles)) {
            foreach ($vehicles as $key => $vehicle) {

                array_push($this->_assigned_vehicles, $vehicle);
            }
        } else {
            // Manejo de error o registro de que no hay licencias
            // Por ejemplo, podrías asignar un array vacío o manejarlo de otra manera según tu lógica
            $this->_assigned_vehicles = [];
        }
    }

    public function setDriver_licenses() {

        $licenses = veh_drivers_list_by_contact_id($this->_contact_id);

        if (is_array($licenses)) {
            foreach ($licenses as $license) {
                // Verificar si la licencia está expirada y añadir esa información
                $license['expired'] = $this->isLicenseExpired($license['date_end']);

                array_push($this->_driver_licenses, $license);
            }
        } else {
            // Manejo de error o registro de que no hay licencias
            // Por ejemplo, podrías asignar un array vacío o manejarlo de otra manera según tu lógica
            $this->_driver_licenses = [];
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    public function getAssigned_vehicles() {
        return $this->_assigned_vehicles;
    }

    ////////////////////////////////////////////////////////////////////////////
    public function getDriver_licenses() {
        return $this->_driver_licenses;
    }

    public function isLicenseExpired($date_end) {
        // Obtener la fecha actual
        $currentDate = new DateTime();

        // Convertir la fecha de vencimiento de la licencia en un objeto DateTime
        $expiryDate = new DateTime($date_end);

        // Comparar las fechas
        return $expiryDate < $currentDate;
    }
}

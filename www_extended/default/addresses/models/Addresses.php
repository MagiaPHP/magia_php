<?php

class Address extends Addresses {
    
    function setAddresses($id) {
        parent::setAddresses($id);
    }

    function getHtmlFormatted() {
        $html = '';

        // Grupo de número y dirección
        if (!empty($this->_number) && !empty($this->_address)) {
            $html .= '<p>' . icon('home') . ' ';
            $html .= "{$this->_number}, {$this->_address}<br>";
        }

        // Grupo de código postal y barrio
        if (!empty($this->_postcode) && !empty($this->_barrio)) {
            $html .= icon('map-marker') . ' ';
            $html .= "{$this->_postcode}, {$this->_barrio}<br>";
        }

        // Grupo de ciudad y país
        if (!empty($this->_city) && !empty($this->_country)) {
            $countryName = countries_field_country_code('countryName', $this->_country);
            $html .= icon("globe") . ' ';
            $html .= "{$this->_city}, {$countryName}</p>";
        }



        return $html;
    }
}

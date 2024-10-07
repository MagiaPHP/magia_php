<?php

//include "www/addresses/models/Addresses.php";


class Shop_Addressess extends Addresses {

    function block() {
        global $u_id, $u_rol;
        /**
         * Si el id es correcto
         * Si existe
         * Si no es billing
         * Si el usuario puede editar esa direccion 
         * Si la oficina no es mi oficina
         */
        if (!is_id($this->_id)) {
            array_push($this->_errors, '$address_id format error');
        }
        //
        if (strtolower($this->_name) == 'billing') {
            array_push($this->_errors, 'You cannot block a billing address');
        }
        //
        if (!permissions_has_permission($u_rol, "shop_addresses", "update")) {
            array_push($this->_errors, 'Your role does not allow you to edit addresses');
        }
        //Puede editar otras oficinas?
        // si la oficina no es mi oficina && no puedo editar otras oficinas
        if (($this->_id != contacts_field_id('owner_id', $u_id)) && !permissions_has_permission($u_rol, "shop_offices_others", "update")) {
            array_push($this->_errors, 'Your role does not allow you to edit addresses of other offices');
        }
        // 
        // si no hay errores
        if (!$this->_errors) {
            // puedo actualizar
            shop_address_block(
                    //$address_id, $office_id
                    $this->_id, $this->_contact_id
            );
        } else {
            return $this->_errors;
        }
    }
}

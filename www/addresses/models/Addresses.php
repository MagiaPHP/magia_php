<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-10-02 17:10:10 
#################################################################################
 
        



/**
 * Clase addresses
 * 
 * Description
 * 
 * @package addresses
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-02
 */




class Addresses {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * contact_id
    */ 
    public $_contact_id;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * address
    */ 
    public $_address;
    /** 
    * number
    */ 
    public $_number;
    /** 
    * postcode
    */ 
    public $_postcode;
    /** 
    * barrio
    */ 
    public $_barrio;
    /** 
    * sector
    */ 
    public $_sector;
    /** 
    * ref
    */ 
    public $_ref;
    /** 
    * city
    */ 
    public $_city;
    /** 
    * province
    */ 
    public $_province;
    /** 
    * region
    */ 
    public $_region;
    /** 
    * country
    */ 
    public $_country;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * status
    */ 
    public $_status;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getContact_id () {
        return $this->_contact_id; 
    }
    function getName () {
        return $this->_name; 
    }
    function getAddress () {
        return $this->_address; 
    }
    function getNumber () {
        return $this->_number; 
    }
    function getPostcode () {
        return $this->_postcode; 
    }
    function getBarrio () {
        return $this->_barrio; 
    }
    function getSector () {
        return $this->_sector; 
    }
    function getRef () {
        return $this->_ref; 
    }
    function getCity () {
        return $this->_city; 
    }
    function getProvince () {
        return $this->_province; 
    }
    function getRegion () {
        return $this->_region; 
    }
    function getCountry () {
        return $this->_country; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getStatus () {
        return $this->_status; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setContact_id ($contact_id) {
        $this->_contact_id = $contact_id; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setAddress ($address) {
        $this->_address = $address; 
    }
    function setNumber ($number) {
        $this->_number = $number; 
    }
    function setPostcode ($postcode) {
        $this->_postcode = $postcode; 
    }
    function setBarrio ($barrio) {
        $this->_barrio = $barrio; 
    }
    function setSector ($sector) {
        $this->_sector = $sector; 
    }
    function setRef ($ref) {
        $this->_ref = $ref; 
    }
    function setCity ($city) {
        $this->_city = $city; 
    }
    function setProvince ($province) {
        $this->_province = $province; 
    }
    function setRegion ($region) {
        $this->_region = $region; 
    }
    function setCountry ($country) {
        $this->_country = $country; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setAddresses($id) {
        $addresses = addresses_details($id);
        //
        $this->_id = $addresses["id"];
        $this->_contact_id = $addresses["contact_id"];
        $this->_name = $addresses["name"];
        $this->_address = $addresses["address"];
        $this->_number = $addresses["number"];
        $this->_postcode = $addresses["postcode"];
        $this->_barrio = $addresses["barrio"];
        $this->_sector = $addresses["sector"];
        $this->_ref = $addresses["ref"];
        $this->_city = $addresses["city"];
        $this->_province = $addresses["province"];
        $this->_region = $addresses["region"];
        $this->_country = $addresses["country"];
        $this->_code = $addresses["code"];
        $this->_status = $addresses["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return addresses_field_id($field, $id);
    }

    function field_code($field, $code) {
        return addresses_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return addresses_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return addresses_list($start, $limit);
    }

    function details($id) {
        return addresses_details($id);
    }

    function delete($id) {
        return addresses_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return addresses_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return addresses_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return addresses_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return addresses_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return addresses_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return addresses_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return addresses_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return addresses_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return addresses_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "contact_id":
                return contacts_field_id("id", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return addresses_is_id($id);
    }

    function is_contact_id($contact_id) {
        return addresses_is_contact_id($contact_id);
    }

    function is_name($name) {
        return addresses_is_name($name);
    }

    function is_address($address) {
        return addresses_is_address($address);
    }

    function is_number($number) {
        return addresses_is_number($number);
    }

    function is_postcode($postcode) {
        return addresses_is_postcode($postcode);
    }

    function is_barrio($barrio) {
        return addresses_is_barrio($barrio);
    }

    function is_sector($sector) {
        return addresses_is_sector($sector);
    }

    function is_ref($ref) {
        return addresses_is_ref($ref);
    }

    function is_city($city) {
        return addresses_is_city($city);
    }

    function is_province($province) {
        return addresses_is_province($province);
    }

    function is_region($region) {
        return addresses_is_region($region);
    }

    function is_country($country) {
        return addresses_is_country($country);
    }

    function is_code($code) {
        return addresses_is_code($code);
    }

    function is_status($status) {
        return addresses_is_status($status);
    }


}

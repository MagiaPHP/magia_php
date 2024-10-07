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
# Fecha de creacion del documento: 2024-10-01 09:10:44 
#################################################################################
 
        



/**
 * Clase contacts
 * 
 * Description
 * 
 * @package contacts
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-10-01
 */




class Contacts {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * owner_id
    */ 
    public $_owner_id;
    /** 
    * office_id
    */ 
    public $_office_id;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * lastname
    */ 
    public $_lastname;
    /** 
    * description
    */ 
    public $_description;
    /** 
    * birthdate
    */ 
    public $_birthdate;
    /** 
    * tva
    */ 
    public $_tva;
    /** 
    * billing_method
    */ 
    public $_billing_method;
    /** 
    * discounts
    */ 
    public $_discounts;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * language
    */ 
    public $_language;
    /** 
    * registre_date
    */ 
    public $_registre_date;
    /** 
    * order_by
    */ 
    public $_order_by;
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
    function getOwner_id () {
        return $this->_owner_id; 
    }
    function getOffice_id () {
        return $this->_office_id; 
    }
    function getType () {
        return $this->_type; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getName () {
        return $this->_name; 
    }
    function getLastname () {
        return $this->_lastname; 
    }
    function getDescription () {
        return $this->_description; 
    }
    function getBirthdate () {
        return $this->_birthdate; 
    }
    function getTva () {
        return $this->_tva; 
    }
    function getBilling_method () {
        return $this->_billing_method; 
    }
    function getDiscounts () {
        return $this->_discounts; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getLanguage () {
        return $this->_language; 
    }
    function getRegistre_date () {
        return $this->_registre_date; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setOwner_id ($owner_id) {
        $this->_owner_id = $owner_id; 
    }
    function setOffice_id ($office_id) {
        $this->_office_id = $office_id; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setName ($name) {
        $this->_name = $name; 
    }
    function setLastname ($lastname) {
        $this->_lastname = $lastname; 
    }
    function setDescription ($description) {
        $this->_description = $description; 
    }
    function setBirthdate ($birthdate) {
        $this->_birthdate = $birthdate; 
    }
    function setTva ($tva) {
        $this->_tva = $tva; 
    }
    function setBilling_method ($billing_method) {
        $this->_billing_method = $billing_method; 
    }
    function setDiscounts ($discounts) {
        $this->_discounts = $discounts; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setLanguage ($language) {
        $this->_language = $language; 
    }
    function setRegistre_date ($registre_date) {
        $this->_registre_date = $registre_date; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setContacts($id) {
        $contacts = contacts_details($id);
        //
        $this->_id = $contacts["id"];
        $this->_owner_id = $contacts["owner_id"];
        $this->_office_id = $contacts["office_id"];
        $this->_type = $contacts["type"];
        $this->_title = $contacts["title"];
        $this->_name = $contacts["name"];
        $this->_lastname = $contacts["lastname"];
        $this->_description = $contacts["description"];
        $this->_birthdate = $contacts["birthdate"];
        $this->_tva = $contacts["tva"];
        $this->_billing_method = $contacts["billing_method"];
        $this->_discounts = $contacts["discounts"];
        $this->_code = $contacts["code"];
        $this->_language = $contacts["language"];
        $this->_registre_date = $contacts["registre_date"];
        $this->_order_by = $contacts["order_by"];
        $this->_status = $contacts["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return contacts_field_id($field, $id);
    }

    function field_code($field, $code) {
        return contacts_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return contacts_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return contacts_list($start, $limit);
    }

    function details($id) {
        return contacts_details($id);
    }

    function delete($id) {
        return contacts_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return contacts_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return contacts_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return contacts_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return contacts_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return contacts_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return contacts_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return contacts_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return contacts_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return contacts_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "owner_id":
                return contacts_field_id("id", $value);
                break;
                case "title":
                return contacts_titles_field_id("title", $value);
                break;
                case "language":
                return _languages_field_id("language", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return contacts_is_id($id);
    }

    function is_owner_id($owner_id) {
        return contacts_is_owner_id($owner_id);
    }

    function is_office_id($office_id) {
        return contacts_is_office_id($office_id);
    }

    function is_type($type) {
        return contacts_is_type($type);
    }

    function is_title($title) {
        return contacts_is_title($title);
    }

    function is_name($name) {
        return contacts_is_name($name);
    }

    function is_lastname($lastname) {
        return contacts_is_lastname($lastname);
    }

    function is_description($description) {
        return contacts_is_description($description);
    }

    function is_birthdate($birthdate) {
        return contacts_is_birthdate($birthdate);
    }

    function is_tva($tva) {
        return contacts_is_tva($tva);
    }

    function is_billing_method($billing_method) {
        return contacts_is_billing_method($billing_method);
    }

    function is_discounts($discounts) {
        return contacts_is_discounts($discounts);
    }

    function is_code($code) {
        return contacts_is_code($code);
    }

    function is_language($language) {
        return contacts_is_language($language);
    }

    function is_registre_date($registre_date) {
        return contacts_is_registre_date($registre_date);
    }

    function is_order_by($order_by) {
        return contacts_is_order_by($order_by);
    }

    function is_status($status) {
        return contacts_is_status($status);
    }


}

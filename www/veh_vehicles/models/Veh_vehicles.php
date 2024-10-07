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
# Fecha de creacion del documento: 2024-09-16 17:09:36 
#################################################################################
 
        



/**
 * Clase veh_vehicles
 * 
 * Description
 * 
 * @package veh_vehicles
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Veh_vehicles {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * name
    */ 
    public $_name;
    /** 
    * marca
    */ 
    public $_marca;
    /** 
    * modelo
    */ 
    public $_modelo;
    /** 
    * serie
    */ 
    public $_serie;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * pasangers
    */ 
    public $_pasangers;
    /** 
    * year
    */ 
    public $_year;
    /** 
    * chasis
    */ 
    public $_chasis;
    /** 
    * color
    */ 
    public $_color;
    /** 
    * alto
    */ 
    public $_alto;
    /** 
    * ancho
    */ 
    public $_ancho;
    /** 
    * largo
    */ 
    public $_largo;
    /** 
    * date_buy
    */ 
    public $_date_buy;
    /** 
    * mma
    */ 
    public $_mma;
    /** 
    * towing_system
    */ 
    public $_towing_system;
    /** 
    * towing_system_kl
    */ 
    public $_towing_system_kl;
    /** 
    * date_registre
    */ 
    public $_date_registre;
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
    function getName () {
        return $this->_name; 
    }
    function getMarca () {
        return $this->_marca; 
    }
    function getModelo () {
        return $this->_modelo; 
    }
    function getSerie () {
        return $this->_serie; 
    }
    function getType () {
        return $this->_type; 
    }
    function getPasangers () {
        return $this->_pasangers; 
    }
    function getYear () {
        return $this->_year; 
    }
    function getChasis () {
        return $this->_chasis; 
    }
    function getColor () {
        return $this->_color; 
    }
    function getAlto () {
        return $this->_alto; 
    }
    function getAncho () {
        return $this->_ancho; 
    }
    function getLargo () {
        return $this->_largo; 
    }
    function getDate_buy () {
        return $this->_date_buy; 
    }
    function getMma () {
        return $this->_mma; 
    }
    function getTowing_system () {
        return $this->_towing_system; 
    }
    function getTowing_system_kl () {
        return $this->_towing_system_kl; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
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
    function setName ($name) {
        $this->_name = $name; 
    }
    function setMarca ($marca) {
        $this->_marca = $marca; 
    }
    function setModelo ($modelo) {
        $this->_modelo = $modelo; 
    }
    function setSerie ($serie) {
        $this->_serie = $serie; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setPasangers ($pasangers) {
        $this->_pasangers = $pasangers; 
    }
    function setYear ($year) {
        $this->_year = $year; 
    }
    function setChasis ($chasis) {
        $this->_chasis = $chasis; 
    }
    function setColor ($color) {
        $this->_color = $color; 
    }
    function setAlto ($alto) {
        $this->_alto = $alto; 
    }
    function setAncho ($ancho) {
        $this->_ancho = $ancho; 
    }
    function setLargo ($largo) {
        $this->_largo = $largo; 
    }
    function setDate_buy ($date_buy) {
        $this->_date_buy = $date_buy; 
    }
    function setMma ($mma) {
        $this->_mma = $mma; 
    }
    function setTowing_system ($towing_system) {
        $this->_towing_system = $towing_system; 
    }
    function setTowing_system_kl ($towing_system_kl) {
        $this->_towing_system_kl = $towing_system_kl; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setVeh_vehicles($id) {
        $veh_vehicles = veh_vehicles_details($id);
        //
        $this->_id = $veh_vehicles["id"];
        $this->_name = $veh_vehicles["name"];
        $this->_marca = $veh_vehicles["marca"];
        $this->_modelo = $veh_vehicles["modelo"];
        $this->_serie = $veh_vehicles["serie"];
        $this->_type = $veh_vehicles["type"];
        $this->_pasangers = $veh_vehicles["pasangers"];
        $this->_year = $veh_vehicles["year"];
        $this->_chasis = $veh_vehicles["chasis"];
        $this->_color = $veh_vehicles["color"];
        $this->_alto = $veh_vehicles["alto"];
        $this->_ancho = $veh_vehicles["ancho"];
        $this->_largo = $veh_vehicles["largo"];
        $this->_date_buy = $veh_vehicles["date_buy"];
        $this->_mma = $veh_vehicles["mma"];
        $this->_towing_system = $veh_vehicles["towing_system"];
        $this->_towing_system_kl = $veh_vehicles["towing_system_kl"];
        $this->_date_registre = $veh_vehicles["date_registre"];
        $this->_order_by = $veh_vehicles["order_by"];
        $this->_status = $veh_vehicles["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return veh_vehicles_field_id($field, $id);
    }

    function field_code($field, $code) {
        return veh_vehicles_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return veh_vehicles_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return veh_vehicles_list($start, $limit);
    }

    function details($id) {
        return veh_vehicles_details($id);
    }

    function delete($id) {
        return veh_vehicles_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return veh_vehicles_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return veh_vehicles_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return veh_vehicles_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return veh_vehicles_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return veh_vehicles_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return veh_vehicles_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return veh_vehicles_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return veh_vehicles_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return veh_vehicles_is_id($id);
    }

    function is_name($name) {
        return veh_vehicles_is_name($name);
    }

    function is_marca($marca) {
        return veh_vehicles_is_marca($marca);
    }

    function is_modelo($modelo) {
        return veh_vehicles_is_modelo($modelo);
    }

    function is_serie($serie) {
        return veh_vehicles_is_serie($serie);
    }

    function is_type($type) {
        return veh_vehicles_is_type($type);
    }

    function is_pasangers($pasangers) {
        return veh_vehicles_is_pasangers($pasangers);
    }

    function is_year($year) {
        return veh_vehicles_is_year($year);
    }

    function is_chasis($chasis) {
        return veh_vehicles_is_chasis($chasis);
    }

    function is_color($color) {
        return veh_vehicles_is_color($color);
    }

    function is_alto($alto) {
        return veh_vehicles_is_alto($alto);
    }

    function is_ancho($ancho) {
        return veh_vehicles_is_ancho($ancho);
    }

    function is_largo($largo) {
        return veh_vehicles_is_largo($largo);
    }

    function is_date_buy($date_buy) {
        return veh_vehicles_is_date_buy($date_buy);
    }

    function is_mma($mma) {
        return veh_vehicles_is_mma($mma);
    }

    function is_towing_system($towing_system) {
        return veh_vehicles_is_towing_system($towing_system);
    }

    function is_towing_system_kl($towing_system_kl) {
        return veh_vehicles_is_towing_system_kl($towing_system_kl);
    }

    function is_date_registre($date_registre) {
        return veh_vehicles_is_date_registre($date_registre);
    }

    function is_order_by($order_by) {
        return veh_vehicles_is_order_by($order_by);
    }

    function is_status($status) {
        return veh_vehicles_is_status($status);
    }


}

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
# Fecha de creacion del documento: 2024-09-16 19:09:41 
#################################################################################
 
        



/**
 * Clase campos
 * 
 * Description
 * 
 * @package campos
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-16
 */




class Campos {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * base_datos
    */ 
    public $_base_datos;
    /** 
    * tabla
    */ 
    public $_tabla;
    /** 
    * campo
    */ 
    public $_campo;
    /** 
    * accion
    */ 
    public $_accion;
    /** 
    * label
    */ 
    public $_label;
    /** 
    * tipo
    */ 
    public $_tipo;
    /** 
    * clase
    */ 
    public $_clase;
    /** 
    * nombre
    */ 
    public $_nombre;
    /** 
    * identificador
    */ 
    public $_identificador;
    /** 
    * marca_agua
    */ 
    public $_marca_agua;
    /** 
    * valor
    */ 
    public $_valor;
    /** 
    * solo_lectura
    */ 
    public $_solo_lectura;
    /** 
    * obligatorio
    */ 
    public $_obligatorio;
    /** 
    * seleccionado
    */ 
    public $_seleccionado;
    /** 
    * desactivado
    */ 
    public $_desactivado;
    /** 
    * orden
    */ 
    public $_orden;
    /** 
    * estatus
    */ 
    public $_estatus;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getBase_datos () {
        return $this->_base_datos; 
    }
    function getTabla () {
        return $this->_tabla; 
    }
    function getCampo () {
        return $this->_campo; 
    }
    function getAccion () {
        return $this->_accion; 
    }
    function getLabel () {
        return $this->_label; 
    }
    function getTipo () {
        return $this->_tipo; 
    }
    function getClase () {
        return $this->_clase; 
    }
    function getNombre () {
        return $this->_nombre; 
    }
    function getIdentificador () {
        return $this->_identificador; 
    }
    function getMarca_agua () {
        return $this->_marca_agua; 
    }
    function getValor () {
        return $this->_valor; 
    }
    function getSolo_lectura () {
        return $this->_solo_lectura; 
    }
    function getObligatorio () {
        return $this->_obligatorio; 
    }
    function getSeleccionado () {
        return $this->_seleccionado; 
    }
    function getDesactivado () {
        return $this->_desactivado; 
    }
    function getOrden () {
        return $this->_orden; 
    }
    function getEstatus () {
        return $this->_estatus; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setBase_datos ($base_datos) {
        $this->_base_datos = $base_datos; 
    }
    function setTabla ($tabla) {
        $this->_tabla = $tabla; 
    }
    function setCampo ($campo) {
        $this->_campo = $campo; 
    }
    function setAccion ($accion) {
        $this->_accion = $accion; 
    }
    function setLabel ($label) {
        $this->_label = $label; 
    }
    function setTipo ($tipo) {
        $this->_tipo = $tipo; 
    }
    function setClase ($clase) {
        $this->_clase = $clase; 
    }
    function setNombre ($nombre) {
        $this->_nombre = $nombre; 
    }
    function setIdentificador ($identificador) {
        $this->_identificador = $identificador; 
    }
    function setMarca_agua ($marca_agua) {
        $this->_marca_agua = $marca_agua; 
    }
    function setValor ($valor) {
        $this->_valor = $valor; 
    }
    function setSolo_lectura ($solo_lectura) {
        $this->_solo_lectura = $solo_lectura; 
    }
    function setObligatorio ($obligatorio) {
        $this->_obligatorio = $obligatorio; 
    }
    function setSeleccionado ($seleccionado) {
        $this->_seleccionado = $seleccionado; 
    }
    function setDesactivado ($desactivado) {
        $this->_desactivado = $desactivado; 
    }
    function setOrden ($orden) {
        $this->_orden = $orden; 
    }
    function setEstatus ($estatus) {
        $this->_estatus = $estatus; 
    }
   
    function setCampos($id) {
        $campos = campos_details($id);
        //
        $this->_id = $campos["id"];
        $this->_base_datos = $campos["base_datos"];
        $this->_tabla = $campos["tabla"];
        $this->_campo = $campos["campo"];
        $this->_accion = $campos["accion"];
        $this->_label = $campos["label"];
        $this->_tipo = $campos["tipo"];
        $this->_clase = $campos["clase"];
        $this->_nombre = $campos["nombre"];
        $this->_identificador = $campos["identificador"];
        $this->_marca_agua = $campos["marca_agua"];
        $this->_valor = $campos["valor"];
        $this->_solo_lectura = $campos["solo_lectura"];
        $this->_obligatorio = $campos["obligatorio"];
        $this->_seleccionado = $campos["seleccionado"];
        $this->_desactivado = $campos["desactivado"];
        $this->_orden = $campos["orden"];
        $this->_estatus = $campos["estatus"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return campos_field_id($field, $id);
    }

    function field_code($field, $code) {
        return campos_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return campos_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return campos_list($start, $limit);
    }

    function details($id) {
        return campos_details($id);
    }

    function delete($id) {
        return campos_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return campos_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return campos_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return campos_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return campos_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return campos_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return campos_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return campos_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return campos_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return campos_function($col_name, $value);
        $res = null;
        switch ($col_name) {
       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return campos_is_id($id);
    }

    function is_base_datos($base_datos) {
        return campos_is_base_datos($base_datos);
    }

    function is_tabla($tabla) {
        return campos_is_tabla($tabla);
    }

    function is_campo($campo) {
        return campos_is_campo($campo);
    }

    function is_accion($accion) {
        return campos_is_accion($accion);
    }

    function is_label($label) {
        return campos_is_label($label);
    }

    function is_tipo($tipo) {
        return campos_is_tipo($tipo);
    }

    function is_clase($clase) {
        return campos_is_clase($clase);
    }

    function is_nombre($nombre) {
        return campos_is_nombre($nombre);
    }

    function is_identificador($identificador) {
        return campos_is_identificador($identificador);
    }

    function is_marca_agua($marca_agua) {
        return campos_is_marca_agua($marca_agua);
    }

    function is_valor($valor) {
        return campos_is_valor($valor);
    }

    function is_solo_lectura($solo_lectura) {
        return campos_is_solo_lectura($solo_lectura);
    }

    function is_obligatorio($obligatorio) {
        return campos_is_obligatorio($obligatorio);
    }

    function is_seleccionado($seleccionado) {
        return campos_is_seleccionado($seleccionado);
    }

    function is_desactivado($desactivado) {
        return campos_is_desactivado($desactivado);
    }

    function is_orden($orden) {
        return campos_is_orden($orden);
    }

    function is_estatus($estatus) {
        return campos_is_estatus($estatus);
    }


}

<?php

function contenido_clase($plugin) {


    $contenido = "<?php \n";
    $contenido .= logo();
    $contenido .= al(80);
    $contenido .= ' 
        



/**
 * Clase ' . $plugin . '
 * 
 * Description
 * 
 * @package ' . $plugin . '
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date ' . date('Y-m-d') . '
 */




class ' . ucfirst($plugin) . ' {

';

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        // if ($columna['Field'] != 'id') {

        $contenido .= "    /** \n";
        $contenido .= "    * " . $columna['Field'] . "\n";
        $contenido .= "    */ \n";
        $contenido .= "    public \$_" . $columna['Field'] . ";\n";

        //  }
    }


    $contenido .= '   

    function __construct() {
        //' . "\n";

    $contenido .= '}

################################################################################
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {               


        // if ($columna['Field'] != 'id') {
        //$contenido .= '$' . $columna['Field'] . ' = (isset($_POST["' . $columna['Field'] . '"])) ? clean($_POST["' . $columna['Field'] . '"]) : false;' . "\n" ;
        $contenido .= "    function get" . ucfirst($columna['Field']) . " () {" . "\n";
        $contenido .= "        return \$this->_$columna[Field]; " . "\n";
        $contenido .= '    }' . "\n";
        //  }
    }

    $contenido .= al(80);

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {

        $contenido .= "    function set" . ucfirst($columna['Field']) . " ($" . ($columna['Field']) . ") {" . "\n";
        $contenido .= "        \$this->_$columna[Field] = $" . ($columna['Field']) . "; " . "\n";
        $contenido .= '    }' . "\n";
    }
    $contenido .= '   
    function set' . ucfirst($plugin) . '($id) {
        $' . $plugin . ' = ' . $plugin . '_details($id);
        //' . "\n";

    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= '        $this->_' . $columna['Field'] . ' = $' . $plugin . '["' . $columna['Field'] . '"];' . "\n";
    }


    $contenido .= '';

    $contenido .= '

}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return ' . $plugin . '_field_id($field, $id);
    }

    function field_code($field, $code) {
        return ' . $plugin . '_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return ' . $plugin . '_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return ' . $plugin . '_list($start, $limit);
    }

    function details($id) {
        return ' . $plugin . '_details($id);
    }

    function delete($id) {
        return ' . $plugin . '_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return ' . $plugin . '_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return ' . $plugin . '_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return ' . $plugin . '_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return ' . $plugin . '_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return ' . $plugin . '_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return ' . $plugin . '_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return ' . $plugin . '_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return ' . $plugin . '_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return ' . $plugin . '_function($col_name, $value);
        $res = null;
        switch ($col_name) {
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        //   echo "Field: " . $columna['Field'] . " \n";
        $tipo = campos_tipo($columna['Type']);
        $te = bdd_referencias($plugin, $columna['Field']);
        //echo var_dump($tabla_externa);
        //REFERENCED_TABLE_NAME, 
        //REFERENCED_COLUMN_NAME 
        $bdd_referencias = bdd_referencias($plugin, $columna['Field']);
        $bdd_ref_tabla_externa = (isset($bdd_referencias['REFERENCED_TABLE_NAME'])) ? $bdd_referencias['REFERENCED_TABLE_NAME'] : false;
        $bdd_col_externa = (isset($bdd_referencias['REFERENCED_COLUMN_NAME'])) ? $bdd_referencias['REFERENCED_COLUMN_NAME'] : false;
        //
        if ($bdd_ref_tabla_externa) {
            $contenido .= '        case "' . $columna['Field'] . '":
                return ' . $bdd_ref_tabla_externa . '_field_id("' . $bdd_col_externa . '", $value);
                break;
        ';
        }
    }
    $contenido .= '       
            default:
                $res = $value;
                break;
        }
        return $res;
    }
';
    foreach (bdd_columnas_segun_tabla($plugin) as $columna) {
        $contenido .= '    function is_' . $columna['Field'] . '($' . $columna['Field'] . ') {' . "\n";
        $contenido .= '        return ' . $plugin . '_is_' . $columna['Field'] . '($' . $columna['Field'] . ');' . "\n";
        $contenido .= '    }' . "\n\n";
    }
    $contenido .= '
}
';

    return "$contenido";
}

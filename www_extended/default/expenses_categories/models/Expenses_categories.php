<?php

class Expenses_categories_e extends Expenses_categories {

    public $_why_can_not_be_edit = array();
    public $_has_lines = false;

    /////////////////////////////////////////////////////////////////////////////
    public function __construct() {
        parent::__construct();
        $this->setHas_lines();
    }

    ////////////////////////////////////////////////////////////////////////////
    public function getWhy_can_not_be_edit() {
        return $this->_why_can_not_be_edit;
    }

    public function getHas_lines() {
        return $this->_has_lines;
    }

    public function getCodeFormatted() {

        // Convierte el código en una cadena de caracteres
        $code = strval($this->_code);

        // Dividir el código en partes específicas; puedes modificar la lógica de división aquí
        // Aquí, asumo que el código tiene una longitud que se puede dividir en grupos de dos dígitos
        $formattedCode = implode('.', str_split($code, 2));  // Divide en segmentos de 2 dígitos

        return $formattedCode;
        
        
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    public function setWhy_can_not_be_edit($why) {
        array_push($this->_why_can_not_be_edit, $why);
    }

    public function setHas_lines() {


//        vardump(expenses_lines_search_by('category_code', '1104010'));

        if (expenses_lines_search_by('category_code', '1104010')) {
            $this->_has_lines = true;
            $this->setWhy_can_not_be_edit("The category is present in expenses lines Data Base");
        } else {
            $this->_has_lines = false;
        }
    }

///////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
    //put your code here
    function can_be_edit() {
        // si tiene errores
        return ($this->getWhy_can_not_be_edit()) ? false : true;
    }
}

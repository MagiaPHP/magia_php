<?php

class Budget_lines_ex extends Budget_lines {

    public $_subtotal;
    public $_total_discounts;
    public $_thtva;
    public $_ttva;
    public $_ttvac;
    public $_discount_html = "";
    public $_line_type = 'normal';
    public $_category = null;

////////////////////////////////////////////////////////////////////////////////
    public function setSubtotal($subtotal) {
        $this->_subtotal = $subtotal;
    }

    public function setTotal_discounts($total_discounts) {
        $this->_total_discounts = $total_discounts;
    }

    public function setTtva($ttva) {
        $this->_ttva = $ttva;
    }

    public function setThtva() {
        // subtotal - descuento
        $this->_thtva = ($this->_subtotal - $this->_total_discounts);
    }

    public function setTtvac() {

        $this->_ttvac = ($this->_thtva + $this->_ttva);
    }

    function setDiscount_html() {
        if ($this->_total_discounts > 0) {
            // if discounts
            switch ($this->_discounts_mode) {
                case 'EUR':
                    $this->_discount_html = moneda($this->_discounts);
                    break;

                case 'UNIT':
                    $this->_discount_html = moneda($this->_discounts) . " EUR " . _tr("by unity ") . moneda($this->_total_discounts);
                    break;

                default:
                    $this->_discount_html = ($this->_discounts . "% " . _tr("discount") . " " . moneda($this->_total_discounts) );
                    break;
            }
        } else {
            // if discounts 0
            $this->_discount_html = moneda($this->_total_discounts);
        }
    }

    function setLine_type() {

        if (stripos($this->_description, "---") !== FALSE) {
            $this->_line_type = 'separator';
        }

        if (stripos($this->_description, "***") !== FALSE) {
            $this->_line_type = 'note';
        }
    }

    function setCategory() {
        $this->_category = budgets_categories_field_code('category', $this->_category_code);
    }

////////////////////////////////////////////////////////////////////////////////
    public function getSubtotal() {
        return $this->_subtotal;
    }

    public function getTotal_discounts() {
        return $this->_total_discounts;
    }

    public function getTtva() {
        return $this->_ttva;
    }

    public function getThtva() {
        return $this->_thtva;
    }

    public function getTtvac() {
        return $this->_ttvac;
    }

    public function getDiscount_html() {
        return $this->_discount_html;
    }

    public function getLine_type() {
        return $this->_line_type;
    }

    public function getCategory() {
        return $this->_category;
    }

    public function getDescription() {
        // para editar 
        // para ver
        //
        switch ($this->getLine_type()) {
            case 'separator':
            case 'note':
                return substr($this->_description, 3);
                break;

            default:
                return $this->_description;
                break;
        }
    }

////////////////////////////////////////////////////////////////////////////////
    public function __construct() {
        parent::__construct();
    }

    public function setExpenses_lines($id) {
        parent::setExpenses_lines($id);
    }
}

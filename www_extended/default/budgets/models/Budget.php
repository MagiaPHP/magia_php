<?php

//include 'www_extended/default/budget_lines/models/Budget_lines.php';

class Budget extends Budgets {

    public $_subtotal;
    public $_to_pay;
    public $_lines = array();

    function __construct() {
        parent::__construct();
    }

    function setBudgets($id) {
        parent::setBudgets($id);
        // actualizo total 
        // actualizo tva
        // actualizo advance 
        // actualizo status

        $this->setTo_pay();
    }

////////////////////////////////////////////////////////////////////////////////
    function setLines() {

        $lines = budget_lines_list_by_budget_id_extended($this->getId());

        foreach ($lines as $key => $line) {
            $el = new Budget_lines_ex();
            $el->setBudget_lines($line['id']);
            $el->setSubtotal($line['subtotal']);
            $el->setTotal_discounts($line['total_discounts']);
            $el->setThtva();
            $el->setTtva($line['ttva']);
            $el->setTtvac();
            $el->setDiscount_html();
            $el->setLine_type();
            $el->setCategory();
            // a cada vuelta actualizo el total                         
            array_push($this->_lines, $el);
        }
    }

    function setTotal($total) {
        budgets_update_total($this->_id, $total);
        $this->_total = $total;
    }

    function setTo_pay() {

        if ($this->_advance != null) {
            $this->_to_pay = (($this->_total + $this->_tax) - abs($this->_advance));
        } else {
            $this->_to_pay = (($this->_total + $this->_tax));
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    function getLines() {
        return $this->_lines;
    }

    function getTo_pay() {
        return $this->_to_pay;
    }

    ////////////////////////////////////////////////////////////////////////////    
}

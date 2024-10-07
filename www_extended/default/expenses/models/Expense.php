<?php

include 'www_extended/default/expenses_lines/models/Expense_lines.php';

class Expense extends Expenses {

    public $_ = false;
    public $_subtotal;
    public $_to_pay;
    public $_lines = array();
    public $_can_be_cancel;
    public $_why_cant_be_cancelled = array();

    function __construct() {
        parent::__construct();
    }

    function setExpenses($id) {
        parent::setExpenses($id);
        // actualizo total 
        // actualizo tva
        // actualizo advance 
        // actualizo status

        $this->setTo_pay();
        $this->setWhy_cant_be_cancelled();
    }

////////////////////////////////////////////////////////////////////////////////
    function setLines() {
//        $lines = expenses_lines_list_by_expense_id($this->getId());
        $lines = expenses_lines_list_by_expense_id_extended($this->getId());
        foreach ($lines as $key => $line) {
            $el = new Expense_lines();
            $el->setExpenses_lines($line['id']);
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
        expenses_update_total($this->_id, $total);
        $this->_total = $total;
    }

    function setTo_pay() {
        if ($this->_advance !== null) {
            $this->_to_pay = round($this->_total + $this->_tax - abs($this->_advance), 2);
        } else {
            $this->_to_pay = round($this->_total + $this->_tax, 2);
        }
    }

    function can_be_cancel() {
        if ($this->getWhy_cant_be_cancelled()) {
            return false;
        } else {
            return true;
        }
    }

    function setWhy_cant_be_cancelled() {

        if (projects_inout_search_by('expense_id', $this->_id)) {
            array_push($this->_why_cant_be_cancelled, "This expense is present in a project");
        }

        // si la suma de pagos es diferente a cero 
        if (balance_sum_subtotal_by_expense($this->_id) + balance_sum_tax_by_expense($this->_id)) {
            array_push($this->_why_cant_be_cancelled, "There are payments recorded for this expense");
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////

    function getValue($col) {

        if ($col) {
            return $this->_ . $col;
        }
    }

    function getLines() {
        return $this->_lines;
    }

    function getTo_pay() {
        return $this->_to_pay;
    }

    function getWhy_cant_be_cancelled() {
        return $this->_why_cant_be_cancelled;
    }

    ////////////////////////////////////////////////////////////////////////////    
}

<?php

// credit_notes_counter
// Date: 2022-04-21    
################################################################################

class Credit_notes_counter {

    /**
     * credit_note_id
     */
    public $_credit_note_id;

    /**
     * year
     */
    public $_year;

    /**
     * counter
     */
    public $_counter;

    function __construct() {
        //
    }

################################################################################

    function getCredit_note_id() {
        return $this->_credit_note_id;
    }

    function getYear() {
        return $this->_year;
    }

    function getCounter() {
        return $this->_counter;
    }

################################################################################

    function setCredit_note_id($credit_note_id) {
        $this->_credit_note_id = $credit_note_id;
    }

    function setYear($year) {
        $this->_year = $year;
    }

    function setCounter($counter) {
        $this->_counter = $counter;
    }

    function setCredit_notes_counter($id) {
        $credit_notes_counter = credit_notes_counter_details($id);
        //
        $this->_credit_note_id = $credit_notes_counter["credit_note_id"];
        $this->_year = $credit_notes_counter["year"];
        $this->_counter = $credit_notes_counter["counter"];
    }
}

################################################################################

<?php

class Payroll_by_month {

    use Hr;

    public $_employee_id = null;
    public $_month_of_payroll = null;
    public $_year_of_payroll = null;
    public $_worked_hours = 0;
    public $_worked_days = 0;
    public $_salary = array("month" => 0, "hour" => 0);
    public $_precompte = 0;
    public $_meal_vouchers = 0;
    public $_fine_withdrawal = 0;
    public $_money_advance = array("bank" => 0, "cash" => 0);
    public $_driver = 0;
    public $_value_round = 0;
    public $_total_sold = 0;
    public $_pay_to_bank = 0;
    public $_pay_to_cash = 0;

    //public $_total_to_pay = 0;

    public function setPayroll_by_month($employee_id, $year, $month) {

        $this->setEmployee_id($employee_id);
        $this->setMonth_of_payroll($month);
        $this->setYear_of_payroll($year);
        $this->setWorked_hours();
        $this->setWorked_days();
        $this->setSalary($year, $month);
        $this->setPrecompte();
        $this->setMeal_vouchers($year, $month);
        $this->setFine_withdrawal($year, $month);
        $this->setMoney_advance($year, $month);
        $this->setDriver();

        $this->setValue_round();
        $this->setTotal_sold();
        $this->setPay_to_bank();
        $this->setPay_to_cash();
//        $this->setTotal_to_pay();

        $this->setTag("%payroll_salary_base%", $this->getSalary('month'));

        $this->setTag("%salary_month%", $this->getSalary('month'));
        $this->setTag("%salary_hour%", $this->getSalary('hour'));
        $this->setTag("%worked_hours%", $this->getWorked_hours());
        $this->setTag("%worked_days%", $this->getWorked_days());
        $this->setTag("%precompte%", $this->getPrecompte());
        $this->setTag("%meal_vouchers%", $this->getMeal_vouchers());
        $this->setTag("%fine_withdrawal%", $this->getFine_withdrawal());
        $this->setTag("%money_advance_bank%", $this->getMoney_advance('bank'));
        $this->setTag("%money_advance_cash%", $this->getMoney_advance('cash'));

        $this->setTag("%driver%", $this->getDriver());

        $this->setTag("%value_round%", $this->getValue_round());
        $this->setTag("%total_sold%", $this->getTotal_sold());
        $this->setTag("%pay_to_bank%", $this->getPay_to_bank());
        $this->setTag("%pay_to_cash%", $this->getPay_to_cash());
        //$this->setTag("%total_to_pay%", $this->getTotal_to_pay());
    }

    function setEmployee_id($employee_id) {
        $this->_employee_id = $employee_id;
    }

    function setMonth_of_payroll($month) {
        $this->_month_of_payroll = $month;
    }

    function setYear_of_payroll($year) {
        $this->_year_of_payroll = $year;
    }

    function setWorked_hours() {
// la suma de horas por dias 
        $time = hr_employee_worked_days_total_hours_worked_by_year_month_employee($this->getYear_of_payroll(), $this->getMonth_of_payroll(), $this->getEmployee_id()) ?? 0;
        $this->_worked_hours = ($time['hours_100']) ?? 0;
    }

    function setWorked_days() {

        $total = hr_employee_worked_days_total_days_worked_by_year_month_employee($this->getYear_of_payroll(), $this->getMonth_of_payroll(), $this->getEmployee_id()) ?? 0;
        $this->_worked_days = $total ?? 0;
    }

    function setSalary($year, $month) {

        $salary = hr_employee_salary_in_date($this->_employee_id, "$year-$month-01");
        if (isset($salary) && $salary) {
            $this->_salary['month'] = $salary['month'] ?? 0;
            $this->_salary['hour'] = $salary['hour'] ?? 0;
        }
    }

    function setPrecompte() {
        $this->_precompte = hr_employee_payroll_items_default_value_by_employee_id_code($this->_employee_id, 7050) ?? 0;
    }

    function setMeal_vouchers($year, $month) {


        // saco el valor de la tabla hr_employee_benefits_by_month
        // segun el empleado, ano, mes, codigo
        // si no hay valor es cero 
        $value = hr_employee_benefits_by_month_search_by_employee_id_year_month_benefit_code($this->_employee_id, $year, $month, 'meal_vouchers')['employee_part_value'] ?? 0 ;

        if ($value) {
            $this->_meal_vouchers = $value;
        } else {
            $this->_meal_vouchers = 0;
        }

//        $value_by_default = hr_employee_payroll_items_default_value_by_employee_id_code($this->_employee_id, 2100) ?? 0;
//
//        if (!$value_by_default) {
//            $value_employee_part = hr_employee_benefits_field_by_employee_id_code($this->_employee_id, 'meal_vouchers')['value_employee_part'] ?? 0;
//
//            if ($value_employee_part && $this->_worked_days) {
//                $this->_meal_vouchers = ($value_employee_part * $this->_worked_days);
//            } else {
//                $this->_meal_vouchers = 0;
//            }
//        } else {
//            $this->_meal_vouchers = $value_by_default;
//        }
    }

    function setFine_withdrawal($year, $month) {
        $this->_fine_withdrawal = hr_employee_fines_total_by_employee_year_month($this->_employee_id, $year, $month) ?? 0;
    }

    function setMoney_advance($year, $month) {
        $this->_money_advance['bank'] = hr_employee_money_advance_total_by_employee_year_month($this->_employee_id, $year, $month, 'bank') ?? 0;
        $this->_money_advance['cash'] = hr_employee_money_advance_total_by_employee_year_month($this->_employee_id, $year, $month, 'cash') ?? 0;
    }

    function setDriver() {
        // si es chofer coje el valor asigando a los choferes
        $this->_driver = (veh_vehicles_drivers_search_by('driver_id', $this->_employee_id)) ? 100 : 0;
    }

    function setValue_round($total = null) {

        if ($total == null) {
            // solo toma de la DB
            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'value_round');
            // vardump($total); 
            // vardump(array($this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll())); 
            // die(); 
            $this->_value_round = $total ?? 0;
        } else {
            // registro en la DB
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'value_round', $total);

            $this->_value_round = $total ?? 0;
        }
    }

    function setTotal_sold($total = null) {


        if ($total == null) {
            // solo toma de la DB
            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'total_sold');
            $this->_total_sold = $total ?? 0;
        } else {
            $formule_total_sold = hr_payroll_by_month_field_by('formule', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'total_sold');

            //vardump($formule_total_sold);             
            $total_total_sold = $this->calculate_formule($formule_total_sold) ?? 0;

            hr_payroll_by_month_update_value_by($this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'total_sold', $total_total_sold);

            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_sold');

            $this->_total_sold = $total ?? 0;
        }
    }

    function setPay_to_bank($total = null) {

        if ($total == null) {
// solo toma de la DB
            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'pay_to_bank');
            $this->_pay_to_bank = $total ?? 0;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_bank');
            $this->_pay_to_bank = $total ?? 0;
        }
    }

    function setPay_to_cash($total = null) {

        if ($total == null) {
            // solo toma de la DB
            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'pay_to_cash');
            $this->_pay_to_cash = $total ?? 0;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_cash');
            $this->_pay_to_cash = $total ?? 0;
//hr_payroll_by_month_update_value_by_payroll_id_column($this->_id, 'pay_to_cash', $total);
        }
    }

//    function setTotal_to_pay($total = null) {
//
//        if ($total == null) {
//            // solo toma de la DB
//            $total = hr_payroll_by_month_field_by('value', $this->getEmployee_id(), $this->getYear_of_payroll(), $this->getMonth_of_payroll(), 'total_to_pay');
//            $this->_total_to_pay = $total ?? 0;
//        } else {
//            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_to_pay');
//            $this->_total_to_pay = $total ?? 0;
//        }
//    }
//    function setTotal_to_pay($total = null) {
//        parent::setTotal_to_pay($total);
//    }
/////////////////////////////////////////////////////////////////////////////
// GET //////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////
    function getEmployee_id() {
        return $this->_employee_id;
    }

    function getMonth_of_payroll() {
        return $this->_month_of_payroll;
    }

    function getYear_of_payroll() {
        return $this->_year_of_payroll;
    }

    function getWorked_hours() {
        return $this->_worked_hours;
    }

    function getWorked_days() {
        return $this->_worked_days;
    }

    function getSalary($by) {
        return $this->_salary[$by];
    }

    function getPrecompte() {
        return $this->_precompte;
    }

    function getMeal_vouchers() {
        return $this->_meal_vouchers;
    }

    function getFine_withdrawal() {
        return $this->_fine_withdrawal;
    }

    function getMoney_advance($by) {
        return $this->_money_advance[$by];
    }

    function getDriver() {
        return $this->_driver;
    }

    function getValue_round() {
        return $this->_value_round;
    }

    function getTotal_sold() {
        return $this->_total_sold;
    }

    function getPay_to_bank() {
        return $this->_pay_to_bank;
    }

    function getPay_to_cash() {
        return $this->_pay_to_cash;
    }

//    function getTotal_to_pay() {
//        return $this->_total_to_pay;
//    }
}

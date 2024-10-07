<?php

class Employee_worked_days extends Hr_employee_worked_days {

    use Hr;

    public $_month_of_payroll = null;
    public $_year_of_payroll = null;
    public $_worked_hours = 0;
    public $_worked_days = 0;
    public $_salary = array("month" => 0, "hour" => 0);
    public $_precompte = 0;
    public $_sodexo = 0;
    public $_fine_withdrawal = 0;
    public $_money_advance = array("bank" => 0, "cash" => 0);
    public $_driver = 0;
    public $_value_round = 0;
    public $_total_sold = 0;
    public $_pay_to_bank = 0;
    public $_pay_to_cash = 0;
    public $_total_to_pay = 0;

    public function setEmployee_worked_days($id, $year, $month) {

        parent::setHr_employee_worked_days($id);

        $this->setMonth_of_payroll($month);
        $this->setYear_of_payroll($year);
        $this->setWorked_hours();
        $this->setWorked_days();
        $this->setSalary($year, $month);
        $this->setPrecompte();
        $this->setSodexo();
        $this->setFine_withdrawal($year, $month);
        $this->setMoney_advance($year, $month);
        $this->setDriver();

        $this->setValue_round();
        $this->setTotal_sold();
        $this->setPay_to_bank();
        $this->setPay_to_cash();
        $this->setTotal_to_pay();

        $this->setTag("%payroll_salary_base%", $this->getSalary('month'));
        $this->setTag("%payroll_value_round%", $this->getValue_round());

        $this->setTag("%salary_month%", $this->getSalary('month'));
        $this->setTag("%salary_hour%", $this->getSalary('hour'));
        $this->setTag("%worked_hours%", $this->getWorked_hours());
        $this->setTag("%worked_days%", $this->getWorked_days());
        $this->setTag("%precompte%", $this->getPrecompte());
        $this->setTag("%sodexo%", $this->getSodexo());
        $this->setTag("%fine_withdrawal%", $this->getFine_withdrawal());
        $this->setTag("%money_advance_bank%", $this->getMoney_advance('bank'));
        $this->setTag("%money_advance_cash%", $this->getMoney_advance('cash'));

        $this->setTag("%driver%", $this->getDriver());
        $this->setTag("%value_round%", $this->getValue_round());
        $this->setTag("%total_sold%", $this->getTotal_sold());
        $this->setTag("%pay_to_bank%", $this->getPay_to_bank());
        $this->setTag("%pay_to_cash%", $this->getPay_to_cash());
        $this->setTag("%total_to_pay%", $this->getTotal_to_pay());
    }

/////////////////////////////////////////////////////////////////////////////
// SET  /////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

    function setMonth_of_payroll($month) {
        $this->_month_of_payroll = $month;
    }

    function setYear_of_payroll($year) {
        $this->_year_of_payroll = $year;
    }

    function setWorked_hours() {
// la suma de horas por dias 
        $time = hr_employee_worked_days_total_hours_worked_by_year_month_employee($this->getYear_of_payroll(), $this->getMonth_of_payroll(), $this->getEmployee_id()) ?? 0;
        $this->_worked_hours = $time['hours'];
    }

    function setWorked_days() {

        $total = hr_employee_worked_days_total_days_worked_by_year_month_employee($this->getYear_of_payroll(), $this->getMonth_of_payroll(), $this->getEmployee_id()) ?? 0;
        $this->_worked_days = $total;
    }

    function setSalary($year, $month) {

        $salary = hr_employee_salary_in_date($this->_employee_id, "$year-$month-01");
        if (isset($salary) && $salary) {
            $this->_salary['month'] = $salary['month'];
            $this->_salary['hour'] = $salary['hour'];
        }
    }

    function setPrecompte() {
        $this->_precompte = hr_employee_payroll_items_default_value_by_employee_id_code($this->_employee_id, 7050);
    }

    function setSodexo() {

//        $value_employee_part = hr_employee_benefits_field_by_employee_id_code($this->_employee_id, 'meal_vouchers')['value_employee_part'] ?? 0;
//
//        if ($value_employee_part && $this->_worked_days) {
//            $this->_sodexo = ($value_employee_part * $this->_worked_days);
//        } else {
//            $this->_sodexo = 0;
//        }

        $this->_sodexo = 168;
    }

    function setFine_withdrawal($year, $month) {
        $this->_fine_withdrawal = hr_employee_fines_total_by_employee_year_month($this->_employee_id, $year, $month);
    }

    function setMoney_advance($year, $month) {
        $this->_money_advance['bank'] = hr_employee_money_advance_total_by_employee_year_month($this->_employee_id, $year, $month, 'bank');
        $this->_money_advance['cash'] = hr_employee_money_advance_total_by_employee_year_month($this->_employee_id, $year, $month, 'cash');
    }

    function setDriver() {

        $this->_driver = (veh_vehicles_drivers_search_by('driver_id', $this->_employee_id)) ? 100 : 0;
    }

    function setValue_round($total = null) {

        if ($total == null) {
// solo toma de la DB
            $total = hr_employee_worked_days_formule_get_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'value_round');
            $this->_value_round = $total;
        } else {
// registro en la DB
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'value_round', $total);

            $this->_value_round = $total;
        }
    }

    function setTotal_sold($total = null) {

        if ($total == null) {
// solo toma de la DB
            $total = hr_employee_worked_days_formule_get_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_sold');
            $this->_total_sold = $total;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_sold');
            $this->_total_sold = $total;
        }
    }

    function setPay_to_bank($total = null) {

        if ($total == null) {
// solo toma de la DB
            $total = hr_employee_worked_days_formule_get_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_bank');
            $this->_pay_to_bank = $total;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_bank');
            $this->_pay_to_bank = $total;
        }
    }

    function setPay_to_cash($total = null) {

        if ($total == null) {
            // solo toma de la DB
            $total = hr_employee_worked_days_formule_get_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_cash');
            $this->_pay_to_cash = $total;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'pay_to_cash');
            $this->_pay_to_cash = $total;
//hr_payroll_by_month_update_value_by_payroll_id_column($this->_id, 'pay_to_cash', $total);
        }
    }

    function setTotal_to_pay($total = null) {

        if ($total == null) {
            // solo toma de la DB
            $total = hr_employee_worked_days_formule_get_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_to_pay');
            $this->_total_to_pay = $total;
        } else {
            hr_employee_worked_days_formule_update_value_by_employee_month_year_column($this->getEmployee_id(), $this->getMonth_of_payroll(), $this->getYear_of_payroll(), 'total_to_pay');
            $this->_total_to_pay = $total;
        }
    }

/////////////////////////////////////////////////////////////////////////////
// GET //////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////

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

    function getSodexo() {
        return $this->_sodexo;
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

    function getTotal_to_pay() {
        return $this->_total_to_pay;
    }
}

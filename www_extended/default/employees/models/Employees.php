<?php

//include "www/contacts/models/Contacts.php";
################################################################################

class Employee extends Contacts {

    public $_id;
    private $_company_id;
    public $_contact_id;
    private $_owner_ref;
    private $_date;
    private $_cargo;
//
    private $_benefits = array();
    private $_category = array();
    private $_civil_status = array();
    private $_clothes = array();
    private $_documents = array();
    private $_driver_licenses = [];
    private $_vehicles = []; // Array to hold vehicle information
    private $_family_dependents = array();
    private $_nationality = array();
    private $_salary = array();
    private $_sizes_clothes = array();
    private $_work_status = array();
    private $_why_cant_create_payroll = array();

    function __construct() {
        
    }

################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setCompany_id($company_id) {
        $this->_company_id = $company_id;
    }

    function setContact_id($contact_id) {
        $this->_contact_id = $contact_id;
    }

    function setOwner_ref($owner_ref) {
        $this->_owner_ref = $owner_ref;
    }

    function setDate($date) {
        $this->_date = $date;
    }

    function setCargo($cargo) {
        $this->_cargo = $cargo;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setBenefits() {
        foreach (hr_employee_benefits_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_benefits,
                    array(
                        "benefit_code" => $items['benefit_code'],
                        "benefit" => hr_benefits_field_code('title', $items['benefit_code']),
                        "company_part" => $items['company_part'],
                        "periodicity" => $items['periodicity'],
                        "price" => $items['price'],
            ));
        }
    }

    function setCategory() {

//        vardump(hr_employee_category_search_by('employee_id', $this->getContact_id())); 
//        vardump($this->getContact_id()); 
//        
        $this->_category = hr_employee_category_search_by('employee_id', $this->getContact_id());
//        
////        foreach (hr_employee_category_search_by('employee_id', $this->_contact_id) as $key => $items) {
////            array_push($this->_category,
////                    array(
////                        "category_code" => $items['category_code'],
////                        "category" => hr_categories_field_code('description', $items['category_code']),
////                        "date_start" => $items['date_start'],
////                        "date_end" => $items['date_end']
////                    )
////            );
////        }
    }

    function setCivil_status() {
        foreach (hr_employee_civil_status_search_by('employee_id', $this->_contact_id) as $key => $items) {
            $this->_civil_status = array(
                "civil_status_code" => $items['civil_status'],
                "civil_status" => hr_civil_status_field_code('description', $items['civil_status']),
                "date_start" => $items['date_start'],
                "date_end" => $items['date_end']
            );
        }
    }

    function setClothes() {
        foreach (hr_employee_sizes_clothes_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_clothes,
                    array(
                        "clothes_code" => $items['clothes_code'],
                        "clothes" => hr_clothes_field_code('name', $items['clothes_code']),
                        "date_of_delivery" => $items['size'],
                        "notes" => $items['notes']
                    )
            );
        }
    }

    function setDocuments() {

        foreach (hr_employee_documents_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_documents,
                    array(
                        "document" => hr_documents_field_code('title', $items['document']),
                        "document_number" => $items['document_number'],
                        "date_delivery" => $items['date_delivery'],
                        "date_expiration" => $items['date_expiration'],
                        "follow" => $items['follow'],
                    )
            );
        }
    }

    function setDriverLicenses() {

        // Ensure _driver_licenses is initialized
        if (!isset($this->_driver_licenses)) {
            $this->_driver_licenses = [];
        }


        // Fetch driver licenses from the database
        $licenses = veh_drivers_list_by_contact_id($this->_contact_id);

        // Check if licenses retrieval was successful
        if ($licenses === false) {
            // Handle error if needed, e.g., log an error or throw an exception
            return;
        }

        foreach ($licenses as $key => $items) {

            array_push($this->_driver_licenses,
                    array(
                        "id" => $items['id'],
                        "contact_id" => $items['contact_id'],
                        "country" => $items['country'],
                        "license" => $items['license'],
                        "type" => $items['type'],
                        "number" => $items['number'],
                        "date_start" => $items['date_start'],
                        "date_end" => $items['date_end'],
                        "order_by" => $items['order_by'],
                        "status" => $items['status'],
                    )
            );
        }
    }

    public function setVehicles() {
        if (!isset($this->_contact_id)) {
            throw new Exception('Contact ID is not set.');
        }

        // Fetch vehicles associated with the employee's contact ID
        $vehicles = veh_vehicles_drivers_list_by_driver_id($this->_contact_id);

        if ($vehicles !== false) {
            // Store the retrieved vehicles
            $this->_vehicles = $vehicles;
        } else {
            // Handle the case where no vehicles are found or an error occurs
            $this->_vehicles = [];
        }
    }

    function setFamily_dependents() {
        foreach (hr_employee_family_dependents_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_family_dependents,
                    array(
                        "name" => $items['name'],
                        "lastname" => $items['lastname'],
                        "birthday" => $items['birthday'],
                        "relation" => $items['relation'],
                        "in_charge" => $items['in_charge'],
                        "handicap" => $items['handicap'],
                        "notes" => $items['notes'],
                    )
            );
        }
    }

    function setNationality() {
        foreach (hr_employee_nationality_search_by('employee_id', $this->_contact_id) as $key => $items) {
            $nat['nationality'] = ($items['nationality']) ?? null;
            $nat['principal'] = ($items['principal']) ?? null;
            array_push($this->_nationality, $nat);
        }
    }

    function setSalary() {
        foreach (hr_employee_salary_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_salary,
                    array(
                        "month" => $items['month'],
                        "hour" => $items['hour'],
                        "date_start" => $items['date_start'],
                        "date_end" => $items['date_end'],
                    )
            );
        }
    }

    function setSizes_clothes() {

        foreach (hr_employee_sizes_clothes_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_sizes_clothes,
                    array(
                        "id" => $items['id'],
                        "employee_id" => $items['employee_id'],
                        "clothes_code" => $items['clothes_code'],
                        "size" => $items['size'],
                        "notes" => $items['notes'],
                        "order_by" => $items['order_by'],
                        "status" => $items['status']
                    )
            );
        }
    }

    function setWork_status() {
        foreach (hr_employee_work_status_search_by('employee_id', $this->_contact_id) as $key => $items) {
            array_push($this->_work_status,
                    array(
                        "work_status_code" => $items['work_status_code'],
                        "date_start" => $items['date_start'],
                        "date_end" => $items['date_end']
                    )
            );
        }
    }

    function setWhy_cant_create_payroll() {

        if (!$this->getCategory()) {
            array_push($this->_why_cant_create_payroll, 'The worker does not have a registered category');
        }

        if (!$this->getCivil_status()) {
            array_push($this->_why_cant_create_payroll, 'The worker does not have a registered a civil status');
        }

        if (!$this->getSalary()) {
            array_push($this->_why_cant_create_payroll, 'The worker does not have a registered a remuneration');
        }

        if (!$this->getNationality_principal()) {
            array_push($this->_why_cant_create_payroll, 'The worker does not have a registered main nationality');
        }

        if (!addresses_billing_by_contact_id($this->_contact_id)) {
            array_push($this->_why_cant_create_payroll, "This worker does not have a registered address");
        }

        if (!banks_list_by_contact_id($this->_contact_id)) {
            array_push($this->_why_cant_create_payroll, "This worker does not have a bank account registered");
        }
    }

////////////////////////////////////////////////////////////////////////////////

    function setEmployee($company_id, $contact_id) {

        if (isset(employees_by_company_contact($company_id, $contact_id)[0])) {

            $employees = employees_by_company_contact($company_id, $contact_id)[0];
//
            $this->_id = $employees["id"];
            $this->_company_id = $employees["company_id"];
            $this->_contact_id = $employees["contact_id"];
            $this->_owner_ref = $employees["owner_ref"];
            $this->_date = $employees["date"];
            $this->_cargo = $employees["cargo"];
            //
            $this->_owner_id = contacts_field_id('owner_id', $employees['contact_id']);
            $this->_type = contacts_field_id('type', $employees['contact_id']);
            $this->_title = contacts_field_id('title', $employees['contact_id']);
            $this->_name = contacts_field_id('name', $employees['contact_id']);
            $this->_lastname = contacts_field_id('lastname', $employees['contact_id']);
            $this->_birthdate = contacts_field_id('birthdate', $employees['contact_id']);

            $this->_language = contacts_field_id('language', $employees['contact_id']);

            //$this->setAddresses($contact_id); 
//            $this->setDirectory($employees['contact_id']);
//            $this->setBanks($employees['contact_id']);
//            $this->setBenefits();
//            $this->setCategory();
//            $this->setCivil_status();
//            $this->setClothes();
//            $this->setDocuments();
//            $this->setDriverLicenses();
//            $this->setVehicles();
//            $this->setFamily_dependents();
//            $this->setNationality();
//            $this->setSalary();
//            $this->setSizes_clothes();
//            $this->setWork_status();            
//            $this->setWhy_cant_create_payroll();
            //
        }
    }

    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////////////////////
    ################################################################################

    function getId() {
        return $this->_id;
    }

    function getCompany_id() {
        return $this->_company_id;
    }

    function getContact_id() {
        return $this->_contact_id;
    }

    function getName() {
        return parent::getName();
    }

    function getLastname() {
        return parent::getLastname();
    }

    function getOwner_ref() {
        return $this->_owner_ref;
    }

    function getDate() {
        return $this->_date;
    }

    function getCargo() {
        return $this->_cargo;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

    ///////////////////////////////////////////////////////////////////////////
    function getBenefits() {
        return $this->_benefits;
    }

    function getCategory() {
        return $this->_category;
    }

    function getCivil_status() {
        return $this->_civil_status;
    }

    function getClothes() {
        return $this->_clothes;
    }

    function getDocuments() {
        return $this->_documents;
    }

    function getDriver_licenses() {
        return $this->_driver_licenses;
    }

    public function getVehicles() {
        return $this->_vehicles;
    }

    function getFamily_dependents() {
        return $this->_family_dependents;
    }

    function getNationality() {
        return $this->_nationality;
    }

    function getNationality_principal() {

        foreach ($this->getNationality() as $key => $nat) {
            if ($nat['principal']) {
                return $nat['nationality'];
            }
        }
        return false;
    }

    function getSalary() {
        return $this->_salary;
    }

    /**
     * Retrieves the salary details for the date with the closest start date.
     *
     * [es] Recupera los detalles del salario cuya fecha de inicio es la más cercana a la fecha dada.
     *
     * @param DateTime $date The date to search for.
     * [es] La fecha a buscar.
     *
     * @return array|null Returns the salary details array if found, or null if not found.
     * [es] Devuelve el array con los detalles del salario si se encuentra, o null si no se encuentra.
     */
    public function getClosestSalaryByDate(DateTime $date) {
        // [es] Inicializar la variable para el salario más cercano encontrado
        $closestSalary = null;
        $closestDifference = null; // [es] Diferencia más cercana inicializada como null
        // [es] Iterar a través de cada salario en el array de salarios
        foreach ($this->_salary as $salary) {
            // [es] Convertir la fecha de inicio de cada salario a un objeto DateTime para la comparación
            $dateStart = new DateTime($salary['date_start']);

            // [es] Calcular la diferencia absoluta en días entre la fecha de inicio y la fecha de búsqueda
            $difference = abs($dateStart->getTimestamp() - $date->getTimestamp());

            // [es] Verificar si esta diferencia es la más cercana encontrada hasta ahora
            if ($closestDifference === null || $difference < $closestDifference) {
                $closestDifference = $difference;
                $closestSalary = $salary;
            }
        }

        // [es] Devolver el salario más cercano encontrado o NULL si no se encuentra ninguno
        return $closestSalary;
    }

    /**
     * Returns an array containing the total worked hours in different formats:
     * - `hours`: The total hours formatted as `H:i` (time format).
     * - `hours_100`: The total hours in a format that represents hours as a decimal (100 format).
     * - `sec`: The total number of seconds.
     * 
     * Example:
     * 
     * array (
     *   'hours' => '09:00:00',  // Total hours in time format
     *   0 => '09:00:00',        // Raw time format
     *   'hours_100' => '9.0000', // Total hours in 100 format
     *   1 => '9.0000',          // Raw 100 format
     *   'sec' => '32400',       // Total seconds
     *   2 => '32400',          // Raw seconds
     * )
     * 
     * @param int $year The year for which to calculate the total worked hours.
     * @param int $month The month for which to calculate the total worked hours.
     * @return array An associative array containing the total worked hours in different formats.
     */
    public function getTotalWorkedHours($year, $month) {

        // Retrieve the total worked hours data for the specified year and month
        $data = hr_employee_worked_days_total_hours_worked_by_year_month_employee($year, $month, $this->_contact_id);

        // Initialize the result array with default values
        $result = [
            //
            'hours' => isset($data['hours']) ? $this->formatTime($data['hours']) : null,
            'hours_100' => isset($data['hours_100']) ? trim($data['hours_100']) : null,
            'sec' => isset($data['sec']) ? trim($data['sec']) : null,
        ];

        return $result;
    }

    /**
     * Recibo 09:45:55
     * envio 09:45
     * 
     * Format time to 'H:i' format
     *
     * @param string $time Time in 'H:i:s' format
     * @return string Time in 'H:i' format
     */
    private function formatTime($time) {
        try {
            $dateTime = new DateTime($time);
            return $dateTime->format('H:i'); // Return time in 'H:i' format
        } catch (Exception $e) {
            // Handle any potential exception (e.g., invalid format)
            return null;
        }
    }

    public function calculateMonthlySalary($year, $month) {
        // Step 1: Get total worked hours for the month
        $totalWorkedHours = $this->getTotalWorkedHours($year, $month);

        // Step 2: Get the closest salary details for the given date
        $dateToSearch = new DateTime("$year-$month-01");

        $salary = $this->getClosestSalaryByDate($dateToSearch);

        // Step 3: Calculate total salary for the month
        if (isset($salary) && $salary) {
            $salaryHour = floatval(trim($salary['hour']));
            $totalThisMonth = $totalWorkedHours['hours_100'] * $salaryHour;
        } else {
            $totalThisMonth = 0; // No salary data found, set to zero or handle accordingly
        }

        return $totalThisMonth;
    }

    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////

    function getSizes_clothes() {
        return $this->_sizes_clothes;
    }

    function getWork_status() {
        return $this->_work_status;
    }

    function getWhy_cant_create_payroll() {
        return $this->_why_cant_create_payroll;
    }

    function can_create_payroll() {

        if ($this->getWhy_cant_create_payroll()) {
            return false;
        } else {
            return true;
        }
    }

    //
    //
    //
    //
    //
    //
}

################################################################################

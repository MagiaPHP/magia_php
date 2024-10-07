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
# Fecha de creacion del documento: 2024-09-23 11:09:25 
#################################################################################
 
        



/**
 * Clase expenses
 * 
 * Description
 * 
 * @package expenses
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-23
 */




class Expenses {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * office_id
    */ 
    public $_office_id;
    /** 
    * office_id_counter_year_month
    */ 
    public $_office_id_counter_year_month;
    /** 
    * office_id_counter_year_trimestre
    */ 
    public $_office_id_counter_year_trimestre;
    /** 
    * office_id_counter
    */ 
    public $_office_id_counter;
    /** 
    * my_ref
    */ 
    public $_my_ref;
    /** 
    * father_id
    */ 
    public $_father_id;
    /** 
    * category_code
    */ 
    public $_category_code;
    /** 
    * invoice_number
    */ 
    public $_invoice_number;
    /** 
    * budget_id
    */ 
    public $_budget_id;
    /** 
    * credit_note_id
    */ 
    public $_credit_note_id;
    /** 
    * provider_id
    */ 
    public $_provider_id;
    /** 
    * seller_id
    */ 
    public $_seller_id;
    /** 
    * clon_from_id
    */ 
    public $_clon_from_id;
    /** 
    * title
    */ 
    public $_title;
    /** 
    * addresses_billing
    */ 
    public $_addresses_billing;
    /** 
    * addresses_delivery
    */ 
    public $_addresses_delivery;
    /** 
    * date
    */ 
    public $_date;
    /** 
    * date_registre
    */ 
    public $_date_registre;
    /** 
    * deadline
    */ 
    public $_deadline;
    /** 
    * total
    */ 
    public $_total;
    /** 
    * tax
    */ 
    public $_tax;
    /** 
    * advance
    */ 
    public $_advance;
    /** 
    * balance
    */ 
    public $_balance;
    /** 
    * comments
    */ 
    public $_comments;
    /** 
    * comments_private
    */ 
    public $_comments_private;
    /** 
    * r1
    */ 
    public $_r1;
    /** 
    * r2
    */ 
    public $_r2;
    /** 
    * r3
    */ 
    public $_r3;
    /** 
    * fc
    */ 
    public $_fc;
    /** 
    * date_update
    */ 
    public $_date_update;
    /** 
    * days
    */ 
    public $_days;
    /** 
    * ce
    */ 
    public $_ce;
    /** 
    * code
    */ 
    public $_code;
    /** 
    * type
    */ 
    public $_type;
    /** 
    * every
    */ 
    public $_every;
    /** 
    * times
    */ 
    public $_times;
    /** 
    * date_start
    */ 
    public $_date_start;
    /** 
    * date_end
    */ 
    public $_date_end;
    /** 
    * order_by
    */ 
    public $_order_by;
    /** 
    * status
    */ 
    public $_status;
   

    function __construct() {
        //
}

################################################################################
    function getId () {
        return $this->_id; 
    }
    function getOffice_id () {
        return $this->_office_id; 
    }
    function getOffice_id_counter_year_month () {
        return $this->_office_id_counter_year_month; 
    }
    function getOffice_id_counter_year_trimestre () {
        return $this->_office_id_counter_year_trimestre; 
    }
    function getOffice_id_counter () {
        return $this->_office_id_counter; 
    }
    function getMy_ref () {
        return $this->_my_ref; 
    }
    function getFather_id () {
        return $this->_father_id; 
    }
    function getCategory_code () {
        return $this->_category_code; 
    }
    function getInvoice_number () {
        return $this->_invoice_number; 
    }
    function getBudget_id () {
        return $this->_budget_id; 
    }
    function getCredit_note_id () {
        return $this->_credit_note_id; 
    }
    function getProvider_id () {
        return $this->_provider_id; 
    }
    function getSeller_id () {
        return $this->_seller_id; 
    }
    function getClon_from_id () {
        return $this->_clon_from_id; 
    }
    function getTitle () {
        return $this->_title; 
    }
    function getAddresses_billing () {
        return $this->_addresses_billing; 
    }
    function getAddresses_delivery () {
        return $this->_addresses_delivery; 
    }
    function getDate () {
        return $this->_date; 
    }
    function getDate_registre () {
        return $this->_date_registre; 
    }
    function getDeadline () {
        return $this->_deadline; 
    }
    function getTotal () {
        return $this->_total; 
    }
    function getTax () {
        return $this->_tax; 
    }
    function getAdvance () {
        return $this->_advance; 
    }
    function getBalance () {
        return $this->_balance; 
    }
    function getComments () {
        return $this->_comments; 
    }
    function getComments_private () {
        return $this->_comments_private; 
    }
    function getR1 () {
        return $this->_r1; 
    }
    function getR2 () {
        return $this->_r2; 
    }
    function getR3 () {
        return $this->_r3; 
    }
    function getFc () {
        return $this->_fc; 
    }
    function getDate_update () {
        return $this->_date_update; 
    }
    function getDays () {
        return $this->_days; 
    }
    function getCe () {
        return $this->_ce; 
    }
    function getCode () {
        return $this->_code; 
    }
    function getType () {
        return $this->_type; 
    }
    function getEvery () {
        return $this->_every; 
    }
    function getTimes () {
        return $this->_times; 
    }
    function getDate_start () {
        return $this->_date_start; 
    }
    function getDate_end () {
        return $this->_date_end; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }
#################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setOffice_id ($office_id) {
        $this->_office_id = $office_id; 
    }
    function setOffice_id_counter_year_month ($office_id_counter_year_month) {
        $this->_office_id_counter_year_month = $office_id_counter_year_month; 
    }
    function setOffice_id_counter_year_trimestre ($office_id_counter_year_trimestre) {
        $this->_office_id_counter_year_trimestre = $office_id_counter_year_trimestre; 
    }
    function setOffice_id_counter ($office_id_counter) {
        $this->_office_id_counter = $office_id_counter; 
    }
    function setMy_ref ($my_ref) {
        $this->_my_ref = $my_ref; 
    }
    function setFather_id ($father_id) {
        $this->_father_id = $father_id; 
    }
    function setCategory_code ($category_code) {
        $this->_category_code = $category_code; 
    }
    function setInvoice_number ($invoice_number) {
        $this->_invoice_number = $invoice_number; 
    }
    function setBudget_id ($budget_id) {
        $this->_budget_id = $budget_id; 
    }
    function setCredit_note_id ($credit_note_id) {
        $this->_credit_note_id = $credit_note_id; 
    }
    function setProvider_id ($provider_id) {
        $this->_provider_id = $provider_id; 
    }
    function setSeller_id ($seller_id) {
        $this->_seller_id = $seller_id; 
    }
    function setClon_from_id ($clon_from_id) {
        $this->_clon_from_id = $clon_from_id; 
    }
    function setTitle ($title) {
        $this->_title = $title; 
    }
    function setAddresses_billing ($addresses_billing) {
        $this->_addresses_billing = $addresses_billing; 
    }
    function setAddresses_delivery ($addresses_delivery) {
        $this->_addresses_delivery = $addresses_delivery; 
    }
    function setDate ($date) {
        $this->_date = $date; 
    }
    function setDate_registre ($date_registre) {
        $this->_date_registre = $date_registre; 
    }
    function setDeadline ($deadline) {
        $this->_deadline = $deadline; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setTax ($tax) {
        $this->_tax = $tax; 
    }
    function setAdvance ($advance) {
        $this->_advance = $advance; 
    }
    function setBalance ($balance) {
        $this->_balance = $balance; 
    }
    function setComments ($comments) {
        $this->_comments = $comments; 
    }
    function setComments_private ($comments_private) {
        $this->_comments_private = $comments_private; 
    }
    function setR1 ($r1) {
        $this->_r1 = $r1; 
    }
    function setR2 ($r2) {
        $this->_r2 = $r2; 
    }
    function setR3 ($r3) {
        $this->_r3 = $r3; 
    }
    function setFc ($fc) {
        $this->_fc = $fc; 
    }
    function setDate_update ($date_update) {
        $this->_date_update = $date_update; 
    }
    function setDays ($days) {
        $this->_days = $days; 
    }
    function setCe ($ce) {
        $this->_ce = $ce; 
    }
    function setCode ($code) {
        $this->_code = $code; 
    }
    function setType ($type) {
        $this->_type = $type; 
    }
    function setEvery ($every) {
        $this->_every = $every; 
    }
    function setTimes ($times) {
        $this->_times = $times; 
    }
    function setDate_start ($date_start) {
        $this->_date_start = $date_start; 
    }
    function setDate_end ($date_end) {
        $this->_date_end = $date_end; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setExpenses($id) {
        $expenses = expenses_details($id);
        //
        $this->_id = $expenses["id"];
        $this->_office_id = $expenses["office_id"];
        $this->_office_id_counter_year_month = $expenses["office_id_counter_year_month"];
        $this->_office_id_counter_year_trimestre = $expenses["office_id_counter_year_trimestre"];
        $this->_office_id_counter = $expenses["office_id_counter"];
        $this->_my_ref = $expenses["my_ref"];
        $this->_father_id = $expenses["father_id"];
        $this->_category_code = $expenses["category_code"];
        $this->_invoice_number = $expenses["invoice_number"];
        $this->_budget_id = $expenses["budget_id"];
        $this->_credit_note_id = $expenses["credit_note_id"];
        $this->_provider_id = $expenses["provider_id"];
        $this->_seller_id = $expenses["seller_id"];
        $this->_clon_from_id = $expenses["clon_from_id"];
        $this->_title = $expenses["title"];
        $this->_addresses_billing = $expenses["addresses_billing"];
        $this->_addresses_delivery = $expenses["addresses_delivery"];
        $this->_date = $expenses["date"];
        $this->_date_registre = $expenses["date_registre"];
        $this->_deadline = $expenses["deadline"];
        $this->_total = $expenses["total"];
        $this->_tax = $expenses["tax"];
        $this->_advance = $expenses["advance"];
        $this->_balance = $expenses["balance"];
        $this->_comments = $expenses["comments"];
        $this->_comments_private = $expenses["comments_private"];
        $this->_r1 = $expenses["r1"];
        $this->_r2 = $expenses["r2"];
        $this->_r3 = $expenses["r3"];
        $this->_fc = $expenses["fc"];
        $this->_date_update = $expenses["date_update"];
        $this->_days = $expenses["days"];
        $this->_ce = $expenses["ce"];
        $this->_code = $expenses["code"];
        $this->_type = $expenses["type"];
        $this->_every = $expenses["every"];
        $this->_times = $expenses["times"];
        $this->_date_start = $expenses["date_start"];
        $this->_date_end = $expenses["date_end"];
        $this->_order_by = $expenses["order_by"];
        $this->_status = $expenses["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return expenses_field_id($field, $id);
    }

    function field_code($field, $code) {
        return expenses_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return expenses_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return expenses_list($start, $limit);
    }

    function details($id) {
        return expenses_details($id);
    }

    function delete($id) {
        return expenses_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return expenses_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return expenses_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return expenses_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return expenses_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return expenses_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return expenses_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return expenses_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return expenses_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "category_code":
                return expenses_categories_field_id("code", $value);
                break;
                case "status":
                return expenses_status_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return expenses_is_id($id);
    }

    function is_office_id($office_id) {
        return expenses_is_office_id($office_id);
    }

    function is_office_id_counter_year_month($office_id_counter_year_month) {
        return expenses_is_office_id_counter_year_month($office_id_counter_year_month);
    }

    function is_office_id_counter_year_trimestre($office_id_counter_year_trimestre) {
        return expenses_is_office_id_counter_year_trimestre($office_id_counter_year_trimestre);
    }

    function is_office_id_counter($office_id_counter) {
        return expenses_is_office_id_counter($office_id_counter);
    }

    function is_my_ref($my_ref) {
        return expenses_is_my_ref($my_ref);
    }

    function is_father_id($father_id) {
        return expenses_is_father_id($father_id);
    }

    function is_category_code($category_code) {
        return expenses_is_category_code($category_code);
    }

    function is_invoice_number($invoice_number) {
        return expenses_is_invoice_number($invoice_number);
    }

    function is_budget_id($budget_id) {
        return expenses_is_budget_id($budget_id);
    }

    function is_credit_note_id($credit_note_id) {
        return expenses_is_credit_note_id($credit_note_id);
    }

    function is_provider_id($provider_id) {
        return expenses_is_provider_id($provider_id);
    }

    function is_seller_id($seller_id) {
        return expenses_is_seller_id($seller_id);
    }

    function is_clon_from_id($clon_from_id) {
        return expenses_is_clon_from_id($clon_from_id);
    }

    function is_title($title) {
        return expenses_is_title($title);
    }

    function is_addresses_billing($addresses_billing) {
        return expenses_is_addresses_billing($addresses_billing);
    }

    function is_addresses_delivery($addresses_delivery) {
        return expenses_is_addresses_delivery($addresses_delivery);
    }

    function is_date($date) {
        return expenses_is_date($date);
    }

    function is_date_registre($date_registre) {
        return expenses_is_date_registre($date_registre);
    }

    function is_deadline($deadline) {
        return expenses_is_deadline($deadline);
    }

    function is_total($total) {
        return expenses_is_total($total);
    }

    function is_tax($tax) {
        return expenses_is_tax($tax);
    }

    function is_advance($advance) {
        return expenses_is_advance($advance);
    }

    function is_balance($balance) {
        return expenses_is_balance($balance);
    }

    function is_comments($comments) {
        return expenses_is_comments($comments);
    }

    function is_comments_private($comments_private) {
        return expenses_is_comments_private($comments_private);
    }

    function is_r1($r1) {
        return expenses_is_r1($r1);
    }

    function is_r2($r2) {
        return expenses_is_r2($r2);
    }

    function is_r3($r3) {
        return expenses_is_r3($r3);
    }

    function is_fc($fc) {
        return expenses_is_fc($fc);
    }

    function is_date_update($date_update) {
        return expenses_is_date_update($date_update);
    }

    function is_days($days) {
        return expenses_is_days($days);
    }

    function is_ce($ce) {
        return expenses_is_ce($ce);
    }

    function is_code($code) {
        return expenses_is_code($code);
    }

    function is_type($type) {
        return expenses_is_type($type);
    }

    function is_every($every) {
        return expenses_is_every($every);
    }

    function is_times($times) {
        return expenses_is_times($times);
    }

    function is_date_start($date_start) {
        return expenses_is_date_start($date_start);
    }

    function is_date_end($date_end) {
        return expenses_is_date_end($date_end);
    }

    function is_order_by($order_by) {
        return expenses_is_order_by($order_by);
    }

    function is_status($status) {
        return expenses_is_status($status);
    }


}

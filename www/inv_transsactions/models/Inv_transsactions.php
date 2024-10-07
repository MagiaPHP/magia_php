<?php 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-08-23 20:08:29 

 

class Inv_transsactions {

    /** 
    * id
    */ 
    public $_id;
    /** 
    * company_id
    */ 
    public $_company_id;
    /** 
    * product
    */ 
    public $_product;
    /** 
    * transaction_number
    */ 
    public $_transaction_number;
    /** 
    * period
    */ 
    public $_period;
    /** 
    * start_date
    */ 
    public $_start_date;
    /** 
    * operation_number
    */ 
    public $_operation_number;
    /** 
    * currency
    */ 
    public $_currency;
    /** 
    * amount
    */ 
    public $_amount;
    /** 
    * percentage
    */ 
    public $_percentage;
    /** 
    * term
    */ 
    public $_term;
    /** 
    * interest
    */ 
    public $_interest;
    /** 
    * total
    */ 
    public $_total;
    /** 
    * retencion
    */ 
    public $_retencion;
    /** 
    * company_comission
    */ 
    public $_company_comission;
    /** 
    * comision_bolsa
    */ 
    public $_comision_bolsa;
    /** 
    * total_receivable
    */ 
    public $_total_receivable;
    /** 
    * expiration_date
    */ 
    public $_expiration_date;
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
    function getCompany_id () {
        return $this->_company_id; 
    }
    function getProduct () {
        return $this->_product; 
    }
    function getTransaction_number () {
        return $this->_transaction_number; 
    }
    function getPeriod () {
        return $this->_period; 
    }
    function getStart_date () {
        return $this->_start_date; 
    }
    function getOperation_number () {
        return $this->_operation_number; 
    }
    function getCurrency () {
        return $this->_currency; 
    }
    function getAmount () {
        return $this->_amount; 
    }
    function getPercentage () {
        return $this->_percentage; 
    }
    function getTerm () {
        return $this->_term; 
    }
    function getInterest () {
        return $this->_interest; 
    }
    function getTotal () {
        return $this->_total; 
    }
    function getRetencion () {
        return $this->_retencion; 
    }
    function getCompany_comission () {
        return $this->_company_comission; 
    }
    function getComision_bolsa () {
        return $this->_comision_bolsa; 
    }
    function getTotal_receivable () {
        return $this->_total_receivable; 
    }
    function getExpiration_date () {
        return $this->_expiration_date; 
    }
    function getOrder_by () {
        return $this->_order_by; 
    }
    function getStatus () {
        return $this->_status; 
    }

################################################################################
    function setId ($id) {
        $this->_id = $id; 
    }
    function setCompany_id ($company_id) {
        $this->_company_id = $company_id; 
    }
    function setProduct ($product) {
        $this->_product = $product; 
    }
    function setTransaction_number ($transaction_number) {
        $this->_transaction_number = $transaction_number; 
    }
    function setPeriod ($period) {
        $this->_period = $period; 
    }
    function setStart_date ($start_date) {
        $this->_start_date = $start_date; 
    }
    function setOperation_number ($operation_number) {
        $this->_operation_number = $operation_number; 
    }
    function setCurrency ($currency) {
        $this->_currency = $currency; 
    }
    function setAmount ($amount) {
        $this->_amount = $amount; 
    }
    function setPercentage ($percentage) {
        $this->_percentage = $percentage; 
    }
    function setTerm ($term) {
        $this->_term = $term; 
    }
    function setInterest ($interest) {
        $this->_interest = $interest; 
    }
    function setTotal ($total) {
        $this->_total = $total; 
    }
    function setRetencion ($retencion) {
        $this->_retencion = $retencion; 
    }
    function setCompany_comission ($company_comission) {
        $this->_company_comission = $company_comission; 
    }
    function setComision_bolsa ($comision_bolsa) {
        $this->_comision_bolsa = $comision_bolsa; 
    }
    function setTotal_receivable ($total_receivable) {
        $this->_total_receivable = $total_receivable; 
    }
    function setExpiration_date ($expiration_date) {
        $this->_expiration_date = $expiration_date; 
    }
    function setOrder_by ($order_by) {
        $this->_order_by = $order_by; 
    }
    function setStatus ($status) {
        $this->_status = $status; 
    }
   
    function setInv_transsactions($id) {
        $inv_transsactions = inv_transsactions_details($id);
        //
        $this->_id = $inv_transsactions["id"];
        $this->_company_id = $inv_transsactions["company_id"];
        $this->_product = $inv_transsactions["product"];
        $this->_transaction_number = $inv_transsactions["transaction_number"];
        $this->_period = $inv_transsactions["period"];
        $this->_start_date = $inv_transsactions["start_date"];
        $this->_operation_number = $inv_transsactions["operation_number"];
        $this->_currency = $inv_transsactions["currency"];
        $this->_amount = $inv_transsactions["amount"];
        $this->_percentage = $inv_transsactions["percentage"];
        $this->_term = $inv_transsactions["term"];
        $this->_interest = $inv_transsactions["interest"];
        $this->_total = $inv_transsactions["total"];
        $this->_retencion = $inv_transsactions["retencion"];
        $this->_company_comission = $inv_transsactions["company_comission"];
        $this->_comision_bolsa = $inv_transsactions["comision_bolsa"];
        $this->_total_receivable = $inv_transsactions["total_receivable"];
        $this->_expiration_date = $inv_transsactions["expiration_date"];
        $this->_order_by = $inv_transsactions["order_by"];
        $this->_status = $inv_transsactions["status"];


}
################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return inv_transsactions_field_id($field, $id);
    }

    function field_code($field, $code) {
        return inv_transsactions_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return inv_transsactions_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return inv_transsactions_list($start, $limit);
    }

    function details($id) {
        return inv_transsactions_details($id);
    }

    function delete($id) {
        return inv_transsactions_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return inv_transsactions_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return inv_transsactions_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return inv_transsactions_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return inv_transsactions_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return inv_transsactions_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return inv_transsactions_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return inv_transsactions_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return inv_transsactions_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return inv_transsactions_function($col_name, $value);
        $res = null;
        switch ($col_name) {
        case "product":
                return inv_products_field_id("product", $value);
                break;
                case "period":
                return inv_periods_field_id("period", $value);
                break;
                case "currency":
                return currencies_field_id("code", $value);
                break;
               
            default:
                $res = $value;
                break;
        }
        return $res;
    }
    function is_id($id) {
        return inv_transsactions_is_id($id);
    }

    function is_company_id($company_id) {
        return inv_transsactions_is_company_id($company_id);
    }

    function is_product($product) {
        return inv_transsactions_is_product($product);
    }

    function is_transaction_number($transaction_number) {
        return inv_transsactions_is_transaction_number($transaction_number);
    }

    function is_period($period) {
        return inv_transsactions_is_period($period);
    }

    function is_start_date($start_date) {
        return inv_transsactions_is_start_date($start_date);
    }

    function is_operation_number($operation_number) {
        return inv_transsactions_is_operation_number($operation_number);
    }

    function is_currency($currency) {
        return inv_transsactions_is_currency($currency);
    }

    function is_amount($amount) {
        return inv_transsactions_is_amount($amount);
    }

    function is_percentage($percentage) {
        return inv_transsactions_is_percentage($percentage);
    }

    function is_term($term) {
        return inv_transsactions_is_term($term);
    }

    function is_interest($interest) {
        return inv_transsactions_is_interest($interest);
    }

    function is_total($total) {
        return inv_transsactions_is_total($total);
    }

    function is_retencion($retencion) {
        return inv_transsactions_is_retencion($retencion);
    }

    function is_company_comission($company_comission) {
        return inv_transsactions_is_company_comission($company_comission);
    }

    function is_comision_bolsa($comision_bolsa) {
        return inv_transsactions_is_comision_bolsa($comision_bolsa);
    }

    function is_total_receivable($total_receivable) {
        return inv_transsactions_is_total_receivable($total_receivable);
    }

    function is_expiration_date($expiration_date) {
        return inv_transsactions_is_expiration_date($expiration_date);
    }

    function is_order_by($order_by) {
        return inv_transsactions_is_order_by($order_by);
    }

    function is_status($status) {
        return inv_transsactions_is_status($status);
    }


}

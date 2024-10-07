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
# Fecha de creacion del documento: 2024-09-18 03:09:07 
#################################################################################

/**
 * Clase cv_motivation_letter
 * 
 * Description
 * 
 * @package cv_motivation_letter
 * @version 1.0
 * @author Magia_PHP
 * @link http://magiaphp.com
 * @date 2024-09-18
 */
class Cv_motivation_letter {

    /**
     * id
     */
    public $_id;

    /**
     * sender_name
     */
    public $_sender_name;

    /**
     * sender_email
     */
    public $_sender_email;

    /**
     * sender_phone
     */
    public $_sender_phone;

    /**
     * sender_address
     */
    public $_sender_address;

    /**
     * letter_date
     */
    public $_letter_date;

    /**
     * recipient_name
     */
    public $_recipient_name;

    /**
     * recipient_position
     */
    public $_recipient_position;

    /**
     * recipient_company
     */
    public $_recipient_company;

    /**
     * recipient_address
     */
    public $_recipient_address;

    /**
     * greeting
     */
    public $_greeting;

    /**
     * introduction
     */
    public $_introduction;

    /**
     * body_experience
     */
    public $_body_experience;

    /**
     * body_achievements
     */
    public $_body_achievements;

    /**
     * motivation
     */
    public $_motivation;

    /**
     * closing
     */
    public $_closing;

    /**
     * farewell
     */
    public $_farewell;

    /**
     * signature
     */
    public $_signature;

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

    function getId() {
        return $this->_id;
    }

    function getSender_name() {
        return $this->_sender_name;
    }

    function getSender_email() {
        return $this->_sender_email;
    }

    function getSender_phone() {
        return $this->_sender_phone;
    }

    function getSender_address() {
        return $this->_sender_address;
    }

    function getLetter_date() {
        return $this->_letter_date;
    }

    function getRecipient_name() {
        return $this->_recipient_name;
    }

    function getRecipient_position() {
        return $this->_recipient_position;
    }

    function getRecipient_company() {
        return $this->_recipient_company;
    }

    function getRecipient_address() {
        return $this->_recipient_address;
    }

    function getGreeting() {
        return $this->_greeting;
    }

    function getIntroduction() {
        return $this->_introduction;
    }

    function getBody_experience() {
        return $this->_body_experience;
    }

    function getBody_achievements() {
        return $this->_body_achievements;
    }

    function getMotivation() {
        return $this->_motivation;
    }

    function getClosing() {
        return $this->_closing;
    }

    function getFarewell() {
        return $this->_farewell;
    }

    function getSignature() {
        return $this->_signature;
    }

    function getOrder_by() {
        return $this->_order_by;
    }

    function getStatus() {
        return $this->_status;
    }

#################################################################################

    function setId($id) {
        $this->_id = $id;
    }

    function setSender_name($sender_name) {
        $this->_sender_name = $sender_name;
    }

    function setSender_email($sender_email) {
        $this->_sender_email = $sender_email;
    }

    function setSender_phone($sender_phone) {
        $this->_sender_phone = $sender_phone;
    }

    function setSender_address($sender_address) {
        $this->_sender_address = $sender_address;
    }

    function setLetter_date($letter_date) {
        $this->_letter_date = $letter_date;
    }

    function setRecipient_name($recipient_name) {
        $this->_recipient_name = $recipient_name;
    }

    function setRecipient_position($recipient_position) {
        $this->_recipient_position = $recipient_position;
    }

    function setRecipient_company($recipient_company) {
        $this->_recipient_company = $recipient_company;
    }

    function setRecipient_address($recipient_address) {
        $this->_recipient_address = $recipient_address;
    }

    function setGreeting($greeting) {
        $this->_greeting = $greeting;
    }

    function setIntroduction($introduction) {
        $this->_introduction = $introduction;
    }

    function setBody_experience($body_experience) {
        $this->_body_experience = $body_experience;
    }

    function setBody_achievements($body_achievements) {
        $this->_body_achievements = $body_achievements;
    }

    function setMotivation($motivation) {
        $this->_motivation = $motivation;
    }

    function setClosing($closing) {
        $this->_closing = $closing;
    }

    function setFarewell($farewell) {
        $this->_farewell = $farewell;
    }

    function setSignature($signature) {
        $this->_signature = $signature;
    }

    function setOrder_by($order_by) {
        $this->_order_by = $order_by;
    }

    function setStatus($status) {
        $this->_status = $status;
    }

    function setCv_motivation_letter($id) {
        $cv_motivation_letter = cv_motivation_letter_details($id);
        //
        $this->_id = $cv_motivation_letter["id"];
        $this->_sender_name = $cv_motivation_letter["sender_name"];
        $this->_sender_email = $cv_motivation_letter["sender_email"];
        $this->_sender_phone = $cv_motivation_letter["sender_phone"];
        $this->_sender_address = $cv_motivation_letter["sender_address"];
        $this->_letter_date = $cv_motivation_letter["letter_date"];
        $this->_recipient_name = $cv_motivation_letter["recipient_name"];
        $this->_recipient_position = $cv_motivation_letter["recipient_position"];
        $this->_recipient_company = $cv_motivation_letter["recipient_company"];
        $this->_recipient_address = $cv_motivation_letter["recipient_address"];
        $this->_greeting = $cv_motivation_letter["greeting"];
        $this->_introduction = $cv_motivation_letter["introduction"];
        $this->_body_experience = $cv_motivation_letter["body_experience"];
        $this->_body_achievements = $cv_motivation_letter["body_achievements"];
        $this->_motivation = $cv_motivation_letter["motivation"];
        $this->_closing = $cv_motivation_letter["closing"];
        $this->_farewell = $cv_motivation_letter["farewell"];
        $this->_signature = $cv_motivation_letter["signature"];
        $this->_order_by = $cv_motivation_letter["order_by"];
        $this->_status = $cv_motivation_letter["status"];
    }

################################################################################

    // /////////////////////////////////////////////////////////////////////////
    function field_id($field, $id) {
        return cv_motivation_letter_field_id($field, $id);
    }

    function field_code($field, $code) {
        return cv_motivation_letter_field_code($field, $code);
    }

    function search_by_unique($field, $FieldUnique, $valueUnique) {
        return cv_motivation_letter_search_by_unique($field, $FieldUnique, $valueUnique);
    }

    function list($start = 0, $limit = 999) {
        return cv_motivation_letter_list($start, $limit);
    }

    function details($id) {
        return cv_motivation_letter_details($id);
    }

    function delete($id) {
        return cv_motivation_letter_delete($id);
    }

    function edit($id, $regla, $condition_id, $action_id, $order_by, $status) {
        return cv_motivation_letter_edit($id, $regla, $condition_id, $action_id, $order_by, $status);
    }

    function add($regla, $condition_id, $action_id, $order_by, $status) {
        return cv_motivation_letter_add($regla, $condition_id, $action_id, $order_by, $status);
    }

    function search($txt, $start = 0, $limit = 999) {
        return cv_motivation_letter_search($txt, $start, $limit);
    }

    function select($k, $v, $selected = "", $disabled = array()) {
        return cv_motivation_letter_select($k, $v, $selected, $disabled);
    }

    function unique_from_col($col) {
        return cv_motivation_letter_unique_from_col($col);
    }

    function search_by($field, $txt, $start = 0, $limit = 999) {
        return cv_motivation_letter_search_by($field, $txt, $start, $limit);
    }

    function db_show_col_from_table($table) {
        return cv_motivation_letter_db_show_col_from_table($table);
    }

    function db_col_list_from_table($table) {
        return cv_motivation_letter_db_col_list_from_table($table);
    }

    function add_filter($col_name, $value) {
//        return cv_motivation_letter_function($col_name, $value);
        $res = null;
        switch ($col_name) {

            default:
                $res = $value;
                break;
        }
        return $res;
    }

    function is_id($id) {
        return cv_motivation_letter_is_id($id);
    }

    function is_sender_name($sender_name) {
        return cv_motivation_letter_is_sender_name($sender_name);
    }

    function is_sender_email($sender_email) {
        return cv_motivation_letter_is_sender_email($sender_email);
    }

    function is_sender_phone($sender_phone) {
        return cv_motivation_letter_is_sender_phone($sender_phone);
    }

    function is_sender_address($sender_address) {
        return cv_motivation_letter_is_sender_address($sender_address);
    }

    function is_letter_date($letter_date) {
        return cv_motivation_letter_is_letter_date($letter_date);
    }

    function is_recipient_name($recipient_name) {
        return cv_motivation_letter_is_recipient_name($recipient_name);
    }

    function is_recipient_position($recipient_position) {
        return cv_motivation_letter_is_recipient_position($recipient_position);
    }

    function is_recipient_company($recipient_company) {
        return cv_motivation_letter_is_recipient_company($recipient_company);
    }

    function is_recipient_address($recipient_address) {
        return cv_motivation_letter_is_recipient_address($recipient_address);
    }

    function is_greeting($greeting) {
        return cv_motivation_letter_is_greeting($greeting);
    }

    function is_introduction($introduction) {
        return cv_motivation_letter_is_introduction($introduction);
    }

    function is_body_experience($body_experience) {
        return cv_motivation_letter_is_body_experience($body_experience);
    }

    function is_body_achievements($body_achievements) {
        return cv_motivation_letter_is_body_achievements($body_achievements);
    }

    function is_motivation($motivation) {
        return cv_motivation_letter_is_motivation($motivation);
    }

    function is_closing($closing) {
        return cv_motivation_letter_is_closing($closing);
    }

    function is_farewell($farewell) {
        return cv_motivation_letter_is_farewell($farewell);
    }

    function is_signature($signature) {
        return cv_motivation_letter_is_signature($signature);
    }

    function is_order_by($order_by) {
        return cv_motivation_letter_is_order_by($order_by);
    }

    function is_status($status) {
        return cv_motivation_letter_is_status($status);
    }
}

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


# 1) Verificamos si el `$u_rol` en `$c` tiene permiso para `read` 
if (!permissions_has_permission($u_rol, $c, "read")) {

    # si no tiene permiso lo redireccionamos 
    header("Location: index.php?c=home&a=no_access");
    
    # y matamos el proceso 
    die("Error has permission ");
}



$cv_motivation_letter = null;

$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] !="" ) ? clean($_POST["order_col"]) : "id";  

$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] !="" ) ? clean($_POST["order_way"]) : "desc";  

$w = (isset($_GET["w"]) && $_GET["w"] !="") ? clean($_GET["w"]) : false;


# activa la configuracion del formulario
$config = (!empty($_GET["config"])) ? clean($_GET["config"]) : false;

# que linea del formulario esta activo
$line_id = (!empty($_GET["line_id"])) ? clean($_GET["line_id"]) : null;


$error = array();

#################################################################################

#################################################################################

switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;        
        $cv_motivation_letter = cv_motivation_letter_search_by_id($txt);
        break;
        

    #################################################################################

    case "by_sender_name":
        $sender_name = (isset($_GET["sender_name"]) && $_GET["sender_name"] != "" ) ? clean($_GET["sender_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("sender_name", $sender_name));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_sender_name&sender_name=" . $sender_name;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("sender_name", $sender_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_sender_email":
        $sender_email = (isset($_GET["sender_email"]) && $_GET["sender_email"] != "" ) ? clean($_GET["sender_email"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("sender_email", $sender_email));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_sender_email&sender_email=" . $sender_email;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("sender_email", $sender_email, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_sender_phone":
        $sender_phone = (isset($_GET["sender_phone"]) && $_GET["sender_phone"] != "" ) ? clean($_GET["sender_phone"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("sender_phone", $sender_phone));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_sender_phone&sender_phone=" . $sender_phone;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("sender_phone", $sender_phone, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_sender_address":
        $sender_address = (isset($_GET["sender_address"]) && $_GET["sender_address"] != "" ) ? clean($_GET["sender_address"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("sender_address", $sender_address));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_sender_address&sender_address=" . $sender_address;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("sender_address", $sender_address, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_letter_date":
        $letter_date = (isset($_GET["letter_date"]) && $_GET["letter_date"] != "" ) ? clean($_GET["letter_date"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("letter_date", $letter_date));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_letter_date&letter_date=" . $letter_date;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("letter_date", $letter_date, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_recipient_name":
        $recipient_name = (isset($_GET["recipient_name"]) && $_GET["recipient_name"] != "" ) ? clean($_GET["recipient_name"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("recipient_name", $recipient_name));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_recipient_name&recipient_name=" . $recipient_name;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("recipient_name", $recipient_name, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_recipient_position":
        $recipient_position = (isset($_GET["recipient_position"]) && $_GET["recipient_position"] != "" ) ? clean($_GET["recipient_position"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("recipient_position", $recipient_position));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_recipient_position&recipient_position=" . $recipient_position;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("recipient_position", $recipient_position, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_recipient_company":
        $recipient_company = (isset($_GET["recipient_company"]) && $_GET["recipient_company"] != "" ) ? clean($_GET["recipient_company"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("recipient_company", $recipient_company));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_recipient_company&recipient_company=" . $recipient_company;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("recipient_company", $recipient_company, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_recipient_address":
        $recipient_address = (isset($_GET["recipient_address"]) && $_GET["recipient_address"] != "" ) ? clean($_GET["recipient_address"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("recipient_address", $recipient_address));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_recipient_address&recipient_address=" . $recipient_address;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("recipient_address", $recipient_address, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_greeting":
        $greeting = (isset($_GET["greeting"]) && $_GET["greeting"] != "" ) ? clean($_GET["greeting"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("greeting", $greeting));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_greeting&greeting=" . $greeting;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("greeting", $greeting, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_introduction":
        $introduction = (isset($_GET["introduction"]) && $_GET["introduction"] != "" ) ? clean($_GET["introduction"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("introduction", $introduction));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_introduction&introduction=" . $introduction;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("introduction", $introduction, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_experience":
        $body_experience = (isset($_GET["body_experience"]) && $_GET["body_experience"] != "" ) ? clean($_GET["body_experience"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("body_experience", $body_experience));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_body_experience&body_experience=" . $body_experience;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("body_experience", $body_experience, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_body_achievements":
        $body_achievements = (isset($_GET["body_achievements"]) && $_GET["body_achievements"] != "" ) ? clean($_GET["body_achievements"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("body_achievements", $body_achievements));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_body_achievements&body_achievements=" . $body_achievements;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("body_achievements", $body_achievements, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_motivation":
        $motivation = (isset($_GET["motivation"]) && $_GET["motivation"] != "" ) ? clean($_GET["motivation"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("motivation", $motivation));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_motivation&motivation=" . $motivation;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("motivation", $motivation, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_closing":
        $closing = (isset($_GET["closing"]) && $_GET["closing"] != "" ) ? clean($_GET["closing"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("closing", $closing));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_closing&closing=" . $closing;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("closing", $closing, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_farewell":
        $farewell = (isset($_GET["farewell"]) && $_GET["farewell"] != "" ) ? clean($_GET["farewell"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("farewell", $farewell));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_farewell&farewell=" . $farewell;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("farewell", $farewell, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_signature":
        $signature = (isset($_GET["signature"]) && $_GET["signature"] != "" ) ? clean($_GET["signature"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("signature", $signature));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_signature&signature=" . $signature;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("signature", $signature, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            
    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_letter&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        break;
            

        #################################################################################

        
    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] !="" ) ? clean($_GET["txt"]) : false;
        #################################################################################

        $pagination = new Pagination($page, cv_motivation_letter_search($txt));
        // puede hacer falta
        $url = "index.php?c=cv_motivation_lettera=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $cv_motivation_letter = cv_motivation_letter_search($txt, $pagination->getStart(), $pagination->getLimit());
        #################################################################################
 
        //$cv_motivation_letter = cv_motivation_letter_search($txt);
        break;
}


include view("cv_motivation_letter", "index");      

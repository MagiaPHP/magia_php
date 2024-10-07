<?php

if (!permissions_has_permission($u_rol, $c, "read")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}
$forms_lines = null;
$order_col = (isset($_POST["order_col"]) && $_POST["order_col"] != "" ) ? clean($_POST["order_col"]) : "id";
$order_way = (isset($_POST["order_way"]) && $_POST["order_way"] != "" ) ? clean($_POST["order_way"]) : "desc";
$w = (isset($_GET["w"]) && $_GET["w"] != "") ? clean($_GET["w"]) : false;
$error = array();

################################################################################
################################################################################
switch ($w) {
    case "id":
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        $forms_lines = forms_lines_search_by_id($txt);
        break;

    #### --- ####################################################################
    case "by_form_id":
        $form_id = (isset($_GET["form_id"]) && $_GET["form_id"] != "" ) ? clean($_GET["form_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("form_id", $form_id));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_form_id&form_id=" . $form_id;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("form_id", $form_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_label":
        $m_label = (isset($_GET["m_label"]) && $_GET["m_label"] != "" ) ? clean($_GET["m_label"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_label", $m_label));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_label&m_label=" . $m_label;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_label", $m_label, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_type":
        $m_type = (isset($_GET["m_type"]) && $_GET["m_type"] != "" ) ? clean($_GET["m_type"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_type", $m_type));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_type&m_type=" . $m_type;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_type", $m_type, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_class":
        $m_class = (isset($_GET["m_class"]) && $_GET["m_class"] != "" ) ? clean($_GET["m_class"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_class", $m_class));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_class&m_class=" . $m_class;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_class", $m_class, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_name":
        $m_name = (isset($_GET["m_name"]) && $_GET["m_name"] != "" ) ? clean($_GET["m_name"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_name", $m_name));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_name&m_name=" . $m_name;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_name", $m_name, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_id":
        $m_id = (isset($_GET["m_id"]) && $_GET["m_id"] != "" ) ? clean($_GET["m_id"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_id", $m_id));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_id&m_id=" . $m_id;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_id", $m_id, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_placeholder":
        $m_placeholder = (isset($_GET["m_placeholder"]) && $_GET["m_placeholder"] != "" ) ? clean($_GET["m_placeholder"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_placeholder", $m_placeholder));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_placeholder&m_placeholder=" . $m_placeholder;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_placeholder", $m_placeholder, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_value":
        $m_value = (isset($_GET["m_value"]) && $_GET["m_value"] != "" ) ? clean($_GET["m_value"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_value", $m_value));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_value&m_value=" . $m_value;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_value", $m_value, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_only_read":
        $m_only_read = (isset($_GET["m_only_read"]) && $_GET["m_only_read"] != "" ) ? clean($_GET["m_only_read"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_only_read", $m_only_read));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_only_read&m_only_read=" . $m_only_read;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_only_read", $m_only_read, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_mandatory":
        $m_mandatory = (isset($_GET["m_mandatory"]) && $_GET["m_mandatory"] != "" ) ? clean($_GET["m_mandatory"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_mandatory", $m_mandatory));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_mandatory&m_mandatory=" . $m_mandatory;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_mandatory", $m_mandatory, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_selected":
        $m_selected = (isset($_GET["m_selected"]) && $_GET["m_selected"] != "" ) ? clean($_GET["m_selected"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_selected", $m_selected));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_selected&m_selected=" . $m_selected;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_selected", $m_selected, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_disabled":
        $m_disabled = (isset($_GET["m_disabled"]) && $_GET["m_disabled"] != "" ) ? clean($_GET["m_disabled"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_disabled", $m_disabled));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_disabled&m_disabled=" . $m_disabled;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_disabled", $m_disabled, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_table_external":
        $m_table_external = (isset($_GET["m_table_external"]) && $_GET["m_table_external"] != "" ) ? clean($_GET["m_table_external"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_table_external", $m_table_external));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_table_external&m_table_external=" . $m_table_external;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_table_external", $m_table_external, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_col_external":
        $m_col_external = (isset($_GET["m_col_external"]) && $_GET["m_col_external"] != "" ) ? clean($_GET["m_col_external"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_col_external", $m_col_external));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_col_external&m_col_external=" . $m_col_external;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_col_external", $m_col_external, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_label_external":
        $m_label_external = (isset($_GET["m_label_external"]) && $_GET["m_label_external"] != "" ) ? clean($_GET["m_label_external"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_label_external", $m_label_external));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_label_external&m_label_external=" . $m_label_external;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_label_external", $m_label_external, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_m_options_values":
        $m_options_values = (isset($_GET["m_options_values"]) && $_GET["m_options_values"] != "" ) ? clean($_GET["m_options_values"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("m_options_values", $m_options_values));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_m_options_values&m_options_values=" . $m_options_values;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("m_options_values", $m_options_values, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_order_by":
        $order_by = (isset($_GET["order_by"]) && $_GET["order_by"] != "" ) ? clean($_GET["order_by"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("order_by", $order_by));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_order_by&order_by=" . $order_by;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("order_by", $order_by, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    case "by_status":
        $status = (isset($_GET["status"]) && $_GET["status"] != "" ) ? clean($_GET["status"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search_by("status", $status));
        // puede hacer falta
        $url = "index.php?c=forms_lines&a=search&w=by_status&status=" . $status;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search_by("status", $status, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        break;

    #### --- ####################################################################

    default:
        $txt = (isset($_GET["txt"]) && $_GET["txt"] != "" ) ? clean($_GET["txt"]) : false;
        ################################################################################
        $pagination = new Pagination($page, forms_lines_search($txt));
        // puede hacer falta
        $url = "index.php?c=forms_linesa=search&w=&txt=" . $txt;
        $pagination->setUrl($url);
        $forms_lines = forms_lines_search($txt, $pagination->getStart(), $pagination->getLimit());
        ################################################################################ 
        //$forms_lines = forms_lines_search($txt);
        break;
}


include view("forms_lines", "index");

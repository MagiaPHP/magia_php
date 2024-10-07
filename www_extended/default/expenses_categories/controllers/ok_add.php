<?php

/**
 * Por error en el redi, n puede ser array
 *     <input type="hidden" name="redi" value="<?php echo $redi; ?>">
 * sino debe ser asi 
 *       <input type="hidden" name="redi[]" value="<?php echo $redi['c']; ?>">
  <input type="hidden" name="redi[]" value="<?php echo $redi['a']; ?>">
 * Pero esto no se puede ya qye habria que preveher un moton de redi[]
 * asi que mejor pongo 
 *     <input type="hidden" name="redi" value="<?php echo $redi; ?>">
 * en este ok_add.php agrego al final un item 
 * 
 * se modifica 
 *     switch ($redi[redi]) {
 * por 
 *     switch ($redi) {
  y se agrega un item al swhich
 *  
 * $redi = 4;
  $expenses_categories["status"] = 1;
  include view('expenses_categories', 'form_add');
 * 
 * 
 */
if (!permissions_has_permission($u_rol, $c, "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}

$father_code = (isset($_POST["father_code"]) && $_POST["father_code"] != "" && $_POST["father_code"] != "null" ) ? clean($_POST["father_code"]) : null;
$code = (isset($_POST["code"]) && $_POST["code"] != "" && $_POST["code"] != "null" ) ? clean($_POST["code"]) : null;
$category = (isset($_POST["category"]) && $_POST["category"] != "" && $_POST["category"] != "null" ) ? clean($_POST["category"]) : 'Category';
$description = (isset($_POST["description"]) && $_POST["description"] != "" && $_POST["description"] != "null" ) ? clean($_POST["description"]) : null;
$order_by = (isset($_POST["order_by"]) && $_POST["order_by"] != "" ) ? clean($_POST["order_by"]) : 1;
$status = (isset($_POST["status"]) && $_POST["status"] != "" ) ? clean($_POST["status"]) : 1;
$redi = ($_POST["redi"] != "" ) ? clean($_POST["redi"]) : false;
$error = array();

################################################################################
# REQUIRED
################################################################################
if (!$code) {
    array_push($error, 'Code is mandatory');
}

if (!$order_by) {
    array_push($error, 'Order by is mandatory');
}
if (!$status) {
    array_push($error, 'Status is mandatory');
}

###############################################################################
# FORMAT
###############################################################################
if (!expenses_categories_is_order_by($order_by)) {
    array_push($error, 'Order by format error');
}
if (!expenses_categories_is_status($status)) {
    array_push($error, 'Status format error');
}



// solo los dos primeros caracteres
if ($code) {
    $code = magia_get_only_numbers($code);
    $code = substr($code, 0, 2);
    // si solo hay un numero pongo el cero al inicio
    $code = str_pad($code, 2, '0', STR_PAD_LEFT);
}


if ($father_code) {
    $code = ($father_code . $code);
} else {
    $code = $code;
}



###############################################################################
# CONDITIONAL
################################################################################
if (expenses_categories_search_by('code', $code)) {
    array_push($error, "This code already exists");
}
################################################################################
################################################################################
################################################################################
################################################################################
if (!$error) {

    $lastInsertId = expenses_categories_add(
            $code, $father_code, $category, $description, $order_by, $status
    );

    switch ($redi['redi']) {
        case 1:
            header("Location: index.php");
            break;

        case 2:
            header("Location: index.php?c=expenses_categories&a=details&id=$lastInsertId");
            break;

        case 3:
            header("Location: index.php?c=$redi[c]&a=$redi[a]&id=$lastInsertId");
            break;

        case 4:
            header("Location: index.php?c=expenses&a=add_25");
            break;

        case 5:
            header("Location: index.php?c=expenses_categories");
            break;

        default:
            header("Location: index.php?c=expenses_categories");
            break;
    }
} else {

    include view("home", "pageError");
}



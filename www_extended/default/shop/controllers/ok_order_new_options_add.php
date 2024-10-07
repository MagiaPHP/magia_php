<?php

if (!permissions_has_permission($u_rol, 'shop', "create")) {
    header("Location: index.php?c=home&a=no_access");
    die("Error has permission ");
}


$options_id_array = (!empty($_REQUEST['option_id'])) ? ($_REQUEST['option_id']) : null;

$error = array();

################################################################################
if (!$error) {

    // primero reseteo 
    // para despues agregar
    $_SESSION['order']['option_id'] = null;

    if ($options_id_array) {
        foreach ($options_id_array as $s => $ids) {

            $i = 0;
            foreach ($ids as $id) {

// Asigno los valores de las opciones a la cookie para tratarlos mas tarde

                $_SESSION['order']['option_id'][$s][$i++] = $id;
            }
        }
    }


    header("Location: index.php?c=shop&a=order_new_9070#order");
} else {
    include view("home", "pageError");
}
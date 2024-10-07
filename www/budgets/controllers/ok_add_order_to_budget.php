<?php

/**
 * 
 
if ( ! permissions_has_permission($u_rol , $c , "create") ) {
    header("Location: index.php?c=home&a=no_access") ;
    die("Error has permission ") ;
}

 * Debe haber un devis abierto  (status 10)
 * El devis no debe estar ya facturado (tabla budgets-invoices)
 * la orden debe tener un status : 100 send to client
 *  
 * 
 * 
 * 
 

$id = (isset($_REQUEST['id'])) ? clean($_REQUEST['id']) : false ; // order





$error = array() ;

################################################################################
if ( ! $budget_id ) {
    array_push($error , '$budget_id not send') ;
}

################################################################################
# // si el budget esta en status enviado o registrado
if ( budgets_field_id("status" , $budget_id) !== 10 ) {
    array_push($error , 'The budget must be in status') ;
    array_push($error , budget_status_by_status(10)) ;
    
}
if ( budgets_field_id("status" , $budget_id) == 40 ) {
    array_push($error , 'Budget already rejected') ;
}
if ( budgets_field_id("status" , $budget_id) == -10 ) {
    array_push($error , 'Budget already candeled') ;
}
################################################################################
if ( ! $error ) {

    

    header("Location: index.php?c=budgets&a=details&id=$budget_id") ;
} else {

    array_push($error , "Check your form") ;

    include "www/home/views/pageError.php" ;
}



*/
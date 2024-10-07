<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'bloc_status');
            }
            ?>
            <?php
            if (modules_field_module('status', 'audio')) {
                _t("Delivery note");
            } else {
                _t("Budget");
            }
            ?>
            : 
            <?php
            echo budget_status_by_status($budget->getStatus());
            ?>

        </h3>
    </div>


    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id');
                    }
                    ?>
                    <?php _t("ID"); ?></td><td><?php echo ($id); ?></td>
            </tr>

            <?php if (permissions_has_permission($u_rol, "orders", "read")) { ?>
                <tr>
                    <td>
                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'from_order');
                        }
                        ?>
                        <?php _t("From order"); ?></td>
                    <td>
                        <?php echo $from_order; ?>
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date');
                    }
                    ?>

                    <?php _t("Date"); ?></td>
                <td><?php echo budgets_field_id("date", $id); ?></td>
            </tr>
            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_registre');
                    }
                    ?>


                    <?php _t("Registre date"); ?></td>
                <td><?php echo budgets_field_id("date_registre", $id); ?></td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'status');
                    }
                    ?>


                    <?php _t("Status"); ?></td>
                <td>
                    <?php echo _tr(budget_status_by_status(budgets_field_id("status", $id))); ?>
                </td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'invoice');
                    }
                    ?>

                    <?php _t("Invoice"); ?></td>

                <td>
                    <?php if (permissions_has_permission($u_rol, "invoices", "read")) { ?>
                        <a href="index.php?c=invoices&a=details&id=<?php echo (budgets_invoices_search_invoice_by_budget_id($id)); ?>">
                            <?php echo invoices_numberf(budgets_invoices_search_invoice_by_budget_id($id)); ?>
                        </a>                                         
                    <?php } else { ?>                         
                        <?php echo invoices_numberf(budgets_invoices_search_invoice_by_budget_id($id)); ?>                                            
                    <?php } ?>
                </td>                                       
            </tr>


            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'client');
                    }
                    ?>
                    <?php _t("Client"); ?>
                </td>         

                <td>
                    <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>
                        <?php echo $budgets['client_id']; ?> - 
                        <a href="index.php?c=contacts&a=details&id=<?php echo $budgets['client_id']; ?>">
                            <?php echo contacts_formated(budgets_field_id("client_id", $id)); ?>
                        </a>
                    <?php } else { ?>
                        <?php echo $budgets['client_id']; ?> - 
                        <?php echo contacts_formated(budgets_field_id("client_id", $id)); ?>
                    <?php } ?>
                </td>                    
            </tr>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'title', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>                    
                    <?php _t("Title"); ?>:
                </td>  
                <td>
                    <?php
                    if (permissions_has_permission($u_rol, 'budgets', 'update')) {
                        include "form_update_title.php";
                    } else {
                        echo $budget->getTitle();
                    }
                    ?>




                    <?php
//                    if ($budget->getTitle()) {
//                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), "Edit",
//                                    array("btn" => 'default', "label" => 'Edit'),
//                                    array("c" => 'invoices', "a" => 'form_title_update'),
//                                    $params = array("id" => $id), '$rename');
//                        }
//                        echo $budget->getTitle();
//                    } else {
//                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), "Add title",
//                                    array("btn" => 'default', "label" => 'Add'),
//                                    array("c" => 'invoices', "a" => 'form_title_update'),
//                                    $params = array("id" => $id), '$rename');
//                        }
//                    }
                    ?>                                      
                </td>   
            </tr>


            <?php
            if (
            // modulo activo ?
                    modules_field_module('status', 'projects') &&
                    // tiene permiso para ver los proyectos ?
                    permissions_has_permission($u_rol, 'projects', 'read')) {
                ?>

                <tr>
                    <td>

                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'project', array('c' => $c, 'a' => $a, 'id' => $id));
                        }
                        ?>   

                        <?php _t("Project"); ?></td>
                    <td>

                        <?php
                        if (projects_inout_search_by('budget_id', $id)) {

                            $project = projects_inout_search_by('budget_id', $id)[0];

                            echo '<a href="index.php?c=projects&a=details&id=' . $project['project_id'] . '"> ' . $project['project_id'] . ' - ' . projects_field_id('name', $project['project_id']) . '</a>';
                        } else {

                            include "modal_project_update.php";
                        }
                        ?>
                    </td>
                </tr>

            <?php } ?>



            <?php
            if (
                    modules_field_module('status', 'app') &&
                    permissions_has_permission($u_rol, "app", "read")
            ) {
                ?>
                <?php if (_options_option("config_budgets_accept_via_web")) { ?>
                    <tr>
                        <td>

                            <?php
                            if (modules_field_module('status', "docu")) {
                                echo docu_modal_bloc($c, $a, 'code');
                            }
                            ?>


                            <?php _t("Code"); ?>
                        </td>         
                        <td>                      
                            <?php
                            if ($budgets['code']) {
                                echo $budgets['code'];
                            }
                            ?>
                        </td>                    
                    </tr>
                <?php } ?>
            <?php } ?>



        </table>
    </div>
</div>


<?php
################################################################################
################################################################################
################################################################################
# T R A N S P O R T  
################################################################################
################################################################################
################################################################################
if (
        modules_field_module('status', 'transport') &&
        permissions_has_permission($u_rol, "transport", "read")
) {
    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">

                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, 'bloc_transport');
                }
                ?>



                <?php _menu_icon('top', 'transport'); ?>
                <?php _t("Transport"); ?>
            </h3>
        </div>
        <div class="panel-body">

            <table class="table table-striped">

                <?php if ($code_transport_in_budgets) { ?>
                    <tr>
                        <td><?php _t('Transport'); ?></td>
                        <td><?php
//                        vardump($code_transport_in_budgets);

                            foreach ($code_transport_in_budgets as $key => $value) {
                                echo "$value ";
                            };
                            ?>
                        </td>
                    </tr>
                <?php }
                ?>

                <?php if (permissions_has_permission($u_rol, 'budgets', "update")) { ?>
                    <form class="form-horizontal" action="index.php" method="post" >
                        <input type="hidden" name="c" value="budgets">
                        <input type="hidden" name="a" value="ok_transport_add">
                        <input type="hidden" name="budget_id" value="<?php echo $id; ?>">
                        <input type="hidden" name="redi" value="5">
                        <tr>
                            <td>
                                <select class="form-control" name="transport_code" id="transport_code">
                                    <?php foreach (transport_list() as $key => $transport) { ?>
                                        <option value="<?php echo "$transport[code]" ?>">
                                            <?php echo "$transport[name] - " . monedaf($transport['price']); ?>
                                        </option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td>
                                <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
                            </td>
                        </tr>
                    </form>

                    <?php
                }
                ?>



            </table>

        </div>


    </div>

<?php } ?>




<?php
################################################################################
################################################################################
################################################################################
# E s t a t u s 
################################################################################
################################################################################
################################################################################
/*
 * 
  id	code	status	order_by
  1	10	Registred	10
  2	20	Send to customer	20
  3	30	Acepted by customer	30
  4	40	Rejected by customer	40
  5	-10	Cancel	50

  10 Registradas
 * Send to ostumer 
 * Aceptar
 * Rejeter
 * Cancel
  20
 * Aceptar
 * Rejeter
 * 
  30
 * Crear 1 factura 
 * Crear factura parcial
 * Cancel
  40
 * *---------
  -10
 * ------
 */

//vardump($budgets['status']);
//vardump($budget->getId());
//vardump($budget->getStatus());

if (permissions_has_permission($u_rol, "budgets", "update")) {
    switch ($budget->getStatus()) {
        case 10: // Registred                        
//             include "der_part_send.php";
//             include "der_part_send_by_email.php";
            //include "der_part_table_partials_invoices.php";
            //include "der_part_change_status.php";
            include "der_part_accept.php";
            include "der_part_rejected_by_customer.php";
            include "der_part_cancel.php";
            break;

        case 20: //Send to customer
            include "der_part_accept.php";
            include "der_part_rejected_by_customer.php";
            //    include "der_part_change_status.php";         
            break;

        case 30: // accepted by customer 
            //include "der_part_accept.php";
            include "der_part_has_or_not_invoice.php";
            include "der_part_rejected_by_customer.php";
//            include "der_part_invoices_proforma.php";
            include "der_part_cancel.php";
            break;

        case 35: // accepted by customer 
            include "der_part_has_or_not_invoice.php";
            //include "der_part_cancel.php";

            break;

        case 40: //Rejected by customer
            //include "der_part_rejected_by_customer.php";  
            include "der_part_accepted_by_customer.php";
            include "der_part_cancel.php";
            break;

        case -10: // Cancel   
            include "der_part_rejected_by_customer.php";
            include "der_part_accepted_by_customer.php";

            break;

        default:

            break;
    }
}


//include "der_part_partials_invoices.php";
// PONER PERMISOS PARA ENVIAR EMAILS
// $send_mail = ok
// debe haber una opcion en la base de datos
// INSERT INTO `_options` (`id`, `option`, `data`, `group`) VALUES (NULL, 'config_mail', '1', '20')
//vardump($config_mail); 
//include "der_part_send_by_email.php";

if (
        $config_mail &&
        permissions_has_permission($u_rol, "emails", "create") &&
        1 == 2
) {
    include "der_part_send_by_email.php";
} else {
    // message('info', "config_mail not actived");
}
?>





<?php
/*
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title"><?php _t("Actions") ; ?></h3>
  </div>
  <div class="panel-body">

  <form action="index.php" method="get" class="form-inline" ac>
  <input type="hidden" name="c" value="budgets">
  <input type="hidden" name="a" value="export_pdf">
  <input type="hidden" name="id" value="<?php echo $id ; ?>">
  <button type="submit" class="btn btn-primary"><?php _t("PDF") ; ?></button>
  </form>





  <p></p>

  <form class="form-inline">
  <button type="submit" class="btn btn-primary"><?php _t("Print PDF") ; ?></button>
  </form>
  <p></p>
  <form class="form-inline">
  <button type="submit" class="btn btn-primary"><?php _t("See PDF") ; ?></button>
  </form>

 *   <p></p>

  <p></p>


  <form action="index.php" method="get" class="form-inline" ac>
  <input type="hidden" name="c" value="budgets">
  <input type="hidden" name="a" value="export_pdf">
  <input type="hidden" name="id" value="<?php echo $id ; ?>">
  <button type="submit" class="btn btn-primary"><?php _t("PDF") ; ?></button>
  </form>


  </div>
  </div>

 */
?>

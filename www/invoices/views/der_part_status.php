<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', "docu")) {
                echo docu_modal_bloc($c, $a, 'panel_status', array('c' => $c, 'a' => $a, 'id' => $id));
            }
            ?>
            <?php _t("Invoices"); ?>
        </h3>
    </div>


    <div class="panel-body">

        <table class="table table-striped">

            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>

                    <?php _t('Id'); ?></td>
                <td><?php echo $inv->getId(); ?></td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id_formatted', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>

                    <?php _t('Id formatted'); ?>

                </td>
                <td><?php echo $inv->getId_formatted(_options_option('config_invoices_id_format')); ?>

                    <?php if (permissions_has_permission($u_rol, 'config', 'updatexxxxxxxxxxxxxxx')) { ?>
                        <a href="index.php?c=config&a=invoices_id_format"><?php echo icon("cog"); ?></a>
                    <?php } ?>

                </td>
            </tr>
            
            
            
            

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'status', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Status"); ?>
                </td>

                <td>
                    <?php
                    if ($inv->getStatus() == 0) {
                        include "modal_change_status_to_registred.php";
                    }

                    if ($inv->getStatus() == 10) {
                        include "modal_change_status_to_draf.php";
                    }
                    ?>

                    <?php echo _tr(invoice_status_by_status($invoices["status"])); ?>
                </td>
            </tr>




            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'office_id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Office"); ?>
                </td>
                <td>                    
                    <?php echo _t(contacts_formated($inv->getOffice_id())); ?>                    
                </td>
            </tr>



            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'counter', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Office counter"); ?>
                </td>
                <td>                    
                    <?php echo _t(($inv->getCounter())); ?>                    
                </td>
            </tr>






            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'type', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Type"); ?>
                </td>

                <td>                    
                    <?php echo _t(invoices_type($inv->getType())); ?>                    
                </td>

            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'counter', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Invoice"); ?>-<?php echo _t('Annual counter'); ?>
                </td>

                <td><?php echo invoices_numberf($id); ?></td>

            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Invoice id"); ?></td>
                <td><?php echo ($id); ?></td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'from_budget', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Budget"); ?></td>
                <td>

                    <?php
                    // si hay un presupuesto poner el numero del presupuesto, 
                    // sino poner el numero de presupuestos de esa factura 
                    $total_budgets_by_invoice = count(budgets_invoices_list_budgets_by_invoice_id($id));

                    switch ($total_budgets_by_invoice) {
                        case 0:
                            echo "";
                            break;

                        case 1:
                            echo "<a href=\"index.php?c=budgets&a=details&id=" . (budgets_invoices_list_budgets_by_invoice_id($id)[0]['budget_id']) . "\">" . (budgets_invoices_list_budgets_by_invoice_id($id)[0]['budget_id']) . "</a>";
                            break;

                        default:
                            echo $total_budgets_by_invoice . " " . _tr("Budgets");
                            break;
                    }

// echo invoices_field_id("budget_id" , $id) ; 
                    ?>

                </td>
            </tr>

            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'credit_note_id', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>



                    <?php _t("Credit note"); ?></td>
                <td>
                    <a href="index.php?c=credit_notes&a=details&id=<?php echo $invoices['credit_note_id']; ?>">
                        <?php echo $invoices["credit_note_id"]; ?>
                    </a>
                </td>
            </tr>

            <?php
            /*
              <tr>
              <td><?php _t("Seller") ; ?></td>
              <td><?php echo contacts_formated(invoices_field_id("seller_id" , $id)) ; ?></td>
              </tr>
             */
            ?>
            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'client', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>



                    <?php _t("Client"); ?>
                </td>  


                <td>

                    <?php echo $invoices['client_id']; ?> -                     
                    <a href="index.php?c=contacts&a=details&id=<?php echo $invoices['client_id']; ?>">
                        <?php echo contacts_formated(invoices_field_id("client_id", $id), array('c' => $c, 'a' => $a, 'id' => $id)); ?>
                    </a>
                </td>                    
            </tr>






            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'title', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php // echo docu_modal(54);  ?>

                    <?php _t("Title"); ?>:
                </td>  
                <td>
                    <?php
                    if ($invoices['title']) {
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            modal(uniqid(), "Edit",
                                    array("btn" => 'default', "label" => 'Edit'),
                                    array("c" => 'invoices', "a" => 'form_title_update'),
                                    $params = array("id" => $id), '$rename');
                        }
                        echo $invoices['title'];
                    } else {
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            modal(uniqid(), "Add title",
                                    array("btn" => 'default', "label" => 'Add'),
                                    array("c" => 'invoices', "a" => 'form_title_update'),
                                    $params = array("id" => $id), '$rename');
                        }
                    }
                    ?>                                      
                </td>   
            </tr>




            <tr>
                <td>

                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'seller', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>



                    <?php _t("Seller"); ?>:
                </td>  

                <td>
                    <?php if ($invoices['seller_id']) { ?>



                        <?php
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            modal(uniqid(), _tr("Edit seller"),
                                    array("btn" => 'default', "label" => _tr("Edit")),
                                    array("c" => 'invoices', "a" => 'form_seller_id_update'),
                                    $params = array(
                                "id" => $id,
                                "seller_id" => $invoices['seller_id'],
                                    ), '$rename');
                        }
                        //echo $invoices['title'];
                    } else {
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            modal(uniqid(), _tr("Add seller"),
                                    array("btn" => 'default', "label" => _tr("Add")),
                                    array("c" => 'invoices', "a" => 'form_seller_id_update'),
                                    $params = array(
                                "id" => $id,
                                "seller_id" => $u_id,
                                    ), '$rename');
                        }
                    }
                    ?>   

                    <?php echo $invoices['seller_id']; ?> -                     
                    <a href="index.php?c=contacts&a=details&id=<?php echo $invoices['seller_id']; ?>">
                        <?php echo contacts_formated(invoices_field_id("seller_id", $id)); ?>
                    </a>


                </td>   
            </tr>




            <?php // if (_options_option("config_projects") && 1 == 2 ) {   ?>
            <?php
            // Esto era antes
            if (modules_field_module('status', 'projects') && 1 == 33333333333333333333333333333333333) {
                ?>
                <tr>
                    <td>
                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'project', array('c' => $c, 'a' => $a, 'id' => $id));
                        }
                        ?>
                        <?php _t("Project"); ?>
                    </td>
                    <td>
                        <?php
                        // vardump(projects_list_by_invoice($id));
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
                            if (projects_inout_search_by_invoice_id($id)) {
                                include "modal_project_update.php";
                            } else {
                                include "modal_project_insert.php";
                            }
                        } else {
                            echo "solo ve";
                        }
                        ?>       
                    </td>
                </tr>
            <?php } ?>



            <?php
            if (
                    _options_option("config_invoices_see_via_web") &&
                    modules_field_module('status', 'app')
            ) {
                ?>
                <tr>
                    <td>

                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'see_via_app', array('c' => $c, 'a' => $a, 'id' => $id));
                        }
                        ?>



                        <?php _t("View via the web"); ?>
                    </td>
                    <td>
                        <?php
                        include "modal_invoices_see_via_web.php";
                        ?>       
                    </td>
                </tr>
            <?php } ?>





            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Invoice date"); ?></td>
                <td><?php echo $invoices["date"]; ?></td>
            </tr>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_expiration', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Expiration date"); ?></td>
                <td>
                    <?php
                    if ($invoices['date_expiration']) {
                        echo $invoices['date_expiration'];
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), _tr("Edit expiration date"),
//                                    array("btn" => 'default', "label" => 'Edit'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array(
//                                "id" => $id,
//                                "date" => $invoices['date_expiration']
//                                    ), '$rename');
                        } // fin de permisos 
                    } else {
                        if (permissions_has_permission($u_rol, 'invoices', "update")) {
//                            modal(uniqid(), _tr("Add expiration date"),
//                                    array("btn" => 'default', "label" => 'Add'),
//                                    array("c" => 'invoices', "a" => 'form_date_expiration_update'),
//                                    $params = array("id" => $id), '$rename');
                        }
                    }
                    ?>                                      
                </td>        
            </tr>


            <tr>
                <td>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'date_registre', array('c' => $c, 'a' => $a, 'id' => $id));
                    }
                    ?>
                    <?php _t("Registre date"); ?></td>
                <td><?php echo $invoices["date_registre"]; ?></td>
            </tr>







            <tfoot>
                <tr>
                    <th></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php
            if (modules_field_module('status', 'audio')) {
                _t("Delivery note");
            } else {
                _t("Budget");
            }
            ?>
            <?php // _t("Extended  ") ;   ?></h3>
    </div>


    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Number"); ?></td><td><?php echo ($id); ?></td>
            </tr>

            <?php if (permissions_has_permission($u_rol, "orders", "read")) { ?>
                <tr>
                    <td><?php _t("From order"); ?></td>
                    <td>
                        <?php echo $from_order; ?>
                    </td>
                </tr>
            <?php } ?>

            <tr>
                <td><?php _t("Date"); ?></td>
                <td><?php echo budgets_field_id("date", $id); ?></td>
            </tr>
            <tr>
                <td><?php _t("Registre date"); ?></td>
                <td><?php echo budgets_field_id("date_registre", $id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Status"); ?></td>
                <td>
                    <?php echo _tr(budget_status_by_status(budgets_field_id("status", $id))); ?>
                </td>
            </tr>


            <tr>
                <td><?php _t("Invoice"); ?></td>
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

            <?php if (_options_option("config_budgets_accept_via_web")) { ?>
                <tr>
                    <td>
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



        </table>
    </div>
</div>


<?php
if (
        modules_field_module('status', 'transport') &&
        permissions_has_permission($u_rol, "transport", "read")
) {
    ?>


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">
                <?php _menu_icon('top', 'transport'); ?>
                <?php _t("Transport"); ?></h3>
        </div>
        <div class="panel-body">


            <table class="table table-striped">

                <tr>
                    <td><?php _t('Transport'); ?></td>
                    <td><?php
                        foreach ($code_transport_in_budgets as $key => $value) {
                            echo "$value ";
                        };
                        ?>
                    </td>
                </tr>

            </table>


        </div>
    </div>

<?php } ?>




<?php
/*
 * 
  id	code	status	order_by
  1	10	Registred	10
  2	20	Send to customer	20
  3	30	accepted by customer	30
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


if (permissions_has_permission($u_rol, "budgets", "update")) {
    switch ($budgets['status']) {
        case 10: // Registred
            //    include "der_part_send.php"; 
            //include "der_part_table_partials_invoices.php";
            include "der_part_accept.php";
            include "der_part_reject.php";
            include "der_part_cancel.php";
            break;

        case 20: //Send to customer
            include "der_part_accept.php";
            include "der_part_reject.php";
            //    include "der_part_change_status.php";         
            break;

        case 30: // accepted by customer 
            //include "der_part_accept.php";
            include "der_part_has_or_not_invoice.php";
            //include "der_part_invoices_proforma.php";
            // include "der_part_cancel.php";                  
            break;

        case 40: //Rejected by customer
            //include "der_part_reject.php";            
            break;

        case -10: // Cancel   

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

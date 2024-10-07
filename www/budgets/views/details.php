<?php include view("home", "header"); ?> 

<?php include "nav_details.php"; ?>

<?php
if (
        modules_field_module('status', 'transport') &&
        count($code_transport_in_budgets) > 1) {
    message("atention", "This budget has more than one transport item registred");
}

//vardump(modules_field_module('status', 'transport'));
if (
        modules_field_module('status', 'transport') &&
        count($code_transport_in_budgets) < 1
) {
    message("atention", "This budget has not transport item registred");
}
?>

<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <div class="well text-center">
            <h1>
                <?php
                echo (modules_field_module('status', 'audio')) ? _t("Delivery note") : _t("Budget");
                ?>: 
                <?php echo $budget->getId(); ?>

            </h1>
        </div>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php include "part_details_company.php"; ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php include "part_details_billing_address.php"; ?>
            </div>
            <div class="col-sm-12 col-md-4 col-lg-4">
                <?php
                if (_options_option('config_address_use_delivery')) {
                    include "part_details_delivery_address.php";
                }
                ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                if (modules_field_module('status', "docu")) {
                    // nombre del archivo sin el punto ni la extencion 
                    // form_search_by_office.php > form_search_by_office
                    // en los form, al final
                    //
                    echo docu_modal_bloc($c, $a, 'bloc_items');
                }
                ?>
                <?php _t("Items"); ?>

            </div>
            <div class="panel-body">
                <?php
                /**
                 *                 <div>
                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                  <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">1</a></li>
                  <?php foreach (budget_lines_list_orders_by_budget_id($id) as $key => $value) { ?>
                  <li role="presentation">
                  <a href="#pag_<?php echo $key++; ?>" aria-controls="settings" role="tab" data-toggle="tab"><?php echo $key++; ?></a>
                  </li>
                  <?php } ?>
                  </ul>
                  <!-- Tab panes -->
                  <div class="tab-content">
                  <div role="tabpanel" class="tab-pane active" id="home">..8.</div>
                  <?php
                  //vardump(budget_lines_list_orders_by_budget_id($id));
                  foreach (budget_lines_list_orders_by_budget_id($id) as $key => $value) { ?>
                  <div role="tabpanel" class="tab-pane" id="pag_<?php echo $key++; ?>">
                  <h3><?php echo $value['order_id']; ?></h3>
                  <?php budgets_tabs_by_order($value['order_id']); ?>
                  </div>
                  <?php } ?>
                  </div>
                  </div>
                 */
                ?>
                <?php

                function budgets_tabs_by_order($order_id) {
//    include view("budgets", "budgets_tabs"); 
                }
                ?>

                <?php include "details_table_index.php"; ?>                               

            </div>
        </div>



        <div class="panel panel-default">
            <div class="panel-heading">
                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, 'bloc_comments');
                }
                ?>
                <?php _t("Comments"); ?></div>
            <div class="panel-body">
                <?php echo $budget->getComments(); ?>
            </div>
        </div>



        <?php
        //
        //
        //
        //
        //
        if (modules_field_module('status', 'audioooooooooooo') && permissions_has_permission($u_rol, "ordedddddddddddrs", "read")) {
            ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'table_orders_on_budget');
                    }
                    ?>
                    <?php _tr("Orders in this budget "); ?></div>
                <div class="panel-body">
                    <?php // include "table_orders_on_budget.php";  ?>
                </div>
            </div>

            <?php
            //
            //
            //
            //
            //
        }
        ?>


        <?php if (permissions_has_permission($u_rol, "invoices", "read")) { ?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'table_partials_invoices');
                    }
                    ?>
                    <?php echo _tr("Invoices from this budget"); ?></div>
                <div class="panel-body">
                    <?php include "table_partials_invoices.php"; ?>
                </div>
            </div>
        <?php } ?>


    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php  include "der.php"; ?> 
    </div>
</div>

<?php include view("home", "footer"); ?>
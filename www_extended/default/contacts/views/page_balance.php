<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">        
        <?php include view("contacts", 'izq_details'); ?>
    </div>


    <div class="col-sm-10 col-md-10 col-lg-10">

        <div class="page-header">
            <h1><?php _t("Business situation"); ?> : <?php echo $year; ?></h1>
        </div>




        <?php include "nav_balance.php"; ?>

        <?php include "nav_balance2.php"; ?>

        <?php include "top_details_company.php"; ?>


        <br>
        <br>

        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">        <h4><?php _t('Resumen'); ?></h4></a></li>
        </ul>
        <?php include "part_balance_resumen.php"; ?>



        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">        <h4>(a) <?php _t('Invoices'); ?></h4></a></li>
        </ul>
        <?php include "part_balance_invoices.php"; ?>

        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">        <h4>(b) <?php _t('Payments'); ?></h4></a></li>
        </ul>
        <?php // include view('balance', 'table_index2'); ?>

        <?php include "part_balance_balance.php"; ?>



        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#">        <h4>(c) <?php _t('Credit Notes'); ?></h4></a></li>
        </ul>
        <?php include "part_balance_credit_notes.php"; ?>






        <?php //include "part_balance_payments_received_from_customer.php"; ?>


        <h3><?php // _t('Payments Sent to Customer');             ?></h3>

        <?php // include "part_balance_pay_to_client.php"; ?>






        <?php
//        if ($balance) {
//            //  balance_show_('contacts', 'table_business_situation_balance', $balance, 'balance');
//        } else {
//            //  message("info", "No items");
//        }
        ?>
        <?php
//        vardump(($contact['id']));
//        vardump(invoices_search_by_client_id_multi_code_year($contact['id'], array(10,20,30), $year) );
//        vardump($year);
//        invoices_search_by_client_id_multi_code_year($client_id, $code_array, $year);
//        invoices_total_by_client_id_multi_code_year($client_id, $code_array, $year);
//        invoices_total_by_multi_code_year($code_array, $year)
        ?>
        <?php
// 
        // balance_show_('contacts', 'table_business_situation_invoices', $invoices, 'invoices');
// 
        //balance_show_('contacts', 'table_business_situation', $business_situation, 'business_situation');
        //balance_show_('contacts', 'table_business_situation', $business_situation_in, 'business_situation');
        //balance_show_('contacts', 'table_business_situation', $business_situation_out, 'business_situation');
        //include view("contacts", "table_business_situation");
        ?>
        <?php // include "table_business_situation.php"; ?>
        <?php // include "table_business_situation_in.php"; ?>
        <?php // include "table_business_situation_out.php"; ?>
        <?php
        /**
         * 
         * 
          <table class="table table-striped table-condensed table-bordered">
          <tbody>
          <tr>
          <td><?php _t('Total invoices'); ?></td>
          <td class="text-right"><?php echo moneda(($total_total + $total_tax)); ?></td>
          </tr>
          <tr>
          <td><?php _t('Payments recived'); ?></td>
          <td class="text-right"><?php echo moneda($total_advance); ?></td>
          </tr>
          <tr>
          <td><?php _t('Others payments recived'); ?></td>
          <td class="text-right"><?php echo moneda(balance_total_by_payement_direct_by_client_id($id)); ?></td>
          </tr>
          <tr>
          <td><?php _t("Resumen"); ?></td>
          <td class="text-right"><?php echo moneda((($total_total + $total_tax) - $total_advance) - balance_total_by_payement_direct_by_client_id($id)); ?></td>
          </tr>
          </tbody>
          </table>




         */
        ?>






        <?php /*
          <div>

          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
          <li role="presentation" class="active"><a href="#business_situation" aria-controls="business_situation" role="tab" data-toggle="tab">
          <?php _t("Business situation"); ?>
          </a>
          </li>
          <li role="presentation"><a href="#business_situation" aria-controls="business_situation" role="tab" data-toggle="tab">Profile</a></li>
          <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></li>
          <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
          </ul>

          <!-- Tab panes -->
          <div class="tab-content">
          <div role="tabpanel" class="tab-pane active" id="business_situation">
          <p>-</p>
          <?php include "table_business_situation.php"; ?>
          </div>

          <div role="tabpanel" class="tab-pane" id="profile">
          <p>-</p>

          </div>
          <div role="tabpanel" class="tab-pane" id="messages">...</div>
          <div role="tabpanel" class="tab-pane" id="settings">...</div>
          </div>

          </div>



         */ ?>





    </div>
</div>
<?php include view("home", "footer"); ?>   








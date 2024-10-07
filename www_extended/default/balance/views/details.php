<?php include view("home", "header"); ?>  

<?php include "nav.php"; ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">

    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="well">

            <div class="row">
                <div class="col-lg-6">


                    <b><?php _t("Id"); ?></b> : <?php echo $balance['id']; ?> <br>
                    <b><?php _t("Client"); ?></b>: <?php echo contacts_formated($balance['client_id']); ?> <br>
                    <b><?php _t("Expense id"); ?></b>: <?php echo $balance['expense_id']; ?> <br>
                    <b><?php _t("Invoice id"); ?></b>: <?php echo $balance['invoice_id']; ?> <br>
                    <b><?php _t("Credit Note Id"); ?></b>: <?php echo $balance['credit_note_id']; ?> <br>

                </div>
                <div class="col-lg-6">                    
                    <b><?php _t("My bank"); ?></b> : <?php echo banks_field_account_number('bank', $balance['account_number']); ?> <br>
                    <b><?php _t("My account number"); ?></b> : <?php echo $balance['account_number']; ?> <br>
                    <b><?php _t("Ref."); ?> / <?php _t("Operation"); ?></b> : <?php echo $balance['ref']; ?> <br>



                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">  
                    <b><?php _t("Type"); ?></b> : <?php echo balance_type($balance['type']); ?> <br>
                    <b><?php _t("Value"); ?></b>: <?php echo monedaf($balance['sub_total'] + $balance['tax']); ?> <br>
                    <b><?php _t("Description"); ?></b> : <?php echo $balance['description']; ?> <br>
                    <b><?php _t("ce"); ?></b> : <?php echo $balance['ce']; ?> <br>
                    <b><?php _t("Comunication"); ?></b> : <?php echo $balance['comunication']; ?> <br>


                </div>
                <div class="col-lg-6">
                    <b><?php _t("Date"); ?></b> : <?php echo $balance['date']; ?> <br>
                    <b><?php _t("Date registre"); ?></b> : <?php echo $balance['date_registre']; ?> <br>
                    <b><?php _t("Canceled"); ?> ?</b> : <?php echo $balance['canceled']; ?> <br>
                    <b><?php _t("Canceled code"); ?></b> : <?php echo $balance['canceled_code']; ?><br>



                </div>
            </div>



        </div>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-4 col-xl-4">
        <?php //include view("balance", "der_details"); ?>
    </div>


</div>

<?php include view("home", "footer"); ?> 


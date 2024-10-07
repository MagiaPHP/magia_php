<?php include view("home", "header"); ?>  
<?php include view("balance", "nav_details"); ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 col-xl-2">
        <?php include "izq_details.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
        <?php // include view("balance", "nav_details"); ?>

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


                    <?php _t("Id"); ?> : <?php echo $balance['id']; ?> <br>
                    <?php _t("Invoice"); ?>: <?php echo $balance['invoice_id']; ?> <br>
                    <?php _t("Credit Note Id"); ?>: <?php echo $balance['credit_note_id']; ?> <br>

                </div>
                <div class="col-lg-6">
                    <?php _t("Account"); ?> : <?php echo $balance['account_number']; ?> <br>
                    <?php _t("Type"); ?> : <?php echo balance_type($balance['type']); ?> <br>
                    <?php _t("Value"); ?>: <?php echo monedaf($balance['sub_total'] + $balance['tax']); ?> <br>



                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-6">                    
                    <?php _t("Ref"); ?>: <?php echo $balance['ref']; ?> <br>                    
                    <?php _t("Description"); ?>: <?php echo $balance['description']; ?> <br>
                    <?php _t("comunication"); ?>: <?php echo $balance['ce']; ?> <br>


                </div>
                <div class="col-lg-6">
                    <?php _t("Date"); ?>: <?php echo $balance['date']; ?> <br>
                    <?php _t("Date registre"); ?>: <?php echo $balance['date_registre']; ?> <br>
                    <?php _t("Canceled"); ?> ?: <?php echo $balance['canceled']; ?> <br>
                    <?php _t("Canceled code"); ?>: <?php echo $balance['canceled_code']; ?><br>



                </div>
            </div>



        </div>

    </div>




    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-3">
        <?php include "der_details.php"; ?>
        <?php
// para poner las pruebas de pago en scan p imagen
//include "der_details2.php"; 
        ?>
    </div>

    <?php
    /**
     *     <div class="col-xs-12 col-sm-12 col-md-2 col-lg-5 col-xl-5">
      <?php //include "der_details_previews.php";  ?>
      </div>
     */
    ?>





</div>


<?php include view("home", "footer"); ?> 


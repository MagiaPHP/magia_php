<?php include view("home", "header"); ?>  

<div class="container-fluid">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <hr>
        <?php include view("app", "izq"); ?>
        <hr>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <?php
        /**
         *         <iframe 
          src="index.php?c=invoices&a=export_pdf&id=8&lang=en_GB"
          width="100%"
          height="900"
          >

          </iframe>
         */
        ?>

        <?php
        /**
         *         <div class="well text-center">
          <h1>
          <?php _t("Invoice") ?>: <?php echo $inv->getId(); ?>
          </h1>
          </div>
         */
        ?>


        <?php include "part_invoice.php"; ?>


        <?php
//        include "part_pay.php";
        ?>



    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
        <hr>
        <?php include view("app", "der_invoices"); ?>
    </div>

</div>



<?php include view("home", "footer"); ?>


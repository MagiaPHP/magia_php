<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-md-2">
        <?php include "izq_myOffices.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_offices.php"; ?>
    </div>

    <div class="col-xs-12 col-md-8 col-lg-8"> 

        <?php
        /**
         *         <ul class="nav nav-tabs">
          <li role="presentation"><a href="#"><?php _t("Details"); ?></a></li>
          <li role="presentation"><a href="#"><?php _t("Addresses"); ?></a></li>
          <li role="presentation"><a href="#"><?php _t("Directory"); ?></a></li>
          <li role="presentation" class="active"><a href="#"><?php _t("Users"); ?></a></li>
          <li role="presentation"><a href="#"><?php _t("Orders"); ?></a></li>
          </ul>
          <p></p>
         */
        ?>


        <?php include "nav_adresses.php"; ?> 

        <?php
        if ($adresses) {
            include "table_adresses_by_office.php";
        } else {
            message('info', 'No items');
        }
        ?>

    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
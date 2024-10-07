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


        <h2><?php _t("Directory by office"); ?></h2>

        <?php
        include "table_directory_by_contacts.php";
        ?>

    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
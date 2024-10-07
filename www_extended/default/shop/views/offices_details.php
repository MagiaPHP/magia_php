<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-0">
        <?php // include "izq_myInfo.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_myOffices.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_offices.php"; ?>
    </div>


    <div class="col-md-6">

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


        <h1><?php _t("Office details"); ?></h1> 

        <?php
        include "form_offices_details.php";
        ?>

        <?php
        /**
         *  <br>
          <br>
          <br>
          <?php include "nav_adresses.php"; ?>
          <?php
          if (!$adresses) {
          message('info', "Not data");
          } else {
          include "table_adresses_by_office.php";
          }
          ?>




          <br>
          <br>
          <br>
          <?php include "nav_directory.php"; ?>
          <?php
          if (!$directory) {
          message('info', "Not data");
          } else {
          include "table_directory_by_office.php";
          }
          ?>


          <br>
          <br>
          <br>
          <?php include "nav_users.php"; ?>
          <?php
          if (!$users_by_office) {
          message('info', "Not data");
          } else {
          include "table_users_by_office.php";
          }
          ?>
         */
        ?>



    </div>


    <div class="col-md-3">
        <?php include "der_contacts.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
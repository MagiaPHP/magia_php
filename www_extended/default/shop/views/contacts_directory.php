<?php include view("home", "header"); ?>
<div class="row">

    <?php
    /*    <div class="col-md-2">
      <?php include "izq_myInfo.php"; ?>
      </div> */
    ?>

    <div class="col-md-0">
        <?php //include "izq_myContacts.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_contacts.php"; ?>
    </div>

    <div class="col-md-6"> 

        <?php include "nav_directory.php"; ?> 

        <h1><?php _t("Contact directory"); ?></h1>        
        <?php
        if ($directory) {
            
        } else {
            message('info', 'No items');
        }


        include "table_directory_by_contacts.php";
        ?>
    </div>
    <div class="col-md-0">
        <?php //include "der_contacts.php";   ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
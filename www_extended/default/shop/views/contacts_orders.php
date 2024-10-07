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



    <div class="col-md-10">  



        <h1>
            <?php _t("Orders create by"); ?>: 
            <?php echo contacts_formated_name(contacts_field_id("name", $id)) ?>
        </h1>        
        <?php
        if ($orders) {
            include "table_orders.php";
        } else {
            message("info", "No items");
        }
        ?>





    </div>




    <div class="col-md-0">
        <?php //include "der_contacts.php";   ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
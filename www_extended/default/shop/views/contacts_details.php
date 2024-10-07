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


    <div class="col-md-5">    
        <h1><?php _t("Contact details"); ?></h1>        
        <?php
        include "form_contacts_details.php";
        echo "<p></p>";
        //  include "tabs_contacts.php";
        ?>

    </div>


    <div class="col-md-5">
        <?php include "der_contacts.php"; ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
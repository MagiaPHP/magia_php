<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-md-2">
        <?php include "izq_contacts.php"; ?>
    </div>

    <div class="col-md-6">    
        <h1><?php _t("Contact update"); ?></h1>       
        <?php
        include "form_contacts_update.php";
        ?>
    </div>

</div>

<?php include view("home", "footer"); ?>
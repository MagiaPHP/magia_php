<?php include view("home", "header"); ?>
<div class="row">


    <div class="col-md-2">
        <?php include "izq_myInfo.php"; ?>
    </div>


    <div class="col-md-0">
        <?php //include "izq_myContacts.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_contacts.php"; ?>
    </div>

    <div class="col-md-6">
        <h1><?php _t("Permissions"); ?></h1>
    </div>
</div>
<?php include view("home", "footer"); ?>
<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php include "izq_search.php"; ?>
    </div>
    <div class="col-md-6">    
        <h1><?php _t("Search avanced"); ?> : <?php _t("Contacts"); ?></h1>        
        <?php
        include "form_search_avanced_orders.php";
        include "form_search_avanced_contacts.php";
        ?>
    </div>
    <div class="col-md-3">
        <?php include "der_contacts.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-2">
        <?php include "izq_myInfo.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_employees.php"; ?>
    </div>


    <div class="col-xs-12 col-md-12 col-lg-12">             
        <?php include "nav_employees.php"; ?>   

        <?php
//        echo _t("Last"); 
//        echo " "; 
//        echo _options_option("shop_limit_contacts"); 
//        echo " "; 
//        echo _t("contacts"); 
        ?>

        <?php include "table_employees.php"; ?>
    </div>      
</div>
<?php include view("home", "footer"); ?>
<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details_company.php"; ?>
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">
        <?php include view("contacts", "nav_users"); ?>  
        <?php // include "part_contacts_nav_pills.php"; ?>
        <p></p>
        <p>
            <?php _t("List of employees who have access to the system"); ?>
        </p>
        <?php include "table_contacts_users.php"; ?>
    </div>
    
    

</div>
<?php include view("home", "footer"); ?>  








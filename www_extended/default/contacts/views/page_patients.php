<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php include "izq_details_company.php"; ?>
    </div>

    <div class="col-sm-10 col-md-10 col-lg-10">



        <?php include view("contacts", "nav_patients"); ?> 


        <?php include "part_contacts_nav_pills.php"; ?>


        <p></p>

        <p>
            <?php _t("A patient is a contact who has an order"); ?>
        </p>

        <?php
        if ($patients_list) {
            include "table_contacts_patients.php";
        } else {
            message('info', 'No items');
        }
        ?>


    </div>

</div>


<?php include view("home", "footer"); ?>  




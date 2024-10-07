<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php vardump($company_cloud); ?>
        <?php // include "izq_edit.php"; ?>
        <h1>
            <?php _t("Add a contact"); ?>
        </h1>
    </div>
    <div class="col-sm-7 col-md-7 col-lg-7">

        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <h2><?php _t("Add company"); ?></h2>

        <?php include "form_contacts_company_add.php"; ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">
        last search


        <?php // include "www/contacts/views/der_edit.php";    ?>
    </div>
</div>


<?php include view("home", "footer"); ?>  


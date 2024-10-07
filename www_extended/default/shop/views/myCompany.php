<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-2">
        <?php include "izq_myInfo.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_myCompany.php"; ?>
    </div>


    <div class="col-md-6">              
        <?php // include "nav_address.php"; ?>
        <?php
        if ($error) {

            foreach ($error as $key => $value) {

                message("info", "$value");
            }
        }
        ?>


        <h2><?php _t("Company info"); ?></h2> 


        <div class="panel panel-default">
            <div class="panel-body">

                <?php if (permissions_has_permission($u_rol, "shop_offices", "updateeeee")) { ?>
                    <?php include "form_my_company.php"; ?>
                <?php } else { ?>
                    <?php include "form_my_company_disabled.php"; ?>
                <?php } ?>

            </div>
        </div>


    </div>

    <div class="col-md-3">

    </div>


</div>
<?php include view("home", "footer"); ?>
<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-2 col-md-2 col-lg-2">
        <?php // include "izq_edit.php"; ?>
        <h1>
            <?php // _t("Add a contact"); ?>
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

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active">
                    <a href="#companies" aria-controls="companies" role="tab" data-toggle="tab">
                        <?php _t("Companies"); ?>
                    </a>
                </li>
                <li role="presentation">
                    <a href="#private" aria-controls="private" role="tab" data-toggle="tab">
                        <?php _t("New private customer"); ?>
                    </a>
                </li>
            </ul>


            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="companies">

                    <h3><?php _t("Add a new company"); ?></h3>
                    <?php include "part_add_company.php"; ?>

                </div>

                <div role="tabpanel" class="tab-pane" id="private">
                    <h3><?php _t("Add a private customer"); ?></h3>
                    <?php include "form_contacts_contacts_add.php"; ?>
                </div>
            </div>
        </div>





    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">


        <?php // include "www/contacts/views/der_edit.php";           ?>
    </div>
</div>


<?php include view("home", "footer"); ?>  


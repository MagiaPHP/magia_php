<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-3">
        <?php // include view("credit_notes", "izq"); ?>
    </div>

    <div class="col-lg-6">
        <?php //include view("credit_notes", "nav"); ?>
        <?php // _t("Extended"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1><?php _t("New credit_note"); ?></h1>


        <div>

            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></li>
                <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>


            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane active" id="home">

                    <h3><?php _t("Add new credit notes"); ?></h3>

                    <p><?php _t("Which invoice do you want to affect with this credit note?"); ?></p>

                    <?php include "form_add_affect_invoice.php"; ?>

                    <br>
                    <br>
                    <br>
                    <br>
                    <br>

                    <?php include "form_add.php"; ?>

                </div>
                <div role="tabpanel" class="tab-pane" id="profile">...</div>


            </div>

        </div>




        <div class="col-lg-3">
            <?php //include view("credit_notes", "der"); ?>
        </div>






    </div>
</div>

<?php include view("home", "footer"); ?> 


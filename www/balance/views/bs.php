<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php //include view("balance", "izq_bs"); ?>
    </div>

    <div class="col-lg-10">
        <?php // include view("balance", "nav_bs"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php include view("balance", "bs"); ?>

        <?php
        $pagination->createHtml();
        ?>


    </div>
</div>

<?php include view("home", "footer"); ?> 


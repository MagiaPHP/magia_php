<?php //include("www/home/views/header.php");    ?>  
<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">       
        <?php //include view("budget_status", "izq"); ?>
    </div>

    <div class="col-sm-6 col-md-6 col-lg-6">

        <h1>
            <i class="fas fa-map-marker"></i>
            <?php _t("Budget_status edit"); ?>
        </h1>
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include view("budget_status", "form_edit"); ?>

    </div>

    <div class="col-sm-3 col-md-3 col-lg-3">


        <?php //include view("budget_status", "der"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>


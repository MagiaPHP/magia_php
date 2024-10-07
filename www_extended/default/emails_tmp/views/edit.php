<?php
# MagiaPHP 
# file date creation: 2024-01-25 
?>

<?php include view("home", "header"); ?>                

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">       
        <?php include view("emails_tmp", "izq_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-8 col-lg-8">

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>            
        <?php include view("emails_tmp", "form_edit"); ?>
    </div>

    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("emails_tmp", "der_edit"); ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

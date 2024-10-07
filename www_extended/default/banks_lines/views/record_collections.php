<?php
# MagiaPHP 
# file date creation: 2024-05-01 
?>
<?php include view("home", "header"); ?> 

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">



        <?php include "part_collections.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">        

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>



        <?php include "izq_record_collections.php"; ?>

    </div>

    <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">

        <?php //include "der_details.php";  ?>
    </div>
</div>

<?php include view("home", "footer"); ?>

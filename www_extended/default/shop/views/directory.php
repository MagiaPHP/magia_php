<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php //include "izq_address.php"; ?>
        <?php include "izq_myInfo.php"; ?>
    </div>
    <div class="col-xs-12 col-md-9 col-lg-9">        
        <?php include "nav_directory.php"; ?>

        <?php
        include "table_directory.php";
        ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
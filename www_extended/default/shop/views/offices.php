<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-0">
        <?php //include "izq_myInfo.php"; ?>
    </div>

    <div class="col-md-2">
        <?php include "izq_myOffices.php"; ?>
    </div>

    <div class="col-xs-12 col-md-10 col-lg-10">             
        <?php include "nav_offices.php"; ?>   
        <?php include "table_offices.php"; ?>
    </div>      
</div>
<?php include view("home", "footer"); ?>
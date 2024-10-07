<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-2">
        <?php include "izq_produits.php"; ?>
    </div>

    <div class="col-xs-10 col-md-10 col-lg-10">             
        <?php include "nav_produits.php"; ?>   

        <?php // include "table_products.php"; ?>
        <?php include "cc_products.php"; ?>
    </div>      
</div>
<?php include view("home", "footer"); ?>
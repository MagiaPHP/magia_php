<?php include view("home", "header"); ?>
<div class="row">

    <div class="col-md-3">
        <?php include "izq_produit.php"; ?>
    </div>


    <div class="col-xs-6 col-md-6 col-lg-6">             
        <?php //include "nav_produits.php" ; ?>   


        <?php include "products_form_edit.php"; ?>
    </div> 


    <div class="col-md-3">
        <?php include "der_produit.php"; ?>
    </div>



</div>
<?php include view("home", "footer"); ?>
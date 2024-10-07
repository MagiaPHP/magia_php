<?php include view("home", "header"); ?>

<div class="row">
    <div class="col-md-2">
        <?php include "izq_orders.php"; ?>
    </div> 

    <div class="col-xs-10 col-md-10 col-lg-10"> 

        <?php // include "nav_orders.php" ; ?>

        <?php
        if ($a == "ordersSearch") {
            //  echo '<h4><div class="alert alert-info" role="alert">Search '.$search.' in '.$where.'</div></h4>'; 
//            echo vardump($search); 
//            echo vardump($w); 
//            echo vardump($where); 
        }
        //echo vardump(users_can_see_others_offices($u_id)); 
        //vardump(permissions_has_permission($u_id, "shop_offices", "read")); 
        ?>



        <?php
        include "nav_orders.php";

        if ($orders) {
            // menu de busqueda 
            //include "nav_orders.php";
            include "table_orders.php";
        } else {
            message("info", "No items");
        }
        ?>



    </div>
    <div class="col-md-3">
        <?php include "der_index.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
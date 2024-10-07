<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-xs-12 col-md-3 col-lg-3">
        <?php include "izq_chat.php"; ?>
    </div> 

    <div class="col-xs-12 col-md-6 col-lg-6"> 

        <?php include "nav_chat.php"; ?>

    </div>
    <div class="col-xs-12 col-md-3 col-lg-3"> 
        <?php include "der_chat.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
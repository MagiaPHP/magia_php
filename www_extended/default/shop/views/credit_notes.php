<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-2">
        <?php include "izq_credit_notes.php"; ?>
    </div>
    <div class="col-xs-12 col-md-10 col-lg-10">             
        <?php include "nav_credit_notes.php"; ?>   
        <?php
        if (empty($credit_notes)) {
            message("info", "No items");
        } else {
            include "table_credit_notes.php";
        }
        ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
<?php include view("home", "header"); ?>
<div class="row">
    <?php
    /*  <div class="col-md-3">
      <?php include "izq_contacts.php"; ?>
      </div>
     */
    ?>
    <div class="col-xs-12 col-md-12 col-lg-12">             
        <?php // include "nav_patients.php"; ?>   


        <?php
        if ($patients) {
            include "table_patients.php";
        } else {
            message('info', 'No items');
        }
        ?>
    </div>      
</div>
<?php include view("home", "footer"); ?>
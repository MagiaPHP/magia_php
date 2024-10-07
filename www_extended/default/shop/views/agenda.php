<?php include view("home", "header"); ?>
<div class="row">


    <div class="col-xs-12 col-md-12 col-lg-12">             
        <?php include "nav_agenda.php"; ?>   

        <?php
        if ($agenda) {
            include "table_agenda.php";
        } else {
            message('info', 'No items');
        }
        ?>
    </div>      
</div>
<?php include view("home", "footer"); ?>
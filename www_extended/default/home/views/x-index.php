<?php include "header.php"; ?>  

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include "izq.php"; ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

        <?php include "nav.php"; ?>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php //include "page_index.php"; ?>

    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include "der.php"; ?>
    </div>
</div>

<?php //include view("home", "footer_about"); ?> 



<?php include "footer.php"; ?> 


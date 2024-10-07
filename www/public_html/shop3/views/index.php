<?php include "header.php"; ?>  

<?php include "nav.php"; ?>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <?php include "izq.php"; ?>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">

            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>




            <?php
            include "items.php";
            ?>

        </div>
        <div class="col-xs-0 col-sm-0 col-md-0 col-lg-0">
            <?php //include "der_index.php"; ?>
        </div>
    </div>
</div>

<?php include ("footer.php"); ?> 


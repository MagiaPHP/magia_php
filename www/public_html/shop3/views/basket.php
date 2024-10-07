<?php include "header.php"; ?>  
<?php include "nav.php"; ?>
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq.php"; ?>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <hr>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <h1>part_basket.php</h1>
        <?php
        include "part_basket.php";
        ?>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der.php"; ?>
    </div>
</div>
<?php include ("footer.php"); ?> 


<?php include "header.php"; ?>  
<?php include "nav.php"; ?>

<div class="container">


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">

            <?php
            if ($_REQUEST) {
                foreach ($error as $key => $value) {
                    message("info", "$value");
                }
            }
            ?>

            <?php
            include "part_details.php";
            ?>

        </div>

        <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            <?php include "der_details.php"; ?>
        </div>

    </div>

</div>

<div class="container">
</div>





<?php include ("footer.php"); ?> 


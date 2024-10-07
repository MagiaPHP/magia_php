<p>Formtar FACTUX</p>
<?php # export format factux ?>
<div class="row">
    <div class="col-sm-8 col-md-8 col-lg-8">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        if ($invoices['date'] == null) {
            echo message('info', 'This invoice has no date');
        }
        ?>


        <?php include "page_details.php"; ?>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der.php"; ?> 
    </div>
</div>
<?php
// export format factux ?>
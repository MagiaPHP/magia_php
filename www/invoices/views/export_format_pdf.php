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


        <iframe width="100%" height="1000" src="http://localhost/jiho_23/index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>&lang=en_GB"></iframe>

    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der_export_pdf.php"; ?> 
    </div>
</div>
<?php
// export format factux ?>
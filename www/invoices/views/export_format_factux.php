
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

        <h1>Factux code for export invoice</h1>

        <p>Solo copie el siguiente codigo y envie a su cliente usuario de factux</p>

        <form>
            <div class="form-group">
                <label for="code">Factux Code</label>
                <input 
                    value="<?php echo $uuid_h; ?>"
                    type="text" class="form-control" id="code" placeholder="">
            </div>




            <button type="submit" class="btn btn-default">Submit</button>
        </form>

        <hr>

        <?php
//        vardump($export);
//        vardump(($uuid));
//        vardump($uuid_h);
//        vardump($uuid_r);
        vardump($inv->exportJson());

        vardump($inv->importFromJson($inv->exportJson()));
        ?>





    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php include "der_export_factux.php"; ?> 
    </div>
</div>
<?php
// export format factux ?>
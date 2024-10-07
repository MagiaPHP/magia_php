<?php include view("home", "header"); ?>
<div class="row">
    <div class="col-md-3">
        <?php //include "izq_orders.php"; ?>
    </div>
    <div class="col-md-6">  
        <?php // include "nav_order_details.php"; ?>
        <p><?php _t("Please send the file"); ?></p>
        <div class="panel panel-primary">
            <div class="panel-heading"><?php echo _t("Order file list"); ?></div>
            <div class="panel-body">
                <?php // include "formOrderAddFiles.php"; ?>
                <?php include "formFilesAdd.php"; ?>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading"><?php echo _t("Order file list"); ?></div>
            <div class="panel-body">
                <table class="table table-bordered">
                    <tr>
                        <td><?php include "filesListLeft.php"; ?></td>
                        <td><?php include "filesListRight.php"; ?></td>                        
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <?php //include "der_orderDetails.php"; ?>
    </div>
</div>
<?php include view("home", "footer"); ?>
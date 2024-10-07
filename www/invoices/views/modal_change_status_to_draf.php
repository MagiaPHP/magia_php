<!-- Button trigger modal -->
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#ok_change_status">
    <?php _t("Edit"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="ok_change_status" tabindex="-1" role="dialog" aria-labelledby="ok_change_statusLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="ok_change_statusLabel">
                    <?php _t("Change to registred"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Change to draft status"); ?></h3>

                <p>
                    <?php _t("An invoice with draft status the customer can NOT see this invoice via the system"); ?>
                </p>


                <form class="form-inline" method="post" action="index.php">

                    <input type="hidden" name="c" value="invoices">
                    <input type="hidden" name="a" value="ok_change_status">
                    <input type="hidden" name="status_code" value="0">
                    <input type="hidden" name="invoice_id" value="<?php echo $invoices['id']; ?>">


                    <button type="submit" class="btn btn-danger">
                        <?php echo _t("Ok, change"); ?>
                    </button>

                </form>





            </div>
        </div>
    </div>
</div>  
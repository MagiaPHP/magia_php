
<button 
<?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>
    type="button" 
    class="btn btn-primary btn-xm" 
    data-toggle="modal" 
    data-target="#infoForInvoices_<?php echo "$banks_list_by_contact_id[id]"; ?>">

    <?php echo icon("ok"); ?>


</button>

<!-- Modal -->
<div class="modal fade" id="infoForInvoices_<?php echo "$banks_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="infoForInvoices_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="infoForInvoices_Label">
                    <?php _t("Default bank account"); ?>
                    <?php echo "$banks_list_by_contact_id[id]"; ?>
                </h4>

            </div>

            <div class="modal-body">

                <h3><?php _t("Info"); ?></h3>

                <p><?php _t("This is the account that is printed on each document that you send to your clients so that they can pay your invoices"); ?></p>



            </div>




        </div>
    </div>
</div>

<button 
<?php echo ($banks_list_by_contact_id['status'] == 0 ) ? " disabled " : ""; ?>

    type="button" 
    class="btn btn-default btn-xm" 
    data-toggle="modal" 
    data-target="#setForInvoices_<?php echo "$banks_list_by_contact_id[id]"; ?>">
        <?php echo icon("remove"); ?>
        <?php // _t("Change"); ?>
</button>

<div class="modal fade" id="setForInvoices_<?php echo "$banks_list_by_contact_id[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="setForInvoices_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="setForInvoices_Label">
                    <?php _t("Default bank account"); ?>
                    <?php echo "$banks_list_by_contact_id[id]"; ?>
                </h4>

            </div>

            <div class="modal-body">

                <h1><?php _t("Set for invoices"); ?></h1>

                <?php
                message("danger", 'Attention, you are going to change the information of the bank account where you receive the payments.');
                ?>

                <p><?php _t(" This information is in all the documents that you send to your clients."); ?></p>

                <p><?php _t('Are you sure you want to change this information in all documents?'); ?></p>

                <?php include "form_banks_set_for_invoices.php"; ?>


            </div>




        </div>
    </div>
</div>
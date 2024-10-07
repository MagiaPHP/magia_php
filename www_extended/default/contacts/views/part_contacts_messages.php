<div class="row">    
    <div class="col-sm-12 col-md-9 col-lg-9">  
        <?php include "nav_contacts_messages.php"; ?>

        <?php include "Comments"; ?>

        <?php include "table_contacts_messages.php"; ?>


    </div>
    <div class="col-sm-12 col-md-3 col-lg-3">                
        <?php include "der_contacts_orders.php"; ?>

    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="contact_orders" tabindex="-1" role="dialog" aria-labelledby="contact_orders">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="contact_orders"><?php _t("Addresses"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_address_add.php"; ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>


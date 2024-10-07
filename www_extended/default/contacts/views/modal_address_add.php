

<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contacts_address_add">
    <span class="glyphicon glyphicon-plus-sign"></span>
    <?php _t("Add new"); ?>
</button>



<div class="modal fade" id="contacts_address_add" tabindex="-1" role="dialog" aria-labelledby="contacts_address_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_address_addLabel">
                    <?php _t("Add new address"); ?>                
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_address_add.php"; ?>
            </div>
        </div>
    </div>
</div>


<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#contacts_email_add">
    <?php _t("Add email"); ?>
</button>



<div class="modal fade" id="contacts_email_add" tabindex="-1" role="dialog" aria-labelledby="contacts_email_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_email_addLabel">
                    <?php _t("Add email"); ?>                
                </h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_email_add.php"; ?>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
}
?>


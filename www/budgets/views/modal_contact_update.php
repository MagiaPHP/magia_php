<button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#modal_contact_update">
    <?php _t("Change"); ?>
</button>


<div class="modal fade" id="modal_contact_update" tabindex="-1" role="dialog" aria-labelledby="modal_contact_update">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_contact_update"><?php _t("New contact"); ?></h4>
            </div>
            <div class="modal-body">
                <h2><?php _t("Choose a new contact"); ?> </h2>                         


                <?php
//                if (updates_check_code_check(2)) {
//                    include view('budgets', 'form_contact_update');
//                } else {
//                    include view('updates', 'code_check_error');
//                }
                ?>
                <p></p>
            </div>
        </div>
    </div>
</div>
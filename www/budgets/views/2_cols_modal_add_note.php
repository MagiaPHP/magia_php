<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#add_note">
    <?php echo icon('comment'); ?>
    <?php _t("Add note"); ?>
</button>

<div class="modal fade" id="add_note" tabindex="-1" role="dialog" aria-labelledby="add_noteLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="add_noteLabel">
                    <?php _t("Add note"); ?>
                </h4>
            </div>

            <div class="modal-body"> 

                <?php
                include "2_cols_form_add_note.php";
                ?>
            </div>                       
        </div>
    </div>
</div>
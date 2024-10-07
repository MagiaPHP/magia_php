<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_project_update">
    <span class="glyphicon glyphicon-plus-sign"></span> <?php _t("Add to project"); ?>
</button>


<div class="modal fade" id="modal_project_update" tabindex="-1" role="dialog" aria-labelledby="modal_project_updateLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                <h4 class="modal-title" id="modal_project_updateLabel"><?php _t("Add to project"); ?></h4>

            </div>
            <div class="modal-body">
                <?php
                include "form_project_update.php";
                ?>
            </div>


        </div>
    </div>
</div>
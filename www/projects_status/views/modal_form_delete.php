
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#projects_status_delete_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Delete"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="projects_status_delete_" tabindex="-1" role="dialog" aria-labelledby="projects_status_delete_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="projects_status__delete_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include views("projects_status", "form_delete", $arg = ["redi" => 1]); ?>
            </div>


        </div>
    </div>
</div>
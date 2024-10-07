
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#services_categories_edit_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Edit"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="services_categories__edit_" tabindex="-1" role="dialog" aria-labelledby="services_categories_edit_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="services_categories_edit_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include views("services_categories", "form_edit", $arg = ["redi" => 1]); ?>
            </div>


        </div>
    </div>
</div>
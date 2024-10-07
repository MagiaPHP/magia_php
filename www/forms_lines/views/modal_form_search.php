
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#forms_lines_search_">
    <span class="glyphicon glyphicon-plus"></span> 
    <?php _t("Search"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="forms_lines__search_" tabindex="-1" role="dialog" aria-labelledby="forms_lines_search_Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="forms_lines_search_Label"> <?php _t("Add"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include views("forms_lines", "form_search", $arg = ["redi" => 1]); ?>
            </div>



        </div>
    </div>
</div>
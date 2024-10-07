<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal_project_insert">
    <?php echo icon("plus-sign"); ?>
    <?php _t("Add to project"); ?>
</button>


<div class="modal fade" id="modal_project_insert" tabindex="-1" role="dialog" aria-labelledby="modal_project_insertLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal_project_insertLabel">
                    <?php _t("Add to project"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h3><?php _t("Lista de projectos"); ?></h3>
                <?php
                include "form_project_insert.php";
                ?>
            </div>


        </div>
    </div>
</div>
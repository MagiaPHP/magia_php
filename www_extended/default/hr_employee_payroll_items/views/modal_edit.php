
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">
    <?php echo icon("pencil"); ?>
    <?php // _t("Delete"); ?>
</button>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php _t("Edit"); ?>
                </h4>
            </div>
            <div class="modal-body">
                ...

                <?php vardump($params); ?>


            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
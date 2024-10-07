
<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#myModal">
    <?php echo icon("trash"); ?>
</button>


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php echo _t("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Are you sure you want to delete"); ?>?
                </h4>
            </div>
            <div class="modal-footer">

                <a class="btn btn-danger" 
                   href="<?php echo $params; ?>">
                       <?php echo icon("trash"); ?>
                       <?php _t("Delete"); ?>
                </a>

            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filesAddRigtht">
    <?php echo _t("Add file rigth side"); ?>
</button>


<div class="modal fade" id="filesAddRigtht" tabindex="-1" role="dialog" aria-labelledby="filesAddRigthtLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="filesAddRigthtLabel">
                    <?php echo _t("Add file Right side"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "formFilesAddRightSide.php"; ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
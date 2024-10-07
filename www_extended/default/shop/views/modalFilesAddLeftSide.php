<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filesAdd">
    <?php echo _t("Add file left side"); ?>
</button>


<div class="modal fade" id="filesAdd" tabindex="-1" role="dialog" aria-labelledby="filesAddLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="filesAddLabel">
                    <?php echo _t("Add file left side"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "formFilesAddLeftSide.php"; ?>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>


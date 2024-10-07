<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filesList">
    <?php echo _t("see"); ?>
</button>

<div class="modal fade" id="filesList" tabindex="-1" role="dialog" aria-labelledby="filesListLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="filesListLabel">
                    <?php echo _t("Files"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "listFiles.php"; ?>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
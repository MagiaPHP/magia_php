<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#filesAddStereo">
    <?php echo _t("Add file STEREO"); ?>
</button>


<div class="modal fade" id="filesAddStereo" tabindex="-1" role="dialog" aria-labelledby="filesAddStereoLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="filesAddStereoLabel">
                    <?php echo _t("Add file Stereo"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include "formFilesAddStereoSide.php"; ?>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#remake">
    <?php echo _t("Yes, remake now"); ?>
</button>

<div class="modal fade" id="remake" tabindex="-1" role="dialog" aria-labelledby="remakeLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="remakeLabel">
                    <?php echo _t("Remake order"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <h3><?php _t("Please chosse the delivery option"); ?></h3>
                <?php include "tabRemake.php"; ?>
            </div>
        </div>
    </div>
</div>
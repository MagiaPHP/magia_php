
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#part_details_cancel">
    <?php echo icon("remove") ?>
    <?php _t("Cancel"); ?>
</button>


<div class="modal fade" id="part_details_cancel" tabindex="-1" role="dialog" aria-labelledby="part_details_cancelLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="part_details_cancelLabel">
                    <?php _t("Cancel"); ?>
                </h4>
            </div>
            <div class="modal-body">


                <?php include "part_details_cancel.php"; ?>


            </div>


        </div>
    </div>
</div>
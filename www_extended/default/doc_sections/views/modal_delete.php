<!-- Button trigger modal -->
<button type="button" class="btn btn-danger btn-md" data-toggle="modal" data-target="#myModal_delete">
    <?php echo icon("trash"); ?>
    <?php _t("Delete"); ?>
</button>

<!-- Modal -->
<div class="modal fade" id="myModal_delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">
                    <?php _t("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Are you sure you want to delete"); ?> ?

                </h4>

                <?php include 'form_delete.php'; ?>



            </div>
        </div>
    </div>
</div>
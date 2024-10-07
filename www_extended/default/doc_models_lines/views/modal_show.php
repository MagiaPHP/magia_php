
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_show_<?php echo $doc_sections["section"]; ?>">
    <?php echo icon("ok-circle"); ?>

</button>

<div class="modal fade" id="myModal_show_<?php echo $doc_sections["section"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_show_<?php echo $doc_sections["section"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_show_<?php echo $doc_sections["section"]; ?>Label">
                    <?php _t("Show"); ?>
                </h4>
            </div>
            <div class="modal-body">
                <?php include 'form_show.php'; ?>
            </div>
        </div>
    </div>
</div>
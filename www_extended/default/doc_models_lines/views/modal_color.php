
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_color_<?php echo $doc_sections["section"]; ?>">
    <?php echo icon("tint"); ?>

</button>

<div class="modal fade" id="myModal_color_<?php echo $doc_sections["section"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_color_<?php echo $doc_sections["section"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_color_<?php echo $doc_sections["section"]; ?>Label">
                    <?php _t("Color"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <p>
                    <?php _t("Color the cell background"); ?>
                </p>

                <?php include 'form_color.php'; ?>
            </div>
        </div>
    </div>
</div>





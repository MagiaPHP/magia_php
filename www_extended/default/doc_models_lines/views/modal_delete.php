
<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_delete_<?php echo $doc_sections["section"]; ?>">
    <?php echo icon("trash"); ?>
</button>

<div class="modal fade" id="myModal_delete_<?php echo $doc_sections["section"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_delete_<?php echo $doc_sections["section"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_delete_<?php echo $doc_sections["section"]; ?>Label">
                    <?php _t("Delete"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Choose the cells you want to delete"); ?>
                </h4>


                <?php
                include 'form_delete.php';
                ?>




            </div>
        </div>
    </div>
</div>




<button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal_chage_order_by_<?php echo $doc_sections["section"]; ?>">
    <?php echo icon("sort-by-order"); ?>
</button>

<div class="modal fade" id="myModal_chage_order_by_<?php echo $doc_sections["section"]; ?>" tabindex="-1" role="dialog" aria-labelledby="myModal_chage_order_by_<?php echo $doc_sections["section"]; ?>Label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModal_chage_order_by_<?php echo $doc_sections["section"]; ?>Label">
                    <?php _t("Change order"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Change the order of the elements"); ?>
                </h4>


                <?php
                include 'form_change_order_by.php';
                ?>




            </div>
        </div>
    </div>
</div>



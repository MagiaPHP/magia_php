<button 
    type="button" 
    class ="btn btn-danger btn-sm" 
    data-toggle="modal" 
    data-target="#offices_delete_<?php echo "$office[id]"; ?>"

    >
    <span class="glyphicon glyphicon-trash"></span>
    <?php echo _t("Delete"); ?>
</button>

<div class="modal fade" id="offices_delete_<?php echo "$office[id]"; ?>" tabindex="-1" role="dialog" aria-labelledby="offices_delete_<?php echo "$office[id]"; ?>Label">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="offices_delete_<?php echo "$office[name]"; ?>Label">
                    <?php _t("Delete office"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h2><?php _t("Are you sure?"); ?></h2>

                <?php include "form_offices_delete.php"; ?>
            </div>
        </div>
    </div>
</div>
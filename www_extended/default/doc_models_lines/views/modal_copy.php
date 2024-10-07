<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#copyItem">
    <span class="glyphicon glyphicon-duplicate"></span>
    <?php _t("Copy"); ?>
</button>


<div class="modal fade" id="copyItem" tabindex="-1" role="dialog" aria-labelledby="copyItemLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="copyItemLabel">
                    <?php _t("Copy item"); ?> <?php echo $id; ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Make a copy from this item"); ?>
                </h4>

            </div>

            <div class="modal-footer">
                <a href="index.php?c=doc_models_lines&a=ok_copy&id=<?php echo $id; ?>&redi[redi]=3&redi[c]=doc_models&redi[a]=edit" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-duplicate"></span>
                    <?php _t("Copy"); ?>
                </a>
            </div>


        </div>
    </div>
</div>

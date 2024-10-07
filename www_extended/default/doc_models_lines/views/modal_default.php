<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#defaultItem">
    <span class="glyphicon glyphicon-list-alt"></span>
    <?php _t("Default"); ?>
</button>


<div class="modal fade" id="defaultItem" tabindex="-1" role="dialog" aria-labelledby="defaultItemLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="defaultItemLabel">
                    <?php _t("By default"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <h4>
                    <?php _t("Make this new values by default"); ?>
                </h4>
            </div>

            <div class="modal-footer">
                <a href="index.php?c=doc_models_lines&a=ok_default&id=<?php echo $id; ?>&element=<?php echo $element['element']; ?>&redi[redi]=3&redi[c]=doc_models&redi[a]=edit" type="button" class="btn btn-primary">
                    <span class="glyphicon glyphicon-list-alt"></span>
                    <?php _t("Default"); ?>
                </a>
            </div>


        </div>
    </div>
</div>

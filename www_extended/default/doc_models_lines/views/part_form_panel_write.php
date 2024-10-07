<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Write"); ?>
    </div>
    <div class="panel-body">


        <div class="form-group">
            <label for="name"><?php _t("Cell name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="" 
                value="<?php echo ( ($element['name'])) ?? ''; ?>"
                >
        </div>


        <div class="form-group">
            <label for="label"><?php _t("Text in PDF"); ?></label>


            <a href="" data-toggle="modal" data-target="#myModalHelpWrite">
                <span class="glyphicon glyphicon-question-sign"></span>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="myModalHelpWrite" tabindex="-1" role="dialog" aria-labelledby="myModalHelpWriteLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalHelpWriteLabel">
                                <?php _t("Pdf tags"); ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php include view("doc_models", "help_cell"); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <input 
                type="text" 
                class="form-control" 
                name="Write[label]" 
                id="label" 
                placeholder="" 
                value="<?php echo ( ($params['Write']['label'])) ?? ''; ?>">
        </div>



        <div class="form-group">
            <label for="link"><?php _t("Link"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="Write[link]" 
                id="link" 
                placeholder="htts://" 
                value="<?php echo ( ($params['Write']['link'])) ?? ''; ?>"
                >
        </div>



        <div class="form-group">
            <label for="h"><span class="glyphicon glyphicon-resize-vertical"></span><?php _t("Height"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Write[h]" 
                id="h" 
                placeholder="" 
                value="<?php echo ( ($params['Write']['h'])) ?? ''; ?>"
                >
        </div>



        <div class="form-group">
            <label>

                <input 
                    type="checkbox" 
                    name="Write[hidden]" 
                    value="1"
                    <?php echo ( isset($params['Write']['hidden']) && $params['Write']['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>

            </label>
        </div>

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Link"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="name"><?php _t("Name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="<?php echo $element['name']; ?>" 
                value="<?php echo $element['name']; ?>"
                >
        </div>



        <div class="form-group">
            <label for="label"><?php _t("Text in PDF"); ?></label>


            <a href="" data-toggle="modal" data-target="#myModalHelpLink">
                <span class="glyphicon glyphicon-question-sign"></span>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="myModalHelpLink" tabindex="-1" role="dialog" aria-labelledby="myModalHelpLinkLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalHelpLinkLabel">
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
                name="Link[label]" 
                id="label" 
                placeholder="<?php echo $params['Link']['label']; ?>" 
                value="<?php echo $params['Link']['label']; ?>">
        </div>

        <hr>


        <div class="form-group">
            <label for="x">X <?php _t("From left"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Link[x]" 
                id="x" 
                placeholder="<?php echo $params['Link']['x']; ?>" 
                value="<?php echo $params['Link']['x']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="y">Y <?php _t("From top"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Link[y]" 
                id="y" 
                placeholder="<?php echo $params['Link']['y']; ?>" 
                value="<?php echo $params['Link']['y']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="w">W <?php _t("With"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Link[w]" 
                id="w" 
                placeholder="<?php echo $params['Link']['w']; ?>" 
                value="<?php echo $params['Link']['w']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="h"><span class="glyphicon glyphicon-resize-vertical"></span> H <?php _t("height"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Link[h]" 
                id="h" 
                placeholder="<?php echo $params['Link']['h']; ?>" 
                value="<?php echo $params['Link']['h']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="link"><?php _t("Link"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="Link[link]" 
                id="link" 
                placeholder="<?php echo $params['Link']['link']; ?>" 
                value="<?php echo $params['Link']['link']; ?>"
                >
        </div>

        <div class="form-group">
            <label>

                <input 
                    type="checkbox" 
                    name="Link[hidden]" 
                    value="1"
                    <?php echo ($params['Link']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>

            </label>
        </div>

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
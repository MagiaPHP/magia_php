<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Ln"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="name"><?php _t("Ln name"); ?></label>
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
            <label for="h"><span class="glyphicon glyphicon-resize-vertical"></span> H 
                <?php _t("height"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Ln[h]" 
                id="h" 
                placeholder="" 
                value="<?php echo ( ($params['Ln']['h'])) ?? ''; ?>"
                >
        </div>


        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="Ln[hidden]" 
                    value="1"
                    <?php echo ( isset($params['Ln']['hidden']) && $params['Ln']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > 
                    <?php _t("Hide the Ln"); ?>
            </label>
        </div>



        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
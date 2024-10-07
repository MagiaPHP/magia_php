<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-text-background"></span> 

        <?php _t("Cell background color"); ?>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="r">R (<?php echo ( ($params['SetFillColor']['r'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="r" name="SetFillColor[r]" placeholder="0-255" 
                           value="<?php echo (($params['SetFillColor']['r'])) ?? ''; ?>"

                           >
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="g">G (<?php echo ( ($params['SetFillColor']['g'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="g" name="SetFillColor[g]" placeholder="0-255"
                           value="<?php echo (($params['SetFillColor']['g'])) ?? ''; ?>"

                           >
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="b">B (<?php echo ( ($params['SetFillColor']['b'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="b" name="SetFillColor[b]" placeholder="0-255"
                           value="<?php echo (($params['SetFillColor']['b'])) ?? ''; ?>"

                           >
                </div>
            </div>

        </div>

        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
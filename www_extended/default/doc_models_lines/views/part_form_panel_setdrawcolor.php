<div class="panel panel-default">
    <div class="panel-heading">

        <?php _t("Cell border color"); ?>

    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="r">R (<?php echo ( ($params['SetDrawColor']['r'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="r" name="SetDrawColor[r]" placeholder="0-255"
                           value="<?php echo (($params['SetDrawColor']['r'])) ?? ''; ?>"

                           >
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="g">G (<?php echo ( ($params['SetDrawColor']['g'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="g" name="SetDrawColor[g]" placeholder="0-255"
                           value="<?php echo (($params['SetDrawColor']['g'])) ?? ''; ?>"

                           >
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="b">B (<?php echo ( ($params['SetDrawColor']['b'])) ?? ''; ?>)</label>
                    <input type="number" min="0" max="255" class="form-control" id="b" name="SetDrawColor[b]" placeholder="0-255"
                           value="<?php echo (($params['SetDrawColor']['b'])) ?? ''; ?>"

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
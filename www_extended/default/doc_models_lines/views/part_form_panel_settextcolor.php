<div class="panel panel-default">
    <div class="panel-heading">
        <span class="glyphicon glyphicon-text-color"></span> 

        <?php _t("Text color"); ?>
    </div>
    <div class="panel-body">

        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="r">
                        R : 
                        (<?php echo (($params['SetTextColor']['r'])) ?? '' ?>)

                    </label>

                    <input type="number" min="0" max="255" class="form-control" id="r" name="SetTextColor[r]" placeholder="0-255"
                           value="<?php echo (($params['SetTextColor']['r'])) ?? ''; ?>"
                           >


                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="g">
                        G :
                        (<?php echo ( ($params['SetTextColor']['g'])) ?? '' ?>)

                    </label>
                    <input type="number" min="0" max="255" class="form-control" id="g" name="SetTextColor[g]" placeholder="0-255"
                           value="<?php echo (($params['SetTextColor']['g'])) ?? ''; ?>"
                           >
                </div>
            </div>

            <div class="col-xs-12">
                <div class="form-group">
                    <label for="b">
                        B :
                        (<?php echo ( ($params['SetTextColor']['b'])) ?? '' ?>)
                    </label>
                    <input type="number" min="0" max="255" class="form-control" id="b" name="SetTextColor[b]" placeholder="0-255"
                           value="<?php echo (($params['SetTextColor']['b'])) ?? ''; ?>"
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
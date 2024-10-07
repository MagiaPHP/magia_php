<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Dash"); ?>
    </div>
    <div class="panel-body">


        <div class="row">
            <div class="col-xs-6">
                <label for="dash">
                    <?php _t("Dash line black"); ?>
                </label>
                <input 
                    type="number" 
                    name="Rect[dash][black]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Rect']['dash']['black'])) ?? 0; ?>"

                    >

            </div>
            <div class="col-xs-6">
                <label for="border">
                    <?php _t("Dash line white"); ?>
                </label>
                <input 
                    type="number" 
                    name="Rect[dash][white]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Rect']['dash']['white'])) ?? 0; ?>"
                    >
            </div>
        </div>

        <br>

        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>

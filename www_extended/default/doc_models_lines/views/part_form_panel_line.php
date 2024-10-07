<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Line"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="name"><?php _t("Line name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="<?php echo $element['name']; ?>" 
                value="<?php echo $element['name']; ?>"
                >
        </div>

        <?php
//        vardump($element); 
//        vardump(json_decode($element['params'], true)); 
        //vardump($params); 
        ?>

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="x1">X1 (<?php echo $params['Line']['x1'] ?>)</label>
                    <input type="number" class="form-control" id="x1" name="Line[x1]" placeholder="" 
                           value="<?php echo $params['Line']['x1'] ?>"
                           >
                </div>
            </div>
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="y1">Y1 (<?php echo $params['Line']['y1'] ?>)</label>
                    <input type="number" class="form-control" id="y1" name="Line[y1]" placeholder="" 
                           value="<?php echo $params['Line']['y1'] ?>"
                           >
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-4">
                <div class="form-group">
                    <label for="x2">X2 (<?php echo $params['Line']['x2'] ?>)</label>
                    <input type="number" class="form-control" id="x2" name="Line[x2]" placeholder="" 
                           value="<?php echo $params['Line']['x2'] ?>"
                           >
                </div>
            </div>

            <div class="col-xs-4">
                <div class="form-group">
                    <label for="y2">Y2 (<?php echo $params['Line']['y2'] ?>)</label>
                    <input type="number" class="form-control" id="y2" name="Line[y2]" placeholder="" 
                           value="<?php echo $params['Line']['y2'] ?>"
                           >
                </div>
            </div>
        </div>


        <div class="form-group">
            <label for="width">
                <?php _t("Width"); ?>
            </label>
            <input 
                type="text" 
                class="form-control" 
                name="Line[width]" 
                id="width" 
                placeholder="0.2 mm" 
                value="<?php echo ( ($params['Line']['width'])) ?? ''; ?>"
                >
        </div>



        <div class="row">
            <div class="col-xs-6">
                <label for="dash">
                    <?php _t("Dash line black"); ?>
                </label>
                <input 
                    type="number" 
                    name="Line[dash][black]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Line']['dash']['black'])) ?? 0; ?>"

                    >

            </div>
            <div class="col-xs-6">
                <label for="border">
                    <?php _t("Dash line white"); ?>
                </label>
                <input 
                    type="number" 
                    name="Line[dash][white]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Line']['dash']['white'])) ?? 0; ?>"
                    >
            </div>
        </div>

        <br>






        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="Line[hidden]" 
                    value="1"
                    <?php echo (isset($params['Line']['hidden']) && $params['Line']['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>
            </label>
        </div>

        <button type="submit" class="btn btn-default"><?php _t("Save"); ?></button>


    </div>
</div>
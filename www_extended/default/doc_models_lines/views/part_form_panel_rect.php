<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Rectangle"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="name"><?php _t("Rectangle name"); ?></label>
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
            <label for="x">X <?php _t("Distance from left margin"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Rect[x]" 
                id="x" 
                placeholder="<?php echo $params['Rect']['x']; ?>" 
                required=""
                value="<?php echo $params['Rect']['x']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="y">Y <?php _t("Distance from top margin"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Rect[y]" 
                id="y" 
                placeholder="<?php echo $params['Rect']['y']; ?>" 
                required=""
                value="<?php echo $params['Rect']['y']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="w">
                <?php _t("Width"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Rect[w]" 
                id="w" 
                placeholder="<?php echo $params['Rect']['w']; ?>" 
                required=""
                value="<?php echo $params['Rect']['w']; ?>"
                >
        </div>

        <div class="form-group">
            <label for="h">
                <span class="glyphicon glyphicon-resize-vertical"></span>
                H 
                <?php _t("Height"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Rect[h]" 
                id="h" 
                placeholder="<?php echo $params['Rect']['h']; ?>" 
                required=""
                value="<?php echo $params['Rect']['h']; ?>"
                >
        </div>



        <div class="form-group">
            <label for="style"><?php _t("Style"); ?></label>
            <?php
            $styles_items = array(
                "D" => "Draw the lines",
                "F" => "Color the interior",
            );
            foreach ($styles_items as $key_style => $style) {

                if ($params['Rect']['style']) {
                    $style_checked = (array_key_exists($key_style, $params['Rect']['style'])) ? ' checked="" ' : '';
                } else {
                    $style_checked = '';
                }

                echo '<div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            name="Rect[style][' . $key_style . ']" 
                            value="' . $key_style . '"
                            ' . $style_checked . '    
                            > ' . _tr($style) . '
                    </label>
                </div>';
            }
            ?>


        </div>

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




        <div class="form-group">
            <label for="corners"><?php _t("Corners"); ?></label>
            <?php
            $corners_items = array(
                "1" => "Corner 1 top left",
                "2" => "Corner 2 top right",
                "3" => "Corner 3 botton rigth",
                "4" => "Corner 4 botton left",
            );
            foreach ($corners_items as $key_corner => $corner) {

                if ($params['Rect']['corners']) {
                    $corner_checked = (array_key_exists($key_corner, $params['Rect']['corners'])) ? ' checked="" ' : '';
                } else {
                    $corner_checked = '';
                }

                echo '<div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            name="Rect[corners][' . $key_corner . ']" 
                            value="' . $key_corner . '"
                            ' . $corner_checked . '    
                            > ' . _tr($corner) . '
                    </label>
                </div>';
            }
            ?>


        </div>




        <?php
        //vardump($params['Rect']);
        ?>

        <br>
        <div class="form-group">
            <label for="x">X <?php _t("Radius"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Rect[corners][radius]" 
                id="x" 
                placeholder="<?php echo $params['Rect']['corners']['radius']; ?>" 
                required=""
                value="<?php echo $params['Rect']['corners']['radius'] ?? 0; ?>"
                >
        </div>




        <div class="form-group">
            <label>

                <input 
                    type="checkbox" 
                    name="Rect[hidden]" 
                    value="1"
                    <?php echo ($params['Rect']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>

            </label>
        </div>

        <button type="submit" class="btn btn-default">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
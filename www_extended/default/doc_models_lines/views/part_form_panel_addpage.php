<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("AddPage"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="orientation"><?php _t("Orientation"); ?></label>
            <select class="form-control" name="AddPage[orientation]" id="orientation">
                <?php
                $orientation = array("P" => "Portrait", "L" => "Landscape");
                foreach ($orientation as $key => $ori) {
                    $selected = ($key == $params['AddPage']['orientation'] ) ? ' selected="" ' : '';
                    echo '<option value="' . $key . '" ' . $selected . ' >' . $key . ' - ' . $ori . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="size"><?php _t("Sizes"); ?></label>
            <select class="form-control" name="AddPage[size]" id="size">
                <?php
                $sizes = array(
                    //    "A0" => "A0 (1189mm x 841mm)",
                    //    "A1" => "A1 (841mm x 594mm)",
                    //    "A2" => "A2 (594mm x 420mm)",
                    "A3" => "A3 (420mm x 297mm)",
                    "A4" => "A4 (297mm x 210mm)",
                    "A5" => "A5 (210mm x 148mm)",
                    //    "A6" => "A6 (148mm x 105mm)",
                    //    "A7" => "A7 (105mm x 74mm)",
                    //    "A8" => "A8 (74mm x 52mm)",
                    //    "A9" => "A9 (52mm x 37mm)",
                    //    "A10" => "A10 (37mm x 26mm)",
                    "Letter" => "Letter",
                    "Legal" => "Legal",
                );
                foreach ($sizes as $key => $size) {
                    $selected = ($key == $params['AddPage']['size'] ) ? ' selected="" ' : '';
                    echo '<option value="' . $key . '" ' . $selected . ' >' . $key . ' - ' . $size . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="rotation"><?php _t("rotation"); ?></label>
            <select class="form-control" name="AddPage[rotation]" id="rotation">
                <?php
                $rotation_items = array(
                    0 => "0",
                    90 => "90",
                    180 => "180",
                    360 => "360"
                );
                foreach ($rotation_items as $key => $rota) {
                    $selected = ($key == $params['AddPage']['rotation'] ) ? ' selected="" ' : '';
                    echo '<option value="' . $key . '" ' . $selected . ' >' . $key . ' - ' . $rota . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="AddPage[hidden]" 
                    value="1"
                    <?php echo ($params['AddPage']['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Hidden"); ?>
            </label>
        </div>


        <div class="form-group">
            <label for="order_by"><?php _t("Order by"); ?></label>
            <?php // vardump($params); ?>

            <input type="number" class="form-control" name="order_by" value="<?php echo $element['order_by']; ?>">
        </div>






        <button type="submit" class="btn btn-default">Submit</button>





    </div>
</div>
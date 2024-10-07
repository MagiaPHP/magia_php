<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Fonts"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="font"><?php _t("Fonts"); ?></label>

            <select class="form-control" name="SetFont[font]" id="font">
                <?php
                $fonts = array(
                    "Arial" => "Arial",
                    "Courier" => "Courier",
                    "Symbol" => "Symbol",
                    "Times" => "Times",
                    "ZapfDingbats" => "ZapfDingbats"
                );
                foreach ($fonts as $key => $font) {

                    if (isset($params['SetFont']['font'])) {
                        $selected = ($key == $params['SetFont']['font'] ) ? ' selected="" ' : '';
                    } else {
                        $selected = '';
                    }

                    echo '<option value = "' . $key . '" ' . $selected . ' >' . $font . '</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="format"><?php _t("Format"); ?></label>
            <?php
            $formats = array(
                "R" => "Regular",
                "B" => "Bold",
                "I" => "Italic",
                "U" => "Underlined",
            );
            foreach ($formats as $key => $format) {
                //
                if (isset($params['SetFont']['format'])) {
                    $checked = (array_key_exists($key, $params['SetFont']['format'])) ? ' checked = "" ' : '';
                } else {
                    $checked = '';
                }
                echo '<div class = "checkbox">
                        <label>
                        <input
                        type = "checkbox"
                        name = "SetFont[format][' . $key . ']"
                        value = "' . $key . '"
                        ' . $checked . '
                        > ' . _tr($format) . '
                        </label>
                        </div>';
            }
            ?>
            <input name="SetFont[format][R]" type="hidden" value="R"/>
        </div>

        <div class="form-group">
            <label for="fontsize"> <span class="glyphicon glyphicon-text-size"></span> <?php _t("Font size"); ?></label>
            <select class="form-control" name="SetFont[fontsize]" id="fontsize">
                <?php
                for ($i = 1; $i < 500; $i++) {

                    if (isset($params['SetFont']['fontsize'])) {
                        $selected = ($i == $params['SetFont']['fontsize'] ) ? ' selected = "" ' : '';
                    } else {
                        $selected = '';
                    }


                    echo '<option value = "' . $i . '" ' . $selected . '>' . $i . '</option>';
                }
                ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">
            <?php echo icon('ok'); ?>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>

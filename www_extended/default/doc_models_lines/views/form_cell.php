<?php
vardump($data_from_db);
?>

<form method="POST" action="index.php">
    <input type="hidden" name="c" value="<?php echo $cell['form']['c']; ?>">
    <input type="hidden" name="a" value="<?php echo $cell['form']['a']; ?>">

    <input type="hidden" name="redi[c]" value="<?php echo $cell['redi']['c']; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $cell['redi']['a']; ?>">


    <div class="form-group">
        <label for="label"><?php _t("Label"); ?></label>
        <input 
            type="text" 
            class="form-control" 
            name="label" 
            id="label" 
            placeholder="<?php echo $cell['label']; ?>" 
            value="<?php echo $cell['label']; ?>">
    </div>

    <hr>



    <div class="form-group">
        <label for="x">X <?php _t("From left"); ?></label>
        <input 
            type="number" 
            class="form-control" 
            name="x" 
            id="x" 
            placeholder="<?php echo $cell['x']; ?>" 
            value="<?php echo $cell['x']; ?>"
            >
    </div>

    <div class="form-group">
        <label for="y">Y <?php _t("From top"); ?></label>
        <input 
            type="number" 
            class="form-control" 
            name="y" 
            id="y" 
            placeholder="<?php echo $cell['y']; ?>" 
            value="<?php echo $cell['y']; ?>"
            >
    </div>

    <div class="form-group">
        <label for="w">W <?php _t("With"); ?></label>
        <input 
            type="number" 
            class="form-control" 
            name="w" 
            id="w" 
            placeholder="<?php echo $cell['w']; ?>" 
            value="<?php echo $cell['w']; ?>"
            >
    </div>

    <div class="form-group">
        <label for="h">H <?php _t("height"); ?></label>
        <input 
            type="number" 
            class="form-control" 
            name="h" 
            id="h" 
            placeholder="<?php echo $cell['h']; ?>" 
            value="<?php echo $cell['h']; ?>"
            >
    </div>


    <div class="form-group">
        <label for="border"><?php _t("Border"); ?></label>
        <select class="form-control" name="border">
            <?php
            $borders_items = array(
//                "0" => "No border",
//                "1" => "Border 4 side",
                "L" => "Left",
                "T" => "Top",
                "R" => "Right",
                "B" => "Bottom",
            );
            foreach ($borders_items as $key_border => $border) {
                $border_selected = ($key_border == $cell['border']) ? ' selected="" ' : '';
                echo '<option value="' . $key_border . '"  ' . $border_selected . '>' . _tr($border) . '</option>';
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label for="ln"><?php _t("Ln"); ?></label>

        <select class="form-control" name="ln">
            <?php
            $ln_items = array(
                "0" => "To the right",
                "1" => "To the beginning of the next line",
                "2" => "Below",
            );
            foreach ($ln_items as $key_ln => $ln) {
                $ln_selected = ($key_ln == $cell['ln']) ? ' selected="" ' : '';
                echo '<option value="' . $key_ln . '"  ' . $ln_selected . '>' . _tr($ln) . '</option>';
            }
            ?>
        </select>
    </div>



    <div class="form-group">
        <label for="align"><?php _t("Align"); ?></label>
        <select class="form-control" name="align">

            <?php
            $align_items = array(
                "L" => "Left align (default value)",
                "C" => "Center",
                "R" => "Right",
            );
            foreach ($align_items as $key_align => $align) {
                $align_selected = ($key_align == $cell['align']) ? ' selected="" ' : '';
                echo '<option value="' . $key_align . '"  ' . $align_selected . '>' . _tr($align) . '</option>';
            }
            ?>
        </select>
    </div>


    <div class="form-group">
        <label>
            <input 
                type="checkbox" 
                name="fill" 
                value="1"
                <?php echo ($cell['fill'] == 1 ) ? ' checked="" ' : ""; ?>
                > <?php _t("Fill"); ?>
        </label>
        <span id="helpBlock" class="help-block">
            Indicates if the cell background must be painted (true) or transparent (false). Default value: false. 
        </span>
    </div>
    <div class="form-group">
        <label>
            <input 
                type="checkbox" 
                name="hidden" 
                value="1"
                <?php echo ($cell['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                > <?php _t("Hidden"); ?>
        </label>
        <span id="helpBlock" class="help-block">
            <?php _t("Hidden"); ?>. 
        </span>
    </div>

    <button type="submit" class="btn btn-default">Submit</button>
</form>
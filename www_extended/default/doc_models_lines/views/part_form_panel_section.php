<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Section"); ?>
    </div>
    <div class="panel-body">

        <?php
        //vardump($element['modele']);
        ?>

        <div class="form-group">
            <label for="modele"><?php _t("Modele"); ?></label>
            <select class="form-control" name="modele" id="modele" disabled="">
                <?php
                foreach (doc_models_list() as $key => $modele) {
                    if (isset($element['modele'])) {
                        $doc_model_selected = ($modele['name'] == $element['modele'] ) ? ' selected="" ' : '';
                    } else {
                        $doc_model_selected = '';
                    }
                    echo '<option value="' . $modele['name'] . '" ' . $doc_model_selected . ' >' . $modele['name'] . '</option>';
                }
                ?>
            </select>
        </div>


        <?php
        //vardump($element['section']);
        ?>


        <div class="form-group">
            <label for="section"><?php _t("Section"); ?></label>
            <select class="form-control" name="section" id="section">
                <?php
                foreach (doc_sections_list() as $key => $section) {
                    if (isset($element['section'])) {
                        $section_selected = ($section['section'] == $element['section'] ) ? ' selected="" ' : '';
                    } else {
                        $section_selected = '';
                    }
                    echo '<option value="' . $section['section'] . '" ' . $section_selected . ' >' . $section['section'] . '</option>';
                }
                ?>
            </select>
        </div>



        <div class="form-group">
            <label for="order_by"><?php _t("Order by"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="order_by" 
                id="order_by" 
                placeholder="" 
                value="<?php echo ( ($element['order_by'])) ?? ''; ?>"
                >
        </div>



        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Foreach"); ?>
    </div>
    <div class="panel-body">
        <div class="form-group">
            <label for="name"><?php _t("Cell name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="" 
                value="<?php echo $element['name']; ?>"
                >
        </div>



        <div class="form-group">
            <label for="label"><?php _t("Label"); ?></label>


            <a href="" data-toggle="modal" data-target="#myModalHelpCell">
                <span class="glyphicon glyphicon-question-sign"></span>
            </a>

            <!-- Modal -->
            <div class="modal fade" id="myModalHelpCell" tabindex="-1" role="dialog" aria-labelledby="myModalHelpCellLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalHelpCellLabel">
                                <?php _t("Pdf tags"); ?>
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php // include view("doc_models", "tags_cell"); ?>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <input 
                type="text" 
                class="form-control" 
                name="Cell[label]" 
                id="label" 
                placeholder="" 
                value="<?php echo ( ($params['Cell']['label'])) ?? ''; ?>">
        </div>

        <div class="checkbox">
            <label>
                <input 
                    type="checkbox"
                    name="Cell[translate]"
                    <?php echo ( isset($params['Cell']['translate']) && $params['Cell']['translate']) ? " checked='true' " : " false "; ?>
                    > <?php _t('Translate'); ?>
            </label>
        </div>

        <hr>

        <div class="form-group">
            <label for="x">X <?php _t("Distance from left margin"); ?></label>
            <input 
                type="number" 
                class="form-control" 
                name="Cell[x]" 
                id="x" 
                placeholder="" 
                value="<?php echo (($params['Cell']['x'])) ?? ''; ?>"
                >
        </div>

        <div class="form-group">
            <label for="y">Y 
                <?php _t("Distance from top margin"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Cell[y]" 
                id="y" 
                placeholder="" 
                value="<?php echo ( ($params['Cell']['y'])) ?? ''; ?>"
                >
        </div>

        <div class="form-group">
            <label for="w">
                <?php _t("Cell width"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Cell[w]" 
                id="w" 
                placeholder="" 
                value="<?php echo ( ($params['Cell']['w'])) ?? ''; ?>"
                >
        </div>

        <div class="form-group">
            <label for="h">
                <span class="glyphicon glyphicon-resize-vertical"></span>
                <?php _t("Cell height"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="Cell[h]" 
                id="h" 
                placeholder="" 
                value="<?php echo ( ($params['Cell']['h'])) ?? ''; ?>"
                >
        </div>



        <div class="form-group">
            <label for="border">
                <?php _t("Cell borders"); ?>
            </label>
            <?php
            $borders_items = array(
//                "0" => "No border",
//                "1" => "Border 4 sides",
                "L" => "Left",
                "T" => "Top",
                "R" => "Right",
                "B" => "Bottom",
            );

            foreach ($borders_items as $key_border => $border) {

                $checked = (isset($params['Cell']['border']) && array_key_exists($key_border, $params['Cell']['border'])) ? ' checked="" ' : '';

                echo '<div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            name="Cell[border][' . $key_border . ']" 
                            value="' . $key_border . '"
                            ' . $checked . '    
                            > ' . _tr($border) . '
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
                    name="Cell[dash][black]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Cell']['dash']['black'])) ?? 0; ?>"

                    >

            </div>
            <div class="col-xs-6">
                <label for="border">
                    <?php _t("Dash line white"); ?>
                </label>
                <input 
                    type="number" 
                    name="Cell[dash][white]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['Cell']['dash']['white'])) ?? 0; ?>"
                    >
            </div>
        </div>

        <br>

        <div class="form-group">
            <label for="ln"><?php //_t("Ln");              ?> 
                <?php _t("Next cell position"); ?>
            </label>

            <select class="form-control" name="Cell[ln]">
                <?php
                $ln_items = array(
                    "0" => "To the right",
                    "1" => "To the beginning of the next line",
                    "2" => "Below",
                );
                foreach ($ln_items as $key_ln => $ln) {
                    $ln_selected = ($key_ln == $params['Cell']['ln']) ? ' selected="" ' : '';
                    echo '<option value="' . $key_ln . '"  ' . $ln_selected . '>' . _tr($ln) . '</option>';
                }
                ?>
            </select>
        </div>



        <div class="form-group">
            <label for="align"><?php // _t("Align");              ?> 
                <?php _t("Alignment of text within the cell"); ?>
            </label>
            <select class="form-control" name="Cell[align]">

                <?php
                $align_items = array(
                    "L" => "Left align (default value)",
                    "C" => "Center",
                    "R" => "Right",
                );
                foreach ($align_items as $key_align => $align) {
                    $align_selected = ($key_align == $params['Cell']['align']) ? ' selected="" ' : '';
                    echo '<option value="' . $key_align . '"  ' . $align_selected . '>' . _tr($align) . '</option>';
                }
                ?>
            </select>
        </div>




        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="Cell[fill]" 
                    value="1"
                    <?php echo (isset($params['Cell']['fill']) && $params['Cell']['fill'] == 1 ) ? ' checked="" ' : ""; ?>
                    > <?php _t("Color the cell background"); ?>
            </label>
            <span id="helpBlock" class="help-block">
                <?php //_t("Color the cell background"); ?>
            </span>
        </div>

        <div class="form-group">
            <label for="link"><?php _t("Link"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="Cell[link]" 
                id="link" 
                placeholder="http://www" 
                value="<?php echo $params['Cell']['link']; ?>"
                >
        </div>

        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="Cell[hidden]" 
                    value="1"
                    <?php echo ( isset($params['Cell']['hidden']) && $params['Cell']['hidden'] ) ? ' checked="" ' : ""; ?>
                    > 
                    <?php _t("Hide the cell"); ?>
            </label>
        </div>

        <button type="submit" class="btn btn-primary">
            <span class="glyphicon glyphicon-floppy-disk"></span>
            <?php _t("Save"); ?>
        </button>

    </div>
</div>
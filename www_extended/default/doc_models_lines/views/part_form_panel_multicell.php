<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("MultiCell"); ?>
    </div>
    <div class="panel-body">

        <div class="form-group">
            <label for="name"><?php _t("Cell name"); ?></label>
            <input 
                type="text" 
                class="form-control" 
                name="name" 
                id="name" 
                placeholder="<?php echo $element['name']; ?>" 
                value="<?php echo $element['name']; ?>"
                >
        </div>

        <div>
            <ul class="nav nav-tabs" role="tablist">
                <?php
                foreach (_languages_list_by_status(1) as $key => $lang) {
                    $active_presentation = ($lang['language'] == $u_language) ? ' class="active" ' : '';
                    echo '<li role="presentation"  ' . $active_presentation . '><a href="#' . $lang['language'] . '" aria-controls="' . $lang['language'] . '" role="tab" data-toggle="tab">' . _tr($lang['name']) . '</a></li>';
                }
                ?>
            </ul>
            <div class="tab-content">
                <?php
                foreach (_languages_list_by_status(1) as $key => $lang) {
                    $active_tabpanel = ($lang['language'] == $u_language) ? ' active ' : '';
                    echo '<div role="tabpanel" class="tab-pane ' . $active_tabpanel . '" id="' . $lang['language'] . '">';
                    ?>
                    <div class="form-group">
                        <label for="label"><?php _t("Label"); ?></label>

                        <textarea 
                            id="wysiwyg-source<?php echo $lang['language']; ?>"
                            class="form-control" 
                            name="MultiCell[label][language][<?php echo $lang['language']; ?>]"
                            rows="25"
                            ><?php echo ( ($params['MultiCell']['label']['language'][$lang['language']])) ?? ''; ?></textarea>

                        <script src="includes/wysiwyg-1-0-0/editeur.js" type="text/javascript"></script>

                        <script>
                            //                            window.onload = function () {
                            //                                WYSIWYG(document.getElementById('wysiwyg-source<?php echo $lang['language']; ?>'));
                            //                            };

                            WYSIWYG(document.getElementById('wysiwyg-source<?php echo $lang['language']; ?>'), {
                                'order': ['italic', 'bold', 'unorderedlist', 'link', 'format', 'source']
                            });


                        </script>






                    </div>
                    <?php
                    //echo _tr($lang['name']);

                    echo '</div>';
                }
                ?>
            </div>
        </div>




        <div class="form-group">
            <label for="w">
                <?php _t("Cell width"); ?>
            </label>
            <input 
                type="number" 
                class="form-control" 
                name="MultiCell[w]" 
                id="w" 
                placeholder="" 
                value="<?php echo ( ($params['MultiCell']['w'])) ?? ''; ?>"
                >
        </div>

        <div class="form-group">
            <label for="h">
                <span class="glyphicon glyphicon-resize-vertical"></span>
                <?php _t("Line text height"); ?>

            </label>
            <input 
                type="number" 
                class="form-control" 
                name="MultiCell[h]" 
                id="h" 
                placeholder="" 
                value="<?php echo ( ($params['MultiCell']['h'])) ?? ''; ?>"
                >
        </div>



        <div class="form-group">
            <label for="border">
                <?php _t("Cell borders"); ?>
            </label>
            <?php
            $borders_items = array(
//                    "0" => "No border",
//                    "1" => "Border 4 sides",
                "L" => "Left",
                "T" => "Top",
                "R" => "Right",
                "B" => "Bottom",
            );

            $checked = '';
            foreach ($borders_items as $key_border => $border) {

                if (isset($params['MultiCell']['border'])) {
                    $checked = (array_key_exists($key_border, $params['MultiCell']['border'])) ? ' checked="" ' : '';
                }

                echo '<div class="checkbox">
                    <label>
                        <input 
                            type="checkbox" 
                            name="MultiCell[border][' . $key_border . ']" 
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
                    name="MultiCell[dash][black]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['MultiCell']['dash']['black'])) ?? 0; ?>"

                    >

            </div>
            <div class="col-xs-6">
                <label for="border">
                    <?php _t("Dash line white"); ?>
                </label>
                <input 
                    type="number" 
                    name="MultiCell[dash][white]" 
                    class="form-control" 
                    placeholder="" 
                    value="<?php echo ( ($params['MultiCell']['dash']['white'])) ?? 0; ?>"
                    >
            </div>
        </div>

        <br>

        <div class="form-group">
            <label for="align">
                <?php _t("Alignment of text within the cell"); ?>
            </label>
            <select class="form-control" name="MultiCell[align]">

                <?php
                $align_items = array(
                    "J" => "Justification (default value)",
                    "L" => "Left align (default value)",
                    "C" => "Center",
                    "R" => "Right",
                );

                $align_selected = '';

                foreach ($align_items as $key_align => $align) {
                    //
                    if (isset($params['MultiCell']['align'])) {

                        $align_selected = ($key_align == $params['MultiCell']['align']) ? ' selected="" ' : '';
                    }

                    echo '<option value="' . $key_align . '"  ' . $align_selected . '>' . _tr($align) . '</option>';
                }
                ?>
            </select>
        </div>


        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="MultiCell[fill]" 
                    value="1"
                    <?php echo ( isset($params['MultiCell']['fill']) && $params['MultiCell']['fill'] == 1 ) ? ' checked="" ' : ""; ?>
                    > 
                    <?php _t("Color the cell background"); ?>
            </label>


        </div>



        <div class="form-group">
            <label>
                <input 
                    type="checkbox" 
                    name="MultiCell[hidden]" 
                    value="1"
                    <?php echo (isset($params['MultiCell']['hidden']) && $params['MultiCell']['hidden'] == 1 ) ? ' checked="" ' : ""; ?>
                    > 
                    <?php _t("Hide the cell"); ?>

            </label>
        </div>

        <button type="submit" class="btn btn-default">

            <?php _t("Save"); ?>
        </button>


    </div>
</div>
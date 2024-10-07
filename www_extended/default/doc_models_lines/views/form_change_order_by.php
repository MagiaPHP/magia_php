<form method="post" action="index.php">
    <input type="hidden" name="c" value="doc_models_lines">
    <input type="hidden" name="a" value="ok_change_order_by">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="doc_models_lines">
    <input type="hidden" name="redi[a]" value="details_by_modele_doc">
    <input type="hidden" name="redi[params]" value="<?php echo "doc=$doc"; ?>">


    <table class="table table-striped">
        <thead>
            <tr>
                <th><?php _t("New value"); ?></th>
                <th><?php _t("Actual value"); ?></th>
                <th><?php _t("Element"); ?></th>                                
            </tr>
        </thead>

        <tbody>
            <?php
            foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $doc_sections["section"]) as $key => $dmlsbds) {


                $icon_hidden = (doc_models_lines_get_value_by_key($dmlsbds, 'hidden'));
                $icon_fill = (doc_models_lines_get_value_by_key($dmlsbds, 'fill'));

                echo '<tr>
                <td>
                    <input type="number" class="form-control" id="ids" name="ids[' . $dmlsbds['id'] . '][order_by]" placeholder="" value="' . $dmlsbds['order_by'] . '" required>                        
                    </td>
                <td>' . $dmlsbds['order_by'] . '</td>
                <td>' . $dmlsbds['name'] . '</td>
                <td>' . $icon_hidden . '  ' . $icon_fill . '</td>
            </tr>';
//        echo '<div class="checkbox">
//        <label>
//            <input type="checkbox" name="idsd[' . $dmlsbds['id'] . '][id]" value="' . $dmlsbds['id'] . '"> ' . $dmlsbds['order_by'] . ' : ' . $dmlsbds['name'] . '
//        </label>
//    </div>';
            }
            ?>

        </tbody>
    </table>

    <br>
    <br>

    <button type="submit" class="btn btn-default">
        <?php echo icon("sort-by-order"); ?>
        <?php _t("Change order"); ?>
    </button>


</form>
<form>

    <?php
    foreach (doc_models_lines_search_modele_doc_section($modele, $doc, $doc_sections["section"]) as $key => $dmlsbds) {



        echo '<div class="checkbox">
        <label>
            <input type="checkbox" value="' . $dmlsbds['section'] . '"> ' . $dmlsbds['order_by'] . ' : ' . $dmlsbds['name'] . '
        </label>
    </div>';
    }
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok-circle"); ?>
        <?php _t("Show"); ?>
    </button>


</form>
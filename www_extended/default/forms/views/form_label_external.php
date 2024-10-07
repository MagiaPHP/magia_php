<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">
    <input type="hidden" name="field" value="m_label_external">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("m_label_external"); ?></label>
        <select class="form-control" name="new_data">
            <option value="null"><?php _t("Select one"); ?></option>
            <?php
            $db_cols_from_table_list = db_cols_from_table($fle2->getM_table_external());

            foreach ($db_cols_from_table_list as $key => $col) {

                $selected = ($col['Field'] == $fle2->getM_label_external() ) ? " selected " : "";

                echo '<option value="' . $col['Field'] . '"  ' . $selected . '>' . ($col['Field']) . '</option>';
            }
            ?>
        </select>
        <?php
//        vardump($fle2->getM_label_external());
//        vardump($db_cols_from_table_list);
        ?>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("m_label_external"); ?>
    </button>
</form>
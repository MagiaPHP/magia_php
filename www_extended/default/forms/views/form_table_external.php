<form class="form-inline" method="post" action="index.php">
    <input type="hidden" name="c" value="forms_lines">
    <input type="hidden" name="a" value="ok_push_field">
    <input type="hidden" name="id" value="<?php echo $fle2->getId(); ?>">
    <input type="hidden" name="field" value="m_table_external">
    <input type="hidden" name="redi" value="2">

    <div class="form-group">
        <label class="sr-only" for="new_data"><?php _t("m_table_external"); ?></label>
        <select class="form-control" name="new_data">
            <option value="null"><?php _t("Select one"); ?></option>
            <?php
            $m_table_external_list = db_list_tables_from_db($config_db);
            foreach ($m_table_external_list as $key => $table) {
                $selected = ($table[0] == $fle2->getM_table_external() ) ? " selected " : "";
                echo '<option value="' . $table[0] . '"  ' . $selected . '>' . ($table[0]) . '</option>';
            }
            ?>
        </select>
        <?php
//        vardump($fle2->getM_table_external());
//        vardump($m_table_external_list);
        ?>
    </div>
    <button type="submit" class="btn btn-default">
        <?php _t("m_table_external"); ?>
    </button>
</form>
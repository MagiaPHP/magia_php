<form method="post" action="index.php">
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_invoices_der_bank_lines_to_show">

    <input type="hidden" name="redi[id]" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="2">

    <?php
    $cbects = json_decode(_options_option('config_invoices_der_bank_lines_to_show'), true);

    $disabled = "";
    $checked = '';
    $show = false;

    foreach (banks_lines_db_col_list_from_table('banks_lines') as $key => $col) {


        $checked = (isset($cbects[$col])) ? ' checked="" ' : "";

        switch ($col) {
//            case 'id':
            case 'total':
//            case 'status':
                //$disabled = ' disabled ';
                $checked = ' checked ';
                break;
            default:
                break;
        }

        echo '<div class="checkbox">
                        <label>
                            <input type="checkbox" name="data[' . $col . ']"  value="' . $show . '" ' . $disabled . ' ' . $checked . '> ' . (ucfirst($col)) . '
                        </label>
                    </div>';
        $disabled = '';
        $checked = '';
    }
    ?>


    <button type="submit" class="btn btn-primary">
        <?php echo icon("floppy-disk"); ?>
        <?php _t("Save"); ?>
    </button>
</form>


<form method="post" action="index.php">
    <input type="hidden" name="c" value="invoices_separators">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <table class="table table-bordered">

        <?php
        $checked_array = json_decode(_options_option("config_invoices_separators_show_col_from_table"), true);
        foreach (invoices_separators_db_col_list_from_table($c) as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";
            echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . $th . ' </td></tr>';
        }
        ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk"); ?> <?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>

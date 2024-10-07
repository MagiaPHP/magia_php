
<form method="post" action="index.php">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <table class="table table-bordered">

        <?php
        $checked_array = json_decode(_options_option("config_banks_lines_show_col_from_table"), true);

        foreach (banks_lines_db_col_list_from_table($c) as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case 'operation':
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . _tr('Operation number') . ' </td></tr>';
                    break;

                default:
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="' . $th . '" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td></tr>';
                    break;
            }
        }
        ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default"><?php echo icon("floppy-disk"); ?> <?php _t("Save"); ?></button>
            </td>
        </tr>
    </table>
</form>

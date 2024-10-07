
<form method="post" action="index.php">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_show_col_from_table">
    <input type="hidden" name="redi[redi]" value="1">

    <table class="table table-bordered">
        <?php
//        $expenses_db_col_list_from_table = expenses_db_col_list_from_table($c);
//
//        foreach ($expenses_db_col_list_from_table as $key => $value) {
//            echo "<p>'$value',</p>";
//        }


        $cols_to_show = array(
            'id',
            'project_id',
            'my_ref',
            'father_id',
            'category_code',
            'invoice_number',
            'budget_id',
            'credit_note_id',
            'provider_id',
            'seller_id',
            'clon_from_id',
            'title',
            'addresses_billing',
            'addresses_delivery',
            'date',
            'date_registre',
            'deadline',
            'total',
            'tax',
            'tvac',
            'advance',
            'balance',
            'comments',
            'comments_private',
            'r1',
            'r2',
            'r3',
            'fc',
            'date_update',
            'days',
            'ce',
            'code',
            'type',
            'every',
            'times',
            'date_start',
            'date_end',
            'order_by',
            'status',
            "button_details",
            "button_pay",
            "button_edit",
//            "button_print",
//            "button_save",
        );

//        $after_col = array_search('tax', $expenses_db_col_list_from_table);
//        array_splice($expenses_db_col_list_from_table, $after_col + 1, 0, "tvac");
//        _options_push('config_expenses_show_col_from_table', json_encode($expenses_db_col_list_from_table));
//
//        $expenses_db_col_list_from_table = json_decode(_options_option("config_expenses_show_col_from_table"), true);
//Agrego a las columnas las de l directroy
//        $array_btn = array(
//            "button_details",
//            "button_pay",
//            "button_edit",
//            "button_print",
//            "button_save",
//        );
//        foreach ($array_btn as $key => $button) {
//            array_push($expenses_db_col_list_from_table, $button);
//        }

        $checked_array = json_decode(_options_option("config_expenses_show_col_from_table"), true)['cols'];

//vardump($checked_array); 

        foreach ($cols_to_show as $th) {
            // si hay como parte del array $checked_array
            // o si el array tiene cero elementos (au no registrado)
            $checked = (isset($checked_array[$th]) || !isset($checked_array) ) ? " checked " : "";

            switch ($th) {
                case "category_code":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Category')) . ' </td><tr>';
                    break;

                case "provider_id":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Provider')) . ' </td><tr>';
                    break;

                case "tax":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Tva')) . ' </td><tr>';
                    break;

                case "advance":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('Paid')) . ' </td><tr>';
                    break;

                case "balance":
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst('To pay')) . ' </td><tr>';
                    break;

                default:
                    echo '<tr><td><input ' . $checked . ' type="checkbox" name="cols[' . $th . ']" id="' . $th . '"> ' . _tr(ucfirst($th)) . ' </td><tr>';
                    break;
            }
        }
        ?>
        <tr>
            <td>
                <button type="submit" class="btn btn-default">
                    <?php echo icon("floppy-disk"); ?>
                    <?php _t("Save"); ?>
                </button>
            </td>
        </tr>
    </table>


</form>





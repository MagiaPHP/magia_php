

<form class="form-inline" method="get" action="index.php">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="import_check">
    <input type="hidden" name="update" value="1">
    <input type="hidden" name="file" value="<?php echo $file; ?>">
    <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">



    <div class="form-group">
        <label class="sr-only" for="date_format"><?php _t("Date format"); ?></label>


        <select class="form-control" name="date_format">
            <option value="null"><?php _t("Select date format"); ?></option>

            <?php
            $dates_format_array = [
                ['date' => '20/03/24', 'format' => 'd/m/y'], // dd/mm/yyyy
                ['date' => date("d/n/y") . ' 20/03/24', 'format' => 'd/n/y'], // dd/mm/yyyy
                ['date' => '2024-03-20', 'format' => 'Y-m-d'], // yyyy-mm-dd
                ['date' => '2024.03.20', 'format' => 'Y.m.d'], // yyyy.mm.dd
                ['date' => '2024/03/20', 'format' => 'Y/m/d'], // yyyy/mm/dd                                
                ['date' => 'invalid-date', 'format' => 'Y-m-d'], // invalid format
                ['date' => '2024-02-30', 'format' => 'Y-m-d'], // invalid date (February 30th doesn't exist)                
                ['date' => '2024-01-01T12:00:00', 'format' => 'Y-m-d\TH:i:s'], // ISO 8601 datetime format (valid date part)
                ['date' => '20/03/2024', 'format' => 'd/m/Y'], // dd/mm/YYYY
                ['date' => '20.03.2024', 'format' => 'd.m.Y'], // dd.mm.yyyy
                ['date' => '20-03-2024', 'format' => 'd-m-Y'], // dd-mm-yyyy
                ['date' => '31/12/2024', 'format' => 'd/m/Y'], // dd/mm/yyyy (end of year)
                ['date' => '01-01-2024', 'format' => 'd-m-Y'], // dd-mm-yyyy (start of year)
                ['date' => '15/07/2024', 'format' => 'd/m/Y'], // dd/mm/yyyy (mid-year)
                ['date' => '29/02/2024', 'format' => 'd/m/Y'], // invalid non-leap year date
                ['date' => '29/02/2024', 'format' => 'd/m/Y'], // valid leap year date
                ['date' => '01/2/2024', 'format' => 'd/n/Y'], // dd/m/yyyy
                ['date' => '01-2-2024', 'format' => 'd-n-Y'], // dd-m-yyyy
                ['date' => '1/2/2024', 'format' => 'j/n/Y'], // d/m/yyyy                
                ['date' => '1/02/2024', 'format' => 'j/m/Y'], // d/mm/yyyy
                ['date' => '1-2-2024', 'format' => 'j-n-Y'], // d-m-yyyy                
                ['date' => '1-02-2024', 'format' => 'j-m-Y'], // d-mm-yyyy
                ['date' => '03-20-2024', 'format' => 'm-d-Y'], // mm-dd-yyyy
                ['date' => '03/20/2024', 'format' => 'm/d/Y'], // mm/dd/yyyy
                ['date' => '03.20.2024', 'format' => 'm.d.Y'], // mm.dd.yyyy                
            ];

            foreach ($dates_format_array as $date_key => $date_format) {

                $selected_date_format = ($date_format['format'] == $bank->getDate_format() ) ? " selected " : "";

                echo '<option value="' . $date_format['format'] . '" ' . $selected_date_format . ' >' . $date_format['format'] . ' - ' . $date_format['date'] . '</option>';
            }
            ?>
        </select>


    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon('refresh'); ?>
        <?php _t("Changer format date"); ?>
    </button>
</form>

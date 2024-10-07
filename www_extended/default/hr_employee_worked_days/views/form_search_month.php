<form class="navbar-form navbar-left" method="get" action="index.php">

    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="by_month">

    <div class="form-group">
        <label class="sr-only" for="month"></label>
        <select class="form-control" name="month"

                <?php // echo (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true)['fix']) ? " disabled " : ""; ?>

                >
                    <?php
                    for ($m = 1; $m < 13; $m++) {
                        $month_selected = ($m == $month) ? " selected " : "";
                        echo '<option value="' . $m . '" ' . $month_selected . '>' . _tr(magia_dates_month($m)) . '</option>';
                    }
                    ?>
        </select>
    </div>
    <?php // vardump(hr_employee_worked_days_max_year());  ?>
    <?php // vardump(hr_employee_worked_days_min_year());  ?>

    <div class="form-group">
        <label class="sr-only" for="year"></label>
        <select class="form-control" name="year"
        <?php // echo (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true)['fix']) ? " disabled " : ""; ?>

                >
                    <?php
                    $hr_employee_worked_days_min_year = hr_employee_worked_days_min_year() ?? date("Y");

                    for (
                            $y = $hr_employee_worked_days_min_year;
                            $y <= (date("Y"));
                            $y++
                    ) {
                        $year_selected = ($y == $year) ? " selected " : "";
                        echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
                    }
                    ?>
        </select>
    </div>

    <button type="submit" class="btn btn-default"
    <?php // echo (json_decode(_options_option('config_hr_payroll_by_month_fix_date'), true)['fix']) ? " disabled " : ""; ?>

            >
                <?php echo icon("search"); ?> 
                <?php _t("Search"); ?>
    </button>

</form>


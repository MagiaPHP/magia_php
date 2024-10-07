<ul class="nav nav-tabs">



    <?php
    if ($c == 'hr_payroll_by_month') {
        ?>
        <?php
        $hr_payroll_by_months_tmp_index = _options_option('hr_payroll_by_months_tmp_index');
        ?>

        <?php if ($hr_payroll_by_months_tmp_index == 12) { ?>

            <li role="presentation">
                <a href="index.php?c=config&a=ok_hr_payroll_by_months_tmp_index&data=10">
                    <?php echo icon("chevron-right"); ?> <?php _t("Open"); ?>
                </a>
            </li>   

        <?php } else { ?>
            <li role="presentation">
                <a href="index.php?c=config&a=ok_hr_payroll_by_months_tmp_index&data=12">
                    <?php echo icon("chevron-left"); ?> <?php _t("Close"); ?>

                </a>
            </li>   
            <?php
        }
    }
    ?>




    <li role="presentation" <?php echo ($c == 'hr_payroll_by_month') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr_payroll_by_month&a=by_month"><?php _t("Solde"); ?></a></li>



    <li role="presentation" <?php echo ($c == 'hr_employee_payroll_items') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr_employee_payroll_items&a=hr"><?php _t("Precompte"); ?></a></li>




    <li role="presentation" <?php echo ($c == 'hr_employee_benefits_by_month') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr_employee_benefits_by_month&a=by_month"><?php _t("Meal vouchers"); ?></a></li>



    <li role="presentation" <?php echo ($c == 'hr_employee_fines') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr_employee_fines"><?php _t("Fine / withdrawal"); ?></a></li>    



    <li role="presentation" <?php echo ($c == 'hr_employee_money_advance') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr_employee_money_advance"><?php _t("Money advance"); ?></a>
    </li>    





    <li role="presentation" <?php echo ($c == 'hr' && $a == 'drivers') ? '  class="active" ' : ''; ?>>
        <a href="index.php?c=hr&a=drivers"><?php _t("Drivers"); ?></a></li>    

</ul>



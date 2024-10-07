
<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _t("Human resources"); ?>
    </a>



    <a href="index.php?c=hr" class="list-group-item"><?php _t("Hr"); ?></a>
    <a href="index.php?c=hr_payroll_by_month&a=by_month" class="list-group-item <?php echo ($c == 'hr_payroll_by_month') ? " list-group-item-info " : "" ?>"><?php _t("Solde"); ?></a>
    <a href="index.php?c=hr_employee_payroll_items&a=hr" class="list-group-item <?php echo ($c == 'hr_employee_payroll_items') ? " list-group-item-info " : "" ?>"><?php _t("Precompte"); ?></a>
    <a href="index.php?c=hr_employee_benefits_by_month&a=by_month" class="list-group-item <?php echo ($c == 'hr_employee_benefits_by_month') ? " list-group-item-info " : "" ?>"><?php _t("Meal vouchers"); ?></a>
    <a href="index.php?c=hr_employee_fines" class="list-group-item <?php echo ($c == 'hr_employee_fines') ? " list-group-item-info " : "" ?>"><?php _t("Fine / withdrawal"); ?></a>
    <a href="index.php?c=hr_employee_money_advance" class="list-group-item <?php echo ($c == 'hr_employee_money_advance') ? " list-group-item-info " : "" ?>"><?php _t("Money advance"); ?></a>
    <a href="index.php?c=hr&a=drivers" class="list-group-item <?php echo ($a == 'drivers') ? " list-group-item-info " : "" ?>"><?php _t("Drivers"); ?></a>
    <a href="index.php?c=hr_employee_worked_days" class="list-group-item <?php echo ($c == 'hr_employee_worked_days') ? " list-group-item-info " : "" ?>"><?php _t("Worked days"); ?></a>

</div>


<div class="list-group">

    <a href="#" class="list-group-item active">
        <?php _t("Human resources"); ?>
    </a>



    <a href="index.php?c=hr_payroll" class="list-group-item <?php echo ($c == 'hr_payroll') ? " list-group-item-info " : "" ?> "><?php _t("Payroll"); ?></a>
    <a href="index.php?c=hr_employee_category" class="list-group-item <?php echo ($c == 'hr_employee_category') ? " list-group-item-info " : "" ?> "><?php _t("Category"); ?></a>   
    <a href="index.php?c=hr_employee_work_status" class="list-group-item <?php echo ($c == 'hr_employee_work_status') ? " list-group-item-info " : "" ?>"><?php _t("Employee work status"); ?></a>
    <a href="index.php?c=hr_employee_nationality" class="list-group-item <?php echo ($c == 'hr_employee_nationality') ? " list-group-item-info " : "" ?>"><?php _t("Nationality"); ?></a>
    <a href="index.php?c=hr_employee_civil_status" class="list-group-item <?php echo ($c == 'hr_employee_civil_status') ? " list-group-item-info " : "" ?> "><?php _t("Civil status"); ?></a>
    <a href="index.php?c=hr_employee_family_dependents" class="list-group-item <?php echo ($c == 'hr_employee_family_dependents') ? " list-group-item-info " : "" ?> "><?php _t("Family dependents"); ?></a>
    <a href="index.php?c=hr_employee_documents" class="list-group-item <?php echo ($c == 'hr_employee_documents') ? " list-group-item-info " : "" ?> "><?php _t("Documents"); ?></a>   
    <a href="index.php?c=hr_employee_sizes_clothes" class="list-group-item <?php echo ($c == 'hr_employee_sizes_clothes') ? " list-group-item-info " : "" ?> "><?php _t("Sizes clothes"); ?></a>
    <a href="index.php?c=hr_employee_benefits" class="list-group-item <?php echo ($c == 'hr_employee_benefits') ? " list-group-item-info " : "" ?> "><?php _t("Benefits"); ?></a>
    <a href="index.php?c=hr_employee_salary" class="list-group-item <?php echo ($c == 'hr_employee_salary') ? " list-group-item-info " : "" ?> "><?php _t("Remuneration"); ?></a>


    <a href="index.php?c=hr_payroll_lines" class="list-group-item <?php echo ($c == 'hr_payroll_lines') ? " list-group-item-info " : "" ?> "><?php _t("hr_payroll_lines"); ?></a>
    <a href="index.php?c=hr_employee_payroll_items" class="list-group-item <?php echo ($c == 'hr_employee_payroll_items') ? " list-group-item-info " : "" ?>"><?php _t("employee_payroll_items"); ?></a>



</div>


<div class="list-group">

    <a href="#" class="list-group-item active">
        <?php _t("Config"); ?>
    </a>



    <a href="index.php?c=hr_fines_categories" class="list-group-item <?php echo ($c == 'hr_fines_categories') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Fines categories"); ?></a>
    <a href="index.php?c=hr_benefits" class="list-group-item <?php echo ($c == 'hr_benefits') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Benefits"); ?></a>
    <a href="index.php?c=hr_categories" class="list-group-item <?php echo ($c == 'hr_categories') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("hr_categories"); ?></a>
    <a href="index.php?c=hr_clothes" class="list-group-item <?php echo ($c == 'hr_clothes') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Clothes"); ?></a>
    <a href="index.php?c=hr_documents" class="list-group-item <?php echo ($c == 'hr_documents') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Documents"); ?></a>
    <a href="index.php?c=hr_payroll_items" class="list-group-item <?php echo ($c == 'hr_payroll_items') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Payroll items"); ?></a>
    <a href="index.php?c=hr_work_status" class="list-group-item <?php echo ($c == 'hr_work_status') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Work status"); ?></a>
    <a href="index.php?c=hr_worked_days_status" class="list-group-item <?php echo ($c == 'hr_worked_days_status') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Worked days status"); ?></a>
    <a href="index.php?c=holidays" class="list-group-item <?php echo ($c == 'holidays') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Holidays"); ?></a>
    <a href="index.php?c=holidays_categories" class="list-group-item <?php echo ($c == 'holidays_categories') ? " list-group-item-info " : "" ?> "><?php echo icon("wrench"); ?> <?php _t("Holidays categories"); ?></a>


</div>


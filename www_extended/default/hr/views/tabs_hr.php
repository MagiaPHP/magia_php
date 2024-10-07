<?php if ($c == 'contacts' && $a !== 'details') { ?>

    <h4>
        <?php echo icon("user"); ?> <?php echo contacts_formated($id); ?>
        <small><?php echo contacts_field_id('birthdate', $id); ?></small>
    </h4>


<?php } ?>





<?php if (modules_field_module('status', 'hr')) { ?>

    <ul class="nav nav-tabs">
        <li role="presentation" <?php echo ($a == 'hr') ? ' class="active" ' : "" ?>><a href="index.php?c=hr"><?php _t("HR"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'details') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=details&id=<?php echo $id; ?>"><?php _t("Details"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_category') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_category&id=<?php echo $id; ?>"><?php _t("Category"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_work_status') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_work_status&id=<?php echo $id; ?>"><?php _t("Work status"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_nationality') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_nationality&id=<?php echo $id; ?>"><?php _t("Nationality"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_civil_status') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_civil_status&id=<?php echo $id; ?>"><?php _t("Civil status"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_family_dependents') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_family_dependents&id=<?php echo $id; ?>"><?php _t("Persons in charge"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_documents') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_documents&id=<?php echo $id; ?>"><?php _t("Documents"); ?></a></li>



        <li role="presentation" <?php echo ($a == 'veh_vehicles_drivers') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=veh_vehicles_drivers&id=<?php echo $id; ?>">
                <?php //echo icon("car", 'f'); ?>        
                <?php _t("Vehicles"); ?>
            </a>
        </li>

        <li role="presentation" <?php echo ($a == 'hr_employee_sizes_clothes') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_employee_sizes_clothes&id=<?php echo $id; ?>">
                <?php //echo icon("clothe", 'f'); ?>
                <?php _t("Clothes"); ?>
            </a>
        </li>

        <li role="presentation" <?php echo ($a == 'hr_employee_benefits') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_employee_benefits&id=<?php echo $id; ?>"><?php _t("Benefits"); ?></a></li>

        <li role="presentation" <?php echo ($a == 'hr_employee_salary') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_employee_salary&id=<?php echo $id; ?>"><?php _t("Remuneration"); ?></a></li>                
        <li role="presentation" <?php echo ($a == 'hr_employee_money_advance') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_employee_money_advance&id=<?php echo $id; ?>"><?php _t("Money advance"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_fines') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_employee_fines&id=<?php echo $id; ?>"><?php _t("Fine / Withdrawal"); ?></a></li>
        <li role="presentation" <?php echo ($a == 'hr_employee_worked_days') ? ' class="active" ' : "" ?>><a href="index.php?c=contacts&a=hr_employee_worked_days&id=<?php echo $id; ?>"><?php _t("Worked days"); ?></a></li>

        <li role="presentation" <?php echo ($a == 'hr_payroll') ? ' class="active" ' : "" ?> ><a href="index.php?c=contacts&a=hr_payroll&id=<?php echo $id; ?>"><?php _t("Pay sheets"); ?></a></li>
    </ul>
    <br>

    <?php
    /**
     * Esta con category?
     * Tiene nacionalidad principal?
     * Tiene status civil?
     * Tiene remuneracion registrado ?
     *      por mes
     *      por hora (una debe tener fecha fin en null)
     * 
     * 
     * 
     */
    //vardump($employee->getNationality_principal()); 


    if (!$employee->can_create_payroll()) {
        foreach ($employee->getWhy_cant_create_payroll() as $key => $msj) {
            message('warning', $msj);
        }
    }
    ?>

    <?php
}
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Record a work day"); ?>
        </h3>
    </div>
    <div class="panel-body">


        <?php
        /**
         *         <a href="index.php?c=config&a=push&a=ok_hr_employee_worked_days&data=ampm&redi[redi]=1&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>">am pm / </a>
          <a href="index.php?c=config&a=push&a=ok_hr_employee_worked_days&data=hours&redi[redi]=1&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>">hours</a>
         */
        ?>


        <ul class="nav nav-tabs">
            <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=ok_hr_employee_worked_days_add_by&data=ampm&redi[redi]=1&redi[c]=contacts&redi[a]=hr_employee_worked_days&"><?php _t("Am / Pm"); ?></a></li>
            <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'hours') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=ok_hr_employee_worked_days_add_by&data=hours&redi[redi]=1&redi[c]=contacts&redi[a]=hr_employee_worked_days&"><?php _t("Hours"); ?></a></li>
            <?php
            /**
             * <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'days') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=push&a=ok_hr_employee_worked_days&data=days&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>"><?php _t("Days"); ?></a></li>
             */
            ?>
        </ul>

        <br>




        <?php
        //vardump(_options_option('config_hr_employee_worked_days_add_by')); 


        switch (_options_option('config_hr_employee_worked_days_add_by')) {

            case 'ampm':
                include view('hr_employee_worked_days', 'form_add_by_group_ampm');
                break;

            case 'hours':
                include view('hr_employee_worked_days', 'form_add_by_group_hours');
                break;

            default:
                //    include view('hr_employee_worked_days', 'form_add_by_employee_hours');
                break;
        }
        ?>





    </div>
</div>

<?php include view('contacts', 'der_hr_employee_documents_all'); ?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Record a work day"); ?>
    </div>

    <div class="panel-body">

        <ul class="nav nav-tabs">
            <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'ampm') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=ok_hr_employee_worked_days_add_by&data=ampm&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>"><?php _t("Am / Pm"); ?></a></li>
            <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'hours') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=ok_hr_employee_worked_days_add_by&data=hours&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>"><?php _t("Hours"); ?></a></li>
            <?php
            /**
             * <li role="presentation" <?php echo (_options_option('config_hr_employee_worked_days_add_by') == 'days') ? ' class="active" ' : ''; ?>><a href="index.php?c=config&a=push&a=ok_hr_employee_worked_days&data=days&redi[redi]=5&redi[c]=contacts&redi[a]=hr_employee_worked_days&redi[params]=<?php echo "id=$id"; ?>"><?php _t("Days"); ?></a></li>
             */
            ?>
        </ul>

        <br>


        <?php
//        switch (_options_option('config_hr_employee_worked_days_add_by')) {
//            case 'ampm':
//                include view('hr_employee_worked_days', 'form_add_by_employee_ampm');
//                break;
//
//            case 'hours':
//                include view('hr_employee_worked_days', 'form_add_by_employee_hours');
//                break;
//
//            default:
//                include view('hr_employee_worked_days', 'form_add_by_employee_hours');
//                break;
//        }
        switch (_options_option('config_hr_employee_worked_days_add_by')) {
            case 'ampm':
                include view('hr_employee_worked_days', 'form_add_by_employee_ampm');
                break;

            case 'hours':
                include view('hr_employee_worked_days', 'form_add_by_employee_hours');
                break;

            default:
                include view('hr_employee_worked_days', 'form_add_by_employee_hours');
                break;
        }
        ?>


    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Record a work day by group"); ?>
    </div>
    <div class="panel-body">
        <p>
            <?php _t("Record the days worked of several employees at the same time"); ?>
        </p>
        <p>
            <a class="btn btn-primary" href="index.php?c=hr_employee_worked_days"><?php _t("Registre"); ?></a>
        </p>
    </div>
</div>



<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Print"); ?>
    </div>
    <div class="panel-body">

        <p>
            <a class="btn btn-primary" href="index.php?c=hr_employee_worked_days&a=export_pdf&id=<?php echo $id; ?>"><?php _t("Print"); ?></a>
        </p>
    </div>
</div>







<?php
/**
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t("Work status"); ?>
  </div>
  <div class="panel-body">

  <table class="table table-active">
  <thead>
  <tr>
  <th><?php _t('Status'); ?></th>
  <th><?php _t('Date start'); ?></th>
  <th><?php _t('Date end'); ?></th>
  </tr>
  </thead>

  <tbody>
  <?php
  foreach (hr_employee_work_status_search_by('employee_id', $id) as $key => $hrewssbe) {

  echo ' <tr>
  <td>' . $hrewssbe['work_status_code'] . '</td>
  <td>' . $hrewssbe['date_start'] . '</td>
  <td>' . $hrewssbe['date_end'] . '</td>
  </tr>';
  }
  ?>
  </tbody>

  </table>


  </div>
  </div>




 */
?>
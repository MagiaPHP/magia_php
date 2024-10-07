<?php //  include view('contacts', 'der_hr_employee_documents_all');        ?>




<?php

/**
 * 

  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t('Edit'); ?>
  </div>
  <div class="panel-body">
  <a class="btn btn-danger" href="index.php?c=contacts&a=hr_payroll_edit&payroll_id=<?php echo $hr_payroll->getId(); ?>&id=<?php echo $hr_payroll->getEmployee_id(); ?>"><?php echo icon('pencil'); ?> <?php _t("Edit"); ?></a>
  </div>
  </div>



  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t('Print'); ?>
  </div>
  <div class="panel-body">
  <a class="btn btn-primary" href=""><?php echo icon('print'); ?> <?php _t("Print"); ?></a>
  </div>
  </div>



  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t('Pay'); ?>
  </div>
  <div class="panel-body">
  <a
  class="btn btn-primary"
  href="index.php?c=hr_payroll&a=details_payement&id=<?php echo $hr_payroll->getId(); ?>"
  >
  <?php echo icon('shopping-cart'); ?> <?php _t("Click to pay"); ?>
  </a>
  </div>
  </div>


 */
?>
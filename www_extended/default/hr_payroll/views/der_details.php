<?php
// crea html 
if (modules_field_module("status", "tasks") && permissions_has_permission($u_rol, "tasks", "read")) {
    $args = array(
        "c" => $c,
        "name" => 'robinson',
        "id" => $id,
        "form" => array(
            "category_id" => null,
            "contact_id" => $u_id,
            "controller" => $c,
            "doc_id" => $id,
            "redi" => array(
                "redi" => "40",
                "c" => $c,
                "id" => $id
            )
        ),
    );

    tasks_create_html('tmp_der_details', $args);
}
?>







<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Details"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <table class="table table-condensed">
            <tr>
                <td><?php _t("Worker"); ?></td>
                <td><a href="index.php?c=contacts&a=details&id=<?php echo $hr_payroll->getEmployee_id() ?>"><?php echo contacts_formated($hr_payroll->getEmployee_id()); ?></a></td>
            </tr>

            <tr>
                <td><?php _t("Address"); ?></td>
                <td><?php echo addresses_formated_html($hr_payroll->getAddress()); ?></td>
            </tr>


            <tr>
                <td><?php _t("Function"); ?></td>
                <td><?php echo ($hr_payroll->getFonction()); ?></td>
            </tr>

            <tr>
                <td><?php _t("Salary base"); ?></td>
                <td><?php echo monedaf($hr_payroll->getSalary_base()); ?></td>
            </tr>

            <tr>
                <td><?php _t("Civil_status"); ?></td>
                <td><?php echo ($hr_payroll->getCivil_status()); ?></td>
            </tr>                       

            <tr>
                <td><?php _t("Tax_system"); ?></td>
                <td><?php echo ($hr_payroll->getTax_system()); ?></td>
            </tr>


            <tr>
                <td><?php _t("Date_start"); ?></td>
                <td><?php echo ($hr_payroll->getDate_start()); ?></td>
            </tr>



            <tr>
                <td><?php _t("Date_end"); ?></td>
                <td><?php echo ($hr_payroll->getDate_end()); ?></td>
            </tr>


            <tr>
                <td><?php _t("To_pay"); ?></td>
                <td><?php echo monedaf($hr_payroll->getTo_pay()); ?></td>
            </tr>



            <tr>
                <td><?php _t("Account_number"); ?></td>
                <td><?php echo ($hr_payroll->getAccount_number()); ?></td>
            </tr>



            <tr>
                <td><?php _t("Extras"); ?></td>

                <td><?php echo (hr_payroll_item_estras_formated_html($hr_payroll->getExtras())); ?></td>
            </tr>



            <tr>
                <td><?php _t("Date_registre"); ?></td>
                <td><?php echo ($hr_payroll->getDate_registre()); ?></td>
            </tr>

            <tr>
                <td><?php _t("Status"); ?></td>
                <td><?php echo hr_payroll_status_field_code('name', $hr_payroll->getStatus()); ?></td>
            </tr>


        </table>


    </div>
</div>

<?php
/**
 * 
 */
include "der_payment_resumen.php";
?>


<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Payments"); ?>
    </div>
    <div class="panel-body">


        <?php
        if ($hr_payroll->getStatus() == $hr_payroll::STATUS_UNPAID) {
            echo '<a class="btn btn-md btn-primary" href="index.php?c=hr_payroll&a=payment&id=' . $hr_payroll->getId() . '">' . icon("shopping-cart") . ' ' . _tr('Pay') . '</a>';
        } else {
            echo '<a class="btn btn-md btn-default" href="index.php?c=hr_payroll&a=payment&id=' . $hr_payroll->getId() . '">' . icon("shopping-cart") . ' ' . _tr('Payments details') . '</a>';
        }
        ?>


    </div>
</div>




<?php
/**
 * 

  <div class="panel panel-default">
  <div class="panel-heading">
  <?php _t("Print"); ?>
  </div>
  <div class="panel-body">
  <a class="btn btn-primary" target="_print" href="index.php?c=hr_payroll&a=export_pdf&id=<?php echo $id; ?>">
  <?php echo icon("print"); ?>
  <?php _t("Click to print"); ?>
  </a>
  </div>
  </div>



 */
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Invoices"); ?> <?php _t("Extended  "); ?></h3>
    </div>
    <div class="panel-body">
        <table class="table table-striped">
            <tr>
                <td><?php _t("Invoice number"); ?></td><td><?php echo ($id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Date"); ?></td><td><?php echo invoices_field_id("date_registre", $id); ?></td>
            </tr>

            <tr>
                <td>
                    <?php _t("Status"); ?></td><td><?php echo invoice_status_by_status(invoices_field_id("status", $id)); ?>
                    <?php //echo $invoices['status'] ; ?>
                </td>
            </tr>

            <tr>
                <td><?php _t("Budget"); ?></td>
                <td>
                    <a href="index.php?c=budgets&a=details&id=<?php echo invoices_field_id("budget_id", $id); ?>">
                        <?php echo invoices_field_id("budget_id", $id); ?>
                    </a>
                </td>
            </tr>

            <tr>
                <td><?php _t("Credit note"); ?></td><td><?php echo invoices_field_id("credit_note_id", $id); ?></td>
            </tr>

            <tr>
                <td><?php _t("Seller"); ?></td><td><?php echo contacts_formated(invoices_field_id("seller_id", $id)); ?></td>
            </tr>

            <tr>
                <td>
                    <?php _t("Client"); ?>
                </td>                
                <td>
                    <a href="index.php?c=contacts&a=details&id=<?php echo $invoices['client_id']; ?>">
                        <?php echo contacts_formated(invoices_field_id("client_id", $id)); ?>
                    </a>
                </td>                    
            </tr>





        </table>
    </div>
</div>




<?php
/*
 * 
  id	code	status	order_by
  1	10	Registred	100
  2	20	Cobrado parcial	200
  3	30	Cobro total	300
  4	40	-------	400
  5	-10	Anulada	500
  7	-20	Cancel and refund	600
 * 
 * 
  10	Registred
  20	Cobrado parcial
 * der_part_reminders
 * Lista de cobros 
 * Registrar un cobro 
 * Anular
 * 
  30	Cobro total
 * Lista de cobros
 * Anular
  -10	Anulada
 * 
  -20	Cancel and refund
 * 
 * 
 * 
  <div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title"><a name="reminders"></a><?php _t("Reminders") ; ?></h3>
  </div>
  <div class="panel-body">
  <table class="table table-striped">
  <tr>
  <td>
  <span class="glyphicon glyphicon-send"></span>

  <?php _t("1st reminder") ; ?></td>
  <td>

  <a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a>
  <?php
  invoices_modal_reminder_send('10' , $id) ;
  //
  //                    $r = 1;
  //                    if (invoices_field_id("r1", $id) == "" ) {
  //                        include "modal_reminder_send.php";
  //                    }else{
  //                        echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ';
  //                        echo invoices_field_id("r1", $id);
  //                    }
  //
  ?>





  </td>
  </tr>
  <tr>
  <td>
  <span class="glyphicon glyphicon-send"></span>

  <?php _t("2nd reminder") ; ?></td>
  <td>
  <a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a>
  <?php
  invoices_modal_reminder_send('2' , $id) ;
  //
  //                    $r = 2;
  //                    if (invoices_field_id("r2", $id) == "" ) {
  //                        include "modal_reminder_send.php";
  //                    }else{
  //                        echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ';
  //                        echo invoices_field_id("r2", $id);
  //                    }
  ?>

  </td>
  </tr>
  <tr>
  <td>
  <span class="glyphicon glyphicon-send"></span>


  <?php _t("Appointment with lawyer") ; ?></td>
  <td>
  <a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a>
  <?php
  invoices_modal_reminder_send('3' , $id) ;
  //
  //                    $r = 3;
  //                    if (invoices_field_id("r3", $id) == "" ) {
  //                        include "modal_reminder_send.php";
  //                    }else{
  //                        echo '<a href="index.php?c=invoices&a=pdf"><span class="glyphicon glyphicon-print"></span></a> ';
  //                        echo invoices_field_id("r3", $id);
  //                    }
  ?>

  </td>
  </tr>
  </table>

  </div>
  </div>
 */
?>

<?php ### Payments  ?>
<?php ### Payments  ?>
<?php ### Payments  ?>
<?php ### Payments  ?>
<?php ### Payments  ?>
<?php ### Payments  ?>


<?php include "der_part_payement_list.php"; ?>



<?php ### Actions  ?>
<?php ### Actions ?>
<?php ### Actions  ?>
<?php ### Actions  ?>
<?php ### Actions  ?>
<?php ### Actions  ?>



<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><?php _t("Actions"); ?></h3>
    </div>
    <div class="panel-body">

        <form action="index.php" method="get" class="form-inline" ac>
            <input type="hidden" name="c" value="invoices">
            <input type="hidden" name="a" value="export_pdf">
            <input type="hidden" name="id" value="<?php echo $id; ?>">            
            <button type="submit" class="btn btn-primary"><?php _t("PDF"); ?></button>
        </form>



        <?php
        /*

          <p></p>

          <form action="index.php" method="get" class="form-inline" ac>
          <input type="hidden" name="c" value="invoices">
          <input type="hidden" name="a" value="export_pdf">
          <input type="hidden" name="id" value="<?php echo $id ; ?>">
          <button type="submit" class="btn btn-primary"><?php _t("PDF") ; ?></button>
          </form>




          <p></p>

          <form class="form-inline">
          <button type="submit" class="btn btn-primary"><?php _t("Print PDF") ; ?></button>
          </form>

          <p></p>
          <form class="form-inline">
          <button type="submit" class="btn btn-primary"><?php _t("See PDF") ; ?></button>
          </form>
          <p></p>

          <form class="form-inline">
          <button type="submit" class="btn btn-primary"><?php _t("See to customer") ; ?></button>
          </form>


          <form class="form-inline">
          <button type="submit" class="btn btn-primary"><?php _t("Export XML") ; ?></button>
          </form>
          <p></p>


         */
        ?>
        <p></p>


        <?php include "der_part_cancel.php"; ?>




        <p></p>



    </div>
</div>

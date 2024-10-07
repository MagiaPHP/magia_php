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


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title"><a name="Payments"></a><?php _t("Payments"); ?></h3>
    </div>
    <div class="panel-body">

        <?php
        if (permissions_has_permission($u_rol, "payments", "read")) {
            include "payments_list.php";
        }

        include "payments_list.php";

        if (!banks_list_by_contact_id(contacts_field_id("owner_id", $u_id))) {
            Message("info", "Please add a bank account");
        } else {
            if (invoices_field_id("status", $id) < 30 && invoices_field_id("status", $id) > 0) {
                include "modal_form_payement_registre.php";
            }
        }

//include "modal_form_payement_registre.php";
        ?>
    </div>
</div>



<?php ### Actions   ?>
<?php ### Actions  ?>
<?php ### Actions   ?>
<?php ### Actions   ?>
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


        <?php
        if (invoices_field_id("status", $id) > 0) {
            // array_push($error , 'Invoice already cancel') ;
            ?>
            <form action="index.php" method="get" class="form-inline" ac>
                <input type="hidden" name="c" value="invoices">
                <input type="hidden" name="a" value="cancel">
                <input type="hidden" name="id" value="<?php echo $id; ?>">            
                <button type="submit" class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel"); ?>
                </button>
            </form>
        <?php } else { ?>
            <form action="index.php" method="get" class="form-inline" ac>                           
                <button type="submit" class="btn btn-danger" disabled="">
                    <span class="glyphicon glyphicon-remove"></span>
                    <?php _t("Cancel"); ?>
                </button>
            </form>
        <?php } ?>






        <p></p>



    </div>
</div>

<?php
//$date_expiration = substr(magia_dates_add_day(date("Y-m-d"), _options_option('config_invoices_expiration_days')), 0, 10);
?>

<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add');
}
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="budget_id" value="null">
    <input type="hidden" name="id" value="<?php echo invoices_next_number(); ?>">

    <input type="hidden" name="counter" value="<?php echo invoices_counter_next_number(date('Y')); ?>">

    <br>

    <?php /**
      <?php # id    ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="id"><?php _t("Invoice number"); ?></label>
      <div class="col-sm-8">

      <input
      value="<?php echo invoices_next_number(); ?>"
      type="number"
      name="id"
      class="form-control"
      id="id"
      placeholder="<?php echo invoices_next_number(); ?>">


      </div>
      </div>
      <?php # /id ?>



      <?php # counter ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="counter"><?php _t("Counter"); ?></label>
      <div class="col-sm-8">
      <input
      value="<?php echo invoices_counter_next_number(date('Y')); ?>"
      type="number"
      class="form-control"
      id="counter"
      placeholder="<?php echo invoices_counter_next_number(date('Y')); ?>"
      disabled=""
      >
      </div>
      </div>
      <?php # /counter ?>

     */ ?>


    <?php if (IS_MULTI_VAT) { ?>
        <?php # office_id ?>
        <div class="form-group">
            <label class="control-label col-sm-3" for="office_id"><?php _t("Office"); ?></label>
            <div class="col-sm-8">
                <select name="office_id" class="form-control selectpicker" id="office_id" data-live-search="true" >
                    <?php
                    $office_list = offices_list_by_headoffice($u_owner_id);

                    foreach ($office_list as $key => $office) {

                        $office_formated = contacts_formated($office['id']);

                        echo '<option value="' . $office['id'] . '">' . $office_formated . '</option>';
                    }
                    ?>
                </select>
            </div>	
        </div>
        <?php # /provider_id    ?>
    <?php } ?>





    <?php # cliente_id  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Contacts"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="client_id" required="">
                <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) {  ?>
                
                <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
                    <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
                        <?php
                        foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {
                            $selected = (isset($id) && $contacts_list['id'] == $id ) ? " selected " : "";
                            // no se muestra la emrpea 1022
                            // osea la empresa que factura
                            if ($contacts_list['id'] != _options_option('default_id_company')) {
                                ?>
                                <option value="<?php echo "$contacts_list[id]"; ?>" <?php echo $selected; ?>>
                                    <?php echo $contacts_list['id'] . ",  " . contacts_formated($contacts_list['id']); ?>
                                </option>
                                <?php
                            }
                        }
                        ?>
                    </optgroup>
                <?php } ?>
                    
                    
            </select>
        </div>	
    </div>
    <?php # /cliente_id     ?>


    <?php
    /*

      <?php # sellers_id ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="seller_id"><?php _t("seller_id") ; ?></label>
      <div class="col-sm-8">
      <select class="form-control selectpicker"  data-live-search="true" name="seller_id">
      <option value="xxxx"></option>
      <?php foreach ( employees_list_by_company($u_owner_id) as $key => $employees_list ) { ?>
      <option value="<?php echo "$employees_list[contact_id]" ; ?>"><?php echo $employees_list['contact_id'] . ",  " . contacts_formated($employees_list['contact_id']) ; ?></option>
      <?php } ?>
      </select>
      </div>
      </div>
      <?php # /sellers_id ?>

      <?php # date ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date"><?php _t("Date") ; ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date" class="form-control" id="date" placeholder=" - date">
      </div>
      </div>
     */
    ?>





    <?php # /date     ?>

    <?php /*
      <?php # date_registre ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_registre"><?php _t("Date_registre"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_registre" class="form-control" id="date_registre" placeholder=" - date">
      </div>
      </div>
      <?php # /date_registre ?>
     * 
     * 
     * 



      <script>
      $(function () {
      $("#date_expiration").datepicker({
      minDate: +0,
      // maxDate: "+12M +0D",
      dateFormat: "yy-mm-dd"

      });
      });
      </script>
     */ ?>
    <?php
    /**
     * 
      <?php # date_expiration     ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_expiration"><?php _t("Expiration date"); ?></label>
      <div class="col-sm-8">
      <input
      type="date"
      name="date_expiration"
      class="form-control"
      id="date_expiration"
      placeholder=""
      value="<?php echo $date_expiration; ?>"
      >
      <span class="help-block" >
      <?php _t("Maximun date to which you want to recive the payment"); ?>
      -
      <?php if (permissions_has_permission($u_rol, 'config', "read")) { ?>
      <a href="index.php?c=config&a=invoices_expiration_days"><?php _t("change here"); ?>
      <span class="glyphicon glyphicon-wrench"></span>
      </a>
      <?php } ?>
      </span>
      </div>
      </div>
      <?php # /date_expiration     ?>
     */
//    vardump($date_expiration); 
//    vardump(_options_option('config_invoices_expiration_days')); 
    ?>



    <?php # date_expiration      ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t("Expiration date"); ?></label>
        <div class="col-sm-5">
            <select class="form-control" name="date_expiration">
                <?php
                for ($i = 1; $i <= 365; $i++) {

                    $selected = ($i == _options_option('config_invoices_expiration_days') ) ? " selected " : "";

                    echo '<option value="' . $i . '" ' . $selected . '>' . $i . ' - ';
                    echo ($i == 1) ? _tr("Day") : _tr("Days");
                    echo '</option>';
                }
                ?>
            </select>

            <span class="help-block" >
                <?php _t("Maximun date to which you want to recive the payment"); ?>            
            </span>            
        </div>                
    </div>
    <?php # /date_expiration       ?>

    <?php /**
     * El status ya se define en ok _add.php
     * El status ya se define en ok _add.php
     * El status ya se define en ok _add.php
     * 
      <?php # Draft o registred  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-12 col-md-3 col-lg-3">
      <div class="radio">

      <?php
      vardump(_options_option("config_invoices_checked_by_default"));

      //  checked=""
      // si no hay opcion se cojera registrado por defecto
      if (_options_option("config_invoices_checked_by_default") == 10) {
      $checked_10 = ' checked="" ';
      $checked_0 = '  ';
      } else {
      $checked_10 = '  ';
      $checked_0 = ' checked="" ';
      }


      //  vardump(_options_option("config_invoices_checked_by_default"));
      ?>
      <label>
      <input type="radio" name="status" id="status" value="0" required="" <?php echo $checked_0; ?>> <?php _t("Draft"); ?>
      <p><?php // echo _t("The customer can NOT see this invoice via the system");    ?></p>

      </label>
      <br>
      <label>
      <input type="radio" name="status" id="status" value="10" required="" <?php echo $checked_10; ?> > <?php _t("Registred"); ?>
      <p><?php //echo _t("The customer can view this invoice via the system");    ?></p>
      </label>
      </div>
      </div>
      </div>
      <?php # Draft o registred    ?>
     */ ?>



    <?php
# Draft o registred 
// si usa la facturacion mensual?
//vardump(_options_option("config_invoices_monthly"));

    if (_options_option("config_invoices_monthly")) {
        ?>


        <div class="form-group">
            <label class="control-label col-sm-3" for="type"><?php _t("Type"); ?></label>
            <div class="col-sm-offset-3 col-sm-9">
                <div class="radio">
                    <label>
                        <input type="radio" name="type" value="I" required="" > <?php _t("Individual"); ?>
                        <p><?php echo _t("A single invoice"); ?></p>

                    </label>
                    <br>
                    <label>
                        <input type="radio" name="type" value="M" required="" checked=""> <?php _t("Monthly"); ?>
                        <p><?php echo _t("A monthly invoice with all the jobs for the month"); ?></p>
                    </label>
                </div>
            </div>
        </div>






        <?php
// fin de if de facturacion mensual 
    }
# Draft o registred 
    ?>







    <?php # title          ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder="<?php _t("Invoice title"); ?>">
            <span class="help-block" >
                <?php _t("A short phrase that helps you identify this invoice"); ?>
            </span>



        </div>
    </div>
    <?php # /title         ?>

    <?php /*
      <?php # total ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="total"><?php _t("Total"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="total" class="form-control" id="total" placeholder=" - defecto">
      </div>
      </div>
      <?php # /total ?>

      <?php # tax ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="tax" class="form-control" id="tax" placeholder=" - defecto">
      </div>
      </div>
      <?php # /tax ?>

      <?php # advance ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="advance"><?php _t("Advance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="advance" class="form-control" id="advance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /advance ?>

      <?php # balance ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="balance"><?php _t("Balance"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="balance" class="form-control" id="balance" placeholder=" - defecto">
      </div>
      </div>
      <?php # /balance ?>

     * 
     * 
     *  <?php # comments ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="comments"><?php _t("Comments") ; ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments"></textarea>


      </div>
      </div>
      <?php # /comments  ?>

      <?php # comments_private  ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="comments_private"><?php _t("Comments_private") ; ?></label>
      <div class="col-sm-8">
      <textarea class="form-control" name="comments_private"></textarea>

      </div>
      </div>
     *   */ ?>

    <?php # /comments_private        ?>

    <?php /* <?php # r1 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r1"><?php _t("R1"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r1" class="form-control" id="r1" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r1 ?>

      <?php # r2 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r2"><?php _t("R2"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r2" class="form-control" id="r2" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r2 ?>

      <?php # r3 ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="r3"><?php _t("R3"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="r3" class="form-control" id="r3" placeholder=" - defecto">
      </div>
      </div>
      <?php # /r3 ?>

      <?php # fc ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="fc"><?php _t("Fc"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="fc" class="form-control" id="fc" placeholder=" - defecto">
      </div>
      </div>
      <?php # /fc ?>

      <?php # date_update ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="date_update"><?php _t("Date_update"); ?></label>
      <div class="col-sm-8">
      <input type="date"  name="date_update" class="form-control" id="date_update" placeholder=" - date">
      </div>
      </div>
      <?php # /date_update ?>
     * 
     * 
     * 
     * 
     * 
     *    <?php # days ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="days"><?php _t("Days") ; ?></label>
      <div class="col-sm-8">
      <input type="text"  name="days" class="form-control" id="days" placeholder=" - defecto">
      </div>
      </div>
      <?php # /days  ?>

     */ ?>

    <?php
    /*   <?php # ce ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="ce"><?php _t("Ce"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="ce" class="form-control" id="ce" placeholder=" - defecto">
      </div>
      </div>
      <?php # /ce ?>

      <?php # key ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="key"><?php _t("Key"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="key" class="form-control" id="key" placeholder=" - defecto">
      </div>
      </div>
      <?php # /key ?>

      <?php # status ?>
      <div class="form-group">
      <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
      <div class="col-sm-8">
      <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto">
      </div>
      </div>
      <?php # /status ?>

     */
    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Create the invoice"); ?>">
        </div>      							
    </div>      							

</form>
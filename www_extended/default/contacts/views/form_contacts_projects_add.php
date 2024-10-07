<?php
$date_expiration = substr(magia_dates_add_day(date("Y-m-d"), _options_option('config_invoices_expiration_days')), 0, 10);
?>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="budget_id" value="null">


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




    <?php # cliente_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="client_id"><?php _t("Cliente_id"); ?></label>
        <div class="col-sm-8">
            <input type="hidden" name="client_id" value="<?php echo $id; ?>">

            <?php echo contacts_formated_name(contacts_field_id('name', $id)); ?>





            <?php
            //vardump($id);
            /**

              <select class="form-control selectpicker" data-live-search="true" name="client_id" required="" >
              <?php //foreach ( contacts_list_by_type(1) as $key => $contacts_list ) { ?>
              <?php foreach (contacts_headoffice_list() as $key => $headoffice) { ?>
              <optgroup label="<?php echo contacts_formated($headoffice['id']); ?>">
              <?php
              foreach (contacts_list_according_company_and_type($headoffice['id'], 1) as $key => $contacts_list) {

              // seleccionar el actual id
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
             * 
             */
            ?>


        </div>	
    </div>
    <?php # /cliente_id     ?>



    <script>
        $(function () {
            $("#date_expiration").datepicker({
                minDate: +0,
                // maxDate: "+12M +0D",
                dateFormat: "yy-mm-dd"

            });
        });
    </script> 


    <?php # date_expiration     ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_expiration"><?php _t("Expiration date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text"  
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

    <?php # Draft o registred  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-offset-3 col-sm-9">
            <div class="radio">

                <?php
                //  checked="" 
                // si no hay opcion se cojera registrado por defecto 
                if (_options_option("config_invoices_checked_by_default") == 10) {
                    $checked_10 = ' checked="" ';
                    $checked_0 = '  ';
                } else {
                    $checked_10 = '  ';
                    $checked_0 = ' checked="" ';
                }
                ?>
                <label>
                    <input type="radio" name="status" id="status" value="0" required="" <?php echo $checked_0; ?>> <?php _t("Draft"); ?>
                    <p><?php // echo _t("The customer can NOT see this invoice via the system");              ?></p>

                </label>
                <br>
                <label>
                    <input type="radio" name="status" id="status" value="10" required="" <?php echo $checked_10; ?> > <?php _t("Registred"); ?>
                    <p><?php //echo _t("The customer can view this invoice via the system");              ?></p>
                </label>
            </div>
        </div>
    </div>
    <?php # Draft o registred    ?>




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







    <?php # title       ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Title"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="title" class="form-control" id="title" placeholder="<?php _t("No title"); ?>">
        </div>
    </div>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>

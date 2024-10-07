<div>  
    <ul class="nav nav-tabs" role="tablist">    
        <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab"><?php _t("Individual"); ?></a></li>    

        <?php if (_options_option('config_invoices_monthly')) { ?>
            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab"><?php _t("Monthly"); ?></a></li>        
        <?php } ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>
        <?php // Individual ?>        
        <div role="tabpanel" class="tab-pane active" id="home">
            <h3><?php _t("Individual"); ?></h3>
            <table class="table table-striped" >
                <?php
                //     include "tabla_items_edit.php";
                //include "table_form_items_add.php"; 
                //     include "table_form_items_add_individual.php";
                //     include view("invoices","form_items_add_individual");
                ?>
            </table>
        </div>

        <?php
//        include view("invoices", "form_items_add_individual");
        include "short_form_items_add_individual.php";
        ?>




        <?php if (_options_option('config_invoices_monthly')) { ?>

            <div role="tabpanel" class="tab-pane" id="profile">
                <?php // MENSUAL ?>  
                <?php //include "tabla_items_monthly_edit.php" ; ?>
                <?php //include "table_form_items_monthly.php" ; ?>
                <?php
                if ($invoices['type'] == null) {

                    // este cliente tiene la factura mensual del mes de la factura?
//                    vardump(invoices_field_id('date', $id));
                    $month = (magia_dates_get_month_from_date(invoices_field_id('date', $id)));
                    $year = (magia_dates_get_year_from_date(invoices_field_id('date', $id)));
                    // busco la factura del ano-mes y cliente
//                    vardump(invoices_search_monthly_invoices_by_client_id_y_m($invoices['client_id'], $year, $month));
                    ?>

                    <h2><?php _t("Monthly invoice"); ?>: <?php echo _tr(magia_dates_month($month)); ?> <?php echo $year; ?></h2>

                    <?php
                    if (invoices_search_monthly_invoices_by_client_id_y_m($invoices['client_id'], $year, $month)) {
                        message('info', 'The monthly invoice for this month already exists');
                    } else {
                        ?>
                        <a class="btn btn-primary" 
                           href="index.php?c=invoices&a=ok_change_type&invoice_id=<?php echo $id; ?>">
                               <?php _t("Make this invoice a monthly invoice"); ?>
                        </a>
                    <?php }
                    ?>
                    <?php
                    /*                    <form class="form-horizontal">


                      <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Email</label>
                      <div class="col-sm-10">


                      <select class="form-control" name="month">


                      <?php for ($y = date('Y'); $y < date('Y') + 2; $y++) { ?>
                      <optgroup label="<?php echo $y; ?>">
                      <?php for ($m = 1; $m < 13; $m++) {

                      $disabled = (invoices_search_monthly_invoices_by_client_id_y_m($invoices['client_id'], $y, $m))?" disabled ":"";




                      ?>
                      <option value="<?php echo $m; ?>" <?php echo $disabled; ?>>
                      <?php echo $m; ?> -
                      <?php echo magia_dates_month($m); ?>
                      <?php echo ($disabled)? _tr("Already exist"):""; ?>


                      </option>
                      <?php }
                      ?>
                      </optgroup>
                      <?php }
                      ?>





                      <optgroup label="afrique">
                      <option>Algérie</option>
                      <option>Maroc</option>
                      </optgroup>

                      </select>


                      </div>
                      </div>



                      <div class="form-group">
                      <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                      <div class="checkbox">
                      <label>
                      <input type="checkbox"> Remember me
                      </label>
                      </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-default">Sign in</button>
                      </div>
                      </div>
                      </form>

                     */
                    ?>
                <?php } ?>
            </div>
        <?php } ?>
    </div>
</div>








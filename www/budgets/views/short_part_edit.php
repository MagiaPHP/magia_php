<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">

        <div class="panel panel-default">
            <div class="panel-body text-center" >
                <h1>
                    <?php
                    if (modules_field_module('status', 'audio')) {
                        _t("Delivery note");
                    } else {
                        _t("Budget");
                    }
                    ?>: <?php echo $id; ?>
                </h1>                        
            </div>
        </div>

        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>


        <?php # SAVE ##################  ?>


        <?PHP
        /**
         *         <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_company.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_dates_registre.php"; ?>
          <?php // include "part_details_dates_expiration.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php include "part_details_billing_address.php"; ?>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <?php
          if (_options_option('config_address_use_delivery')) {
          include "part_details_delivery_address.php";
          }
          ?>
          </div>
          </div>
         * 
         */
        ?>

        <?php
        /**
         *                     <div class="row">
          <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="panel panel-default">
          <div class="panel-heading">Fecha de registro</div>
          <div class="panel-body">
          <span class="glyphicon glyphicon-pencil"></span>
          <?php //include "part_details_dates.php"; ?>
          </div>
          </div>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="panel panel-default">
          <div class="panel-heading">Fecha de Caducidad</div>
          <div class="panel-body">
          <span class="glyphicon glyphicon-pencil"></span>
          25-enero -2023
          </div>
          </div>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="panel panel-default">
          <div class="panel-heading">Referencia</div>
          <div class="panel-body">
          <span class="glyphicon glyphicon-pencil"></span>
          25002154
          </div>
          </div>
          </div>

          <div class="col-sm-12 col-md-3 col-lg-3">
          <div class="panel panel-default">
          <div class="panel-heading">Numero de documento</div>
          <div class="panel-body">
          <span class="glyphicon glyphicon-pencil"></span>
          2023-0005
          </div>
          </div>
          </div>
          </div>



         */
        ?>




        <?php
        $items = budget_lines_list_by_budget_id_without_transport($id);

        if ($items) {
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a name="items_details"></a><?php _t("items"); ?>
                </div>
                <div class="panel-body">
                    <?php include "short_table_items.php"; ?>
                </div>
            </div>
        <?php } else {
            ?>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <a name="items_details"></a><?php _t("items"); ?>
                </div>
                <div class="panel-body">
                    <?php include "short_table_items.php"; ?>
                </div>
            </div>
        <?php }
        ?>






        <a name="comments"></a>
        <?php
        include "short_part_comments.php";
        ?>
    </div>
</div>
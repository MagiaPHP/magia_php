<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><?php _t("Last orders"); ?></a></li>           

        <?php /*
          <li role="presentation" ><a href="#address" aria-controls="address" role="tab" data-toggle="tab"><?php _t("Address"); ?></a></li>
          <li role="presentation"><a href="#employee" aria-controls="messages" role="tab" data-toggle="tab"><?php _t("Employee"); ?></a></li>
          <li role="presentation"><a href="#directory" aria-controls="directory" role="tab" data-toggle="tab"><?php _t("Directory"); ?></a></li>
         */ ?>



    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="orders">
            <?php include "contacts_orders_by_patient.php"; ?>
            <?php //include "contacts_orders.php"; ?>
        </div>

        <?php /* <div role="tabpanel" class="tab-pane " id="employee">
          employee
          <?php //include "contacts_orders_by_patient.php"; ?>
          <?php //include "contacts_orders.php"; ?>
          </div>

          <div role="tabpanel" class="tab-pane " id="directory">
          <?php include "contacts_directory.php"; ?>
          <?php //include "contacts_orders.php"; ?>
          </div>
          <div role="tabpanel" class="tab-pane " id="orders">
          <?php include "contacts_directory.php"; ?>
          <?php //include "contacts_orders.php"; ?>
          </div>

         */ ?>




    </div>

</div>



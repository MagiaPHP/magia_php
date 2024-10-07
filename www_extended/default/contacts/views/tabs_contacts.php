<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><?php _t("Last orders"); ?></a></li>                        
        <li role="presentation" ><a href="#address" aria-controls="address" role="tab" data-toggle="tab"><?php _t("Info"); ?></a></li>
        <?php /* <li role="presentation"><a href="#employee" aria-controls="messages" role="tab" data-toggle="tab"><?php _t("Employees"); ?></a></li> 
          <li role="presentation"><a href="#company" aria-controls="company" role="tab" data-toggle="tab"><?php _t("Company"); ?></a></li>
          <li role="presentation"><a href="#directory" aria-controls="directory" role="tab" data-toggle="tab"><?php _t("Directory"); ?></a></li>
          <li role="presentation"><a href="#system" aria-controls="system" role="tab" data-toggle="tab"><?php _t("System"); ?></a></li> */ ?>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="orders">
            <h3><?php _t("Last 10 orders"); ?></h3>
            <?php include "contacts_orders_by_patient.php"; ?>
            <?php //include "contacts_orders.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane " id="address">  
            <h2><?php _t("Address"); ?></h2>
            <?php include "contacts_address.php"; ?>

            <h2><?php _t("Directory"); ?></h2>
            <?php include "contacts_directory.php"; ?>

            <h2><?php _t("Company"); ?></h2>
            <?php include "contacts_company.php"; ?>       



            <h2><?php _t("Cloud"); ?></h2>
            <?php include "contacts_system.php"; ?>

        </div>




        <div role="tabpanel" class="tab-pane " id="employee">            
            <?php //include "contacts_employees.php"; ?>            
        </div>

        <div role="tabpanel" class="tab-pane " id="company">            
            <?php //include "contacts_company.php"; ?>            
        </div>

        <?php
        /*        <div role="tabpanel" class="tab-pane " id="directory">
          <?php include "contacts_directory.php"; ?>
          <?php //include "contacts_orders.php"; ?>
          </div> */
        ?>

        <div role="tabpanel" class="tab-pane " id="orders">
            <?php //include "contacts_directory.php"; ?>
            <?php //include "contacts_orders.php"; ?>
        </div>

        <?php
        /*
          <div role="tabpanel" class="tab-pane " id="system">
          <?php include "contacts_system.php"; ?>
          <?php //include "contacts_orders.php"; ?>
          </div>


         */
        ?>



    </div>

</div>



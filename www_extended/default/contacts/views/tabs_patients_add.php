<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active">
            <a href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><?php _t("Contacts"); ?></a>
        </li>           

        <li role="presentation" >
            <a href="#new" aria-controls="address" role="tab" data-toggle="tab"><?php _t("New contact"); ?></a>
        </li>
        <?php /*

          <li role="presentation"><a href="#employee" aria-controls="messages" role="tab" data-toggle="tab"><?php _t("Employee"); ?></a></li>
          <li role="presentation"><a href="#directory" aria-controls="directory" role="tab" data-toggle="tab"><?php _t("Directory"); ?></a></li>
         */ ?>



    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="orders">
            <h3><?php _t("Company's contacts"); ?></h3>
            <?php include "form_contacts_employees_add.php"; ?>                        
        </div>

        <div role="tabpanel" class="tab-pane " id="new">

            <h1>please add new contact first</h1>

            <?php //include "form_contacts_employees_add_new.php"; ?>                                    
        </div>


        <?php /*
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



<div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active"><a href="#orders" aria-controls="orders" role="tab" data-toggle="tab"><?php _t("Last orders"); ?></a></li>   

        <li role="presentation"               ><a href="#contacts" aria-controls="contacts" role="tab" data-toggle="tab"><?php _t("Contacts"); ?></a></li>
        <li role="presentation"               ><a href="#patients" aria-controls="patients" role="tab" data-toggle="tab"><?php _t("Patients"); ?></a></li>
        <li role="presentation"              ><a href="#employees" aria-controls="employees" role="tab" data-toggle="tab"><?php _t("Employees"); ?></a></li>
        <li role="presentation"               ><a href="#directory" aria-controls="directory" role="tab" data-toggle="tab"><?php _t("Directory"); ?></a></li>
        <?php if (permissions_has_permission($u_rol, "banks", "read")) { ?> <li role="presentation"               ><a href="#banks" aria-controls="directory" role="tab" data-toggle="tab"><?php _t("Banks"); ?></a></li> <?php } ?>
        <li role="presentation"><a href="#addressess" aria-controls="addressess" role="tab" data-toggle="tab"><?php _t("Addresses"); ?></a></li>



    </ul>

    <!-- Tab panes -->
    <div class="tab-content">

        <div role="tabpanel" class="tab-pane active" id="orders">
            <?php include "part_contacts_orders_by_company.php"; ?>
        </div>


        <div role="tabpanel" class="tab-pane" id="contacts">
            <?php include "part_contacts_contacts.php"; ?>
        </div>



        <div role="tabpanel" class="tab-pane" id="addressess">            
            <?php include "part_contacts_address.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="employees">
            <?php include "part_contacts_employees.php"; ?>
        </div>




        <div role="tabpanel" class="tab-pane" id="patients">
            <?php include "part_contacts_patients.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="employees">
            <?php include "part_contacts_employees.php"; ?>
        </div>

        <div role="tabpanel" class="tab-pane" id="directory">
            <?php include "part_contacts_directory.php"; ?>
        </div>

        <?php if (permissions_has_permission($u_rol, "banks", "read")) { ?>
            <div role="tabpanel" class="tab-pane" id="banks">
                <?php include "part_contacts_banks.php"; ?>
            </div>
        <?php } ?> 


    </div>

</div>
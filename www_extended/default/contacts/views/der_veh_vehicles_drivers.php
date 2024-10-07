<?php include view('contacts', 'der_hr_employee_documents_all'); ?>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Driver's license"); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php
        // si el empleado ya esta en la DB
        if (!veh_drivers_search_by_unique("id", "contact_id", $id)) {
            $arg['redi'] = '5';
            $arg['c'] = 'contacts';
            $arg['a'] = 'veh_vehicles_drivers';
            $arg['params'] = "id=$id";
            $arg['contact_id'] = $id;

            include view('veh_drivers', 'form_add_by_employee');
        } else {
            message('info', "This contact already has a registered driver's license");
        }
        ?>
    </div>
</div>


<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?php _t("Assign a vehicle to this contact."); ?>
        </h3>
    </div>
    <div class="panel-body">

        <?php
        if (veh_drivers_search_by_unique("id", "contact_id", $id) && !veh_drivers_search_by_unique("expired", "contact_id", $id)) {

            if (veh_vehicles_list_unassigned($id)) {
                $arg['redi'] = '5';
                $arg['c'] = 'contacts';
                $arg['a'] = 'veh_vehicles_drivers';
                $arg['params'] = "id=$id";
                $arg['driver_id'] = $id;

                include view("veh_vehicles_drivers", "form_add_by_employee");
            } else {
                message('info', "There are no longer available vehicles for this driver");
            }
        } else {
            message('info', "This contact must have a valid driver's license before assigning a vehicle");
        }
        ?>
    </div>
</div>
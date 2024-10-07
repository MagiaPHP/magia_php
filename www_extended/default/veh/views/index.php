<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php include view("veh", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-10 col-lg-10">
        <?php include view("veh", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="row">


            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/253/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Vehicles"); ?>
                        </h3>


                        <p>
                            <?php _t("Details of a vehicle"); ?>
                        </p>



                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="veh_vehicles">
                            <input type="hidden" name="a" value="details">



                            <div class="form-group">
                                <label for="FiledName"></label>
                                <select                                     
                                    class="form-control selectpicker" 
                                    id="id" 
                                    data-live-search="true"
                                    name="id"
                                    >
                                        <?php
                                        foreach (veh_vehicles_list() as $key => $vehicle) {
                                            echo '<option value="' . $vehicle['id'] . '">' . ($vehicle['name']) . ' ' . $vehicle['marca'] . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/254/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Drivers"); ?>
                        </h3>
                        <p>
                            <?php _t('Vehicles activities'); ?>
                        </p>
                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="veh_vehicle_activities">
                            <input type="hidden" name="a" value="index">



                            <div class="form-group">
                                <label for="FiledName"></label>
                                <select 
                                    class="form-control selectpicker" id="id" data-live-search="true"

                                    name="id">
                                        <?php
                                        foreach (employees_list_by_company($u_owner_id) as $key => $my_employee) {
                                            echo '<option value="' . $my_employee['contact_id'] . '">' . contacts_formated($my_employee['contact_id']) . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>


            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/254/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Traffic tickets"); ?>
                        </h3>
                        <p>
                            <?php _t('Registre traffic ticket'); ?>
                        </p>
                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="veh_vehicle_activities">
                            <input type="hidden" name="a" value="index">



                            <div class="form-group">
                                <label for="FiledName"></label>
                                <select 
                                    class="form-control selectpicker" id="id" data-live-search="true"

                                    name="id">
                                        <?php
                                        foreach (employees_list_by_company($u_owner_id) as $key => $my_employee) {
                                            echo '<option value="' . $my_employee['contact_id'] . '">' . contacts_formated($my_employee['contact_id']) . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/255/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Worked days"); ?>
                        </h3>
                        <p>
                            <?php _t('Recorder the hours worked by several workers at the same time'); ?>
                        </p>
                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="veh_employee_worked_days">
                            <input type="hidden" name="a" value="index">



                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>



            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/256/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Payroll"); ?>
                        </h3>
                        <p>
                            <?php _t('Payroll'); ?>
                        </p>
                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="veh_payroll">
                            <input type="hidden" name="a" value="by_month">



                            <div class="form-group">
                                <label for="id"></label>
                                <select 
                                    class="form-control selectpicker" id="id" data-live-search="true"
                                    name="id">
                                        <?php
                                        foreach (employees_list_by_company($u_owner_id) as $key => $my_employee) {
                                            echo '<option value="' . $my_employee['contact_id'] . '">' . contacts_formated($my_employee['contact_id']) . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>





            <div class="col-sm-6 col-md-3 col-lg-2">
                <div class="thumbnail">
                    <img src="https://picsum.photos/250/100" alt="...">
                    <div class="caption">
                        <h3>
                            <?php _t("Projects"); ?>
                        </h3>
                        <p>
                            <?php _t('Details of hours worked according to project'); ?>
                        </p>
                        <form method="get" action="index.php">

                            <input type="hidden" name="c" value="projects">
                            <input type="hidden" name="a" value="hours_worked">



                            <div class="form-group">
                                <label for="id"></label>
                                <select 
                                    class="form-control selectpicker" id="id" data-live-search="true"
                                    name="id">
                                        <?php
                                        foreach (projects_list() as $key => $projects_item) {
                                            echo '<option value="' . $projects_item['id'] . '">' . ($projects_item['name']) . ' | ' . contacts_formated($projects_item['contact_id']) . '</option>';
                                        }
                                        ?>
                                </select>
                            </div>


                            <button type="submit" class="btn btn-default">
                                <?php echo icon("ok"); ?> 
                                <?php _t("Submit"); ?>
                            </button>
                        </form>
                    </div>
                </div>
            </div>




        </div>






    </div>
</div>

<?php include view("home", "footer"); ?> 

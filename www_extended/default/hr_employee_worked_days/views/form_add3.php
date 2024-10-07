<?php
# MagiaPHP 
# file date creation: 2024-05-30 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
            <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true" >
                <?php //employees_select("id", array("name"), "" , array()); ?>                        
                <?php
                foreach (employees_list_by_company($u_owner_id) as $key => $employee) {
                    echo '<option value="' . $employee['contact_id'] . '">' . $employee['contact_id'] . ' | ' . contacts_formated($employee['contact_id']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>




    <?php # start_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_am"><?php _t("Start_am"); ?></label>
        <div class="col-sm-8">
            <input type="time" step="any" name="start_am" class="form-control" id="start_am" placeholder="start_am" value="" >
        </div>	
    </div>
    <?php # /start_am ?>

    <?php # end_am ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_am"><?php _t("End_am"); ?></label>
        <div class="col-sm-8">
            <input type="time" step="any" name="end_am" class="form-control" id="end_am" placeholder="end_am" value="" >
        </div>	
    </div>
    <?php # /end_am ?>

    <?php # lunch ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lunch"><?php _t("Lunch"); ?></label>
        <div class="col-sm-8">
            <input type="time" step="any" name="lunch" class="form-control" id="lunch" placeholder="lunch" value="30" >
        </div>	
    </div>
    <?php # /lunch ?>








    <?php # start_pm   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="start_pm"><?php _t("Start_pm"); ?></label>
        <div class="col-sm-8">
            <input type="time" step="any" name="start_pm" class="form-control" id="start_pm" placeholder="start_pm" value="" >
        </div>	
    </div>
    <?php # /start_pm  ?>

    <?php # end_pm   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="end_pm"><?php _t("End_pm"); ?></label>
        <div class="col-sm-8">
            <input type="time" step="any" name="end_pm" class="form-control" id="end_pm" placeholder="end_pm" value="" >
        </div>	
    </div>
    <?php # /end_pm  ?>


    <?php # project_id   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="project_id"><?php _t("Project_id"); ?></label>
        <div class="col-sm-8">
            <select name="project_id" class="form-control selectpicker" id="project_id" data-live-search="true" >
                <?php projects_select("id", array("id"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /project_id  ?>

    <?php # notes   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.notes.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /notes  ?>

    <?php # order_by   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by  ?>

    <?php # status   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status   ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

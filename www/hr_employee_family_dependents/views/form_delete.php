<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:17 
#################################################################################
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_family_dependents">
    <input type="hidden" name="a" value="ok_delete">
    <input type="hidden" name="id" value="<?php echo $hr_employee_family_dependents->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">    
    <input type="hidden" name="redi[c]" value="<?php echo (isset($arg["c"])) ? $arg["c"] : ""; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo (isset($arg["a"])) ? $arg["a"] : ""; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo isset($arg["params"]) ? $arg["params"] : ""; ?>">

        <?php # employee_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="employee_id"><?php _t("Employee_id"); ?></label>
        <div class="col-sm-8">
               <select name="employee_id" class="form-control selectpicker" id="employee_id" data-live-search="true"  disabled="" >
                    
                <?php 
                // 1 param : value 
                // 2 param : array() values from table to show like label 
                // 3 param : value selected by default
                // 4 param : array() values disabled     

                employees_select("contact_id", array("contact_id"), $hr_employee_family_dependents->getEmployee_id() , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /employee_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name"  required=""  value="<?php echo $hr_employee_family_dependents->getName(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lastname"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname"  required=""  value="<?php echo $hr_employee_family_dependents->getLastname(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /lastname ?>

    <?php # birthday ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="birthday"><?php _t("Birthday"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="birthday" class="form-control" id="birthday" placeholder="birthday"  value="<?php echo $hr_employee_family_dependents->getBirthday(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /birthday ?>

    <?php # relation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="relation"><?php _t("Relation"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="relation" class="form-control" id="relation" placeholder="relation"  required=""  value="<?php echo $hr_employee_family_dependents->getRelation(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /relation ?>

    <?php # in_charge ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_charge"><?php _t("In_charge"); ?></label>
        <div class="col-sm-8">
            <select name="in_charge" class="form-control" id="in_charge"  disabled="" >                
                <option value="1" <?php echo ($hr_employee_family_dependents->getIn_charge() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_family_dependents->getIn_charge() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /in_charge ?>

    <?php # handicap ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="handicap"><?php _t("Handicap"); ?></label>
        <div class="col-sm-8">
            <select name="handicap" class="form-control" id="handicap"  disabled="" >                
                <option value="1" <?php echo ($hr_employee_family_dependents->getHandicap() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_family_dependents->getHandicap() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /handicap ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea"  disabled="" ><?php echo $hr_employee_family_dependents->getNotes(); ?></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by"   required=""  value="<?php echo $hr_employee_family_dependents->getOrder_by(); ?>"  disabled="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status"  disabled="" >                
                <option value="1" <?php echo ($hr_employee_family_dependents->getStatus() == 1 )? " selected " : "" ;  ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_employee_family_dependents->getStatus() == 0 )? " selected " : "" ;  ?> ><?php echo _t("Blocked"); ?></option>
                </select>
        </div>	
    </div>
    <?php # /status ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-danger active" type ="submit" value ="<?php _t("Delete"); ?>">
        </div>      							
    </div>      							

</form>


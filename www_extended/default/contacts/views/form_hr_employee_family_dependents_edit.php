<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_family_dependents">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $hr_employee_family_dependents_item['id']; ?>">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_family_dependents">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">


    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="name" class="form-control" id="name" placeholder="name" value="<?php echo $hr_employee_family_dependents_item['name']; ?>" >
        </div>	
    </div>
    <?php # /name ?>

    <?php # lastname ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="lastname"><?php _t("Lastname"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="lastname" class="form-control" id="lastname" placeholder="lastname" value="<?php echo $hr_employee_family_dependents_item['lastname']; ?>" >
        </div>	
    </div>
    <?php # /lastname ?>

    <?php # birthday ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="birthday"><?php _t("Birthday"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="birthday" class="form-control" id="birthday" placeholder="birthday" value="<?php echo $hr_employee_family_dependents_item['birthday']; ?>" >
        </div>	
    </div>
    <?php # /birthday ?>





    <?php # relation ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="relation"><?php _t("Relation"); ?></label>
        <div class="col-sm-8">

            <select name="relation" id="relation" class="form-control">
                <?php
                foreach (hr_employee_family_dependents_get_enum_values_for_relation() as $key => $relation) {

                    $selected_relation = ($relation == $hr_employee_family_dependents_item['relation']) ? ' selected ' : '';

                    echo '<option value="' . $relation . '" ' . $selected_relation . '>' . _tr($relation) . '</option>';
                }
                ?>
            </select>


        </div>	
    </div>
    <?php # /relation  ?>








    <?php # in_charge  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="in_charge"><?php _t("In_charge"); ?></label>
        <div class="col-sm-8">
            <select name="in_charge" class="form-control" id="in_charge" >                
                <option value="1" <?php echo ($hr_employee_family_dependents_item['in_charge'] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Yes"); ?></option>
                <option value="0" <?php echo ($hr_employee_family_dependents_item['in_charge'] == 0 ) ? " selected " : ""; ?> ><?php echo _t("No"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /in_charge  ?>

    <?php # handicap  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="handicap"><?php _t("Handicap"); ?></label>
        <div class="col-sm-8">
            <select name="handicap" class="form-control" id="handicap" >                
                <option value="1" <?php echo ($hr_employee_family_dependents_item['handicap'] == 1 ) ? " selected " : ""; ?> ><?php echo _t("Yes"); ?></option>
                <option value="0" <?php echo ($hr_employee_family_dependents_item['handicap'] == 0 ) ? " selected " : ""; ?> ><?php echo _t("No"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /handicap  ?>

    <?php # notes  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="" ><?php echo $hr_employee_family_dependents_item['notes']; ?></textarea>    
        </div>	
    </div>
    <?php # /notes  ?>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>


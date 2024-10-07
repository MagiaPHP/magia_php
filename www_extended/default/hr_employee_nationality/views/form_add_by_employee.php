<?php
# MagiaPHP 
# file date creation: 2024-06-02 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_nationality">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">


    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_nationality">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">

    <?php
//    vardump(hr_employee_nationality_search_by_employee_id($id)); 
//    vardump(hr_employee_nationality_list_by_employee_id($id)); 
    ?>

    <?php # nationality ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="nationality"><?php _t("Nationality"); ?></label>
        <div class="col-sm-8">
            <select name="nationality" class="form-control selectpicker" id="nationality" data-live-search="true" >
                <?php // countries_select("countryCode", array("countryCode"), "" , array());   ?>                        
                <?php
                foreach (countries_list() as $key => $country) {

                    $disabled = ( in_array($country['countryCode'], hr_employee_nationality_list_by_employee_id($id))) ? " disabled " : "";

                    echo '<option value="' . $country['countryCode'] . '" ' . $disabled . '>' . _tr($country['countryName']) . '</option>';
                }
                ?>


            </select>
        </div>	
    </div>
    <?php # /nationality    ?>



    <?php # nationality    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="principal"><?php _t("Principal"); ?></label>
        <div class="col-sm-8">
            <div class="checkbox">

                <?php
//                vardump($id);
//                vardump(hr_employee_nationality_search_principal_by_employee_id($id));
                ?>

                <label>
                    <input 
                        type="checkbox" 
                        value="1" 
                        name="principal" 
                        <?php
                        if (hr_employee_nationality_search_principal_by_employee_id($id)) {
                            echo ' disabled ';
                        } else {
                            
                        }
                        ?>
                        > 
                </label>
            </div>
        </div>	
    </div>
    <?php # /nationality     ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

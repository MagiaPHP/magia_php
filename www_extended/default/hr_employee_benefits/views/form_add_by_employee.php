
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_benefits">
    <input type="hidden" name="a" value="ok_add">
    
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_benefits">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">


    <?php
    //vardump(hr_employee_benefits_list_benefits_by_employee_id($id));
    ?>

    <?php # /employee_id  ?>

    <?php # benefit  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="benefit_code"><?php _t("Benefit"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="benefit_code"> 
                <?php
                // benefocios segun categoria del empleado 
                //
                //$category = hr_employee_category_search_by_unique('category_code', 'employee_id', $id);
                // Benefiocios segun la categoruia del empelado 
                //              $disabled = '';
                foreach (hr_benefits_list_not_used_by($id) as $key => $hreb) {
//                    if (in_array($hreb['code'], hr_employee_benefits_list_benefits_by_employee_id($id))) {
//                        $disabled = ' disabled ';
//                    }
                    echo '<option value="' . $hreb['code'] . '">' . moneda($hreb['value']) . ' :  ' . _tr($hreb['title']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /benefit    ?>


    <?php # company_part    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="company_part"><?php _t("Company part"); ?></label>
        <div class="col-sm-8">

            <div class="input-group">

                <input 
                    class="form-control" 
                    type="number" 
                    name="company_part" 
                    id="company_part" 
                    value="100" 
                    placeholder=""
                    required=""
                    step="any"
                    max="100"
                    min="0"
                    >
                <div class="input-group-addon">%</div>
            </div>
        </div>	
    </div>
    <?php # /company_part     ?>



    <?php # periodicity  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="periodicity"><?php _t("Periodicity"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="periodicity">
                <?php
                foreach (hr_benefit_periodicity_list() as $every_key => $every_value) {
                    $selected_hrebpl = ($every_value['code'] == 30) ? " selected " : "";
                    echo '<option value="' . $every_value['code'] . '" ' . $selected_hrebpl . '>' . _tr($every_value['periodicity']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /periodicity    ?>

    <?php # price    ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input 
                type="number" 
                step="any"
                name="price" 
                class="form-control" 
                id="price" 
                placeholder="price" 
                value="" 
                >

            <p class="help-block">
                <?php _t("If you do not enter a value, the default value will be assigned"); ?>
            </p>

            <p class="help-block">
                <a href="index.php?c=hr_benefits">
                    <?php _t("Edit default values"); ?>
                </a>
            </p>


        </div>	
    </div>
    <?php # /price    ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>


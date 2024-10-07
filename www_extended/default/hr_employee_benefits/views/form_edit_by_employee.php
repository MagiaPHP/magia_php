
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_benefits">
    <input type="hidden" name="a" value="ok_edit">
    
    <input type="hidden" name="id" value="<?php echo $hr_employee_benefits->getId(); ?>">

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
            <select class="form-control" name="benefit_code" disabled=""> 
                <?php
                // benefocios segun categoria del empleado 
                //
                //$category = hr_employee_category_search_by_unique('category_code', 'employee_id', $id);
                // Benefiocios segun la categoruia del empelado 
                //              $disabled = '';
                foreach (hr_benefits_list() as $key => $hreb) {

//                    if (in_array($hreb['code'], hr_employee_benefits_list_benefits_by_employee_id($id))) {
//                        $disabled = ' disabled ';
//                    }

                    $selected = ($hreb['code'] == $hr_employee_benefits->getBenefit_code() ) ? " selected " : "";

                    echo '<option value="' . $hreb['code'] . '" ' . $selected . ' disabled>   ' . _tr($hreb['title']) . '</option>';
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
                    value="<?php echo $hr_employee_benefits->getCompany_part(); ?>" 
                    placeholder=""
                    required=""
                    step="any"
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

                    $selected_hrebpl = ($every_value['code'] == $hr_employee_benefits->getPeriodicity()) ? " selected " : "";

                    echo '<option value="' . $every_value['code'] . '" ' . $selected_hrebpl . '>' . _tr($every_value['periodicity']) . '</option>';
                }
                ?>
            </select>

        </div>	
    </div>
    <?php # /periodicity  ?>

    <?php # price  ?>
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
                required=""
                value="<?php echo $hr_employee_benefits->getPrice(); ?>" 

                >
        </div>	
    </div>
    <?php # /price  ?>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-primary">
                <?php echo icon("pencil"); ?> 
                <?php _t("Update"); ?>
            </button>
        </div>      							
    </div>      							

</form>


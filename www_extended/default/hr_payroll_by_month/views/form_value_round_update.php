<?php 
//vardump($prbm->getEmployee_id()); 
//vardump($prbm->getMonth_of_payroll()); 
//vardump($prbm->getYear_of_payroll()); 
?>

<form method="post" action="index.php">

    <input type="hidden" name="c" value="hr_payroll_by_month">
    <input type="hidden" name="a" value="ok_formule_update">
    
    <input type="hidden" name="employee_id" value="<?php echo $prbm->getEmployee_id(); ?>">
    <input type="hidden" name="month" value="<?php echo $prbm->getMonth_of_payroll(); ?>">
    <input type="hidden" name="year" value="<?php echo $prbm->getYear_of_payroll(); ?>">
    
    <input type="hidden" name="column" value="value_round">
    <input type="hidden" name="all_employees" value="0">

    <input type="hidden" name="redi[redi]" value="6">
    

    <div class="form-group">
        <label for="value"><?php _t("Value round"); ?></label>
        <input 
            class="form-control"
            type="number" 
            name="formule" 
            id="formule_<?php echo $employee_id; ?>" 
            step="any" 
            value="<?php echo $formule_value_round; ?>"
            placeholder="<?php echo $formule_value_round; ?>"
            autofocus=""                            
            >


    </div>

    <?php
    /**
     * 
      <div class="form-group">
      <div class="checkbox">
      <label>
      <input type="checkbox" name="all_employees" value="1" disabled=""> <?php _t("Register this formula for all employees"); ?>
      </label>
      </div>
      </div>
     */
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Submit"); ?>
    </button>

</form>

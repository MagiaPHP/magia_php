<form method="post" action="index.php">

    <input type="hidden" name="c" value="hr_employee_benefits_by_month">
    <input type="hidden" name="a" value="ok_quantity_update">
    <input type="hidden" name="id" value="<?php echo $hr_employee_benefits_by_month_item['id']; ?>">
    <input type="hidden" name="year" value="<?php echo $year; ?>">
    <input type="hidden" name="month" value="<?php echo $month; ?>">
    <input type="hidden" name="benefit_code" value="meal_vouchers">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="hr_employee_benefits_by_month">
    <input type="hidden" name="redi[a]" value="by_month">

    <div class="form-group">
        <label for="quantity"><?php _t("Quantity"); ?></label>
        <input type="number" class="form-control" name="quantity" id="quantity" placeholder=""
               value="<?php echo $hr_employee_benefits_by_month_item['quantity']; ?>"
               >
    </div>


    <div class="checkbox">
        <label>
            <input type="checkbox" name="all_workers" value="1"> <?php _t("Record this value for all workers"); ?> 
        </label>
    </div>





    <button type="submit" class="btn btn-default">
        <?php echo icon("ok"); ?> 
        <?php _t("Update"); ?>
    </button>

</form>
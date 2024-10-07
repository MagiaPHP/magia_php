<?php
# MagiaPHP 
# file date creation: 2024-06-14 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_payroll_items">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_payroll">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">


    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="code" id="code">
                <?php
                foreach (hr_payroll_items_without_formula_not_used_by($id) as $key => $hrpril) {

                    echo '<option value="' . $hrpril['code'] . '" >' . $hrpril['code'] . ' : ' . $hrpril['description'] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /code  ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value="" >
        </div>	
    </div>
    <?php # /value  ?>

    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

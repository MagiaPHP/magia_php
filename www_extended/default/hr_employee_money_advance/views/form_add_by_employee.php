<?php
# MagiaPHP 
# file date creation: 2024-06-13 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_money_advance">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $params['id']; ?>">

    <input type="hidden" name="redi[redi]" value="<?php echo $params['redi']; ?>">
    <input type="hidden" name="redi[c]" value="<?php echo $params['c']; ?>">
    <input type="hidden" name="redi[a]" value="<?php echo $params['a']; ?>">
    <input type="hidden" name="redi[params]" value="<?php echo $params['params']; ?>">




    <?php # date  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" 
                   required=""
                   >
        </div>	
    </div>
    <?php # /date  ?>

    <?php # value  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value=""
                   required=""
                   >
        </div>	
    </div>
    <?php # /value  ?>

    <?php # way  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="way"></label>
        <div class="col-sm-8">
            <select name="way" class="form-control" id="way" >                
                <option value="bank"><?php echo _t("Bank"); ?></option>

                <option value="cash"><?php echo _t("Cash"); ?></option>
            </select>        
        </div>	
    </div>
    <?php # /way  ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

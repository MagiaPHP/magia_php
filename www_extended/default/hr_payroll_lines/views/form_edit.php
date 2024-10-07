<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll_lines">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $hr_payroll_lines->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # payroll_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="payroll_id"><?php _t("Payroll_id"); ?></label>
        <div class="col-sm-8">
            <select name="payroll_id" class="form-control selectpicker" id="payroll_id" data-live-search="true" >
                <?php hr_payroll_select("id", array("id"), $hr_payroll_lines->getPayroll_id(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /payroll_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $hr_payroll_lines->getCode(); ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # days ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days" value="<?php echo $hr_payroll_lines->getDays(); ?>" >
        </div>	
    </div>
    <?php # /days ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <select name="quantity" class="form-control" id="quantity" >                
                <option value="1" <?php echo ($hr_payroll_lines->getQuantity() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_payroll_lines->getQuantity() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /quantity ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value="<?php echo $hr_payroll_lines->getValue(); ?>" >
        </div>	
    </div>
    <?php # /value ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ><?php echo $hr_payroll_lines->getDescription(); ?></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description ?>

    <?php # formula ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="formula"><?php _t("formula"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="formula" class="form-control" id="formula" placeholder="formula" value="<?php echo $hr_payroll_lines->getFormula(); ?>" >
        </div>	
    </div>
    <?php # /formula ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $hr_payroll_lines->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($hr_payroll_lines->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($hr_payroll_lines->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("pencil"); ?> <?php _t("Edit"); ?></button>
        </div>      							
    </div>      							

</form>


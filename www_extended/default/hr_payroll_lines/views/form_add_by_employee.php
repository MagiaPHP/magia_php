<?php
# MagiaPHP 
# file date creation: 2024-06-09 
//vardump($hr_payroll);
//vardump($hr_payroll->getId());
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="payroll_id" value="<?php echo $hr_payroll->getId(); ?>">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_payroll_edit">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id&payroll_id=" . $hr_payroll->getId(); ?>">



    <?php # code  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="" >
        </div>	
    </div>
    <?php # /code  ?>

    <?php # days  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days" value="" >
        </div>	
    </div>
    <?php # /days  ?>

    <?php # quantity  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity" value="" >
        </div>	
    </div>
    <?php # /quantity  ?>

    <?php # value  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value="" >
        </div>	
    </div>
    <?php # /value  ?>

    <?php # description  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>    
            <script>
                ClassicEditor
                        .create(document.querySelector('#'.description.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /description  ?>

    <?php # order_by  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by  ?>

    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status  ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

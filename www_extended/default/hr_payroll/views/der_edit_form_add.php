<?php
# MagiaPHP 
# file date creation: 2024-06-09 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_payroll_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="payroll_id" value="<?php echo $id; ?>">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="hr_payroll">
    <input type="hidden" name="redi[a]" value="edit">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">

            <select class="form-control" name="code" id="code">
                <?php
                foreach (hr_payroll_items_list() as $key => $hrpril) {
                    echo '<option value="' . $hrpril['code'] . '">' . $hrpril['code'] . ' : ' . $hrpril['description'] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /code ?>

    <?php # days ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="days"><?php _t("Days"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="days" class="form-control" id="days" placeholder="days" value="" >
        </div>	
    </div>
    <?php # /days ?>

    <?php # quantity ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="quantity"><?php _t("Quantity"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="quantity" class="form-control" id="quantity" placeholder="quantity" value="" >
        </div>
    </div>
    <?php # /quantity ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="value" class="form-control" id="value" placeholder="value" value="" required="" >
        </div>	
    </div>
    <?php # /value ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="description"
                class="form-control" 
                id="description" 
                placeholder="description" 
                required=""
                ></textarea>    



        </div>	
    </div>
    <?php # /description ?>

    <?php # formula ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="formula"><?php _t("Formula"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="formula"
                class="form-control" 
                id="formula" 
                placeholder="formula" 
                required=""
                ></textarea>    



        </div>	
    </div>
    <?php # /description ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>




    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

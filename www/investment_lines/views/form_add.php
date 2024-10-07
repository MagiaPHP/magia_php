<?php
# MagiaPHP 
# file date creation: 2024-01-29 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="investment_lines">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # investment_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="investment_id"><?php _t("Investment_id"); ?></label>
        <div class="col-sm-8">
            <select name="investment_id" class="form-control selectpicker" id="investment_id" data-live-search="true" >
                <?php investments_select("id", "id", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /investment_id ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # value ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="value"><?php _t("Value"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="value" class="form-control" id="value" placeholder="value" value="" >
        </div>	
    </div>
    <?php # /value ?>

    <?php # irf ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="irf"><?php _t("Irf"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="irf" class="form-control" id="irf" placeholder="irf" value="" >
        </div>	
    </div>
    <?php # /irf ?>

    <?php # date_payment ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_payment"><?php _t("Date_payment"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_payment" class="form-control" id="date_payment" placeholder="date_payment" value="" >
        </div>	
    </div>
    <?php # /date_payment ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="status" class="form-control" id="status" placeholder="status" value="1" >
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							

</form>

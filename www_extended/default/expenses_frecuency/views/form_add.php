<?php
# MagiaPHP 
# file date creation: 2024-01-11 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses_frecuency">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">

    <?php # expense_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="expense_id"><?php _t("Expense_id"); ?></label>
        <div class="col-sm-8">
            <select name="expense_id" class="form-control selectpicker" id="expense_id" data-live-search="true" >
                <?php expenses_select("id", "id", "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /expense_id ?>

    <?php # every ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="every"><?php _t("Every"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="every" class="form-control" id="every" placeholder="every" value="" >
        </div>	
    </div>
    <?php # /every ?>

    <?php # times ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="times"><?php _t("Times"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="times" class="form-control" id="times" placeholder="times" value="" >
        </div>	
    </div>
    <?php # /times ?>

    <?php # date_start ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start ?>

    <?php # date_end ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="" >
        </div>	
    </div>
    <?php # /date_end ?>

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

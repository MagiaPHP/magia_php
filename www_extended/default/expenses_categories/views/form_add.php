<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'form_add');
}
?>

<?php
# MagiaPHP 
# file date creation: 2024-01-02 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses_categories">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $redi; ?>">

    <?php # father_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8">
            <select name="father_code" class="form-control selectpicker" id="father_code" data-live-search="true" >
                <option value="null"><?php _t('Choose an option'); ?></option>
                <?php expenses_categories_select("code", "category", "", array()); ?>                        
            </select>                      
        </div>	
    </div>
    <?php # /father_id ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="" value="" >
        </div>	
    </div>
    <?php # /category ?>

    <?php # category ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="category" class="form-control" id="category" placeholder="category" value="" >
        </div>	
    </div>
    <?php # /category ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea name="description" class="form-control" id="description" placeholder="description - textarea" ></textarea>
        </div>	
    </div>
    <?php # /description ?>

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
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
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

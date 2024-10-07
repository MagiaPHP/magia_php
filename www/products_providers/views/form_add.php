<?php 
# MagiaPHP 
# file date creation: 2024-07-31 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products_providers">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">
    
    <?php # product_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="product_code"><?php _t("Product_code"); ?></label>
        <div class="col-sm-8">
               <select name="product_code" class="form-control selectpicker" id="product_code" data-live-search="true" >
                <?php products_select("code", array("code"), "" , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /product_code ?>

    <?php # provider_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="provider_id"><?php _t("Provider_id"); ?></label>
        <div class="col-sm-8">
               <select name="provider_id" class="form-control selectpicker" id="provider_id" data-live-search="true" >
                <?php contacts_select("id", array("id"), "" , array()); ?>                        
                </select>
        </div>	
    </div>
    <?php # /provider_id ?>

    <?php # provider_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="provider_code"><?php _t("Provider_code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="provider_code" class="form-control" id="provider_code" placeholder="provider_code" value="" >
        </div>	
    </div>
    <?php # /provider_code ?>

    <?php # url ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <textarea name="url" class="form-control" id="url" placeholder="url - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . url . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /url ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="price" class="form-control" id="price" placeholder="price" value="" >
        </div>	
    </div>
    <?php # /price ?>

    <?php # notes ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea name="notes" class="form-control" id="notes" placeholder="notes - textarea" ></textarea>    <script>
        ClassicEditor
                .create(document.querySelector('#' . notes . ''))
                .catch(error => {
                    console.error(error);
                });
    </script>
        </div>	
    </div>
    <?php # /notes ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
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
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus");  ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

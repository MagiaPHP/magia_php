<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="services">
    <input type="hidden" name="a" value="ok_edit">
    <input type="hidden" name="id" value="<?php echo $services->getId(); ?>">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # category_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t("Category_code"); ?></label>
        <div class="col-sm-8">
            <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >
                <?php services_categories_select("code", array("code"), $services->getCategory_code(), array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /category_code ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="code" class="form-control" id="code" placeholder="code" value="<?php echo $services->getCode(); ?>" >
        </div>	
    </div>
    <?php # /code ?>

    <?php # service ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="service"><?php _t("Service"); ?></label>
        <div class="col-sm-8">
            <textarea name="service" class="form-control" id="service" placeholder="service - textarea" ><?php echo $services->getService(); ?></textarea>    <script>
                ClassicEditor
                        .create(document.querySelector('#'.service.''))
                        .catch(error => {
                            console.error(error);
                        });
            </script>
        </div>	
    </div>
    <?php # /service ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" step="any" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="<?php echo $services->getOrder_by(); ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1" <?php echo ($services->getStatus() == 1 ) ? " selected " : ""; ?> ><?php echo _t("Actived"); ?></option>
                <option value="0" <?php echo ($services->getStatus() == 0 ) ? " selected " : ""; ?> ><?php echo _t("Blocked"); ?></option>
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


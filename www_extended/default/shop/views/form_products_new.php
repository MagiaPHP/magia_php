<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products">
    <input type="hidden" name="a" value="addOk">

    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="category_id"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <select  name="category_id" class="form-control selectpicker" id="category_id" data-live-search="true">
                <?php // products_categories_select("id" , "id" , array() , array()) ; ?>                        

                <?php foreach (products_categories_list() as $key => $cat) { ?>
                    <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                <?php } ?>
            </select>
        </div>	
    </div>
    <?php # /category_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="name" class="form-control" id="name" placeholder="<?php _t("Product name"); ?>">
        </div>	
    </div>
    <?php # /name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <textarea class="form-control" name="description" id="description" placeholder="<?php _t("Product description here..."); ?>"></textarea>

        </div>	
    </div>
    <?php # /description ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="code" class="form-control" id="code" placeholder="<?php echo magia_uniqid(); ?>" value="<?php echo magia_uniqid(); ?>">
        </div>	
    </div>
    <?php # /code ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="price" class="form-control" id="price" placeholder=" - defecto">
        </div>	
    </div>
    <?php # /price ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">

            <select  name="tax" class="form-control selectpicker" id="tax" data-live-search="true">                               

                <?php foreach (tax_list() as $key => $tax) { ?>
                    <option value="<?php echo $tax['value']; ?>"><?php echo $tax['name']; ?>%</option>
                <?php } ?>
            </select>



        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="order_by" class="form-control" id="order_by" placeholder=" - defecto" value="1">
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <input type="text"  name="status" class="form-control" id="status" placeholder=" - defecto" value="1">
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

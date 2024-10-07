<form class="form-horizontal" action="index.php" method="get" >
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="product_edit">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Id"); ?></label>
        <div class="col-sm-8">                    
            <input type="id" name="id" class="form-control"  id="id" placeholder="id" value="<?php echo "$products[id]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # id ?>

    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">                    
            <input 
                type="category_id" 
                name="category_id" 
                class="form-control"  
                id="category_id" 
                placeholder="category_id" 
                value="<?php echo products_categories_field_id("name", $products['category_id']); ?>" disabled="" >
        </div>	
    </div>
    <?php # category_id ?>

    <?php # name ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="name" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$products[name]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # name ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Description"); ?></label>
        <div class="col-sm-8">   
            <textarea class="form-control" name="description" id="description" disabled=""><?php echo "$products[description]"; ?></textarea>


        </div>	
    </div>
    <?php # description ?>

    <?php # code ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="code" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$products[code]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # code ?>

    <?php # price ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Price"); ?></label>
        <div class="col-sm-8">                    
            <input type="price" name="price" class="form-control"  id="price" placeholder="price" value="<?php echo "$products[price]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # price ?>

    <?php # tax ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    
            <input type="tax" name="tax" class="form-control"  id="tax" placeholder="tax" value="<?php echo "$products[tax] %"; ?>" disabled="" >
        </div>	
    </div>
    <?php # tax ?>

    <?php # order_by ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="order_by" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$products[order_by]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # order_by ?>

    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="contact_id"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="status" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$products[status]"; ?>" disabled="" >
        </div>	
    </div>
    <?php # status ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>


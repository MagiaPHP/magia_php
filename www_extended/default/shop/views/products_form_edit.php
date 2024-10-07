<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="products">
    <input type="hidden" name="a" value="editOk">
    <input type="hidden" name="id" value="<?php echo "$id"; ?>">



    <?php # category_id ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="category_id"><?php _t("Category_id"); ?></label>
        <div class="col-sm-8">                    



            <select class="form-control" name="category_id" id="category_id">
                <?php
                foreach (products_categories_list() as $key => $cat) {
                    $selected = ($cat['id'] == $products['category_id']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $cat['id']; ?>"  <?php echo $selected; ?>  ><?php echo $cat['name']; ?></option>
                <?php } ?>
            </select>




        </div>	
    </div>
    <?php # /category_id  ?>

    <?php # name  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Name"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="name" class="form-control"  id="name" placeholder="name" value="<?php echo "$products[name]"; ?>" >
        </div>	
    </div>
    <?php # /name  ?>

    <?php # description  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8"> 
            <textarea class="form-control" name="description" id="description"><?php echo "$products[description]"; ?></textarea>                        
        </div>	
    </div>
    <?php # /description  ?>

    <?php # code  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="code"><?php _t("Code"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="code" class="form-control"  id="code" placeholder="code" value="<?php echo "$products[code]"; ?>" >
        </div>	
    </div>
    <?php # /code  ?>

    <?php # price  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="price"><?php _t("Price"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="price" class="form-control"  id="price" placeholder="price" value="<?php echo "$products[price]"; ?>" >
        </div>	
    </div>
    <?php # /price  ?>

    <?php # tax  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">                    




            <select class="form-control" name="tax" id="tax">
                <?php
                foreach (tax_list() as $key => $tax) {
                    $selected = ($tax['value'] == $products['tax']) ? " selected " : "";
                    ?>
                    <option value="<?php echo $tax['value']; ?>"  <?php echo $selected; ?>  ><?php echo $tax['value']; ?> % </option>
                <?php } ?>
            </select>





        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="order_by" class="form-control"  id="order_by" placeholder="order_by" value="<?php echo "$products[order_by]"; ?>" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">                    
            <input type="text" name="status" class="form-control"  id="status" placeholder="status" value="<?php echo "$products[status]"; ?>" >
        </div>	
    </div>
    <?php # /status  ?>





    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Edit"); ?>">
        </div>      							
    </div>      							

</form>


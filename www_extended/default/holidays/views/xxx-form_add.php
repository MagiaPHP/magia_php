<?php
# MagiaPHP 
# file date creation: 2024-06-12 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="holidays">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # country ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?></label>
        <div class="col-sm-8">
            <select name="country" class="form-control selectpicker" id="country" data-live-search="true" >
                <?php
                foreach (countries_list() as $key => $country) {
                    echo '<option value="' . $country['countryCode'] . '">' . $country['countryName'] . '</option>';
                }
                ?>
            </select>


        </div>	
    </div>
    <?php # /country ?>

    <?php # category_code ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >
                <?php holidays_categories_select("code", array("category"), "", array()); ?>                        
            </select>
        </div>	
    </div>
    <?php # /category_code ?>

    <?php # date ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date" class="form-control" id="date" placeholder="date" value="" >
        </div>	
    </div>
    <?php # /date ?>

    <?php # description ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="description"><?php _t("Description"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="description" class="form-control" id="description" placeholder="description" value="" >
        </div>	
    </div>
    <?php # /description ?>





    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

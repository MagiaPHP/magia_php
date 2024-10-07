<?php
# MagiaPHP 
# file date creation: 2024-04-12 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="country_tax">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg["redi"]; ?>">

    <?php # country ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="country"><?php _t("Country"); ?></label>
        <div class="col-sm-8">
            <select class="form-control selectpicker" data-live-search="true" name="country" required="">
                <?php
                foreach (countries_list() as $key => $country) {
                    echo '<option value="' . $country['countryCode'] . '">' . $country['countryName'] . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /country ?>

    <?php # tax  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="tax"><?php _t("Tax"); ?></label>
        <div class="col-sm-8">

            <select class="form-control selectpicker" data-live-search="true" name="tax" required="">



                <?php
                foreach (tax_list() as $key => $tl) {

                    echo '<option value="' . $tl['value'] . '">' . $tl['value'] . '%</option>';
                }
                ?>
            </select>




        </div>	
    </div>
    <?php # /tax ?>

    <?php # order_by  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="" >
        </div>	
    </div>
    <?php # /order_by ?>

    <?php # status  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Status"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control" id="status" >                
                <option value="1"><?php echo _t("Actived"); ?></option>
                <option value="0"><?php echo _t("Blocked"); ?></option>
            </select>
        </div>	
    </div>
    <?php # /status  ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

<?php
# MagiaPHP 
# file date creation: 2023-03-07 
//vardump($location);
?>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="_menus">
    <input type="hidden" name="a" value="ok_add">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="<?php echo $c; ?>">
    <input type="hidden" name="redi[a]" value="index">
    <input type="hidden" name="redi[params]" value="">

    <input type="hidden" name="status" value="1">

    <?php # location  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="location"><?php _t("Location"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="location" 
                class="form-control" 
                id="location" 
                placeholder="location" 
                value="<?php echo (isset($location)) ? $location : ''; ?>" 
                >
        </div>	
    </div>


    <?php # father_id   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="father_id"><?php _t("Father"); ?></label>
        <div class="col-sm-8">
            <select name="father_id" class="form-control selectpicker" id="father_id" data-live-search="true" >
                <option value="null"><?php _t("Without father"); ?></option>

                <?php
                foreach (_menus_list_by_location_without_father($c . '_nav') as $key => $mlblwf) {
                    echo '<option value="' . $mlblwf['id'] . '">' . $mlblwf['label'] . '</option>';
                }
                ?>

                <?php // _menus_select("id", "label", $father_id ?? null, array()); ?>                        

            </select>
        </div>	
    </div>
    <?php # /father_id   ?>

    <?php # label   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="label"><?php _t("Label"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="label" class="form-control" id="label" placeholder="label"
                   value="" 
                   >
        </div>	
    </div>
    <?php # /label   ?>

    <?php # controller   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" >
                <?php
                foreach (controllers_list() as $key => $clist) {
                    echo '<option value="' . $clist["controller"] . '" >' . ($clist['controller']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /controller   ?>

    <?php # url   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="url"><?php _t("Url"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="url" class="form-control" id="url" placeholder="url"
                   value="index.php?c=<?php echo $c; ?>" 
                   >
        </div>	
    </div>
    <?php # /url   ?>

    <?php # target   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="target"><?php _t("Target"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="target" class="form-control" id="target" placeholder="target"
                   value="" 
                   >
        </div>	
    </div>
    <?php # /target   ?>







    <?php # icon  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="icon"><?php _t("Icon"); ?></label>
        <div class="col-sm-8">
            <input type="text" name="icon" class="form-control" id="icon" placeholder="icon"
                   value="ok" 
                   >

            <span id="icon" class="help-block">
                <a href="https://getbootstrap.com/docs/3.4/components/" target="new"><?php _t("Icons"); ?></a>
            </span>
        </div>	

    </div>
    <?php # /icon       ?>


    <?php # order_by   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="order_by"><?php _t("Order_by"); ?></label>
        <div class="col-sm-8">
            <input type="number" name="order_by" class="form-control" id="order_by" placeholder="order_by" value="1" >
        </div>	
    </div>
    <?php # /order_by   ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Add"); ?>">
        </div>      							
    </div>      							

</form>

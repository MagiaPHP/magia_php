extended

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="config">
    <input type="hidden" name="a" value="ok_config_sides">
    <input type="hidden" name="redi" value="1">

    <input type="hidden" name="config_c" value="<?php echo $c; ?>">
    <input type="hidden" name="config_a" value="<?php echo $a; ?>">
    <input type="hidden" name="config_side" value="2">


    <?php # controller ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="config_controller"><?php _t("Controller"); ?></label>
        <div class="col-sm-8">
            <select name="config_controller" class="form-control selectpicker" id="config_controller" data-live-search="true" >
                <?php
                echo '<option value="">' . _tr('Select one') . '</option>';
                foreach (controllers_list() as $key => $value) {
                    echo '<option value="' . $value['controller'] . '">' . $value['controller'] . '</option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /controller   ?>

    <?php # views  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="config_views"><?php _t("Views"); ?></label>
        <div class="col-sm-8">
            <select name="config_view" class="form-control selectpicker" id="config_view" data-live-search="true" >
                <?php
                echo '<option value="">' . _tr('Select one') . '</option>';
                foreach (views_list_by_controller($c) as $vlbc) {
                    echo '<option value="' . $vlbc . '">' . $vlbc . '</option>';
                }
                ?>                        
            </select>
        </div>	
    </div>
    <?php # /views    ?>
    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Save"); ?>">
        </div>      							
    </div>      							
</form>





<div class="list-group">
    <a href="#" class="list-group-item active">
        <?php _menu_icon("top", 'subdomains'); ?>
        <?php echo _t("Subdomains"); ?>
    </a>
    <a href="index.php?c=subdomains" class="list-group-item"><?php _t("List"); ?></a>
    <a href="index.php?c=subdomains&a=add" class="list-group-item"><?php _t("Add"); ?></a> 
</div>
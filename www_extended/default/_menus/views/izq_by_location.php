


<?php
if (isset($location) && _menus_list_by_location_without_father($location)) {

    echo '<div class="list-group">';

    foreach (_menus_list_by_location_without_father($location) as $key => $mlblwf11) {

        $icon_mlblwf11 = ($mlblwf11['icon']) ? icon($mlblwf11['icon']) : null;

        $has_childrens = (_menus_list_childrens_from_father($mlblwf11['id'])) ? '<span class="badge">' . icon("chevron-right") . '</span>' : false;

        $active = ( isset($father_id) && $father_id == $mlblwf11['id'] ) ? true : false;

        $class_active = ($active) ? ' list-group-item-info ' : '';
        

        echo '<a href="index.php?c=_menus&a=search&w=by_father_id&id=' . $mlblwf11['id'] . '&father_id=' . $mlblwf11['id'] . '&location=' . $location . '&izq=by_location" class="list-group-item ' . $class_active . '">' . $icon_mlblwf11 . ' ' . $mlblwf11['label'] . ' ' . $has_childrens . '</a> ';
        //
        //
        //
    }

    echo '</div>';
}
?>





<div class="panel panel-default">
    <div class="panel-heading">
        <?php _t("Add"); ?>
    </div>
    <div class="panel-body">

        <form method="post" action="index.php">

            <input type="hidden" name="c" value="_menus">
            <input type="hidden" name="a" value="ok_add">
            <input type="hidden" name="location" value="<?php echo $location; ?>">


            <input type="hidden" name="redi[redi]" value="5">
            <input type="hidden" name="redi[c]" value="_menus">
            <input type="hidden" name="redi[a]" value="search">
            <input type="hidden" name="redi[params]" value="<?php echo urldecode("w=by_location&location=$location") ?>">

            <div class="form-group">
                <label for="label"><?php _t("Label"); ?></label>
                <input type="text" class="form-control" name="label" id="label" placeholder="" required="">
            </div>

            <div class="form-group">
                <label for="url"><?php _t("Url"); ?></label>
                <textarea class="form-control" name="url" placeholder="index.php" >index.php?c=home</textarea>
            </div>

            <div class="form-group">
                <label for="location"><?php _t("Controller"); ?></label>
                
                <?php //vardump(controllers_list()); ?>
                
                
                <?php /**
                 * <select name="controller" class="form-control selectpicker" id="controller" data-live-search="true" required="" >
                 * 
                 * <select name="office_id" class="form-control selectpicker" id="office_id" data-live-search="true" >
                 * 
                 * 
                 */ ?>
                
                
                    
                    
                
                <select name="controller" class="form-control" id="controller"  required="" >
                    <?php
                    foreach (controllers_list() as $key => $clist) {
                        echo '<option value="' . $clist["controller"] . '" >' . ($clist['controller']) . '</option>';
                    }
                    ?>
                </select>
            </div>


            <div class="form-group">
                <label for="icon"><?php _t("Icon"); ?></label>
                <input type="text" class="form-control" name="icon" id="icon" placeholder="">
                <p class="help-block"><a href="https://getbootstrap.com/docs/3.4/components/" target="new"><?php _t("Icons"); ?></a></p>

            </div>



            <div class="form-group">
                <label for="order_by"><?php _t("Order"); ?></label>
                <input type="number" class="form-control" name="order_by" id="order_by" placeholder="" value="<?php echo _menus_next_order_by_by_location($location) ?>">
            </div>


            <button type="submit" class="btn btn-default">
                <?php echo icon("plus"); ?> 
                <?php _t("Add"); ?>
            </button>
        </form>

    </div>
</div>



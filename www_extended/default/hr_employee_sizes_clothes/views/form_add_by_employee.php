<?php
# MagiaPHP 
# file date creation: 2024-05-30 
//$form_disabled = false;
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_sizes_clothes">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="order_by" value="1">
    <input type="hidden" name="status" value="1">

    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_sizes_clothes">
    <input type="hidden" name="redi[params]" value="id=<?php echo $id; ?>">




    <?php # clothes_code   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="clothes_code"><?php _t("Clothes"); ?></label>
        <div class="col-sm-8">
            <select class="form-control" name="clothes_code" required="">
                <?php
                foreach (hr_clothes_list() as $key => $hrcl) {

                    if (!in_array($hrcl['code'], hr_employee_sizes_clothes_list_codes_by_employee_id($id))) {

                        echo '<option value="' . $hrcl['code'] . '">' . _tr($hrcl['name']) . '</option>';
                    } else {
                        // ya no se puede seguir agregando cosas
                        //$form_disabled = true;
                    }
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /clothes_code       ?>

    <?php # size       ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="size"><?php _t("Size"); ?></label>
        <div class="col-sm-8">
            <input 
                type="text" 
                name="size" 
                class="form-control" 
                id="size" 
                placeholder="size" 
                value=""
                <?php // echo ($form_disabled) ? " disabled " : "";  ?>

                required=""

                >
        </div>	
    </div>
    <?php # /size       ?>

    <?php # notes       ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="notes"><?php _t("Notes"); ?></label>
        <div class="col-sm-8">
            <textarea 
                name="notes" 
                class="form-control" 
                id="notes" 
                placeholder="" 
                <?php // echo ($form_disabled) ? " disabled " : "";  ?>
                ></textarea>    


        </div>	
    </div>
    <?php # /notes        ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button 
                type="submit" 
                class="btn btn-default"
                <?php // echo ($form_disabled) ? " disabled " : "";  ?>
                ><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

<?php
//if ($form_disabled) {
//   // message('info', 'All items were added to this employee');
//}
?>
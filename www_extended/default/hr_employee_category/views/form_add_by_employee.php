<?php
# MagiaPHP 
# file date creation: 2024-06-02 
$form_disabled = false;

//vardump(hr_employee_category_list_codes_by_employee_id($id)); 
?>
<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="hr_employee_category">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="employee_id" value="<?php echo $id; ?>">
    <input type="hidden" name="redi[redi]" value="5">
    <input type="hidden" name="redi[c]" value="contacts">
    <input type="hidden" name="redi[a]" value="hr_employee_category">
    <input type="hidden" name="redi[params]" value="<?php echo "id=$id"; ?>">



    <?php # categoy_code   ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="category_code"><?php _t("Category"); ?></label>
        <div class="col-sm-8">
            <select name="category_code" class="form-control selectpicker" id="category_code" data-live-search="true" >

                <?php // hr_employee_categories_select("code", array("description"), "", array());   ?>                        


                <?php
                foreach (hr_categories_list() as $key => $hrecl) {

                    if (!in_array($hrecl['code'], hr_employee_category_list_codes_by_employee_id($id))) {

                        echo '<option value="' . $hrecl['code'] . '">' . _tr($hrecl['description']) . '</option>';
                    } else {
                        // ya no se puede seguir agregando cosas
                        $form_disabled = true;
                    }
                }
                ?>



            </select>
        </div>	
    </div>
    <?php # /categoy_code   ?>

    <?php # date_start  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_start"><?php _t("Date_start"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_start" class="form-control" id="date_start" placeholder="date_start" value="" >
        </div>	
    </div>
    <?php # /date_start   ?>

    <?php # date_end  ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date_end"><?php _t("Date_end"); ?></label>
        <div class="col-sm-8">
            <input type="date" name="date_end" class="form-control" id="date_end" placeholder="date_end" value="" >
        </div>	
    </div>
    <?php # /date_end   ?>


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    
            <button type="submit" class="btn btn-default"><?php echo icon("plus"); ?> <?php _t("Add"); ?></button>
        </div>      							
    </div>      							

</form>

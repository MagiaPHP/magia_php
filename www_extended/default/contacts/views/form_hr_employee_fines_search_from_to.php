<?php // vardump($category_code);         ?>

<form class="form-inline">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="hr_employee_fines">
    <input type="hidden" name="id" value="<?php echo $id; ?>">



    <div class="form-group">
        <label class="sr-only" for="from"></label>
        <input class="form-control" type="date" name="from" value="" placeholder="">
    </div>

    <div class="form-group">
        <label class="sr-only" for="to"></label>
        <input class="form-control" type="date" name="to" value="" placeholder="">
    </div>

    <div class="form-group">
        <label class="sr-only" for="cagetory_code"></label>





        <select class="form-control" name="category_code">


            <option value="all"><?php _t("All"); ?></option>
            <?php
            foreach (hr_fines_categories_list() as $key => $hrcl) {
                $hrcl_selected = ($hrcl['category_code'] == $category_code ) ? " selected " : "";
                echo '<option value="' . $hrcl['category_code'] . '" ' . $hrcl_selected . '>' . $hrcl['category'] . '</option>';
            }
            ?>
        </select>
    </div>
    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?> 
        <?php _t("Change"); ?>
    </button>
</form>
<br>

<p>
    <b><?php _t('From'); ?></b> 
    : 
    <?php echo magia_dates_formated($from); ?> 

    <b><?php _t('To'); ?></b> 
    : 
    <?php echo magia_dates_formated($to); ?> 

    <b><?php _t("Category"); ?></b> : <?php echo $category_code; ?>
</p>





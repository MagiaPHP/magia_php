<form class="form-inline" method="post">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_vat_value_default">
    <input type="hidden" name="redi[redi]" value="<?php echo $arg['redi']; ?>">
    <input type="hidden" name="redi[id]" value="<?php echo $arg['id']; ?>">



    <div class="form-group">


        <select class="form-control" name="data">
            <?php if ($tax_by_country) { ?>
                <?php foreach ($tax_by_country as $tax) { ?>                                                                
                    <?php $selected = ($tax['tax'] == _options_option("config_expenses_vat_value_default")) ? " selected " : " "; ?>                                                                
                    <option 
                        value="<?php echo $tax['tax']; ?>" 
                        <?php echo "$selected"; ?>>
                        <?php echo $tax['tax']; ?>%
                    </option>
                <?php } ?>
            <?php } else { ?> 
                <option value="0">0%</option>                              
            <?php } ?>
        </select>



    </div>

    <button type="submit" class="btn btn-primary">
        <?php _t("Add"); ?>
    </button>
</form>




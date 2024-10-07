

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi[redi]" value="2">


    <?php # provider_id ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="provider_id"><?php _t("Provider"); ?></label>
        <div class="col-sm-7">
            <select name="provider_id" class="form-control selectpicker" id="provider_id" data-live-search="true" >
                <?php //contacts_select("id","name", "" , array()); ?>      

                <?php
                $filter = null;
                foreach (contacts_headoffice_list($filter) as $key => $ho) {
                    echo '<option value="' . $ho['owner_id'] . '">' . contacts_formated($ho['owner_id']) . '</option>';
                }
                ?>
            </select>
        </div>	
    </div>
    <?php # /provider_id  ?>

    <?php #  ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="provider_id"><?php _t("Provider invoice reference"); ?></label>
        <div class="col-sm-7">
            <input type="text" class="form-control" name="provider_invoice_reference" id="" placeholder="">
        </div>	
    </div>
    <?php # /provider_id  ?>

    <?php # add lines ?>
    <div class="form-group">
        <label class="control-label col-sm-5" for="add_lines"><?php _t("Add lines"); ?></label>
        <div class="col-sm-7">
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="add_lines" value="1"> <?php _t("Add lines"); ?>
                </label>
            </div>        
        </div>	
    </div>
    <?php # /add lines  ?>


    <div class="form-group">
        <label class="control-label col-sm-5" for=""></label>
        <div class="col-sm-7">    
            <input class="btn btn-primary active" type ="submit" value ="<?php _t("Next"); ?>">
        </div>      							
    </div>      							

</form>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add">
    <input type="hidden" name="redi" value="1">


    <?php # provider_id ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="provider_id"><?php _t("Providers"); ?></label>
        <div class="col-sm-8">
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


    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    

            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>




        </div>      							
    </div>      							

</form>

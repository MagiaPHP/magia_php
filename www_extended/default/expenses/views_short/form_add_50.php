
<a name="50"></a>

<h1>
    <?php _menu_icon("top", 'expenses'); ?>
    <?php _t("Cuenta"); ?>
</h1>

<p>Con que cuenta deseas pagrar?</p>

<form class="form-horizontal" action="index.php" method="post">
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_40">
    <input type="hidden" name="redi" value="<?php echo $redi; ?>">


    <?php # status ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="status"><?php _t("Cuenta"); ?></label>
        <div class="col-sm-8">
            <select name="status" class="form-control selectpicker" id="status" data-live-search="true" >
                <?php
                foreach (banks_list_by_contact_id($u_owner_id) as $key => $bank) {
                    echo '<option value="' . $bank["account_number"] . '">' . $bank["account_number"] . '</option>';
                }
                ?>                  
            </select>
        </div>	
    </div>
    <?php # /status ?>


    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    


            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>



        </div>      							
    </div>      							

</form>

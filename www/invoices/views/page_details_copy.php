<?php
if (modules_field_module('status', "docu")) {
    echo docu_modal_bloc($c, $a, 'page_details_copy');
}
?>


<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="invoices">
    <input type="hidden" name="a" value="ok_copy">
    <input type="hidden" name="original_id" value="<?php echo $id; ?>">



    <div class="form-group">
        <label for="title" class="col-sm-3 control-label"><?php _t("Title"); ?></label>
        <div class="col-sm-9">
            <input 
                type="text" 
                name="title" 
                class="form-control" 
                id="title" 
                placeholder="<?php echo _t("Copy of invoice"); ?> <?php echo $id; ?>"
                value="<?php echo _t("Copy of invoice"); ?> <?php echo $id; ?>"
                >
        </div>
    </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <div class="radio">
                <label>
                    <input type="radio" name="status" value="0" required=""> <?php _t("Draft"); ?>
                    <p><?php echo _t("The customer can NOT see this invoice via the system"); ?></p>

                </label>
                <br>
                <label>
                    <input type="radio" name="status" value="10" required=""> <?php _t("Registred"); ?>
                    <p><?php echo _t("The customer can view this invoice via the system"); ?></p>
                </label>
            </div>
        </div>
    </div>





    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-9">
            <button type="submit" class="btn btn-primary">
                <span class="glyphicon glyphicon-copy"></span>
                <?php _t("Make a copy"); ?>
            </button>
        </div>
    </div>
</form>










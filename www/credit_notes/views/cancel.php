<?php include view("home", "header"); ?> 
<div class="row">
    <div class="col-sm-3 col-md-3 col-lg-3">
        <?php //include view("credit_notes", "der"); ?> 
    </div>
    <div class="col-sm-6 col-md-6 col-lg-6">
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <div class="panel panel-default">
            <div class="panel-body">
                <h1><?php _t("Cancel credit_note"); ?></h1>




                <form class="form-horizontal">

                    <div class="form-group">
                        <label for="id" class="col-sm-2 control-label"><?php _t("Invoice"); ?></label>
                        <div class="col-sm-10">
                            <p><?php echo $id; ?></p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label for="description" class="col-sm-2 control-label"><?php _t("Reason"); ?></label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputPassword3" placeholder="<?php _t("Reason for the cancellation"); ?>">
                        </div>
                    </div>

                    <?php if (balance_list_by_credit_note($id)) { ?>                  

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" checked=""> <?php _t("Create credit note for"); ?>: xxx euros
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox" >
                                    <label>
                                        <input type="checkbox" disabled=""> <?php _t("No payments have been registered, NO credit note will be created"); ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    <?php } ?>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default"><?php _t("Ok, cancel payment"); ?></button>
                        </div>
                    </div>





                </form>




            </div>
        </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
        <?php //include view("credit_notes", "der");  ?> 
    </div>
</div>
<?php include view("home", "footer"); ?>
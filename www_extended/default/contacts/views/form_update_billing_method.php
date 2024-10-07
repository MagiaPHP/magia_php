<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_billing_method">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">


    <?php if (offices_is_headoffice($id)) { ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="billing_method"><?php _t("Billing method"); ?></label>	


            <div class="col-sm-6">    

                <input  
                    disabled="" 
                    class="form-control" 
                    type ="text" 
                    name ="billing_method" 
                    id="billing_method"
                    value="<?php echo "$contact[billing_method]"; ?>"/> 
                <span id="status" class="help-block">
                    <p class="help-block">

                        M: mensual, I: individual


                    </p>
                </span>

            </div>

            <div class="col-sm-2">    

                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php #########################################################?>
                <?php if (permissions_has_permission($u_rol, "contacts", "update")) { ?>

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#billing_method_">
                        <?php _t("Update"); ?>
                    </button>



                    <div class="modal fade" id="billing_method_" tabindex="-1" role="dialog" aria-labelledby="billing_method_Label">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="billing_method_Label">
                                        <?php _t("Update"); ?>
                                    </h4>
                                </div>

                                <div class="modal-body">





                                    <h3><?php _t("Monthly billing"); ?></h3>

                                    <p>
                                        <?php _t("Choose this option if you want this client to receive a monthly invoice with the budgets for the month"); ?>
                                    </p>

                                    <h3><?php _t("Individual billing"); ?></h3>
                                    <p>
                                        <?php _t("Choose this option if you want to create an invoice for each quote for this client"); ?>
                                    </p>



                                    <div class="form-group ">

                                        <label for="billing_method" class="col-sm-4 control-label">
                                            <?php _t("Billing method"); ?>
                                        </label>


                                        <div class="col-sm-6">
                                            <select name="billing_method" class="form-control">
                                                <option value="null"><?php _t("Select one"); ?></option>
                                                <option value="m"><?php _t("Monthly"); ?></option>
                                                <option value="i"><?php _t("Individual"); ?></option>

                                            </select>
                                        </div>

                                    </div>

                                    <div class="form-group">
                                        <div class="col-sm-offset-4 col-sm-10">
                                            <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>                
                    <?php
                    ###############################################################
                    ###############################################################
                    ###############################################################
                    ###############################################################                
                }
                ?>




            </div>
        </div>
    <?php } ?>

</form>





<?php
//if (modules_field_module('status', "docu")) {
//    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
//}
?>
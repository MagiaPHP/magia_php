<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_discounts_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    <?php // if (offices_is_headoffice($id)) { ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="discounts"><?php _t("Discounts"); ?>

            </label>	

            <div class="col-sm-6">    

                <div class="input-group">

                    <input  
                        disabled="" 
                        class="form-control" 
                        type ="text" 
                        name ="discounts" 
                        id="discounts"
                        value="<?php echo "$contact[discounts]"; ?>"/> 
                    <div class="input-group-addon">%</div>
                </div>

                <span id="status" class="help-block">
                    <p class="help-block">
                        <?php _t("Default discount for this customer"); ?>; 
                        (<?php _t("Limit max"); ?>. <?php echo _options_option("config_discounts_max_to_customer"); ?> % 
                        <?php if (permissions_has_permission($u_rol, 'config', "update")) { ?> 
                            <a href="index.php?c=config&a=contacts_discounts_max_to_customer">
                                <?php _t("Edit"); ?>
                            </a>
                        <?php } ?>
                        )
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
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#discounts_update">
                        <?php _t("Update"); ?>
                    </button>
                    <div class="modal fade" id="discounts_update" tabindex="-1" role="dialog" aria-labelledby="discounts_updateLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="discounts_updateLabel">
                                        <?php _t("Update"); ?>
                                    </h4>
                                </div>

                                <div class="modal-body">
                                    <h2><?php _t("Update discounts"); ?></h2>

                                    <p>
                                        <?php _t("Discount that will be applied to this client in any transaction"); ?>
                                    </p>

                                    <div class="form-group">
                                        <label for="discounts" class="col-sm-2 control-label"><?php _t("Discounts"); ?></label>

                                        <div class="col-sm-5">
                                            <div class="input-group">
                                                <input 
                                                    type="number"
                                                    min="0"
                                                    max="<?php echo _options_option("config_discounts_max_to_customer"); ?>"
                                                    name="discounts" 
                                                    class="form-control" 
                                                    id="discounts" 
                                                    placeholder="<?php echo "$contact[discounts]"; ?>" 
                                                    value="<?php echo "$contact[discounts]"; ?>">
                                                <div class="input-group-addon">%</div>
                                            </div>

                                        </div>

                                    </div>

                                    <p>
                                        <?php _t("The new percentage is not applied to previously created documents"); ?>
                                    </p>

                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
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
    <?php // } ?>

</form>




<?php
//if (modules_field_module('status', "docu")) {
//    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
//}
?>
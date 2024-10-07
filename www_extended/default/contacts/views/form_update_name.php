<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_name_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("Office name"); ?>


        </label>	


        <div class="col-sm-6">    

            <input  
                disabled="" 
                class="form-control" 
                type ="text" 
                name ="name" 
                id="name"
                value="<?php echo $contact['name']; ?>"/> 
            <span id="status" class="help-block">
                <?php //_t("The preferred language for this company"); ?>
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
                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_name">
                    <?php _t("Update"); ?>
                </button>
                <div class="modal fade" id="update_name" tabindex="-1" role="dialog" aria-labelledby="update_nameLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="update_nameLabel">
                                    <?php _t("Update"); ?>
                                </h4>
                            </div>

                            <div class="modal-body">
                                <h2><?php _t("Update company name"); ?></h2>


                                <div class="form-group">
                                    <label for="discounts" class="col-sm-3 control-label"><?php _t("New name"); ?></label>

                                    <div class="col-sm-7">
                                        <input 
                                            type="text" 
                                            name="name" 
                                            class="form-control" 
                                            id="discounts" 
                                            placeholder="<?php echo _t("Company name"); ?>" 
                                            value="<?php echo $contact['name'] ?>"                                                
                                            >
                                    </div>

                                </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-3 col-sm-3">
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
</form>


<?php
//if (modules_field_module('status', "docu")) {
//    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
//}
?>
<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_language_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    <?php // if (offices_is_headoffice($id)) { ?>

        <div class="form-group">
            <label class="control-label col-sm-2" for="language">
                <?php _t("Language"); ?>
            </label>	
            <div class="col-sm-6">    
                <input  
                    disabled="" 
                    class="form-control" 
                    type ="text" 
                    name ="language" 
                    id="language"
                    value="<?php echo _tr(_languages_field_language("name", $contact['language'])); ?>"/> 
                <span id="status" class="help-block">
                    <?php _t("The preferred language for this company"); ?>
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
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_language">
                        <?php _t("Update"); ?>
                    </button>
                    <div class="modal fade" id="update_language" tabindex="-1" role="dialog" aria-labelledby="update_languageLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="update_languageLabel">
                                        <?php _t("Update"); ?>
                                    </h4>
                                </div>

                                <div class="modal-body">

                                    <h2><?php _t("Update language"); ?></h2>

                                    <div class="form-group">
                                        <label class="control-label col-sm-2" for="language"><?php _t("Language"); ?></label>
                                        <div class="col-sm-8">            
                                            <select class="form-control" name="language">
                                                <?php
                                                foreach (_languages_list_by_status(1) as $lang) {
                                                    $selected = ($lang['language'] == $contact['language']) ? " selected " : "";
                                                    ?>
                                                    <option value="<?php echo ($lang['language']); ?>" <?php echo $selected; ?>><?php echo _tr(_languages_field_language('name', $lang['language'])); ?></option>                    
                                                <?php } ?>
                                            </select>  

                                            <span id="status" class="help-block">
                                                <?php _t("The preferred language for this company"); ?>
                                            </span>
                                        </div>
                                    </div>

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

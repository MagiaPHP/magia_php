<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_cpanel_subdomain_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">



    <div class="form-group">
        <label class="control-label col-sm-2" for="name"><?php _t("SubDomain"); ?></label>	


        <div class="col-sm-6">    
            <input  
                disabled="" 
                class="form-control" 
                type ="text" 
                name ="subdomain" 
                id="subdomain"
                value="<?php echo $contact['name']; ?>"/> 
            <span id="status" class="help-block">
                <a href="https://server.coello.be:2083/cpsess0559602951/frontend/paper_lantern/subdomain/index.html" target="_new">
                    https://<?php echo strtolower($contact['tva']); ?>.factux.be
                </a>
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
            <?php if (permissions_has_permission($u_rol, "cpanel", "update")) { ?>

                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_subdomain">
                    <?php _t("Update"); ?>
                </button>


                <div class="modal fade" id="update_subdomain" tabindex="-1" role="dialog" aria-labelledby="update_subdomainLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="update_subdomainLabel">
                                    <?php _t("Update"); ?>
                                </h4>
                            </div>

                            <div class="modal-body">
                                <h2><?php _t("Update subdomain"); ?></h2>


                                <div class="form-group">
                                    <label for="discounts" class="col-sm-3 control-label"><?php _t("New subdomain"); ?></label>

                                    <div class="col-sm-7">
                                        <input 
                                            type="text" 
                                            name="subdomain" 
                                            class="form-control" 
                                            id="subdomain" 
                                            placeholder="<?php echo _t("Subdomain"); ?>" 
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
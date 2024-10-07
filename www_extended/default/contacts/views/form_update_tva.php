<form class="form-horizontal" method="post" action="index.php">

    <input type="hidden" name="c" value="contacts">
    <input type="hidden" name="a" value="ok_tva_update">
    <input type="hidden" name="contact_id" value="<?php echo $contact['id'] ?>">
    <input type="hidden" name="redi" value="1">

    

        <div class="form-group">
            <label class="control-label col-sm-2" for="tva">




                <?php _t("Tva"); ?>

                
                <?php
                if ($company->getIs_in_cloud()) {
                    echo '<a href="#"><span class="glyphicon glyphicon-cloud"></span></a>';
                }
                ?>
            </label>	

            <div class="col-sm-6">    

                <input  
                    disabled="" 
                    class="form-control" 
                    type ="text" 
                    name ="tva" 
                    id="tva"
                    value="<?php echo "$contact[tva]"; ?>"/> 
                <span id="status" class="help-block">

                    <p class="help-block">
                        <?php echo _tr("Company tax id"); ?>: 
                        <a href="https://kbopub.economie.fgov.be/kbopub/zoeknaamfonetischform.html" target="bce">BCE</a> - 
                        <a href="https://ec.europa.eu/taxation_customs/vies/?locale=fr" target="vies">VIES</a> - 
                        <a href="http://www.ejustice.just.fgov.be/tsv/tsvf.htm" target="moni">Moniteur</a> - 
                        <a href="https://data.be/" target="data">Data.be</a> - 
                        <a href="https://ec.europa.eu/taxation_customs/business/vat/eu-country-specific-information-vat_fr" target="eu"><?php _t("More"); ?></a>
                    </p>
                </span>

            </div>

            <div class="col-sm-2">    

                <?php #########################################################?>
                <?php
                /**
                 * Se puede editar la tva desde aca si la empresa no es 1022
                 */
                if (permissions_has_permission($u_rol, "contacts", "update")) {
                    ?>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#update_tva">
                        <?php _t("Update"); ?>
                    </button>

                    <div class="modal fade" id="update_tva" tabindex="-1" role="dialog" aria-labelledby="update_tvaLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="update_tvaLabel">
                                        <?php _t("Update"); ?>
                                    </h4>
                                </div>

                                <div class="modal-body">


                                    <h2><?php _t("Update tva number"); ?></h2>

                                    <?php
                                    // si hay motivos para no pder editar
                                    // lo mostrmaos aca
                                    if ($company->getWhy_can_not_edit_tva()) {
                                        echo "<h5>" . _tr('You cannot edit the tva number for the following reasons') . "</h5>";
                                        echo '<ul>';
                                        foreach ($company->getWhy_can_not_edit_tva() as $why) {
                                            echo '<li>' . _tr($why) . '</li>';
                                        }
                                        echo '</ul>';
                                    } else {
                                        ?>


                                        <div class="form-group">
                                            <label for="discounts" class="col-sm-2 control-label"><?php _t("Tva"); ?></label>

                                            <div class="col-sm-5">
                                                <input type="text"  name="tva" class="form-control" id="tva" placeholder="<?php echo "$contact[tva]"; ?>" value="<?php echo "$contact[tva]"; ?>">
                                            </div>

                                        </div>

                                        <div class="form-group">
                                            <div class="col-sm-offset-2 col-sm-10">
                                                <button type="submit" class="btn btn-default"><?php _t("Update"); ?></button>
                                            </div>
                                        </div>

                                    <?php } ?>





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



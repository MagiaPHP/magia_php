<button type="button" class="btn btn-default btn-sm" data-toggle="modal" data-target="#modal_invoices_see_via_web">
    <span class="glyphicon glyphicon-eye-open"></span> 
    <?php _t("See code"); ?>
</button>
<div 
    class="modal fade" 
    id="modal_invoices_see_via_web" 
    tabindex="-1" 
    role="dialog" 
    aria-labelledby="modal_invoices_see_via_webLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="modal_invoices_see_via_webLabel">
                    <?php _t("View and / or print invoices via the web"); ?>
                </h4>
            </div>
            <div class="modal-body">

                <?php
                // si no hay una url de app en config, no puede aparecer esto 

                if ($config_app['url']) {
                    ?>

                    <h3>
                        <?php _t("Copy this text and send it to your client by email"); ?>
                    </h3>



                    <div>
                        <ul class="nav nav-tabs" role="tablist">


                            <?php
                            $lang_actived = 'en_GB';
                            foreach (_languages_list_by_status(1) as $key => $lang) {
                                $lang_actived = ($lang['language'] == contacts_field_id('language', $invoices['client_id']) ) ? " active " : "";
                                ?>
                                <li role="presentation" class="<?php echo $lang_actived; ?>">
                                    <a href="#<?php echo $lang['language']; ?>" aria-controls="profile" role="tab" data-toggle="tab">
                                        <?php _t($lang['name'], $lang['language']); ?>
                                    </a>
                                </li>
                                <?php
                                $lang_actived = false;
                            }
                            ?>


                        </ul>


                        <div class="tab-content">

                            <?php
                            $lang_actived = false;

                            foreach (_languages_list_by_status(1) as $key => $lang) {

                                $lang_actived = ($lang['language'] == contacts_field_id('language', $invoices['client_id']) ) ? " active " : "";
                                ?>
                                <div 
                                    role="tabpanel" 
                                    class="tab-pane <?php echo $lang_actived; ?> " 
                                    id="<?php echo $lang['language']; ?>"

                                    >


                                    <br>
                                    <br>

                                    <div class="panel panel-default">
                                        <div class="panel-body">

                                            <p style="color:blue; font-size:46px; text-align: center">
                                                <?php logo(150); ?>
                                            </p>
                                            <p>
                                                <?php _t("Dear Customer", $lang['language']); ?>, 
                                            </p>    

                                            <p>
                                                <?php _t("An invoice that concerns you is available via the following link", $lang['language']); ?> 
                                            </p>

                                            <p>
                                                <a href="<?php echo $config_app['url']; ?>&a=i&id=<?php echo $id; ?>&code=<?php echo $invoices['code']; ?>" target="_new"><?php echo $config_app['url']; ?>&a=i&id=<?php echo $id; ?>&code=<?php echo $invoices['code']; ?></a>
                                            </p>

                                            <p><?php _t("If this link does not work you can enter", $lang['language']); ?></p>

                                            <p>
                                                <?php echo $config_app['url']; ?>
                                            </p>


                                            <p>
                                                <?php _t("with the following data", $lang['language']); ?>: 
                                            </p>

                                            <p>
                                                <?php _t("Id", $lang['language']); ?>: <?php echo $id; ?> 
                                                <?php _t("Code", $lang['language']); ?>: <?php echo $invoices['code']; ?>
                                            </p>


                                            <br>

                                            <p><?php _t('Best regards', $lang['language']); ?></p>
                                            <p><?php _t('Accounting service', $lang['language']); ?></p>

                                            <p>
                                                <?php echo $config_company_name; ?> | 
                                                <?php echo _tr($config_company_a_address, $lang['language']); ?>
                                                <?php echo $config_company_a_number; ?> |
                                                <?php echo $config_company_a_postal_code; ?> 
                                                <?php echo _tr($config_company_a_city, $lang['language']); ?> 

                                            </p>

                                            <p>
                                                E: <?php echo $config_company_email; ?> | 
                                                W: <?php echo $config_company_url; ?>
                                            </p>

                                            <p>
                                                T: <?php echo $config_company_tel; ?> | 
                                                F: <?php echo $config_company_tel; ?>
                                            </p>

                                            <?php /*
                                              <p>
                                              <a>facebook</a> |
                                              <a>youtube</a> |
                                              <a>LinkedIn</a> |
                                              <a>Instagram</a> |
                                              <a>Twiter</a>
                                              </p>
                                             * 
                                             */ ?>






                                        </div>
                                    </div>




                                    <hr>
                                </div>
                                <?php
                                $lang_actived = false;
                            }
                            ?>


                            <div role="tabpanel" class="tab-pane" id="messages">...</div>
                            <div role="tabpanel" class="tab-pane" id="settings">...</div>
                        </div>

                        <h3><?php _t("What is that?"); ?></h3>
                        <p>
                            Con esta herramienta puede dar acceso a su cliente para que pueda ver documentos que 
                            le conciernen, ya sea presupuestos, facturas, notas de credito, atravez de un enlace, 
                            asi su cliente puede imprimir este documento. 
                        </p>


                        <h3><?php _t("I can activate or desactivate this option"); ?></h3>
                        <p>
                            Si, puede activar o desactivar esta opcion 
                            <a href="index.php?c=config&a=invoices_see_via_web"><?php _t("here"); ?></a> 
                        </p>


                        <h3><?php _t("Como proceder"); ?> ?</h3>
                        <p>
                            <?php _t("Copy this text and send it to your client by email"); ?>
                        </p>



                    </div>




                    <?php
                } else {
                    message('info', '$config_app[url] is empty ');
                }
                ?>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
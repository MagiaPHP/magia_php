
<?php
# START HERE
################################################################################
?>

<table class="table">
    <thead>
        <tr>
    <div class="col-sm-12">
        <h4><?php echo _t("Sélectionnez le ou les embout(s) à fabriquer"); ?> :</h4>

        <div id="form_ears" class="checkbox-selector">

            <div class="checkbox col-sm-6" style="float: left;margin-top:0px;">

                <label for="form_ears_1" class="btn btn-primary first_label_l btn-light radio-btn" 
                       style="

                       ">

                    <input 
                        class="btn btn-primary"
                        type="checkbox" 
                        style="opacity: 0;width: 0px;height: 0px;overflow: hidden;position: absolute;" 

                        id="form_ears_1" 
                        name="form[ears][]" 
                        onclick="if ($('#left').css('visibility') == 'hidden') {

                                    $('#left').css('visibility', 'visible');
                                    $('.first_label_l').css('background', 'green');
                                    $('.leftside').val('true');

                                } else {
                                    $('#left').css('visibility', 'hidden');
                                    $(this).css('background', '');
                                    $('.leftside').val('false');
                                }
                        " value="gauche"><?php _t("Left"); ?></label>


                <?php
                # Buttom copy
                # Buttom copy
                # Buttom copy
                # Buttom copy
                ?>

                <button class="btn btn-default btn-copy location-l copy_all_to_r" >
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <?php _t("Copy to Right"); ?>
                </button>






            </div>
            <div class="checkbox col-sm-6" style="float: right;margin-top:0px;">

                <label for="form_ears_0" class="btn btn-primary first_label_r btn-light radio-btn" 
                       style="
                       "

                       >
                    <input type="checkbox" style="opacity: 0;width: 0px;height: 0px;overflow: hidden;position: absolute;" id="form_ears_0" name="form[ears][]" onclick="if ($('#right').css('visibility') == 'hidden') {
                                $('#right').css('visibility', 'visible');
                                $('.first_label_r').css('background', 'green');
                                $('.rightside').val('true');
                            } else {
                                $('#right').css('visibility', 'hidden');
                                $(this).css('background', '#f8f9fa');
                                $('.rightside').val('false');
                            }" value="droite"> <?php _t("Right"); ?>

                </label>



                <?php
                # Buttom copy
                # Buttom copy
                # Buttom copy
                # Buttom copy
                ?>

                <button class="btn btn-default btn-copy location-r copy_all_to_l" >                                                            
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <?php _t("Copy to Left"); ?>
                </button>

                <!--<label for="form_ears_0" class="btn btn-light radio-btn">
                        <input type="checkbox" id="form_ears_0" name="form[ears][]" onclick="if ($('#right').css('visibility') == 'hidden') {
                                                                                                                                $('#right').css('visibility', 'visible');
                                                                                                                                $(this).css('background', 'green');
                                                                                                                        } else {
                                                                                                                                $('#right').css('visibility', 'hidden');
                                                                                                                                $(this).css('background', '');
                                                                                                                        }" value="droite"> </label>-->
            </div>
        </div>
    </div>
</tr>
</thead>

<tbody>
    <tr>
        <td style="visibility: hidden" id="left">
            <input type="hidden" name="side[l]" class="leftside" value="false">
            <?php //include "formOrejaLeft.php";   ?>

            <div class="form-group">
                <label for="form_type_l"><?php _t("Type d'embout"); ?></label>
                <select id="form_type_l" class="form-control types_left select-duplicate" name="left[types]" required="">
                    <option value="0"><?php _t("Select types"); ?></option>

                    <?php
                    $sql = $db->prepare("SELECT * FROM types where status=1 order by order_by ASC");
                    $sql->execute();

                    while ($row = $sql->fetch()) {
                        echo '<option value="' . $row['id'] . '">' . _tr(utf8_decode($row['type'])) . '</option>';
                    }
                    ?>


                </select>
            </div>
            <div class="form-group modele_left_dev" style="display: none;">
                <label for="form_modele_l"><?php _t("MODELE"); ?></label>
                <select id="form_modele_l" class="form-control modele_left select-duplicate" name="left[modele]">

                </select>
            </div>
            <div class="form-group mesure_snr_left_dev" style="display: none;">
                <label for="form_mesure_snr_l"><?php _t("MESURE SNR"); ?></label>
                <select id="form_mesure_snr_l" class="form-control mesure_snr_left select-duplicate" name="left[mesure_snr]">

                </select>
            </div>
            <div class="form-group formes_left_dev" style="display: none;">
                <label for="form_typeshape_l"><?php _t("Forme de l'embout"); ?></label>
                <select id="form_typeshape_l" class="form-control formes_left select-duplicate" name="left[formes]">

                </select>
            </div>
            <div class="form-group materials_left_dev" style="display: none;">
                <label for="form_shapematerial_l"><?php _t("Matière"); ?></label>
                <select id="form_shapematerial_l" class="form-control materials_left select-duplicate" name="left[materials]">

                </select>
            </div>
            <div class="form-group couleurs_left_dev" style="display: none;">
                <label for="form_color_l"><?php _t("Couleur"); ?></label>
                <select id="form_color_l" class="form-control couleurs_left select-duplicate" name="left[couleurs]">

                </select>
            </div>
            <div class="form-group perte_auditive_left_dev" style="display: none;">
                <label for="form_perte_auditive_l"><?php _t("PERTE AUDITIF"); ?></label>
                <select id="form_perte_auditive_l" class="form-control perte_auditive_left select-duplicate" name="left[perte_auditive]">

                </select>
            </div>
            <div class="form-group marque_left_dev" style="display: none;">
                <label for="form_shapelistener_l"><?php _t("Marque"); ?></label>
                <select id="form_shapelistener_l" class="form-control marque_left select-duplicate" name="left[marque]">

                </select>
            </div>
            <div class="form-group ecouteur_left_dev" style="display: none;">
                <label for="ecouteur_right_l"><?php _t("Ecouteur"); ?></label>
                <select id="ecouteur_right_l" class="form-control ecouteur_left select-duplicate" name="left[ecouteur]">

                </select>
            </div>

            <div class="form-group event_left_dev" style="display: none;">
                <label for="form_event_l"><?php _t("Event"); ?></label>
                <select id="form_event_l" class="form-control event_left select-duplicate" name="left[event]">

                </select>
            </div>

            <div class="form-group diametre_left_dev" style="display: none;">
                <label for="form_diametre_l"><?php _t("Diamètre de l'évent"); ?></label>
                <select id="form_diametre_l" class="form-control diametre_left select-duplicate" name="left[diametre]">

                </select>
            </div>


            <div class="form-group options_left_dev" style="display: none;">
                <label for="form_options_l"><?php _t("OPTIONS"); ?></label>

                <div style="height:auto" id="form_options_l" class="form-control options_left select-duplicate" ></div>

            </div>

            <div class="form-group longueurs_left_dev" style="display: none;">
                <label for="form_longueurs_l"><?php _t("Longueur du conduit"); ?></label>
                <select id="form_longueurs_l" class="form-control longueurs_left select-duplicate" name="left[longueurs]">

                </select>
            </div>

            <div class="form-group constitution_left_dev" style="display: none;">
                <label for="form_constitution_l"><?php _t("Contitutiuon d l'oreil"); ?></label>
                <select id="form_constitution_l" class="form-control constitution_left select-duplicate" name="left[constitution]">

                </select>
            </div>









            <!--<div class="form-group">
                    <label for="accesoires"><?php /* _t("Accesoires"); */ ?></label>
                    <br>


            <?php /* 							foreach ($data['accesoires'] as $value) {
              echo "<input type='checkbox' name='accesoires_left[]' value=\"$value\"> $value" . '<br>';
              }
             */ ?>
            </div>-->


        </td>



        <?php
        #########################################################
        #########################################################
        ##Right Right Right Right Right Right Right Right########
        #########################################################
        #########################################################
        #########################################################
        ?>
        <td style="visibility: hidden;" id="right">

            <input type="hidden" name="side[r]" class="rightside" value="false">
            <?php //include "formOrejaRigth.php";  ?>

            <div class="form-group">
                <label for="form_type_r"><?php _t("Type d'embout"); ?></label>
                <select id="form_type_r" class="form-control types_right select-duplicate" name="right[types]">
                    <option value="0"><?php _t("Select types"); ?></option>
                    <?php
                    $sql = $db->prepare("SELECT * FROM types where status=1 order by order_by ASC");
                    $sql->execute();

                    while ($row = $sql->fetch()) {
                        //echo '<option value="' . $row['id'] . '">' . utf8_decode($row['type']) . '</option>';
                        echo '<option value="' . $row['id'] . '">' . _tr(utf8_decode($row['type'])) . '</option>';
                    }
                    ?>
                </select>
            </div>
            <div class="form-group modele_right_dev" style="display: none;">
                <label for="form_modele_r"><?php _t("MODELE"); ?></label>
                <select id="form_modele_r" class="form-control modele_right select-duplicate" name="right[modele]">

                </select>
            </div>
            <div class="form-group mesure_snr_right_dev" style="display: none;">
                <label for="form_mesure_snr_r"><?php _t("MESURE SNR"); ?></label>
                <select id="form_mesure_snr_r" class="form-control mesure_snr_right select-duplicate" name="right[mesure_snr]">

                </select>
            </div>
            <div class="form-group formes_right_dev" style="display: none;">
                <label for="form_typeshape_r"><?php _t("Forme de l'embout"); ?></label>
                <select id="form_typeshape_r" class="form-control formes_right select-duplicate" name="right[formes]">

                </select>
            </div>
            <div class="form-group materials_right_dev" style="display: none;">
                <label for="form_shapematerial_r"><?php _t("Matière"); ?></label>
                <select id="form_shapematerial_r" class="form-control materials_right select-duplicate" name="right[materials]">

                </select>
            </div>
            <div class="form-group couleurs_right_dev" style="display: none;">
                <label for="form_color_r"><?php _t("Couleur"); ?></label>
                <select id="form_color_r" class="form-control couleurs_right select-duplicate" name="right[couleurs]">

                </select>
            </div>
            <div class="form-group perte_auditive_right_dev" style="display: none;">
                <label for="form_perte_auditive_r"><?php _t("PERTE AUDITIF"); ?></label>
                <select id="form_perte_auditive_r" class="form-control perte_auditive_right select-duplicate" name="right[perte_auditive]">

                </select>
            </div>
            <div class="form-group marque_right_dev" style="display: none;">
                <label for="form_shapelistener_r"><?php _t("Marque"); ?></label>
                <select id="form_shapelistener_r" class="form-control marque_right select-duplicate" name="right[marque]">

                </select>
            </div>
            <div class="form-group ecouteur_right_dev" style="display: none;">
                <label for="ecouteur_right_r"><?php _t("Ecouteur"); ?></label>
                <select id="ecouteur_right_r" class="form-control ecouteur_right select-duplicate" name="right[ecouteur]">

                </select>
            </div>
            <div class="form-group event_right_dev" style="display: none;">
                <label for="form_event_r"><?php _t("Event"); ?></label>
                <select id="form_event_r" class="form-control event_right select-duplicate" name="right[event]">

                </select>
            </div>

            <div class="form-group diametre_right_dev" style="display: none;">
                <label for="form_diametre_r"><?php _t("Diamètre de l'évent"); ?></label>
                <select id="form_diametre_r" class="form-control diametre_right select-duplicate" name="right[diametre]">

                </select>
            </div>
            <div class="form-group options_right_dev" style="display: none;">
                <label for="form_options_r"><?php _t("OPTIONS"); ?></label>
                <div style="height:auto" id="form_options_r" class="form-control options_right select-duplicate" ></div>

            </div>

            <div class="form-group longueurs_right_dev" style="display: none;">
                <label for="form_longueurs_r"><?php _t("Longueur du conduit"); ?></label>
                <select id="form_longueurs_r" class="form-control longueurs_right select-duplicate" name="right[longueurs]">

                </select>
            </div>



            <div class="form-group constitution_right_dev" style="display: none;">
                <label for="form_constitution_r"><?php _t("Contitutiuon d l'oreil"); ?></label>
                <select id="form_constitution_r" class="form-control constitution_right select-duplicate" name="right[constitution]">

                </select>
            </div>





            <!--
            <div class="form-group">
                    <label for="accesoires"><?php /* _t("Accesoires"); */ ?></label>
                    <br>
            <?php /* 							foreach ($data['accesoires'] as $value) {
              echo "<input type='checkbox' name='accesoires_right[]' value=\"$value\">$value" . '<br>';
              }
             */ ?>
            </div>-->


        </td>
    </tr>
</tbody>
</table>

<?php
# END HERE
################################################################################
?>

<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_orderNew">
    <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
    <input type="hidden" name="date_delivery" value="<?php echo $date_delivery; ?>">
    <input type="hidden" name="via" value="Poste">
    <input type="hidden" name="side[s]" value="false">
    <input type="hidden" name="code" value="<?php echo magia_uniqid(); ?>">






    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">

            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a 
                        class="collapsed" 
                        role="button" 
                        data-toggle="collapse" 
                        data-parent="#accordion" 
                        href="#collapseTwo" 
                        aria-expanded="false" 
                        aria-controls="collapseTwo">

                        <?php echo _t("Patient"); ?>: 
                        <?php echo contacts_field_id("name", $contact_id); ?> 
                        <?php echo contacts_field_id("lastname", $contact_id); ?>
                        <span class="caret"></span>
                    </a>
                </h4>
            </div>


            <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="panel-body">
                    <table class="table table-striped">
                        <tr>
                            <td><b><?php _t("Name"); ?></b></td><td><?php echo contacts_field_id("name", $contact_id); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php _t("Lastname"); ?></b></td><td><?php echo contacts_field_id("lastname", $contact_id); ?></td>
                        </tr>
                        <tr>
                            <td><b><?php _t("birthdate"); ?></b></td><td><?php echo contacts_field_id("birthdate", $contact_id); ?></td>
                        </tr>
                    </table>



                </div>
            </div>
        </div>
    </div>

    <?php /* <table class="table table-bordered">
      <tr>
      <td>
      <div class="form-group">
      <label for="client_ref"><?php _t("My reference"); ?></label>
      <input
      type="text"
      name="client_ref"
      class="form-control"
      id="client_ref"
      placeholder="00022"
      value="<?php
      // da error si no pone numeros
      //echo shop_client_ref_next();
      ?>"
      >
      </div>
      </td>


      </tr>
      </table>
     */ ?>








    <ul class="nav nav-tabs">
        <li role="presentation"  class="active">
            <a href="<?php echo "index.php?c=shop&a=orderNew&contact_id=$contact_id&date_delivery=$date_delivery"; ?>">
                <?php _t("Left & Right"); ?>
            </a>
        </li>
        <li role="presentation">
            <a href="<?php echo "index.php?c=shop&side=s&a=orderNew&contact_id=$contact_id&date_delivery=$date_delivery"; ?>">
                <?php _t("Stereo"); ?>
            </a>
        </li>
    </ul>


    <?php
# START HERE
################################################################################
    ?>

    <div class="panel panel-default">
        <div class="panel-body">
            <h4><?php echo _t("Select the tip (s) to manufacture"); ?> :</h4>


            <div class="row"  id="l_r">
                <div class="col-xs-4 col-md-4 col-lg-4">
                    <?php
                    #
                    #
                    # Para borrar el boton de copiar, comento la linea 143, 162
                    # 
                    # //    $('.copy_all_to_r').css('visibility', 'visible');                  
                    # //    $('.copy_all_to_l').css('visibility', 'visible');
                    #                     # 
                    #
                    #
                    ###################################################################################### 
                    ?>


                    <label for="form_ears_1" class="btn btn-primary first_label_l btn-light radio-btn"   style="">

                        <input 
                            class="btn btn-primary"
                            type="checkbox" 
                            style=" color: blue; opacity: 0;width: 0px;height: 0px;overflow: hidden;position: absolute;" 

                            id="form_ears_1" 
                            name="form[ears][]" 
                            onclick="if ($('#left').css('visibility') == 'hidden') {

                                        $('#left').css('visibility', 'visible');
                                        //    $('.copy_all_to_r').css('visibility', 'visible');
                                        $('.first_label_l').css('background', 'blue');
                                        $('.leftside').val('true');

                                    } else {
                                        $('#left').css('visibility', 'hidden');
                                        $('.copy_all_to_r').css('visibility', 'hidden');
                                        $('.first_label_l').css('background', '');
                                        $(this).css('background', '');
                                        $('.leftside').val('false');
                                    }
                            " value="gauche"><?php _t("Left"); ?>
                    </label>
                    <?php ####################### Buttom copy   ?>

                    <button class="btn btn-default btn-copy location-l copy_all_to_r" style="visibility: hidden"

                            onclick="if ($('#right').css('visibility') == 'hidden') {
                                        $('#right').css('visibility', 'visible');
                                        //    $('.copy_all_to_l').css('visibility', 'visible');
                                        $('.first_label_r').css('background', 'red');
                                        $('.rightside').val('true');

                                    } else {

                                    }"

                            >
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <?php _t("Copy to Right"); ?>
                    </button>



                    <?php
                    #
                    # Borrar el boton copiar, 
                    # commento las lineas 189, 194
                    ###################################################################################### 
                    ?>
                </div>


                <div class="col-xs-4 col-md-4 col-lg-4">
                    <a 
                        class="btn btn-warning"
                        href="<?php echo "index.php?c=shop&side=s&a=orderNew&contact_id=$contact_id&date_delivery=$date_delivery"; ?>">
                            <?php _t("Stereo"); ?>
                    </a>
                </div>


                <div class="col-xs-4 col-md-4 col-lg-4">
                    <label for="form_ears_0" class="btn btn-danger first_label_r btn-light radio-btn" style="">

                        <input 
                            type="checkbox" 
                            style="opacity: 0;width: 0px;height: 0px;overflow: hidden;position: absolute;" 
                            id="form_ears_0" 
                            name="form[ears][]" 
                            onclick="if ($('#right').css('visibility') == 'hidden') {
                                        $('#right').css('visibility', 'visible');
                                        //        $('.copy_all_to_l').css('visibility', 'visible');
                                        $('.first_label_r').css('background', 'green');
                                        $('.rightside').val('true');
                                    } else {
                                        $('#right').css('visibility', 'hidden');
                                        //        $('.copy_all_to_l').css('visibility', 'hidden');
                                        $('.first_label_r').css('background', '');
                                        $(this).css('background', '#f8f9fa');
                                        $('.rightside').val('false');
                                    }" value="droite"> <?php _t("Right"); ?>

                    </label>


                    <?php ## bopy boton ######################################?>
                    <?php ## bopy boton ###################################### ?>
                    <?php ## bopy boton ###################################### ?>
                    <?php ## bopy boton ###################################### ?>
                    <?php ## bopy boton ######################################?>
                    <button class="btn btn-default btn-copy location-r copy_all_to_l" style="visibility: hidden" 

                            onclick="if ($('#left').css('visibility') == 'hidden') {
                                        $('#left').css('visibility', 'visible');
                                        $('.copy_all_to_r').css('visibility', 'visible');
                                        $('.leftside').val('true');

                                    }"



                            >                                                            
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <?php _t("Copy to Left"); ?>
                    </button>
                    <p></p>
                </div>

            </div>




            <div class="row">
                <div class="col-xs-6 col-md-6  col-lg-6" style="visibility: hidden" id="left"> 
                    <?php ######################################################################### ?>

                    <input type="hidden" name="side[l]" class="leftside" value="false">
                    <?php //include "formOrejaLeft.php";    ?>



                    <div class="form-group">
                        <label for="form_type_l"><?php _t("Tip type"); ?></label>
                        <select id="form_type_l" class="form-control types_left select-duplicate" name="left[types]" required>
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
                        <label for="form_modele_l"><?php _t("Model"); ?></label>
                        <select id="form_modele_l" class="form-control modele_left select-duplicate" name="left[modele]">

                        </select>
                    </div>


                    <div class="form-group mesure_snr_left_dev" style="display: none;">
                        <label for="form_mesure_snr_l"><?php _t("SNR measurement"); ?></label>
                        <select id="form_mesure_snr_l" class="form-control mesure_snr_left select-duplicate" name="left[mesure_snr]">

                        </select>
                    </div>
                    <div class="form-group formes_left_dev" style="display: none;">
                        <label for="form_typeshape_l"><?php _t("Tip shape"); ?></label>
                        <select id="form_typeshape_l" class="form-control formes_left select-duplicate" name="left[formes]">

                        </select>
                    </div>
                    <div class="form-group materials_left_dev" style="display: none;">
                        <label for="form_shapematerial_l"><?php _t("Materials"); ?></label>
                        <select id="form_shapematerial_l" class="form-control materials_left select-duplicate" name="left[materials]">

                        </select>
                    </div>
                    <div class="form-group couleurs_left_dev" style="display: none;">
                        <label for="form_color_l"><?php _t("Color"); ?></label>
                        <select id="form_color_l" class="form-control couleurs_left select-duplicate" name="left[couleurs]">

                        </select>
                    </div>
                    <div class="form-group perte_auditive_left_dev" style="display: none;">
                        <label for="form_perte_auditive_l"><?php _t("Hearing loss"); ?></label>
                        <select id="form_perte_auditive_l" class="form-control perte_auditive_left select-duplicate" name="left[perte_auditive]">

                        </select>
                    </div>
                    <div class="form-group marque_left_dev" style="display: none;">
                        <label for="form_shapelistener_l"><?php _t("Brand"); ?></label>
                        <select id="form_shapelistener_l" class="form-control marque_left select-duplicate" name="left[marque]">

                        </select>
                    </div>
                    <div class="form-group ecouteur_left_dev" style="display: none;">
                        <label for="ecouteur_right_l"><?php _t("Earphone"); ?></label>
                        <select id="ecouteur_right_l" class="form-control ecouteur_left select-duplicate" name="left[ecouteur]">

                        </select>
                    </div>

                    <div class="form-group event_left_dev" style="display: none;">
                        <label for="form_event_l"><?php _t("Vent"); ?></label>
                        <select id="form_event_l" class="form-control event_left select-duplicate" name="left[event]">

                        </select>
                    </div>

                    <div class="form-group diametre_left_dev" style="display: none;">
                        <label for="form_diametre_l"><?php _t("Vent diameter"); ?></label>
                        <select id="form_diametre_l" class="form-control diametre_left select-duplicate" name="left[diametre]">

                        </select>
                    </div>


                    <div class="form-group options_left_dev" style="display: none;">
                        <label for="form_options_l"><?php _t("Options"); ?></label>

                        <div style="height:auto" id="form_options_l" class="form-control options_left select-duplicate" >
                        </div>

                    </div>

                    <div class="form-group longueurs_left_dev" style="display: none;">
                        <label for="form_longueurs_l"><?php _t("Conduit length"); ?></label>
                        <select id="form_longueurs_l" class="form-control longueurs_left select-duplicate" name="left[longueurs]">

                        </select>
                    </div>

                    <div class="form-group constitution_left_dev" style="display: none;">
                        <label for="form_constitution_l"><?php _t("Ear constitution"); ?></label>
                        <select id="form_constitution_l" class="form-control constitution_left select-duplicate" name="left[constitution]">

                        </select>
                    </div>



                    <?php ######################################################################### ?>
                </div>
                <div class="col-xs-6 col-md-6  col-lg-6" style="visibility: hidden;" id="right"> 
                    <?php ########################################################################## ?>
                    <input type="hidden" name="side[r]" class="rightside" value="false">
                    <?php //include "formOrejaRigth.php";   ?>

                    <div class="form-group">
                        <label for="form_type_r"><?php _t("Tip type"); ?></label>
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
                        <label for="form_modele_r"><?php _t("Model"); ?></label>
                        <select id="form_modele_r" class="form-control modele_right select-duplicate" name="right[modele]">

                        </select>
                    </div>
                    <div class="form-group mesure_snr_right_dev" style="display: none;">
                        <label for="form_mesure_snr_r"><?php _t("SNR measurement"); ?></label>
                        <select id="form_mesure_snr_r" class="form-control mesure_snr_right select-duplicate" name="right[mesure_snr]">

                        </select>
                    </div>
                    <div class="form-group formes_right_dev" style="display: none;">
                        <label for="form_typeshape_r"><?php _t("Tip shape"); ?></label>
                        <select id="form_typeshape_r" class="form-control formes_right select-duplicate" name="right[formes]">

                        </select>
                    </div>
                    <div class="form-group materials_right_dev" style="display: none;">
                        <label for="form_shapematerial_r"><?php _t("Materials"); ?></label>
                        <select id="form_shapematerial_r" class="form-control materials_right select-duplicate" name="right[materials]">

                        </select>
                    </div>
                    <div class="form-group couleurs_right_dev" style="display: none;">
                        <label for="form_color_r"><?php _t("Color"); ?></label>
                        <select id="form_color_r" class="form-control couleurs_right select-duplicate" name="right[couleurs]">

                        </select>
                    </div>
                    <div class="form-group perte_auditive_right_dev" style="display: none;">
                        <label for="form_perte_auditive_r"><?php _t("Hearing loss"); ?></label>
                        <select id="form_perte_auditive_r" class="form-control perte_auditive_right select-duplicate" name="right[perte_auditive]">

                        </select>
                    </div>
                    <div class="form-group marque_right_dev" style="display: none;">
                        <label for="form_shapelistener_r"><?php _t("Brand"); ?></label>
                        <select id="form_shapelistener_r" class="form-control marque_right select-duplicate" name="right[marque]">

                        </select>
                    </div>
                    <div class="form-group ecouteur_right_dev" style="display: none;">
                        <label for="ecouteur_right_r"><?php _t("Earphone"); ?></label>
                        <select id="ecouteur_right_r" class="form-control ecouteur_right select-duplicate" name="right[ecouteur]">

                        </select>
                    </div>
                    <div class="form-group event_right_dev" style="display: none;">
                        <label for="form_event_r"><?php _t("Vent"); ?></label>
                        <select id="form_event_r" class="form-control event_right select-duplicate" name="right[event]">

                        </select>
                    </div>

                    <div class="form-group diametre_right_dev" style="display: none;">
                        <label for="form_diametre_r"><?php _t("Vent diameter"); ?></label>
                        <select id="form_diametre_r" class="form-control diametre_right select-duplicate" name="right[diametre]">

                        </select>
                    </div>
                    <div class="form-group options_right_dev" style="display: none;">
                        <label for="form_options_r"><?php _t("Options"); ?></label>
                        <div style="height:auto" id="form_options_r" class="form-control options_right select-duplicate" ></div>

                    </div>

                    <div class="form-group longueurs_right_dev" style="display: none;">
                        <label for="form_longueurs_r"><?php _t("Conduit length"); ?></label>
                        <select id="form_longueurs_r" class="form-control longueurs_right select-duplicate" name="right[longueurs]">

                        </select>
                    </div>



                    <div class="form-group constitution_right_dev" style="display: none;">
                        <label for="form_constitution_r"><?php _t("Ear constitution"); ?></label>
                        <select id="form_constitution_r" class="form-control constitution_right select-duplicate" name="right[constitution]">

                        </select>
                    </div>





                    <?php ########################################################################## ?>
                </div>
            </div>




















        </div>
    </div>

    <?php
# END HERE
################################################################################
    ?>



    <div class="form-group">
        <label for="comments"><?php _t("Comments"); ?></label>
        <input type="text"  name="comments" class="form-control" id="comments" placeholder="">
    </div>






    <div class="form-group">
        <label for="address_delivery"><?php _t("Delivery address"); ?></label>
        <select class="form-control" name="address_delivery">
            <?php
            foreach (shop_addresses_list() as $key => $address) {

                $add = "($address[name]) ";
                $add .= "$address[number],  ";
                $add .= " $address[address]";
                $add .= " $address[postcode] - ";
                $add .= " $address[city]";

                if ($address['name'] == 'Delivery') {
                    echo '<option value="' . $address['id'] . '">' . $add . '</option>';
                }
            }
            ?>

        </select>
    </div>






    <button type="submit" class="btn btn-default save_form_db"><?php _t("Finish"); ?></button>

</form>





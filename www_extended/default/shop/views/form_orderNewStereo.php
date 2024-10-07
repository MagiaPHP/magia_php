<form action="index.php" method="post">
    <input type="hidden" name="c" value="shop">
    <input type="hidden" name="a" value="ok_orderNew">
    <input type="hidden" name="contact_id" value="<?php echo $contact_id; ?>">
    <input type="hidden" name="date_delivery" value="<?php echo $date_delivery; ?>">
    <input type="hidden" name="via" value="Poste">

    <input type="hidden" name="code" value="<?php echo magia_uniqid(); ?>">







    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingTwo">
                <h4 class="panel-title">
                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        <?php echo _t("Patient"); ?>: <?php echo contacts_field_id("name", $contact_id); ?> <?php echo contacts_field_id("lastname", $contact_id); ?>
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

    <?php
    /* <table class="table table-bordered">
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
      </table> */
    ?>





    <ul class="nav nav-tabs">
        <li role="presentation" >
            <a href="<?php echo "index.php?c=shop&a=orderNew&contact_id=$contact_id&date_delivery=$date_delivery"; ?>">
                <?php _t("Left & Right"); ?>
            </a>
        </li>
        <li role="presentation" class="active">
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
            <h4><?php echo _t("Sélectionnez le ou les embout(s) à fabriquer"); ?> :</h4>


            <div class="row">
                <div class="col-xs-10 col-md-10  col-lg-10" id="stereo"> 
                    <?php #########################################################################?>

                    <input type="hidden" name="side[s]" class="stereoside" value="true">


                    <div class="form-group">
                        <label for="form_type_s"><?php _t("Tip type"); ?></label>
                        <select id="form_type_s" class="form-control types_stereo " name="stereo[types]" required="">
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
                    <div class="form-group modele_stereo_dev" style="display: none;">
                        <label for="form_modele_s"><?php _t("Model"); ?></label>
                        <select id="form_modele_s" class="form-control modele_stereo " name="stereo[modele]">

                        </select>
                    </div>
                    <div class="form-group mesure_snr_stereo_dev" style="display: none;">
                        <label for="form_mesure_snr_s"><?php _t("SNR measurement"); ?></label>
                        <select id="form_mesure_snr_s" class="form-control mesure_snr_stereo " name="stereo[mesure_snr]">

                        </select>
                    </div>
                    <div class="form-group formes_stereo_dev" style="display: none;">
                        <label for="form_typeshape_s"><?php _t("Tip shape"); ?></label>
                        <select id="form_typeshape_s" class="form-control formes_stereo " name="stereo[formes]">

                        </select>
                    </div>
                    <div class="form-group materials_stereo_dev" style="display: none;">
                        <label for="form_shapematerial_s"><?php _t("Materials"); ?></label>
                        <select id="form_shapematerial_s" class="form-control materials_stereo " name="stereo[materials]">

                        </select>
                    </div>
                    <div class="form-group couleurs_stereo_dev" style="display: none;">
                        <label for="form_color_s"><?php _t("Color"); ?></label>
                        <select id="form_color_s" class="form-control couleurs_stereo " name="stereo[couleurs]">

                        </select>
                    </div>
                    <div class="form-group perte_auditive_stereo_dev" style="display: none;">
                        <label for="form_perte_auditive_s"><?php _t("Hearing loss"); ?></label>
                        <select id="form_perte_auditive_s" class="form-control perte_auditive_stereo " name="stereo[perte_auditive]">

                        </select>
                    </div>
                    <div class="form-group marque_stereo_dev" style="display: none;">
                        <label for="form_shapelistener_s"><?php _t("Brand"); ?></label>
                        <select id="form_shapelistener_s" class="form-control marque_stereo " name="stereo[marque]">

                        </select>
                    </div>
                    <div class="form-group ecouteur_stereo_dev" style="display: none;">
                        <label for="ecouteur_right_s"><?php _t("Earphone"); ?></label>
                        <select id="ecouteur_right_s" class="form-control ecouteur_stereo " name="stereo[ecouteur]">

                        </select>
                    </div>

                    <div class="form-group event_stereo_dev" style="display: none;">
                        <label for="form_event_s"><?php _t("Vent"); ?></label>
                        <select id="form_event_s" class="form-control event_stereo " name="stereo[event]">

                        </select>
                    </div>

                    <div class="form-group diametre_stereo_dev" style="display: none;">
                        <label for="form_diametre_s"><?php _t("Vent diameter"); ?></label>
                        <select id="form_diametre_s" class="form-control diametre_stereo " name="stereo[diametre]">

                        </select>
                    </div>


                    <div class="form-group options_stereo_dev" style="display: none;">
                        <label for="form_options_s"><?php _t("Options"); ?></label>

                        <div style="height:auto" id="form_options_s" class="form-control options_stereo " ></div>

                    </div>

                    <div class="form-group longueurs_stereo_dev" style="display: none;">
                        <label for="form_longueurs_s"><?php _t("Conduit length"); ?></label>
                        <select id="form_longueurs_s" class="form-control longueurs_stereo " name="stereo[longueurs]">

                        </select>
                    </div>

                    <div class="form-group constitution_stereo_dev" style="display: none;">
                        <label for="form_constitution_s"><?php _t("Ear constitution"); ?></label>
                        <select id="form_constitution_s" class="form-control constitution_stereo " name="stereo[constitution]">

                        </select>
                    </div>



                    <?php #########################################################################?>
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







    <button type="submit" class="btn btn-default"><?php _t("Next >> "); ?></button>

</form>
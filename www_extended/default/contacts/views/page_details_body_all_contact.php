
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-12">

        <?php ################################################################ ?>
        <?php ################################################################ ?>
        <?php ################################################################ ?>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#"><?php _t("Details"); ?></a></li>                        
        </ul>

        <br>

        <table class="table table-striped">
            <tr>
                <td><?php echo _t("Id"); ?></td><td><?php echo ($con->getId()) ?></td>
            </tr>



            <tr>
                <td><?php echo _t("Office"); ?></td><td><?php echo (contacts_formated($con->getOffice_id())) ?></td>
            </tr>


            <tr>
                <td><?php echo _t("Owner"); ?></td><td><?php echo (contacts_formated($con->getOwner_id())) ?></td>
            </tr>


            <tr>
                <td><?php echo _t("Created"); ?></td><td><?php echo $con->getRegistre_date() ?></td>
            </tr>
            <tr>
                <td><?php echo _t("Description"); ?></td><td>
                    <?php
                    echo
                    modal(
                            uniqid(), // id
                            'Update description', // title
                            // btn
                            array(
                                "label" => "",
                                "btn" => 'btn-default btn-xs',
                                "icon" => 'pencil'
                            ),
                            // view
                            array(
                                "c" => "contacts",
                                "a" => "form_description_update"
                            ),
                            //params
                            array(
                                'redi' => '5',
                                'c' => 'contacts',
                                'a' => 'details',
                                'id' => "$id",
                                'description' => $con->getDescription(),
                                'params' => "id=$id"
                            ),
                            // rename
                            array()
                    );
                    ?>


                    <?php echo $con->getDescription() ?></td>
            </tr>
            <tr>
                <td><?php echo _t("Language"); ?></td><td>

                    <?php
                    echo
                    modal(
                            uniqid(), // id
                            'Edit language', // title
                            // btn
                            array(
                                "label" => "",
                                "btn" => 'btn-default btn-xs',
                                "icon" => 'pencil'
                            ),
                            // view
                            array(
                                "c" => "contacts",
                                "a" => "form_language_update"
                            ),
                            //params
                            array(
                                'redi' => '5',
                                'c' => 'contacts',
                                'a' => 'details',
                                'id' => "$id",
                                'language' => $con->getLanguage(),
                                'params' => "id=$id"
                            ),
                            // rename
                            array()
                    );
                    ?>


                    <?php echo _tr(_languages_field_language('name', $con->getLanguage())) ?></td>
            </tr>
            <tr>
                <td>
                    <?php echo _t("Vat number"); ?></td>
                <td>
                    <?php
                    echo
                    modal(
                            uniqid(), // id
                            'Edit vat number', // title
                            // btn
                            array(
                                "label" => "",
                                "btn" => 'btn-default btn-xs',
                                "icon" => 'pencil'
                            ),
                            // view
                            array(
                                "c" => "contacts",
                                "a" => "form_tva_update"
                            ),
                            //params
                            array(
                                'redi' => '5',
                                'c' => 'contacts',
                                'a' => 'details',
                                'id' => "$id",
                                'vat' => $con->getTva(),
                                'params' => "id=$id"
                            ),
                            // rename
                            array()
                    );
                    ?>
                    <?php echo ($con->getTva()) ?>
                </td>
            </tr>

        </table>

        <?php include "table_contacts_directory.php"; ?>


    </div>
    <div class="col-xs-12 col-sm-12 col-md-6 col-xl-12">

        <?php ################################################################   ?>
        <?php ################################################################  ?>
        <?php ################################################################ ?>
        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#"><?php _t("Billing Information"); ?></a></li>                        
        </ul>

        <br>



        <div class="row">
            <?php
            foreach (addresses_list_by_contact_id($id) as $key => $addresses_list_by_contact_id) {

                $address = new Address();

                $address->setAddresses($addresses_list_by_contact_id['id']);

                // Abrir contenedor con clase de Bootstrap para una presentación bonita
                echo '<div class="panel panel-default">';
                echo '  <div class="panel-heading"><b><span class="glyphicon glyphicon-map-marker"></span> ' . _tr("Address") . '</b>';
                echo '</div>';
                echo '  <div class="panel-body">';

                modal(
                        $id, // id
                        'Edit address', // title
                        // btn
                        array(
                            "label" => "",
                            "btn" => 'btn-default btn-xs',
                            "icon" => 'pencil'
                        ),
                        // view
                        array(
                            "c" => "addresses",
                            "a" => "form_addresses_edit"
                        ),
                        //params
                        array(
                            'redi' => '5',
                            'c' => 'contacts',
                            'a' => 'details',
                            'id' => $id,
                            'vat' => '',
                            'params' => "id=" . $id,
                        ),
                        // rename
                        array()
                );

                echo ($address->getHtmlFormatted());

                // Cerrar contenedor
                echo '  </div>';  // Cerrar panel-body
                echo '</div>';  // Cerrar panel
            }
            ?>                                                                                                               
        </div>

        <?php
        modal(
                uniqid(), // id
                'Add new address', // title
                // btn
                array(
                    "label" => "Add new address",
                    "btn" => 'btn btn-default',
                    "icon" => 'plus'
                ),
                // view
                array(
                    "c" => "addresses",
                    "a" => "form_add"
                ),
                //params
                array(
                    'redi' => '5',
                    'c' => 'contacts',
                    'a' => 'details',
                    'id' => "$id",
                    'params' => "id=$id"
                ),
                array()
        );
        ?>


        <br>
        <br>


        <?php ################################################################        ?>
        <?php ##### BANCOS ###################################################    ?>

        <ul class="nav nav-tabs">
            <li role="presentation" class="active"><a href="#"><?php _t("Bank information"); ?></a></li>                        
        </ul>

        <br>

        <?php
        foreach (banks_list_by_contact_id($id) as $key => $blbc) {
            $bank = new Banks();
            $bank->setBanks($blbc['id']);

            echo $bank->getHtmlFormatted();
        }
// include "table_contacts_address.php"; 
        ?>

        <?php
        modal(
                uniqid(), // id
                'Add new bank account', // title
                // btn
                array(
                    "label" => "Add bank account",
                    "btn" => 'btn btn-default',
                    "icon" => 'plus'
                ),
                // view
                array(
                    "c" => "banks",
                    "a" => "form_add_short"
                ),
                //params
                array(
                    'redi' => '5',
                    'c' => 'contacts',
                    'a' => 'details',
                    'id' => "$id",
                    'params' => "id=$id"
                ),
                // rename
                array()
        );
        ?>







    </div>
</div>


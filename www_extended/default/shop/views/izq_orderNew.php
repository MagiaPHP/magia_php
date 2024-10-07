<?php if (( $order['side'] == 'L' || $order['side'] == 'S')) { ?>

    <div class="panel panel-primary">
        <div class="panel-heading">
            <?php _t("Left"); ?>
        </div>
        <div class="panel-body text-center">

            <?php
            ####################################################################
            ####################################################################
            ####################################################################
            # IFRAME
            # <iframe src="stl_l.php" width="100%" height="550" ></iframe>
            # 
            ####################################################################
            ####################################################################
            ####################################################################
            ?>


            <img 
                class="image img-thumbnail"
                src="l.jpg" 
                id="l_side" 
                alt="Left"
                >

            <?php /*
             * <img src="ap1.jpg" class="img left_forme_img img-responsive">
             * <img src="izq.png" class="img left_forme_img img-responsive"> */ ?>
        </div>
    </div>


    <ul class="list-group">

        <?php if ($type_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Type"); ?> : <br>
                <a href="index.php?c=shop&a=order_new_10"><span class="glyphicon glyphicon-pencil"></span></a>
                <b>
                    <?php
                    //echo orders_lines_by_order_code_side($order_id, "TYP", "L")['description']; 
                    echo _tr(types_field_id('type', $type_l_id));
                    ?>
                </b>
            </li>
        <?php endif; ?> 




        <?php if ($modele_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Modele"); ?> : <br>
                <a href="index.php?c=shop&a=order_new_20"><span class="glyphicon glyphicon-pencil"></span></a>
                <b><?php
                    //echo orders_lines_by_order_code_side($order_id, "MOD", "L")['description'];  
                    echo _tr(modeles_field_id('modele', $modele_l_id));
                    ?></b>
            </li>
        <?php endif; ?>    


        <?php if ($mesure_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Mesure SNR"); ?> : <br>
                <a href="index.php?c=shop&a=order_new_30"><span class="glyphicon glyphicon-pencil"></span></a>
                <b><?php
                    echo _tr(mesure_snr_field_id('mesure', $mesure_l_id));
                    ?></b>
            </li>
        <?php endif; ?>            



        <?php if ($forme_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Forme"); ?> : <br>
                <a href="index.php?c=shop&a=order_new_40"><span class="glyphicon glyphicon-pencil"></span></a>
                <b><?php
                    echo _tr(formes_field_id('forme', $forme_l_id));
                    ?></b>
            </li>
        <?php endif; ?>      

        <?php if ($material_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Material"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_50"><span class="glyphicon glyphicon-pencil"></span></a>

                <b><?php
                    echo _tr(materials_field_id('material', $material_l_id));

//echo orders_lines_by_order_code_side($order_id, "MAT", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>         


        <?php if ($colour_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Color"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_60"><span class="glyphicon glyphicon-pencil"></span></a>

                <b><?php
                    echo _tr(couleurs_field_id('colour', $colour_l_id));
                    // echo orders_lines_by_order_code_side($order_id, "COL", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>           


        <?php if ($perte_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Hearing loss"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_70"><span class="glyphicon glyphicon-pencil"></span></a>

                <b><?php
                    echo _tr(perte_auditive_field_id('perte', $perte_l_id));

                    // echo orders_lines_by_order_code_side($order_id, "PER", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>         




        <?php if ($marque_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Brand"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_80"><span class="glyphicon glyphicon-pencil"></span></a>

                <b><?php
                    echo _tr(marques_field_id('marque', $marque_l_id));
                    //echo orders_lines_by_order_code_side($order_id, "MAR", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>   



        <?php if ($ecouteur_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Earphone"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_90"><span class="glyphicon glyphicon-pencil"></span></a>

                <b><?php
                    echo _tr(ecouteurs_field_id('ecouteur', $ecouteur_l_id));

                    //            echo orders_lines_by_order_code_side($order_id, "ECO", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>  


        <?php if ($event_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Event"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_9010"><span class="glyphicon glyphicon-pencil"></span></a>


                <b><?php
                    echo _tr(events_field_id('event', $event_l_id));

                    //            echo orders_lines_by_order_code_side($order_id, "EVE", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>          


        <?php if ($diametre_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Diametre"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_9020"><span class="glyphicon glyphicon-pencil"></span></a>


                <b><?php
                    echo _tr(diametre_field_id('diametre', $diametre_l_id));

                    //            echo orders_lines_by_order_code_side($order_id, "DIA", "L")['description'];  
                    ?></b>
            </li>
        <?php endif; ?>           




        <?php if ($longuer_l_id): ?>
            <li class="list-group-item">
                <span class="glyphicon glyphicon-triangle-right"></span>
                <?php _t("Longueur"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_9040"><span class="glyphicon glyphicon-pencil"></span></a>

                <b>
                    <?php
                    echo _tr(longueurs_field_id('longueur', $longuer_l_id));
                    ?>
                </b>
            </li>
        <?php endif; ?>           


        <?php if ($constitution_l_id): ?>
            <li class="list-group-item">

                <span class="glyphicon glyphicon-triangle-right"></span>

                <?php _t("Ear constitution"); ?> : <br>

                <a href="index.php?c=shop&a=order_new_9050"><span class="glyphicon glyphicon-pencil"></span></a>

                <b>
                    <?php
                    echo _tr(constitution_field_id('constitution', $constitution_l_id));
                    ?>
                </b>

            </li>
        <?php endif; ?>           
    </ul>





    <ul class="list-group">   
        <li class="list-group-item active">
            <?php _t("Options"); ?>
        </li>
        <?php
        if ($option_l_id) {

            foreach ($option_l_id as $key => $id) {
                //vardump($id);                 
                // si es OPT es una opcion                 
                ?>
                <li class="list-group-item">
                    <a href="index.php?c=shop&a=order_new_9060"><span class="glyphicon glyphicon-pencil"></span></a>

                    <?php echo _tr(options_field_id('option', $id)); ?>
                </li>      
                <?php
            }
        }
        ?>

        <li class="list-group-item">
            <a href="index.php?c=shop&a=order_new_9060"><span class="glyphicon glyphicon-pencil"></span> </a>
            <?php _t("Edit"); ?>
        </li>   
    </ul>                    




<?php } ?>
<?php include view("home", "header"); ?>  
<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">        
        <?php
        //include "izq.php" ;
//        if ( contacts_field_id("type" , $id) == 1 ) { // si es una compani
//            include "izq_details_company.php" ;
//        } else {
//            include "izq_details_contact.php" ;
//        }
        ?>

        <?php include view("contacts", "izq_index"); ?>       


    </div>

    <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10">

        <?php  include view("contacts", "top"); ?>


        <?php
        // Muestra los mensajes
        if ($_REQUEST && $a) {
            foreach ($error as $key => $value) {
                message("warning", "$value");
            }
        }
        ?>

        <?php
        if ((isset($smst) && $smst != false ) && (isset($smst) && $smst != false)) {
            message($smst, $smsm);
        }
        ?>






        <?php
//        Muestra los errores de la tva
        if (contacts_list_errors_tva()) {
            message(
                    'danger',
                    'It seems that there are errors, click here to correct them',
                    false,
                    array("url_action" => "index.php?c=contacts&a=check_tva", "url_label" => "fix here"),
                    true
            );
        }
        ?>



        <?php
//        include "nav.php";
        include "nav2.php";
        ?>  



        <?php if (permissions_has_permission($u_rol, 'configxxxxxxx', 'update')) { ?>
            <p>
                <a href="index.php?c=config&a=ok_contacts_view&data=cdv&redi[redi]=2"><span class="glyphicon glyphicon-th-large"></span></a>
                <a href="index.php?c=config&a=ok_contacts_view&data=list&redi[redi]=2"><span class="glyphicon glyphicon-th-list"></span></a>
                <a href="index.php?c=config&a=ok_contacts_view&data=list-alt&redi[redi]=2"><span class="glyphicon glyphicon-list-alt"></span></a>
                <?php
                if (modules_field_module('status', "docu")) {
                    echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                }
                ?>

            </p>
        <?php } ?>

        <?php   include "modal_contacts_index_cols_to_show.php"; ?>


        <?php // include "modal_contacts_index_cols_to_show.php";  ?>




        <?php
        // vists lista 
        // vists cdv
//        vardump(_options_option('config_contacts_view'));

        /**
         * Tablas 
         * Logo - Nombre de las columnas en header - Order_by
         * Cambiar de label 
         * 
         * Action en el pie de cada columna
         * Cada tabla tiene su modelo
         * Agregar una columna al final
         * Mostrar esconder la columna
         * 
         */
        //vardump(_options_option('config_contacts_view'));

        if ($contacts) {
            switch (_options_option('config_contacts_view')) {
                case 'cdv':
                    include "part_index_cv.php";
                    break;

                case 'list-alt':
                    include "part_index_list_alt.php";
                    break;

                case 'list':

                default:
                    //include "part_index.php";
                    include "part_index_list_alt.php";

                    break;
            }
        } else {
            message('info', 'No contacts found');
        }
        ?>


        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
                $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
                include view('contacts', 'form_pagination_items_limit', $redi = 5);
                ?>
            </div>
        </div>







    </div>
</div>
<?php include view("home", "footer"); ?>  

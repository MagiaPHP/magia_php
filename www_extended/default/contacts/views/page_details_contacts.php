<?php include view("home", "header"); ?> 
<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2">
        <?php include view('contacts', "izq_details"); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">


        <?php
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
        // si el owner_id esta en la lista de mis oficinas 

        $offices_list = (offices_list_by_headoffice($u_owner_id));

        $office = contacts_field_id('owner_id', $id);

        // Verifica si el owner_id está en la lista de oficinas
        $found = false;
        foreach ($offices_list as $item) {
            if ($item['id'] == $office) {
                $found = true;
                break;
            }
        }
        ?>




        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-12">

                <?php if ($c == 'contacts' && $a == 'details') { ?>
                    <h4>
                        <?php echo icon("user"); ?> <?php echo contacts_formated($id); ?>
                        <small><?php echo contacts_field_id('birthdate', $id); ?></small>

                        <?php if (permissions_has_permission($u_rol, "contacts", "update")) { ?>  
                            <a href="#"  data-toggle="modal" data-target="#contacts_directory_add"><?php echo icon("pencil"); ?></a>
                        <?php } ?>                                                                                                   
                    </h4>
                    <?php if (permissions_has_permission($u_rol, "contacts", "uxxxxxxxxxxpdate")) { ?>    
                        <button 
                            type="button" 
                            class="btn btn-md btn-default" 
                            data-toggle="modal" data-target="#contacts_directory_add"
                            >
                            <span class="glyphicon glyphicon-pencil"></span>
                            <?php _t("Edit"); ?>
                        </button>
                    <?php } ?>
                    <div class="modal fade" id="contacts_directory_add" tabindex="-1" role="dialog" aria-labelledby="contacts_directory_add">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="contacts_directory_add"><?php _t("Edit"); ?></h4>
                                </div>
                                <div class="modal-body">
                                    <?php include "form_contact_edit.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-6 col-xl-12 text-right">
                <hr>
            </div>
        </div>



        <?php
        // Incluye la vista solo si el owner_id está en la lista
        if ($found) {
            include view('hr', 'tabs_hr');
        }
        ?>

        <?php include "nav_details_contacts.php"; ?>  


        <?php
        if (modules_field_module('status', "docu")) {
            echo docu_modal_bloc($c, $a, 'page_details_contacts');
        }
        ?>


        <?php include "page_details_body_all_contact.php"; ?> 




        <?php //include "form_details_contacts.php";      ?>  
        <hr>
        <?php //include "part_details_contacts.php";       ?>

    </div>




    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_contact.php"; ?>
    </div>

</div>
<?php include view("home", "footer"); ?>
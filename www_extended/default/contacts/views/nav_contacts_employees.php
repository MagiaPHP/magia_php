<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=contacts&a=employees&id=<?php echo $id; ?>">
                <?php _menu_icon("top", "employees"); ?>
                <?php echo contacts_formated(offices_headoffice_of_office($id)); ?> >
                <?php echo contacts_formated($id); ?> > 
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Employees"); ?>
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_contacts_employees');
                    }
                    ?>
                </li>
            </ul>


            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>




            <?php if (permissions_has_permission($u_rol, "employees", "create")) { ?>
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn navbar-right" 
                    data-toggle="modal" data-target="#contacts_employees_add"
                    >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New"); ?>
                </button>
            <?php } ?>


        </div>
    </div>
</nav>


<div class="modal fade" id="contacts_employees_add" tabindex="-1" role="dialog" aria-labelledby="contacts_employees_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_employees_addLabel">
                    <?php echo _t("Add new employee"); ?>
                </h4>
            </div>
            <div class="modal-body">                                      
                <?php
                $redi = 3;
                //include "form_contacts_employees_add.php";
                include "form_contacts_employees_add2.php";
                ?>         
            </div>
        </div>
    </div>
</div>

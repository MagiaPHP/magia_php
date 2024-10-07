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
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Employees"); ?>
            </a>

        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">
                <?php
                switch ($a) {
                    case 'contacts':
                        $active_contacts = "active";
                        $active_employees = "";
                        $active_users = "";
                        break;
                    case 'employees':
                        $active_contacts = "";
                        $active_employees = "active";
                        $active_users = "";
                        break;
                    case 'users':
                        $active_contacts = "";
                        $active_employees = "";
                        $active_users = "active";
                        break;

                    default:
                        break;
                }
                ?>


                <li class="<?php echo $active_contacts; ?>"><a href="index.php?c=contacts&a=contacts&id=<?php echo $id; ?>"><?php _t("Contacts"); ?></a></li>
                <li class="<?php echo $active_employees; ?>"><a href="index.php?c=contacts&a=employees&id=<?php echo $id; ?>"><?php _t("Employees"); ?></a></li>
                <li class="<?php echo $active_users; ?>"><a href="index.php?c=contacts&a=users&id=<?php echo $id; ?>"><?php _t("Users"); ?></a></li>

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

                $arg['redi'] = 5;
                $arg['c'] = 'contacts';
                $arg['a'] = 'employees';
                $arg['params'] = "id=$id";
                $arg['office_id'] = "$id";
                $arg['owner_id'] = "$id";
                $arg['id'] = "$id";
                $arg['office_id_selected'] = $id;

                //include "form_contacts_employees_add.php";
                //include "form_contacts_employees_add2.php";
                include "form_contacts_employees_add3.php";
                //include view('employees', 'form_add'); 
                ?>         
            </div>
        </div>
    </div>
</div>

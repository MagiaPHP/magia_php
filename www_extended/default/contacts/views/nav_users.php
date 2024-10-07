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

            <a class="navbar-brand" href="index.php?c=contacts&a=users&id=<?php echo $id; ?>">
                <?php _menu_icon("top", "users"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("User"); ?>
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

            <?php if (permissions_has_permission($u_rol, "users", "create")) { ?>
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn navbar-right" 
                    data-toggle="modal" data-target="#contacts_users_add"
                    >
                        <?php echo icon("plus-sign"); ?>

                    <?php _t("New"); ?>
                </button>
            <?php } ?>


        </div>
    </div>
</nav>


<div class="modal fade" id="contacts_users_add" tabindex="-1" role="dialog" aria-labelledby="contacts_users_addLabel">
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
                <h4 class="modal-title" id="contacts_users_addLabel">
                    <?php echo _t("Add new user"); ?>
                </h4>
            </div>
            <div class="modal-body">                                      
                <?php
                $arg['redi'] = 10;
                $arg['c'] = 'contacts';
                $arg['a'] = 'contacts';
                $arg['params'] = "id=$id";
                $arg['owner_id'] = $id;
                $arg['office_id_selected'] = $id;

                include "form_contacts_users_add2.php";
                ?>         
            </div>
        </div>
    </div>
</div>

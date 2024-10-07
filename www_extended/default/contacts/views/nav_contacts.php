<?php
//vardump($id); 
//vardump($contact); 
//vardump($contact['id']); 
?>

<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">contacts</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=contacts&a=contacts&id=<?php echo $id; ?>">
                <?php _menu_icon("top", "contacts"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Contacts"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_contacts');
                    }
                    ?>
                </li>

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




            <?php if (permissions_has_permission($u_rol, "contacts", "create")) { ?>   
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn navbar-right" 
                    data-toggle="modal" data-target="#contacts_employees_add"
                    >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New"); ?>
                </button>
            <?php } ?>


            <ul class="nav navbar-nav">
                <?php
                foreach (_menus_search_by_controller_location($c, 'nav_contacts') as $key => $msbcl) {
                    $target = ($msbcl['target']) ? ' target="' . $msbcl['target'] . '" ' : '';
                    echo '<li><a href="' . $msbcl["url"] . '"  ' . $target . '><span class="' . $msbcl["icon"] . '"></span> ' . $msbcl["label"] . '</a></li>';
                }
                ?>
            </ul>


            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>

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
                    <?php echo _t("Add new contact"); ?>
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

                include view('contacts', 'form_contacts_contacts_add');
                ?>         

            </div>
        </div>
    </div>
</div>

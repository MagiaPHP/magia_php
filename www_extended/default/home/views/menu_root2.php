<nav class="navbar navbar-default navbar">
    <div class="container-fluid">
        <div class="navbar-header">

            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">

                <?php
                if (modules_field_module('status', 'audio') && 11 === 222) {
                    ?>
                    <li>
                        <a href="index.php?c=orders&a=comments_by_order">
                            <span class="glyphicon glyphicon-comment"></span> <?php _t('Comments'); ?>
                            <?php
                            //    vardump(comments_has_unread_by_contact($u_id));

                            if (comments_has_unread_by_contact($u_id)) {
                                // si tiene muestro nuevo
                                echo '<span class="label label-danger">' . _tr("new") . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                <?php }  /////////////////////////////////////////  ?>


                <?php /////////////////////////////////////////  ?>

                <?php
                foreach (_menus_list_by_location("top") as $key => $top) {


                    if ($top["father"] !== '') {

                        if (_menus_list_by_father_location($top["father"], "top")) {

                            //vardump($top['father']);


                            echo _menus_dropdown_by_father($top["father"]);

//                            echo ' <li class="dropdown">
//                            <a href="#" 
//                            class="dropdown-toggle" 
//                            data-toggle="dropdown" 
//                            role="button" 
//                            aria-haspopup="true" 
//                            aria-expanded="false">
//                            
//                            <i class="' . $top["icon"] . '"></i> ' . ucfirst(_tr($top["label"])) . '
//                                <span class="caret"></span>';
//
//                            // Nuevos contactos
//                            // Nuevos contactos
//                            if ($top["label"] == "contacts") {
//                                $users_total_by_status = users_total_by_status(0);
//
//                                if ($users_total_by_status) {
//                                    echo '<span class="badge">' . $users_total_by_status . '</span>';
//                                }
//                            }
//                            echo '</a><ul class="dropdown-menu">';
//
//                            foreach (_menus_list_by_father_location($top["label"], "top") as $key => $childs) {
//                                echo '<li>';
//                                echo '<a  href="' . $childs["url"] . '">';
//                                echo '<i class="' . $childs["icon"] . '"></i> ' . ucfirst(_tr($childs['label'])) . '</a>';
//                                echo '</li>';
//                            }
//
//                            echo '                                                
//                            </ul>
//                        </li>';
//                            
//                        } else {
//                            //--------------------------------------------------
//                            if ($top["label"] == "budgets" && modules_field_module('status', 'audio')) {
//                                $top["label"] = "Shipping notes";
//                            }
//
//
//                            echo '<li>';
//                            echo '<a href="' . $top["url"] . '"><i class=" ' . $top["icon"] . '"></i> ' . ucfirst(_tr($top['label'])) . ' ';
//
//                            // ORDERS
//                            // Contacts
//                            // Contacts
//                            if ($top["label"] == "contacts") {
//                                $users_total_by_status = users_total_by_status(0);
//
//                                if ($users_total_by_status) {
//                                    echo '<span class="badge progress-bar-danger">' . $users_total_by_status . '</span>';
//                                }
//                            }
//
//                            // Nuevos pedidos
//                            // Nuevos pedidos
//
//                            if (strtolower($top["label"]) == "orders") {
//                                $orders_total_by_status = count(orders_list_by_status(10));
//
//                                if ($orders_total_by_status) {
//                                    echo '<span class="badge">' . $orders_total_by_status . '</span>';
//                                }
//                            }
//                            echo '</a>';
//                            echo '</li>';
//                        }
//                        
                        }
                    }
                }
                ?>
            </ul> 



            <?php // Boton para cambio de empresa web ha audioprothese
            ?>

            <?php if (modules_field_module('status', 'audio') && _options_option("config_company_name2") && 1 == 333333) { ?>

                <form class="navbar-form navbar-left" action="<?php echo $config_company_url2; ?>" method="get">  
                    <input type="hidden" name="c" value="home">
                    <input type="hidden" name="a" value="index">

                    <button type="submit" class="btn btn-success">
                        <?php echo $config_company_name2; ?>
                    </button>                                
                </form>  
            <?php } ?>

            <ul class="nav navbar-nav navbar-right">
                <?php /* <li><a href="#">Link</a></li> */ ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php _menu_icon('top', 'contacts') ?>

                        <?php //echo contacts_picture($u_id, 25);          ?>

                        <?php echo strtoupper(contacts_formated($u_id)); ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)




                        <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu">

                        <?php if (permissions_has_permission($u_rol, "contacts", "read")) { ?>                        
                            <li>
                                <a href="index.php?c=contacts&a=details&id=<?php echo $u_owner_id; ?>">
                                    <span class="glyphicon glyphicon-home" ></span>  
                                    <?php _t("My company"); ?>
                                </a>
                            </li>
                        <?php } ?>



                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>   
                            <li>
                                <a href="index.php?c=my_info">
                                    <span class="glyphicon glyphicon-user" ></span> 
                                    <?php _t("My info"); ?>
                                </a>
                            </li>
                        <?php } ?>




                        <?php if (permissions_has_permission($u_rol, "my_info", "read")) { ?>  
                            <li>
                                <a href="index.php?c=my_info&a=language">
                                    <span class="glyphicon glyphicon-globe" ></span> 
                                    <?php _t("Change language"); ?>
                                </a>
                            </li>  
                        <?php } ?>




                        <li role="separator" class="divider"></li>

                        <?php if (permissions_has_permission($u_rol, 'config', "read")) { ?>
                            <li>
                                <a href="index.php?c=config">
                                    <span class="glyphicon glyphicon-wrench" ></span> 
                                    <?php _t("Config"); ?>
                                </a>
                            </li>
                        <?php } ?>

                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="index.php?c=about">
                                <span class="glyphicon glyphicon-info-sign" ></span> 
                                <?php _t("About"); ?>
                            </a>
                        </li>

                        <li role="separator" class="divider"></li>

                        <li>
                            <a href="index.php?c=home&a=logout">
                                <span class="glyphicon glyphicon-off" ></span> 
                                <?php _t("Logout"); ?>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>


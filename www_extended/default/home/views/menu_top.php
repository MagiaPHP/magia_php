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
            <a class="navbar-brand" href="#">web</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" width="80%">

                </div>







                <button type="submit" class="btn btn-default">Submit</button>
            </form>







            <ul class="nav navbar-nav navbar-right">
                <?php /* <li><a href="#">Link</a></li> */ ?>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">

                        <?php _menu_icon('top', 'contacts') ?>

                        <?php //echo contacts_picture($u_id, 25);  ?>

                        <?php echo strtoupper(contacts_formated($u_id)); ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)




                        <span class="caret"></span></a>

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


                        <?php
                        /*    <li>
                          <a href="index.php?c=home&a=about">
                          <span class="glyphicon glyphicon-info-sign" ></span>
                          <?php _t("About"); ?>
                          </a>
                          </li> */
                        ?>

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



            <?php if (modules_field_module('status', 'audio') && _options_option("config_company_name2")) { ?>

                <form class="navbar-form navbar-right" action="<?php echo $config_company_url2; ?>" method="get">  
                    <input type="hidden" name="c" value="home">
                    <input type="hidden" name="a" value="index">

                    <button type="submit" class="btn btn-success">
                        <?php echo $config_company_name2; ?>
                    </button>                                
                </form>  



            <?php } ?>







        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<?php
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
?>


<nav class="navbar navbar-default navbar">
    <div class="container-fluid">
        <div class="navbar-header">


            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <?php
            /*            <a class="navbar-brand" href="index.php">
              <?php // echo $config_company_name ; ?>





              <?php //logo(35); ?>
              </a> */

//            vardump(count(orders_list_by_status(10)));
            ?>


        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">


                <?php
                //_menus_dropdown("top"); 
                //vardump(modules_search_module_by_sub_module("accounting")); 


                foreach (_menus_list_by_location("top") as $key => $top) {

                    if (
                            (
                            $top["father"] == "" &&
                            permissions_has_permission($u_rol, $top["label"], "read")
                            ) &&
//                            //_options_option($top["label"])
//                            // cojo el status del modulo
//                           modules_field_module('status', $top["label"])
                            // saco el modulo al que pertenece, y veo su estatus
                            modules_field_module("status", modules_search_module_by_sub_module($top["label"]))
                    ) {

                        if (_menus_list_by_father_location($top["label"], "top")) {

                            echo ' <li class="dropdown">
                            <a href="#" 
                            class="dropdown-toggle" 
                            data-toggle="dropdown" 
                            role="button" 
                            aria-haspopup="true" 
                            aria-expanded="false">
                            
                            <i class="' . $top["icon"] . '"></i>' . ucfirst(_tr($top["label"])) . '
                                <span class="caret"></span>';

                            // Nuevos contactos
                            // Nuevos contactos
                            if ($top["label"] == "contacts") {
                                $users_total_by_status = users_total_by_status(0);

                                if ($users_total_by_status) {
                                    echo '<span class="badge">' . $users_total_by_status . '</span>';
                                }
                            }





                            echo '</a><ul class="dropdown-menu">';

                            foreach (_menus_list_by_father_location($top["label"], "top") as $key => $childs) {

                                if (
                                        permissions_has_permission($u_rol, $childs["label"], "read") &&
                                        modules_field_module("status", modules_search_module_by_sub_module($childs["label"]))
                                ) {


                                    // if(  _options_option($childs["label"]) ){
                                    if (modules_search_module_by_sub_module($childs["label"])) {

                                        echo '<li>';
                                        echo '<a  href="' . $childs["url"] . '">';
                                        echo '<i class="' . $childs["icon"] . '"></i> ' . ucfirst(_tr($childs['label'])) . '</a>';
                                        echo '</li>';
                                    }
                                }
                            }

                            echo '                                                
                            </ul>
                        </li>';
                        } else {
                            echo '<li>';
                            echo '<a href="' . $top["url"] . '"><i class=" ' . $top["icon"] . '"></i> ' . ucfirst(_tr($top['label'])) . ' ';

                            // ORDERS
                            // Contacts
                            // Contacts
                            if ($top["label"] == "contacts") {
                                $users_total_by_status = users_total_by_status(0);

                                if ($users_total_by_status) {
                                    echo '<span class="badge progress-bar-danger">' . $users_total_by_status . '</span>';
                                }
                            }

                            // Nuevos pedidos
                            // Nuevos pedidos

                            if (strtolower($top["label"]) == "orders") {
                                $orders_total_by_status = count(orders_list_by_status(10));

                                if ($orders_total_by_status) {
                                    echo '<span class="badge">' . $orders_total_by_status . '</span>';
                                }
                            }


                            echo '</a>';
                            echo '</li>';
                        }
                    }
                }
                ?>

            </ul> 

        </div>
    </div>
</nav>



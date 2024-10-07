<nav class="navbar navbar-default navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#navbar" 
                aria-expanded="false" 
                aria-controls="navbar">
                <span class="sr-only">Menu</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="index.php">
                <?php //echo contacts_formated($u_owner_id) ; ?>

                <?php // echo contacts_formated(contacts_work_for($u_id)) ; ?>
                <?php //echo contacts_formated(contacts_work_at($u_id)) ; ?>


                <?php //logo(35); ?>
            </a>


        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <?php ///////////////////////////////////////// ?>
                <?php if (modules_field_module('status', 'commentsssssss')) { ?>
                    <li>
                        <a href="index.php?c=shop&a=comments_by_order">
                            <span class="glyphicon glyphicon-comment"></span> 
                            <?php _t('Comments'); ?>
                            <?php
                            //    vardump(comments_has_unread_by_contact($u_id));
                            if (shop_comments_has_unread_by_contact($u_id)) {
                                // si tiene muestro nuevo
                                echo '<span class="label label-danger">' . _tr("new") . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                <?php } ?>

                <?php /////////////////////////////////////////   ?>
                <li><a class="nav-link" href='index.php?c=shop'>
                        <i class="fas fa-file"></i>
                        <?php _t("Home"); ?>
                    </a>
                </li>

                <?php /////////////////////////////////////////  ?>

                <?php if (modules_field_module('status', 'audio')) { ?>
                    <li><a class="nav-link" href='index.php?c=shop'>
                            <i class="fas fa-file"></i>
                            <?php _t("My orders"); ?>
                        </a>
                    </li>
                <?php } ?>



                <?php if (permissions_has_permission($u_rol, "shop_contacts", "read")) { ?>        

                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=contacts'>
                            <?php _menu_icon("top", "contacts"); ?>
                            <?php _t("Contacts"); ?>
                        </a>
                    </li>  

                <?php } ?>






                <?php if (modules_field_module('status', 'agenda')) { ?>

                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=agenda'>
                            <?php _menu_icon("top", "agenda"); ?>
                            <?php _t("My events"); ?>
                        </a>
                    </li>  




                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=contacts'>
                            <?php _menu_icon("top", "contacts"); ?>
                            <?php _t("My orders"); ?>
                        </a>
                    </li>  

                <?php } ?>




                <?php if (modules_field_module('status', 'audio')) { ?>
                    <li><a class="nav-link" href='index.php?c=shop&a=patients'>
                            <i class="fas fa-user"></i>
                            <?php _t("Patients"); ?>
                        </a>
                    </li>  
                <?php } ?>

                <?php if (permissions_has_permission($u_rol, "shop_offices", "read")) { ?>

                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=offices'>
                            <i class="glyphicon glyphicon-home"></i>
                            <?php _t("Offices"); ?>
                        </a>
                    </li>   



                    <?php
                    if (
                            permissions_has_permission($u_rol, "shop_invoices", "read") ||
                            permissions_has_permission($u_rol, "shop_credit_notes", "read")
                    ) {
                        ?>

                        <li role="presentation" class="dropdown">

                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                <?php _menu_icon('top', 'accounting') ?>
                                <?php _t("Accounting"); ?> <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">

                                <?php
                                if (permissions_has_permission($u_rol, "shop_invoices", "read")) {
                                    ?>
                                    <li><a class="nav-link" href='index.php?c=shop&a=invoices'>
                                            <?php echo _menu_icon('top', 'invoices'); ?>
                                            <?php _t("Invoices"); ?>
                                        </a>
                                    </li>      
                                <?php } ?>



                                <?php
                                if (permissions_has_permission($u_rol, "shop_credit_notes", "read")) {
                                    ?>
                                    <li>
                                        <a class="nav-link" href='index.php?c=shop&a=credit_notes'>
                                            <?php echo _menu_icon('top', 'credit_notes'); ?>
                                            <?php _t("Credit notes"); ?>
                                        </a>
                                    </li>      
                                <?php } ?>                       
                            </ul>
                        </li>

                    <?php } ?>



                <?php } ?>


                <?php if (permissions_has_permission($u_rol, "shop_invoices", "read")) { ?>
                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=invoices'>
                            <?php echo _menu_icon('top', 'invoices'); ?>
                            <?php _t("Invoices"); ?>
                        </a>
                    </li>                  
                <?php } ?>

                <?php if (permissions_has_permission($u_rol, "shop_credit_notes", "read")) { ?>
                    <li>
                        <a class="nav-link" href='index.php?c=shop&a=credit_notes'>
                            <?php echo _menu_icon('top', 'credit_notes'); ?>
                            <?php _t("Credit notes"); ?>
                        </a>
                    </li>                  
                <?php } ?>


                <?php if (permissions_has_permission($u_rol, "shop_products", "read")) { ?>
                    <li><a class="nav-link" href='index.php?c=shop&a=products'>
                            <i class="fas fa-user"></i>
                            <?php _t("Products"); ?>
                        </a>
                    </li>                  
                <?php } ?>





            </ul> 





            <?php
            /* <form class="navbar-form navbar-right">
              <input type="hidden" name="c" value="users">
              <input type="hidden" name="a" value="logout">
              <button type="submit" class="btn btn-success"><?php _t("Logout"); ?></button>
              </form> */
            ?>  




            <ul class="nav navbar-nav navbar-right">






                <li class="dropdown">
                    <a href="#" 
                       class="dropdown-toggle" 
                       data-toggle="dropdown" 
                       role="button" 
                       aria-haspopup="true" 
                       aria-expanded="false">
                           <?php echo strtoupper(contacts_formated($u_id)); ?> 
                           <?php // echo contacts_formated(contacts_work_at($u_id));  ?> 
                        (<?php echo users_field_contact_id("rol", $u_id) ?>)

                        <span class="caret"></span>
                    </a>


                    <ul class="dropdown-menu">

                        <?php
                        /*
                          <li><a href="index.php?c=shop&a=address">
                          <span class="glyphicon glyphicon-map-marker"></span>
                          <?php _t("My addresses") ; ?>
                          </a>
                          </li> */
                        ?>


                        <li><a href="index.php?c=shop&a=myInfo">
                                <span class="glyphicon glyphicon-user"></span>
                                <?php _t("My Info"); ?>
                            </a>
                        </li>
                        <li><a href="index.php?c=shop&a=my_info_changePass">
                                <span class="glyphicon glyphicon-wrench"></span>
                                <?php _t("Change Password"); ?>
                            </a>
                        </li>
                        <li><a href="index.php?c=shop&a=changeLanguage">
                                <span class="glyphicon glyphicon-globe"></span>
                                <?php _t("Change language"); ?>
                            </a>
                        </li>

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

                <li>
                    <a href="index.php?c=home&a=logout">
                        <span class="glyphicon glyphicon-off" ></span> 
                        <?php _t("Logout"); ?>
                    </a>
                </li>


            </ul>


            <?php
//            vardump(modules_field_module('status', 'audio'));

            if (modules_field_module('status', 'audio')) {
                ?>
                <form class="navbar-form navbar-right" action="index.php" method="get">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="order_choose_contact">

                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New order"); ?>
                    </button>
                </form>
            <?php } ?>

            <?php if (modules_field_module('status', 'agenda')) { ?>
                <form class="navbar-form navbar-right" action="index.php" method="get">
                    <input type="hidden" name="c" value="shop">
                    <input type="hidden" name="a" value="agenda_add">

                    <button type="submit" class="btn btn-danger">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New event"); ?>
                    </button>
                </form>
            <?php } ?>





        </div>
    </div>
</nav>



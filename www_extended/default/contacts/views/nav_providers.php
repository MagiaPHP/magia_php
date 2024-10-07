<nav class="navbar navbar-default">
    <div class="container-fluid">        
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_contacts" 
                aria-expanded="false">

                <span class="sr-only">Nav</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php?c=contacts&a=providers">                
                <?php _menu_icon("top", "providers"); ?>                
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Providers"); ?>
            </a>

        </div>


        <div class="collapse navbar-collapse" id="menu_contacts">


            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>
                </li>
            </ul>




            <form action="index.php"  method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="contacts">
                <input type="hidden" name="a" value="search">


                <div class="form-group">
                    <input 
                        value="<?php echo (isset($txt)) ? $txt : ""; ?>"
                        name="txt" 
                        type="text" 
                        class="form-control" 
                        placeholder="" 
                        autofocus
                        required=""
                        >
                </div>

                <div class="form-group">
                    <select class="form-control" name="w">
                        <option value="all"><?php _t("In all fields"); ?></option>
                        <option value="tva" <?php echo (isset($w) && $w == 'tva') ? " selected " : ""; ?>><?php _t("Tva"); ?></option>
                    </select>
                </div>


                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span> 
                    <?php _t("Search"); ?>
                </button>

                <?php
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                ////////////////////////////////////////////////////////////////
                if (permissions_has_permission($u_rol, "contactssssss", "read")) {
                    ?>                
                    <a href="index.php?c=contacts&a=search_advanced" class="btn btn-default">
                        <span class="glyphicon glyphicon-search"></span> 
                        ...
                    </a>
                <?php } ?>
            </form>




            <?php
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>



            <?php if (modules_field_module('status', 'exporrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrt')) { ?>
                <ul class="nav navbar-nav">
                    <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                        <li><a href="index.php?c=export&a=contacts"><?php _t("Export"); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>


            <?php if (permissions_has_permission($u_rol, "users", "read") == 'okk kkkkkkkkkkkkkkkkkkkkkkkkkkk') { ?>
                <ul class="nav navbar-nav navbar-left">
                    <li>                  
                        <a href="index.php?c=users&a=search&w=waiting" >                      
                            <?php
                            echo users_status_icon(USER_WAITING);
                            _t("Waiting");
                            echo " ";
                            $users_total_by_status = users_total_by_status(0);
                            if ($users_total_by_status) {
                                echo '<span class="badge progress-bar-danger"> ' . $users_total_by_status . '</span>';
                            }
                            ?>
                        </a>
                    </li>
                </ul>
            <?php } ?>





            <?php
            /*

              <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?c=contacts&a=help"><?php _t("Help"); ?></a></li>


              </ul>
             */
            ?>


            <?php if (_options_option("config_invoices_monthly") == 20) { ?>
                <ul class="nav navbar-nav navbar-left">
                    <?php //<li><a href="#">Link</a></li>?>
                    <li class="dropdown">
                        <a href="#" 
                           class="dropdown-toggle" 
                           data-toggle="dropdown" 
                           role="button" 
                           aria-haspopup="true" 
                           aria-expanded="false">
                               <?php _t("More"); ?> 
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?c=contacts&a=search&w=billing_method&bm=M"><?php _t("Monthly billing"); ?></a>
                            </li>
                            <?php /*                        <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#">Separated link</a></li> */ ?>
                        </ul>
                    </li>
                </ul>
            <?php } ?>


            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "updadddddddddddddddddddddddte")) { ?>
                    <li>
                        <a
                            data-toggle="collapse"
                            href="#collapse_form_contacts_pagination_items_limit"
                            aria-expanded="false"
                            aria-controls="collapse_form_contacts_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>

            <ul>
                <?php
                if (permissions_has_permission($u_rol, "contacts", "create")) {
                    ?>     

                    <li>
                        <a href="index.php?c=contacts&a=add"
                           type="button" 
                           class="btn btn-primary navbar-btn navbar-right" 

                           >
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            <?php _t("Add"); ?>
                        </a>
                    </li>
                <?php } ?>    
            </ul>

        </div>
    </div>
</nav>







<div class="modal fade" id="contacts_add" tabindex="-1" role="dialog" aria-labelledby="contacts_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_addLabel">
                    <?php _t("Add new contact"); ?>                
                </h4>
            </div>
            <div class="modal-body">
                <div>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" >
                            <a href="#contact" 
                               aria-controls="contact" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Private customer"); ?>
                            </a>
                        </li>

                        <li role="presentation" class="active">
                            <a href="#company" 
                               aria-controls="company" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Company"); ?>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane"
                             id="contact">
                            <h3><?php _t("Add a private customer"); ?></h3>

                            <?php include "form_contacts_contacts_add.php"; ?>

                        </div>
                        <div role="tabpanel" class="tab-pane active" id="company">
                            <h3><?php _t("Add a company"); ?></h3>

                            <?php include "form_contacts_company_add.php"; ?>
                        </div>
                    </div>

                </div>



                <?php //include "form_contacts_add.php";   ?>
            </div>
        </div>
    </div>
</div>




<?php
/**
 *             
 */
?>
<div class="collapse" id="collapse_form_contacts_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view('config', 'form_contacts_pagination_items_limit');
        ?>
    </div>
</div>
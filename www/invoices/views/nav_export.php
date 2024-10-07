<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_invoices_export" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", "invoices"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Export"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_invoices_export">
            <ul class="nav navbar-nav">               
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_export');
                    }
                    ?>
                </li>                
            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="invoices">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="id">

                <div class="form-group">
                    <input 
                        type="text" 
                        name="id" 
                        class="form-control" 
                        placeholder="<?php _t("By invoice number"); ?>"
                        >
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default">
                        <?php _t("Search"); ?>
                </button>
            </form>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                    <li><a href="index.php?c=export&a=invoices"><?php _t("Export"); ?></a></li>
                <?php } ?>
            </ul>

            <ul class="nav navbar-nav">






            </ul>


            <?php
            /* <form action="index.php" method="get" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="invoices">
              <input type="hidden" name="a" value="addOk">

              <div class="form-group">
              <select class="form-control" name="contact_id">
              <?php contacts_select("contact_id", "name", null, contacts_list_by_type(1)); ?>
              </select>

              </div>


              <button type="submit" class="btn btn-default"><?php _t("Add"); ?></button>
              </form>
             */
            ?>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                <?php if (permissions_has_permission($u_rol, "invoices", "create")) { ?>     
                    <button 
                        type="button" 
                        class="btn btn-primary navbar-btn navbar-right" 
                        data-toggle="modal" data-target="#contacts_invoices_add"
                        >
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New invoice"); ?>
                    </button>
                    <div class="modal fade" id="contacts_invoices_add" tabindex="-1" role="dialog" aria-labelledby="contacts_invoices_addLabel">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <h4 class="modal-title" id="contacts_invoices_addLabel">
                                        <?php _t("Add new invoices"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include "form_add.php"; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>








        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>





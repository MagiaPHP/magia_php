<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_budgets" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>


            <a class="navbar-brand" href="index.php?c=budgets">
                <?php _menu_icon("top", "budgets"); ?>
                <?php
                if (modules_field_module('status', 'audio')) {
                    _t("Delivery note");
                } else {
                    _t("Budgets");
                }
                ?>
            </a>

        </div>


        <div class="collapse navbar-collapse" id="menu_budgets">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>
                </li>

            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="budgets">
                <input type="hidden" name="a" value="search">
                <?php //  <input type="hidden" name="w" value="id">?>

                <div class="form-group">
                    <input
                        autofocus=""
                        type="text" 
                        name="txt" 
                        class="form-control" 
                        placeholder="" 
                        required=""
                        value="<?php echo (isset($txt)) ? $txt : ""; ?>"
                        >
                </div>





                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    <?php _t("Search"); ?></button>
            </form>


            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a
                            data-toggle="collapse"
                            href="#collapse_form_budgets_pagination_items_limit"
                            aria-expanded="false"
                            aria-controls="collapse_form_budgets_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>

                <?php } ?>
            </ul>





            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>





            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav2');
                    }
                    ?>
                </li>
            </ul>




            <?php
            /* <form action="index.php" method="get" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="budgets">
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




            <?php
            /**
             * 
              <li><a href="#">Link</a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
              <li><a href="#">Action</a></li>
              <li><a href="#">Another action</a></li>
              <li><a href="#">Something else here</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Separated link</a></li>
              </ul>
              </li>
             */
            ?>
            </ul>




            <ul class="nav navbar-nav navbar-right">
                <?php if (permissions_has_permission($u_rol, "budgets", "create")) { ?>     
                    <li>
                        <button 
                            type="button" 
                            class="btn btn-primary navbar-btn navbar-right" 
                            data-toggle="modal" data-target="#budgets_add"
                            >
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            <?php _t("New budget"); ?>
                        </button>
                    </li>

                    <li>
                        <?php
                        if (modules_field_module('status', "docu")) {
                            echo docu_modal_bloc($c, $a, 'nav2');
                        }
                        ?>
                    </li>



                <?php } ?>    
            </ul>



            <div class="modal fade" id="budgets_add" tabindex="-1" role="dialog" aria-labelledby="budgets_addLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="budgets_addLabel">
                                <?php _t("Add new budget"); ?>                
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php include "form_add.php"; ?>
                        </div>


                        <?php
                        /**
                         *                         <div class="modal-footer">
                          <a class='btn btn-primary' href="index.php?c=contacts&a=add">
                          <?php _t('New contact'); ?>
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          </div>
                         */
                        ?>



                    </div>
                </div>
            </div>




        </div>
    </div>
</nav>






<div class="collapse" id="collapse_form_budgets_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view('config', 'form_budgets_pagination_items_limit');
        ?>
    </div>
</div>
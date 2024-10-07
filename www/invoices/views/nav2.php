<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_invoices" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", "invoices"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Sale invoices"); ?>


            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_invoices">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav2');
                    }
                    ?>
                </li>
            </ul>


            <?php //include "form_search_year.php"; ?>
            <?php //include "form_search_simple.php"; ?>
            <?php //include "form_search_simple_year.php"; ?>


            <?php
            if (_options_option("config_invoices_print_counter")) {
                include "form_search_simple_year.php";
            } else {
                include "form_search_simple.php";
            }


            /**
             * 
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
             */
            ?>


            <?php
            /*

              <ul class="nav navbar-nav">
              <?php if (permissions_has_permission($u_rol, "invoices", "read")) { ?>
              <li><a href="index.php?c=invoices&a=search_a"><?php _t("Advanced search"); ?></a></li>
              <?php } ?>
              </ul> */
            ?>


            <?php if (modules_field_module('status', 'export')) { ?>
                <ul class = "nav navbar-nav">
                    <?php if (permissions_has_permission($u_rol, "export", "read")) {
                        ?>
                        <li><a href="index.php?c=export&a=invoices"><?php _t("Export"); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>


            <ul class="nav navbar-nav">
                <?php if (modules_field_module('status', 'audio')) { ?>
                    <li>
                        <a href="index.php?c=invoices&a=create_monhtly">
                            <span class="glyphicon glyphicon-oil"></span>
                            <?php _t("Monhtly invoices"); ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>


            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle ="modal" 
                            href="#" 
                            data-target="#myModal_invoices_index_cols_to_show"
                            >
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>

                  

                    <div class="modal fade" id="myModal_invoices_index_cols_to_show" tabindex="-1" role="dialog" aria-labelledby="myModal_invoices_index_cols_to_showLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="myModal_invoices_index_cols_to_showLabel">
                                        <?php _t("Cols to show"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include "form_index_cols_to_show.php"; ?>
                                </div>


                            </div>
                        </div>
                    </div>




                <?php } ?>
            </ul>


            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father('invoices_nav');
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item['controller'])): ?>
                            <li>
                                <?= _menus_dropdown_create_html('invoices_nav', $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
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

            <div class="btn-group btn-primary navbar-btn navbar-right" role="group">
                <button 
                    type="button" 
                    class="btn btn-primary dropdown-toggle" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New invoice"); ?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="index.php?c=invoices&a=add">
                            <span class="glyphicon glyphicon-th-list"></span>
                            <?php _t("My contacts"); ?>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?c=invoices&a=add_company">
                            <span class="glyphicon glyphicon-briefcase"></span>
                            <?php _t("New company"); ?>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?c=invoices&a=add_contact">
                            <span class="glyphicon glyphicon-user"></span>
                            <?php _t("New private customer"); ?>
                        </a>
                    </li>
                </ul>
            </div>






            <?php
            /**
             *           <ul>
              <?php if (permissions_has_permission($u_rol, "invossices", "create")) { ?>
              <li>
              <button
              type="button"
              class="btn btn-primary navbar-btn navbar-right"
              data-toggle="modal" data-target="#contacts_invoices_add"
              >
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New invoice"); ?>
              </button>
              </li>
              <?php } ?>
              </ul>
             * 
             *             <div class="modal fade" id="contacts_invoices_add" tabindex="-1" role="dialog" aria-labelledby="contacts_invoices_addLabel">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>
              <h4 class="modal-title" id="contacts_invoices_addLabel">
              <?php _t("Add new invoice"); ?>
              </h4>
              </div>
              <div class="modal-body">
              <?php include "form_add.php"; ?>
              </div>

              <div class="modal-footer">
              <a class='btn btn-primary' href="index.php?c=contacts&a=add">
              <?php _t('New contact'); ?>
              <span class="glyphicon glyphicon-chevron-right"></span>
              </a>
              </div>



              </div>
              </div>
              </div>
             * 
             * 
             */
            ?>

            <?php
            /**
             *   <ul class="nav navbar-nav navbar-right">
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
              </ul>

             */
            ?>








        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<?php
/**
 *             <ul class="nav navbar-nav">
  <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
  <li>
  <a
  data-toggle="collapse"
  href="#collapse_form_invoices_pagination_items_limit"
  aria-expanded="false"
  aria-controls="collapse_form_invoices_pagination_items_limit">
  <span class="glyphicon glyphicon-cog"></span>
  </a>
  </li>
  <?php } ?>
  </ul>
 * 
 * 
 */
?>
<div class="collapse" id="collapse_form_invoices_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        //include view('config', 'form_invoices_pagination_items_limit');
        ?>
        <hr>
        <a href="index.php?c=invoices&a=part_check_totals">part_check_totals</a>
    </div>
</div>
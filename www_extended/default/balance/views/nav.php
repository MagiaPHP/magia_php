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
            <a class="navbar-brand" href="index.php?c=invoices">
                <?php _menu_icon("top", "balance"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Balance"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav');
                    }
                    ?>
                </li>
            </ul>


            <?php
//            if (_options_option("config_invoices_print_counter")) {
//                include "form_search_simple_year.php";
//            } else {
//                include "form_search_simple.php";
//            }
//            
            include "form_search_simple.php";
            ?>





            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father('balance_nav');
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item['controller'])): ?>
                            <li>
                                <?= _menus_dropdown_create_html('balance_nav', $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>







            <?php
            /**
             *             <div class="btn-group btn-primary navbar-btn navbar-right" role="group">
              <button
              type="button"
              class="btn btn-primary dropdown-toggle"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New balance"); ?>
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


             */
            ?>

            <ul class="nav navbar-nav navbar-right">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav2');
                    }
                    ?>
                </li>

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








        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
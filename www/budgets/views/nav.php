<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#bs-example-navbar-collapse-1" 
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=invoices">
                <?php _menu_icon("top", "budgets"); ?>


                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Budgets"); ?>


            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>
                </li>

            </ul>


            <?php
            include "form_search_simple.php";
            ?>

            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father('budgets_nav');
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item['controller'])): ?>
                            <li>
                                <?= _menus_dropdown_create_html('budgets_nav', $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>




            <?php
            // crea el menu personalizado 
           // _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>



            <ul>
                <?php
                if (permissions_has_permission($u_rol, "budgets", "create")) {
                    ?>     
                    <li>
                        <a href="index.php?c=budgets&a=add"
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
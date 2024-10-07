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
            
            <a class="navbar-brand" href="index.php?c=credit_notes">
                
                <?php _menu_icon("top", "credit_notes"); ?>
                
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Credit notes"); ?>

            </a>
            
        </div>

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
            if (IS_MULTI_VAT) {
                include "form_search_simple_multi.php";
            } else {
                include "form_search_simple.php";
            }
            ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="modal" 
                            data-target="#show_col_from_table_Modal"
                            href="#"                             
                            >
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>

                        <div class="modal fade" id="show_col_from_table_Modal" tabindex="-1" role="dialog" aria-labelledby="show_col_from_table_ModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button 
                                            type="button" 
                                            class="close" 
                                            data-dismiss="modal" 
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h4 class="modal-title" id="credit_nots_addLabel">
                                            <?php _t("Columne to show"); ?>                
                                        </h4>
                                    </div>
                                    <div class="modal-body">

                                        <?php
                                        include view("credit_notes", "form_show_col_from_table");
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>                                       
                <?php } ?>
            </ul>
            
            
            
             <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father('credit_notes_nav');
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item['controller'])): ?>
                            <li>
                                <?= _menus_dropdown_create_html('credit_notes_nav', $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>

            
            
            
            

            <ul>
                <?php
                if (permissions_has_permission($u_rol, "credit_notes", "create")) {
                    ?>     
                    <li>
                        <a href="index.php?c=credit_notes&a=add"
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
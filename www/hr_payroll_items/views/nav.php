<?php 
#   __  __             _         _____  _    _ _____  
#  |  \/  |           (_)       |  __ \| |  | |  __ \ 
#  | \  / | __ _  __ _ _  __ _  | |__) | |__| | |__) |
#  | |\/| |/ _` |/ _` | |/ _` | |  ___/|  __  |  ___/ 
#  | |  | | (_| | (_| | | (_| | | |    | |  | | |     
#  |_|  |_|\__,_|\__, |_|\__,_| |_|    |_|  |_|_|     
#                 __/ |                         
#                |___/             
# 
# 
# Documento creado con mago de Magia_PHP 
# http://magiaphp.com 
# Fecha de creacion del documento: 2024-09-21 12:09:52 
#################################################################################
?>

<nav class="navbar navbar-default">
  <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation hr_payroll_items</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
        <a class="navbar-brand" href="index.php?c=hr_payroll_items">
            <?php _menu_icon("top" , 'hr_payroll_items'); ?>
            <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("Hr payroll items"); ?>
        </a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">
                <li>
                    <?php
                    if (modules_field_module("status", "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
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
          
        
        <?php // include view("hr_payroll_items", "form_search"   , $arg = ["redi" => 1]) ?>
            


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

                        <div class="modal fade" id="show_col_from_table_Modal" tabindex="-1" 
                        role="dialog" aria-labelledby="show_col_from_table_ModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" 
                                        aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="hr_payroll_items_addLabel">
                                            <?php _t("Columne to show"); ?>                
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                    
                                        <?php                                       
                                        include view("hr_payroll_items", "form_show_col_from_table");
                                        ?>

                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>                                       
                <?php } ?>

            </ul>
            





            <ul class="nav navbar-nav">                
                <?php if (permissions_has_permission($u_rol, "config", "create")) { ?>
                    <li><a href="#" data-toggle="modal" data-target="#addMenuItems"><?php echo icon("menu-hamburger"); ?></a></li>
                    <div class="modal fade" id="addMenuItems" tabindex="-1" role="dialog" aria-labelledby="addMenuItemsLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="addMenuItemsLabel">
                                        <?php _t("Add menu"); ?>
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php
                                    include view("_menus", "form_add_item");
                                    ?>
                                </div>
                                
                                <div class="modal-footer">
                                    <a href="index.php?c=_menus" type="button" class="btn btn-danger"><?php _t("Edit items"); ?></a>                        
                                </div>                                        
                            </div>
                        </div>
                    </div>
                <?php } ?>
                




                <?php if (
                    modules_field_module("status", "export") &&  
                    permissions_has_permission($u_rol, "export", "read")
                    
                    ) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo _t("Export"); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=hr_payroll_items&a=export_json"><?php _t("Json"); ?></a></li>
                            <li><a href="index.php?c=hr_payroll_items&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                            <li><a href="index.php?c=hr_payroll_items&a=export_csv"><?php _t("CSV"); ?></a></li>
                            <li><a href="index.php?c=hr_payroll_items&a=export_xml"><?php _t("XML"); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Other</a></li>
                        </ul>
                    </li>
                <?php } ?>    
            </ul>
            



            



            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father("hr_payroll_items_nav");
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item["controller"])): ?>
                            <li>
                                <?= _menus_dropdown_create_html("hr_payroll_items_nav", $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>

            <?php
            /**
            <ul class="nav navbar-nav">
                <li><a href="index.php?c=hr_payroll_items&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
            
                <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=hr_payroll_items&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=hr_payroll_items&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=hr_payroll_items&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=hr_payroll_items&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
                <?php } ?>    

            </ul>
            */ 
            ?>
            

            
<div class="collapse navbar-collapse" id="hr_payroll_items_add">
    

            <?php
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>

                <?php if (permissions_has_permission($u_rol, "hr_payroll_items", "create")) { ?>     
                    
                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#hr_payroll_itemsModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New hr payroll items"); ?>
                    </button>

                    <div class="modal fade" id="hr_payroll_itemsModal" tabindex="-1" role="dialog" aria-labelledby="hr_payroll_itemsModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                     <h4 class="modal-title" id="hr_payroll_items_addLabel">
                                        <?php _t("Add new hr_payroll_items"); ?>                
                                    </h4>
                                </div>
                                
                                <div class="modal-body">
                                    <?php include view("hr_payroll_items", "form_add"); ?>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                <?php } ?>    
            </div>           
    </div>
  </div>
</nav>



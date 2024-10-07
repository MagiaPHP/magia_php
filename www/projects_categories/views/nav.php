
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation projects_categories</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=projects_categories">
                <?php _menu_icon("top", 'projects_categories'); ?>
                <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("Projects_categories"); ?>
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



            <?php include view("projects_categories", "form_search", $arg = ["redi" => 1]) ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_projects_categories_mep" 
                            aria-expanded="false" 
                            aria-controls="collapse_projects_categories_mep">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>                                       
                <?php } ?>
            </ul>


            <ul class="nav navbar-nav">
                <li><a href="index.php?c=projects_categories&a=search_advanced"><?php _t("Search avanced"); ?></a></li>

                <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                            <?php echo _t("Export"); ?>
                            <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=projects_categories&a=export_json"><?php _t("Json"); ?></a></li>
                            <li><a href="index.php?c=projects_categories&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                            <li><a href="index.php?c=projects_categories&a=export_csv"><?php _t("CSV"); ?></a></li>
                            <li><a href="index.php?c=projects_categories&a=export_xml"><?php _t("XML"); ?></a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Other</a></li>
                        </ul>
                    </li>
                <?php } ?>    

            </ul>




            <div class="collapse navbar-collapse" id="projects_categories_add">


                <?php
                _menus_create_menu_items_by_controller_location($c, __FILE__);
                ?>


                <?php if (permissions_has_permission($u_rol, "projects_categories", "create")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#projects_categoriesModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New projects_categories"); ?>
                    </button>

                    <div class="modal fade" id="projects_categoriesModal" tabindex="-1" role="dialog" aria-labelledby="projects_categoriesModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="projects_categories_addLabel">
                                        <?php _t("Add new projects_categories"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("projects_categories", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_projects_categories_mep">
    <div class="well">
        <?php
        echo "<p><b>" . _tr("Columne to show") . "</b></p>";
        include view("projects_categories", "form_show_col_from_table");
        ?>
    </div>
</div>




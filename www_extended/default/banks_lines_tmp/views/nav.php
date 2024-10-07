
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation banks_lines_tmp</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php?c=banks_lines_tmp">
                <?php _menu_icon("top", 'banks_lines_tmp'); ?>
                <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("Banks_lines_tmp"); ?>
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



            <?php include view("banks_lines_tmp", "form_search", $arg = ["redi" => 1]) ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_banks_lines_tmp_mep" 
                            aria-expanded="false" 
                            aria-controls="collapse_banks_lines_tmp_mep">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>                                       
                <?php } ?>
            </ul>


            <ul class="nav navbar-nav">
                <li><a href="index.php?c=banks_lines_tmp&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=banks_lines_tmp&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=banks_lines_tmp&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=banks_lines_tmp&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=banks_lines_tmp&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="index.php?c=banks_lines_tmp&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=banks"><?php _t("Banks"); ?></a></li>
                        <li><a href="index.php?c=banks_lines"><?php _t("Banks lines"); ?></a></li>
                        <li><a href="index.php?c=banks_lines_status"><?php _t("Banks lines status"); ?></a></li>
                        <li><a href="index.php?c=banks_lines_tmp"><?php _t("Banks lines tmp"); ?></a></li>
                        <li><a href="index.php?c=banks_templates"><?php _t("banks_templates"); ?></a></li>

                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
            </ul>



            <div class="collapse navbar-collapse" id="banks_lines_tmp_add">


                <?php
                _menus_create_menu_items_by_controller_location($c, __FILE__);
                ?>


                <?php if (permissions_has_permission($u_rol, "banks_lines_tmp", "create")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#banks_lines_tmpModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New banks_lines_tmp"); ?>
                    </button>

                    <div class="modal fade" id="banks_lines_tmpModal" tabindex="-1" role="dialog" aria-labelledby="banks_lines_tmpModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="banks_lines_tmp_addLabel">
                                        <?php _t("Add new banks_lines_tmp"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("banks_lines_tmp", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_banks_lines_tmp_mep">
    <div class="well">
        <?php
        echo "<p><b>" . _tr("Columne to show") . "</b></p>";
        include view("banks_lines_tmp", "form_show_col_from_table");
        ?>
    </div>
</div>




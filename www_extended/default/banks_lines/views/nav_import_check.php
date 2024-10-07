<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation banks_lines</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <a class="navbar-brand" href="index.php?c=banks_lines">
                <?php _menu_icon("top", 'banks_lines'); ?>
                <?php echo ( _options_option("config_menus_debug") ) ? _menus_get_file_name(__FILE__) : _t("Banks lines"); ?>
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

            <?php //include view("banks_lines", "form_search", $arg = ["redi" => 1]) ?>

            <?php include "form_changer_bank.php"; ?>
            <?php include "form_changer_codification.php"; ?>
            <?php include "form_changer_delimiter.php"; ?>
            <?php include "form_changer_date_format.php"; ?>
            <?php // include "form_changer_template.php"; ?>




            <?php // include view("banks_lines", "form_search_long", $arg = ["redi" => 1]) ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_banks_lines_mep" 
                            aria-expanded="false" 
                            aria-controls="collapse_banks_lines_mep">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>    

                    <li>                     
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form enctype="multipart/form-data" method="post" action="index.php">
                                            <input type="hidden" name="c" value="banks_lines">
                                            <input type="hidden" name="a" value="ok_import_check">    
                                            <input type="hidden" name="account_number" value="<?php echo $account_number; ?>">    
                                            <input type="hidden" name="id" value="1">
                                            <input type="hidden" name="redi[redi]" value="5">
                                            <div class="form-group">
                                                <input type="file" id="file" name="file">
                                            </div>  
                                            <div class="form-group">
                                                <select class="form-control" name="account_number">
                                                    <?php
                                                    foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {

//                                                        $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";

                                                        echo '<option value="' . $blbci['account_number'] . '" >' . $blbci['bank'] . ' ' . $blbci['account_number'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <button type="submit" class="btn btn-default">
                                                <?php _t("Submit"); ?>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php } ?>



                <li>
                    <a 
                        data-toggle="modal"
                        data-target="#modal_download_file"
                        href="#modal_download_fileLabel" >
                            <?php echo icon("download"); ?>
                            <?php _t("Donwload file"); ?>                                    
                    </a>                                                                
                    <?php include "modal_download_file.php"; ?>

                </li>     

                <li>
                    <a href="index.php?c=banks_lines&a=import"><?php echo icon("th-list"); ?> <?php _t("Files list"); ?></a>
                </li>

            </ul>



            <div class="collapse navbar-collapse" id="banks_lines_add">


                <?php
                _menus_create_menu_items_by_controller_location($c, __FILE__);
                ?>


                <?php if (permissions_has_permission($u_rol, "banks_lines", "creaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaate")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#banks_linesModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New banks_lines"); ?>
                    </button>

                    <div class="modal fade" id="banks_linesModal" tabindex="-1" role="dialog" aria-labelledby="banks_linesModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="banks_lines_addLabel">
                                        <?php _t("Add new banks lines"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("banks_lines", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>         


        </div>
    </div>
</nav>

<div class="collapse" id="collapse_banks_lines_mep">
    <div class="well">
        <?php
        echo "<p><b>" . _tr("Columns to show") . "</b></p>";
        include view("banks_lines", "form_show_col_from_table");
        ?>
    </div>
</div>




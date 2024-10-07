<nav class="navbar navbar-default">
    <div class="container-fluid">

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
            <a class="navbar-brand" href="index.php?c=contacts&a=details&id=<?php echo $id; ?>">
                <?php _menu_icon("top", "offices"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Offices"); ?>
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <?php if (permissions_has_permission($u_rol, "offices", "create")) { ?>   
                <button 
                    type="button" 
                    class="btn btn-primary navbar-btn navbar-right" 
                    data-toggle="modal" data-target="#offices_add"
                    >
                    <span class="glyphicon glyphicon-plus-sign"></span>
                    <?php _t("New"); ?>
                </button>
            <?php } ?>


        </div>
    </div>
</nav>

<div class="modal fade" id="offices_add" tabindex="-1" role="dialog" aria-labelledby="offices_addLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button 
                    type="button" 
                    class="close" 
                    data-dismiss="modal" 
                    aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="offices_addLabel">
                    <?php echo _t("Add new office"); ?>
                </h4>
            </div>
            <div class="modal-body">                
                <?php
                
                $arg['redi'] = 10;
                $arg['c'] = 'contacts';
                $arg['a'] = 'offices';
                $arg['params'] = "id=$id";
                $arg['owner_id'] = $id;
                $arg['office_id'] = $id;

                include "form_offices_add.php";
                ?>         
            </div>
        </div>
    </div>
</div>

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

            <a class="navbar-brand" href="index.php?c=export">                
                <?php _menu_icon("top", "export"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Export"); ?>
            </a>


        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




            <?php
            /*            <form action="index.php"  method="get" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="contacts">
              <input type="hidden" name="a" value="search">
              <input type="hidden" name="w" value="">

              <div class="form-group">
              <input
              name="txt"
              type="text"
              class="form-control"
              placeholder="<?php _t("Name, Lastname, Birthday") ; ?>"
              autofocus>
              </div>




              <div class="form-group">
              <select class="form-control" name="owner_id">
              <option value="all"><?php echo _t("All");  ?></option>

              <?php foreach (contacts_list_by_type(1) as $key => $value) {
              echo '<option value="all">'.$value['name'].'</option>';
              }?>


              </select>
              </div>




              <button type="submit" class="btn btn-default">
              <span class="glyphicon glyphicon-search"></span>
              <?php _t("Search") ; ?>
              </button>
              </form>

             */
            ?>



            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>














            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php if (permissions_has_permission($u_rol, "sssss", "create")) { ?>     
                    <button 
                        type="button" 
                        class="btn btn-primary navbar-btn navbar-right" 
                        data-toggle="modal" data-target="#contacts_add"
                        >
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New"); ?>
                    </button>
                <?php } ?>    
            </div>






        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>







<div class="modal fade" id="contacts_add" tabindex="-1" role="dialog" aria-labelledby="contacts_addLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title" id="contacts_addLabel">
                    <?php _t("Add new contact"); ?>                
                </h4>
            </div>
            <div class="modal-body">






                <div>

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" >
                            <a href="#contact" 
                               aria-controls="contact" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Contact"); ?>
                            </a>
                        </li>

                        <li role="presentation" class="active">
                            <a href="#company" 
                               aria-controls="company" 
                               role="tab" 
                               data-toggle="tab">
                                   <?php _t("Company"); ?>
                            </a>
                        </li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <div role="tabpanel" class="tab-pane"
                             id="contact">
                            <h3><?php _t("Add a contact"); ?></h3>



                            <?php include "form_contacts_contacts_add.php"; ?>

                        </div>
                        <div role="tabpanel" class="tab-pane active" id="company">
                            <h3><?php _t("Add a company"); ?></h3>

                            <?php include "form_contacts_company_add.php"; ?>
                        </div>
                    </div>

                </div>



                <?php //include "form_contacts_add.php"; ?>
            </div>
        </div>
    </div>
</div>

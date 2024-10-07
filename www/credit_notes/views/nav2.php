<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_credit_notes" aria-expanded="false">
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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_credit_notes">
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
            if (_options_option("config_credit_notes_print_counter")) {
                include "form_search_simple_year.php";
            } else {
                include "form_search_simple.php";
            }
            ?>


            <?php
            /*            <form action="index.php" method="get" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="credit_notes">
              <input type="hidden" name="a" value="search">
              <input type="hidden" name="w" value="id">

              <div class="form-group">
              <input type="text" name="id" class="form-control" placeholder="<?php _t("By id"); ?>">
              </div>





              <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span><?php _t("Search"); ?></button>
              </form> */
            ?>

            
            
            


            <?php if (modules_field_module('status', 'exportddddddddd')) { ?>
                <ul class="nav navbar-nav">
                    <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                        <li><a href="index.php?c=export&a=credit_notes"><?php _t("Export"); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>



            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a
                            data-toggle="collapse"
                            href="#collapse_collapse_form_credit_notes_pagination_items_limit"
                            aria-expanded="false"
                            aria-controls="collapse_collapse_form_credit_notes_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                <?php } ?>
            </ul>




            <?php
            /* <form action="index.php" method="get" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="credit_notes">
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




            <ul>
                <?php if (permissions_has_permission($u_rol, "credit_notes", "create")) { ?>     
                    <li>
                        <button 
                            type="button" 
                            class="btn btn-primary navbar-btn navbar-right" 
                            data-toggle="modal" data-target="#credit_notes_add"
                            >
                            <span class="glyphicon glyphicon-plus-sign"></span>
                            <?php _t("New credit note"); ?>
                        </button>
                    </li>
                <?php } ?>    
            </ul>

            <div class="modal fade" id="credit_notes_add" tabindex="-1" role="dialog" aria-labelledby="credit_notes_addLabel">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <h4 class="modal-title" id="credit_notes_addLabel">
                                <?php _t("Add new credit note"); ?>                
                            </h4>
                        </div>
                        <div class="modal-body">
                            <?php include "form_add.php"; ?>
                        </div>


                        <?php
                        /**
                         * <div class="modal-footer">
                          <a class='btn btn-primary' href="index.php?c=contacts&a=add">
                          <?php _t('New contact'); ?>
                          <span class="glyphicon glyphicon-chevron-right"></span>
                          </a>
                          </div>
                         */
                        ?>


                    </div>
                </div>
            </div>







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
  href="#collapse_collapse_form_credit_notes_pagination_items_limit"
  aria-expanded="false"
  aria-controls="collapse_collapse_form_credit_notes_pagination_items_limit">
  <span class="glyphicon glyphicon-cog"></span>
  </a>
  </li>
  <?php } ?>
  </ul>
 */
?>
<div class="collapse" id="collapse_collapse_form_credit_notes_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view('config', 'form_credit_notes_pagination_items_limit');
        ?>
    </div>
</div>
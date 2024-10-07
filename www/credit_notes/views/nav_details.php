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
            <a class="navbar-brand" href="#">
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Credit notes"); ?> : <?php echo $id; ?>
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_details');
                    }
                    ?>
                </li>


                <?php
                //vardump($cn->getClient_id());

                print_icon_nav("index.php?c=credit_notes&a=export_pdf&id=" . $cn->getId() . "", $cn->getClient_id(), _tr('Print'));
                ?>







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
              <input
              type="text"
              name="id"
              class="form-control"
              placeholder="<?php //_t("By id"); ?>"
              >
              </div>

              <button
              type="submit"
              class="btn btn-default">
              <?php _t("Search"); ?>
              </button>
              </form> */
            ?>


            <?php # SAVE ##########################################################?>
            <?php # SAVE ##########################################################?>
            <?php # SAVE ##########################################################?>
            <?php # SAVE ########################################################## ?>


            <?php if (permissions_has_permission($u_rol, "credit_notes", "update")) { ?>


                <?php if ($cn->getCanBeEdit()) { ?> 

                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="credit_notes"> 
                        <input type="hidden" name="a" value="edit"> 
                        <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>"> 
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                            <?php _t("Edit"); ?>
                        </button>
                    </form>
                <?php } else { ?>

                    <div class="navbar-form navbar-right">


                        <button type="button" class="btn btn-default " data-toggle="modal" data-target="#getWhyCanNotBeEdit">
                            <span class="glyphicon glyphicon-pencil"></span> 
                            <?php _t("Edit"); ?>
                        </button>

                        <div class="modal fade" id="getWhyCanNotBeEdit" tabindex="-1" role="dialog" aria-labelledby="getWhyCanNotBeEditLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="getWhyCanNotBeEditLabel"><?php _t("Edit"); ?></h4>
                                    </div>
                                    <div class="modal-body">

                                        <h3><?php _t("Reasons why you can't edit this document"); ?></h3>

                                        <?php
                                        foreach ($cn->getWhyCanNotBeEdit() as $key => $value) {
                                            echo "<p>- $value</p>";
                                        }
                                        ?>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
            <?php } ?>



            <ul class="nav navbar-nav navbar-right">

                <?php /* <li><a href="#">Link</a></li> */ ?>

                <?php ## EXPORT  ?>
                <?php /*                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Export
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="index.php?&c=credit_notes&a=export_pdf&id=<?php echo $id ; ?>"><?php _t("PDF") ; ?></a></li>
                  <li><a href="#">Json</a></li>
                  <li><a href="#">XML</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  </ul>
                  </li> */ ?>




                <?php
                /*                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Dropdown
                  <span class="caret"></span>
                  </a>

                  <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  </ul>
                  </li> */
                ?>



            </ul>





        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
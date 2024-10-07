<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_budgets_details" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Budget"); ?>
                <?php echo $id; ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_budgets_details">
            <ul class="nav navbar-nav">

                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, _menus_get_file_name(__FILE__));
                    }
                    ?>

                </li>



                <?php /* <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> 
                  <li>
                  <a href="index.php?&c=budgets&a=export_pdf&id=<?php echo $id ; ?>" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Print") ; ?>
                  </a>
                  </li>


                  <li>
                  <a href="index.php?&c=budgets&a=export_nde&id=<?php echo $id ; ?>" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Delivery note") ; ?> <?php _t("Valued"); ?>
                  </a>
                  </li>

                  <li>
                  <a href="index.php?&c=budgets&a=export_nde&id=<?php echo $id ; ?>&valued=true" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Delivery note") ; ?> <?php _t("Not valued"); ?>
                  </a>
                  </li>


                 */ ?>



                <?php
                // Print
                print_icon_nav("index.php?c=budgets&a=export_pdf&id=$id", budgets_field_id('client_id', $id), (modules_field_module('status', 'audio')) ? _tr("Delivery note") : _tr("Budgets"));

                if (modules_field_module('status', 'audio')) {
                    print_icon_nav("index.php?c=budgets&a=export_nde&valued=true&id=$id", budgets_field_id('client_id', $id), _tr('Valued'));
                    print_icon_nav("index.php?c=budgets&a=export_nde&&id=$id", budgets_field_id('client_id', $id), _tr('Not valued'));
                }


                if (_options_option("config_invoices_proforma")) {
                    print_icon_nav("index.php?c=budgets&a=export_proforma&id=$id", budgets_field_id('client_id', $id), _tr("Proforma invoice"));
                }
                ?>  


            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="budgets">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="id">

                <div class="form-group">
                    <input 
                        type="text" 
                        name="id" 
                        class="form-control" 
                        placeholder="<?php _t("By number"); ?>"
                        >
                </div>

                <button 
                    type="submit" 
                    class="btn btn-default">
                        <?php _t("Search"); ?>
                </button>
            </form>


            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>



            <?php # SAVE ##########################################################      ?>
            <?php # SAVE ##########################################################  ?>
            <?php # SAVE ##########################################################     ?>
            <?php # SAVE ##########################################################  ?>

            <?php if (permissions_has_permission($u_rol, $c, "update")) { ?>

                <?php if (budgets_can_be_edit($id)) { ?>
                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="budgets"> 
                        <input type="hidden" name="a" value="edit"> 
                        <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span> 
                            <?php _t("Edit"); ?>
                        </button>
                    </form>      


                <?php } else { ?>
                    <div class="navbar-form navbar-right">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <?php _t("Edit"); ?>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">
                                            <?php _t("Edit"); ?>
                                        </h4>
                                    </div>
                                    <div class="modal-body">
                                        <h3><?php _t("Reasons why you can't edit this document"); ?></h3>
                                        <ul>
                                            <?php
                                            foreach (budgets_why_can_not_be_edit($id) as $key => $value) {
                                                echo "<li>$value</li>";
                                            }
                                            ?>
                                        </ul>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>  
                <?php } ?>




            <?php } ?>






            <ul class="nav navbar-nav navbar-right">

                <?php /* <li><a href="#">Link</a></li> */ ?>

                <?php /*
                  <?php ## EXPORT ?>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Export
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="index.php?&c=budgets&a=export_pdf&id=<?php echo $id ; ?>"><?php _t("PDF") ; ?></a></li>
                  <li><a href="#">Json</a></li>
                  <li><a href="#">XML</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  </ul>
                  </li>
                 * 
                 */ ?>




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
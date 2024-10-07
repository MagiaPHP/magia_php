<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_invoices_details" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _t("Expense"); ?> <?php echo $expense->getId(); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_invoices_details">
            <ul class="nav navbar-nav">


                <?php /* <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li> */ ?>
                <?php
                /* <li>
                  <a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Print"); ?>
                  </a>
                  </li>

                  <li>
                  <a href="index.php?c=invoices&a=print&id=<?php echo $id; ?>" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Print"); ?>60
                  </a>
                  </li> */
                ?>



                <?php
                //
                print_icon_nav("index.php?c=expenses&a=export_pdf&id=$id", invoices_field_id('client_id', $id), _tr('Print'));
                ?>



                <?php /*

                 * 
                 * 
                 * 
                 *          <li>
                  <a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>&type=nv" target="top">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Pdf nv"); ?>
                  </a>
                  </li>

                 * 
                 * 
                 *         
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <span class="glyphicon glyphicon-print"></span>
                  <?php _t("Print"); ?>
                  <span class="caret"></span></a>


                  <ul class="dropdown-menu">
                  <li><a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>&type=nv"><?php _t("Not valued"); ?></a></li>
                  <li><a href="index.php?c=invoices&a=export_pdf&id=<?php echo $id; ?>"><?php _t("Valued"); ?></a></li>
                  <li><a href="#"></a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">One more separated link</a></li>
                  </ul>


                  </li>
                 */ ?>
            </ul>






            <?php
            //******************************************************************
            //******************************************************************
            //******************************************************************
            //******************************************************************
//            if (_options_option("config_invoices_print_counter")) {
//                include "form_search_simple_year.php";
//            } else {
//                include "form_search_simple.php";
//            }
            include "form_search_simple.php";
            ?>




            <?php # edit ##########################################################      ?>
            <?php # edit ##########################################################   ?>
            <?php # edit ##########################################################  ?>
            <?php # edit ##########################################################      ?>

            <?php if (permissions_has_permission($u_rol, "expenses", "update")) { ?> 

                <?php if (expenses_can_be_edit($expense->getId())) { ?>
                    <form class="navbar-form navbar-right">
                        <input type="hidden" name="c" value="expenses"> 
                        <input type="hidden" name="a" value="edit"> 
                        <input type="hidden" name="id" value="<?php echo $expense->getId(); ?>"> 
                        <div class="form-group">

                        </div>
                        <button type="submit" class="btn btn-primary">
                            <span class="glyphicon glyphicon-edit"></span> 
                            <?php _t("Edit expense"); ?>
                        </button>
                    </form>     
                <?php } else { ?>
                    <div class="navbar-form navbar-right">
                        <button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
                            <span class="glyphicon glyphicon-pencil"></span>
                            <?php _t("Edit Expense"); ?>
                        </button>

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
                                            foreach (expenses_why_can_not_be_edit($expense->getId()) as $key => $value) {
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

                <?php
                if (
                        permissions_has_permission($u_rol, 'export', "read") &&
                        modules_field_module('status', 'export')
                ) {
                    ?>
                    <li>
                        <a href="index.php?c=expenses&a=export&id=<?php echo $expense->getId(); ?>">
                            <?php _t('Export'); ?>
                        </a>
                    </li> 
                <?php } ?>


                <?php ## EXPORT     ?>
                <?php /*
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  <?php _t("Export"); ?>
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="index.php?c=invoices&a=export_json&id=<?php echo $id; ?>"><?php _t("Json"); ?></a></li>
                  <li><a href="index.php?c=invoices&a=xml&id=<?php echo $id; ?>"><?php _t("XML"); ?></a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="index.php?c=export&a=invoices"><?php _t("All invoices"); ?></a></li>
                  </ul>
                  </li>
                 * 
                 */ ?>


                <?php /*
                  <?php ## Import ?>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                  Import
                  <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu">
                  <li><a href="#">Json</a></li>
                  <li><a href="#">XML</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  </ul>
                  </li>
                 * 
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li><a href="#">Separated link</a></li>
                  </ul>
                  </li>


                 */ ?>


                <?php
                if (
                        $u_rol == 'root' &&
                        modules_field_module('status', 'export')
                ) {
                    ?>
                    <li class="dropdown">
                        <a href="#" 
                           class="dropdown-toggle" 
                           data-toggle="dropdown" 
                           role="button" 
                           aria-haspopup="true" 
                           aria-expanded="false">
                            Export ONLY ROOT 
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="index.php?c=expenses&a=export_json&id=<?php echo $id; ?>">Export json</a></li>
                            <li><a href="index.php?c=expenses&a=import_json&id=<?php echo $id; ?>">Import json</a></li>
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                        </ul>
                    </li>

                <?php } ?>




                <ul class="nav navbar-nav navbar">
                    <?php // <li><a href="#">Link</a></li>    ?>
                    <li class="dropdown">
                        <a href="#" 
                           class="dropdown-toggle" 
                           data-toggle="dropdown" 
                           role="button" 
                           aria-haspopup="true" 
                           aria-expanded="false"><?php _t("Actions"); ?> <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="index.php?c=expenses&a=copy&id=<?php echo $id; ?>">
                                    <?php _t("Maka a copy"); ?>
                                </a>
                            </li>
                            <?php
                            /*                            <li><a href="#">Another action</a></li>
                              <li><a href="#">Something else here</a></li>
                              <li role="separator" class="divider"></li>
                              <li><a href="#">Separated link</a></li> */
                            ?>
                        </ul>
                    </li>
                </ul>






            </ul>





        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
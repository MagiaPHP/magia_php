
<nav class="navbar navbar-default">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", 'expenses'); ?>
                <?php _t("Purchase invoices"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <?php include view("expenses", "form_search") ?>



            <ul class="nav navbar-nav">

                <?php if (modules_field_module('status', 'export')) { ?>
                    <ul class = "nav navbar-nav">
                        <?php if (permissions_has_permission($u_rol, "export", "read")) {
                            ?>
                            <li><a href="index.php?c=export&a=expenses"><?php _t("Export"); ?></a></li>
                        <?php } ?>
                    </ul>
                <?php } ?>




                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_form_expenses_pagination_items_limit" 
                            aria-expanded="false" 
                            aria-controls="collapse_form_expenses_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>



                <?php } ?>
            </ul>

            <?php
            /**
             *             <ul class="nav navbar-nav">
              <li><a href="index.php?c=expenses&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
              <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <?php echo _t("Export"); ?>
              <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <li><a href="index.php?c=expenses&a=export_json"><?php _t("Json"); ?></a></li>
              <li><a href="index.php?c=expenses&a=export_pdf"><?php _t("Pdf"); ?></a></li>
              <li><a href="index.php?c=expenses&a=export_csv"><?php _t("CSV"); ?></a></li>
              <li><a href="index.php?c=expenses&a=export_xml"><?php _t("XML"); ?></a></li>
              <li role="separator" class="divider"></li>
              <li><a href="#">Other</a></li>
              </ul>
              </li>
              </ul>
             */
            ?>



            <?php
            /**
             *             <div class="collapse navbar-collapse" id="expenses_add">

              <a href="index.php?c=expenses&a=add"
              class="btn btn-primary navbar-btn navbar-right"
              >
              <?php echo icon("plus"); ?>
              <?php _t("Add ne expense"); ?>
              </a>


              <?php if (permissions_has_permission($u_rol, "expensssssssssssssssssssssssses", "create")) { ?>
              <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#expensesModal">
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New expenses"); ?>
              </button>
              <div class="modal fade" id="expensesModal" tabindex="-1" role="dialog" aria-labelledby="expensesModalLabel">
              <div class="modal-dialog" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="expenses_addLabel">
              <?php _t("Add new expenses"); ?>
              </h4>
              </div>
              <div class="modal-body">
              <?php include view("expenses", "form_add"); ?>
              </div>
              </div>
              </div>
              </div>
              <?php } ?>
              </div>
             */
            ?>         




            <div class="btn-group btn-primary navbar-btn navbar-right" role="group">
                <button 
                    type="button" 
                    class="btn btn-primary dropdown-toggle" 
                    data-toggle="dropdown" 
                    aria-haspopup="true" 
                    aria-expanded="false">
                        <?php echo icon("plus"); ?>
                        <?php ?>
                        <?php _t("New expense"); ?>
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <a href="index.php?c=expenses&a=add">
                            <span class="glyphicon glyphicon-th-list"></span>
                            <?php _t("My providers"); ?>
                        </a>
                    </li>
                    <li>
                        <a href="index.php?c=expenses&a=add_provider">
                            <span class="glyphicon glyphicon-briefcase"></span>
                            <?php _t("New provider"); ?>
                        </a>
                    </li>

                    <?php
                    /**
                     * <li>
                      <a href="index.php?c=invoices&a=add_contact">
                      <span class="glyphicon glyphicon-user"></span>
                      <?php _t("New private customer"); ?>
                      </a>
                      </li>
                     */
                    ?>
                </ul>
            </div>


        </div>
    </div>
</nav>

<div class="collapse" id="collapse_form_expenses_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view("expenses", "form_pagination_items_limit");
        echo "<br>";
        echo "<h3>" . _tr("Columne to show") . "</h3>";
        include view("expenses", "form_show_col_from_table");
        ?>
    </div>
</div>





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
                <?php _menu_icon("top", 'investments'); ?>
                <?php _t("Investments"); ?>
            </a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>

            <?php include view("investments", "form_search") ?>

            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a 
                            data-toggle="collapse" 
                            href="#collapse_form_investments_pagination_items_limit" 
                            aria-expanded="false" 
                            aria-controls="collapse_form_investments_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>



                <?php } ?>
            </ul>

            <ul class="nav navbar-nav">
                <li><a href="index.php?c=investments&a=search_advanced"><?php _t("Search avanced"); ?></a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <?php echo _t("Export"); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="index.php?c=investments&a=export_json"><?php _t("Json"); ?></a></li>
                        <li><a href="index.php?c=investments&a=export_pdf"><?php _t("Pdf"); ?></a></li>
                        <li><a href="index.php?c=investments&a=export_csv"><?php _t("CSV"); ?></a></li>
                        <li><a href="index.php?c=investments&a=export_xml"><?php _t("XML"); ?></a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Other</a></li>
                    </ul>
                </li>
            </ul>



            <div class="collapse navbar-collapse" id="investments_add">
                <?php if (permissions_has_permission($u_rol, "investments", "create")) { ?>     

                    <button type="button" class="btn btn-primary navbar-btn navbar-right" data-toggle="modal" data-target="#investmentsModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New investments"); ?>
                    </button>

                    <div class="modal fade" id="investmentsModal" tabindex="-1" role="dialog" aria-labelledby="investmentsModalLabel">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title" id="investments_addLabel">
                                        <?php _t("Add new investments"); ?>                
                                    </h4>
                                </div>
                                <div class="modal-body">
                                    <?php include view("investments", "form_add"); ?>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php } ?>    
            </div>           
        </div>
    </div>
</nav>

<div class="collapse" id="collapse_form_investments_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view("investments", "form_pagination_items_limit");
        echo "<br>";
        echo "<h3>" . _tr("Columne to show") . "</h3>";
        include view("investments", "form_show_col_from_table");
        ?>
    </div>
</div>




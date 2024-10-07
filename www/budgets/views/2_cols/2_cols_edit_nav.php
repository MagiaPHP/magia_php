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
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Budget"); ?> : 

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

                <?php
                // Print
                print_icon_nav("index.php?c=budgets&a=export_pdf&id=$id", budgets_field_id('client_id', $id), (modules_field_module('status', 'audio')) ? _tr("Delivery note") : _tr("Preview"));

                if (modules_field_module('status', 'audio')) {
                    print_icon_nav("index.php?c=budgets&a=export_nde&valued=true&id=$id", budgets_field_id('client_id', $id), _tr('Valued'));
                    print_icon_nav("index.php?c=budgets&a=export_nde&&id=$id", budgets_field_id('client_id', $id), _tr('Not valued'));
                }


                if (_options_option("config_invoices_proforma")) {
                    print_icon_nav("index.php?c=budgets&a=export_proforma&id=$id", budgets_field_id('client_id', $id), _tr("Proforma invoice"));
                }
                ?>  

            </ul>


            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>

            <?php # SAVE ##########################################################      ?>
            <?php # SAVE ##########################################################  ?>
            <?php # SAVE ##########################################################     ?>
            <?php # SAVE ##########################################################  ?>

            <ul class="nav navbar-nav navbar-right">

            </ul>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button 
                type="button" 
                class="navbar-toggle collapsed" 
                data-toggle="collapse" 
                data-target="#menu_balance" 
                aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <?php _menu_icon("top", 'balance'); ?>
                <?php _t("Balance"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="menu_balance">
            <ul class="nav navbar-nav">

                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav2');
                    }
                    ?>
                </li>


            </ul>




            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="balance">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="all">
                <div class="form-group">
                    <input type="text" name="txt" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>
            </form>


            <?php
            // Obtiene todos los elementos del menú
            $menu_items = _menus_list_by_location_without_father('balance_nav');
            ?>

            <ul class="nav navbar-nav">
                <?php if (!empty($menu_items)): ?>
                    <?php foreach ($menu_items as $item): ?>
                        <?php if (_menus_can_show($item['controller'])): ?>
                            <li>
                                <?= _menus_dropdown_create_html('balance_nav', $item); ?>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                <?php else: ?>

                <?php endif; ?>
            </ul>







        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
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
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Credit notes"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




            <form class="form-inline navbar-form navbar-left ">
                <div class="form-group">
                    <label class="sr-only" for="exampleInputEmail3">Email address</label>
                    <select class="form-control" name="year">                                                                      
                        <?php
                        for ($i = 2021; $i < date('Y') + 1; $i++) {
                            // selecciono el año presente
                            $selected = ($i == date('Y')) ? " selected " : "";
                            echo '<option value="' . $i . '"  ' . $selected . '  >' . $i . '</option>';
                        }
                        ?>
                    </select>
                </div>

                <div class="form-group">
                    <label class="sr-only" for="exampleInputPassword3">Password</label>
                    <?php
                    $selected_1 = false;
                    $selected_2 = false;
                    $selected_3 = false;
                    $selected_4 = false;

                    switch (date("m")) {
                        case "01":
                        case "02":
                        case "03":
                            $selected_1 = " selected ";
                            break;

                        case "04":
                        case "05":
                        case "06":
                            $selected_2 = " selected ";
                            break;

                        case "07":
                        case "08":
                        case "09":
                            $selected_3 = " selected ";
                            break;

                        case "10":
                        case "11":
                        case "12":
                            $selected_4 = " selected ";
                            break;

                        default:
                            break;
                    }
                    ?>


                    <select class="form-control" name="m"> 

                        <?php
                        for ($i = 1; $i < 13; $i++) {
                            $selected = ($i == date('n')) ? " selected " : "";
                            ?> 
                            <option value="<?php echo $i; ?>"><?php echo _tr(magia_dates_month($i)); ?></option>
                        <?php } ?>

                        <option value="null" disabled=""><?php _t("By Trimester"); ?></option>

                        <option value="t1" <?php echo $selected_1 ?>>
                            <?php _t("January"); ?>, 
                            <?php _t("February"); ?>, 
                            <?php _t("March"); ?>
                        </option>
                        <option value="t2" <?php echo $selected_2 ?>>
                            <?php _t("April"); ?>, 
                            <?php _t("May"); ?>, 
                            <?php _t("June"); ?>
                        </option>
                        <option value="t3" <?php echo $selected_3 ?>>
                            <?php _t("July"); ?>, 
                            <?php _t("August"); ?>, 
                            <?php _t("September"); ?>
                        </option>
                        <option value="t4" <?php echo $selected_4 ?>>
                            <?php _t("October"); ?>, 
                            <?php _t("November"); ?>, 
                            <?php _t("December"); ?>
                        </option>
                    </select>
                </div>


                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Remember me
                    </label>
                </div>
                <button type="submit" class="btn btn-default">Sign in</button>
            </form>




            <form class="navbar-form navbar-right">

                <button type="submit" class="btn btn-default">Submit</button>
            </form>



            <?php
            // crea el menu personalizado 
            _menus_create_menu_items_by_controller_location($c, __FILE__);
            ?>





            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Link</a></li>
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
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
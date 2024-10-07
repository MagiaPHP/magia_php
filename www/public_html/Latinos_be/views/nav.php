
<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo $config_company_name; ?>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">



                <?php
                foreach (blog_menus_list_by_location('top') as $key => $menu_item) {
                    if (!blog_menus_list_sons_by_father($menu_item['id'])) {

                        $target = ($menu_item['target'] ) ? 'target="' . $menu_item['target'] . '" ' : " ";

                        echo '<li><a href="' . $menu_item['url'] . '" ' . $target . ' >' . $menu_item['label'] . '</a></li>';
                    } else {
                        ?>
                        <li class="dropdown">
                            <a href="#" 
                               class="dropdown-toggle" 
                               data-toggle="dropdown" 
                               role="button" 
                               aria-haspopup="true" 
                               aria-expanded="false">
                                   <?php echo $menu_item['label']; ?> 
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">

                                <?php
                                foreach (blog_menus_list_sons_by_father($menu_item['id']) as $key => $sons_items) {

                                    $target = ($sons_items['target'] ) ? 'target="' . $sons_items['target'] . '" ' : " ";

                                    echo '<li><a href="' . $sons_items['url'] . '" ' . $target . ' >' . $sons_items['label'] . '</a></li>';
                                }
                                ?>
                            </ul>

                        </li>
                        <?php
                    }
                }
                ?>

                <?php
                /*   <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>

                  <ul class="dropdown-menu">
                  <li><a href="#">Action</a></li>
                  <li><a href="#">Another action</a></li>
                  <li><a href="#">Something else here</a></li>
                  <li role="separator" class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                  </ul>

                  </li> */
                ?>



            </ul>

            <form class="navbar-form navbar-right" method="post" action="index.php">

                <input type="hidden" name="c" value="users">
                <input type="hidden" name="a" value="identification">  


                <div class="form-group">
                    <input type="text" name="login" placeholder="Email" class="form-control">
                </div>

                <div class="form-group">
                    <input type="password" name="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>




        </div>
    </div>
</nav>
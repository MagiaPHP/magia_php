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
            <a class="navbar-brand" href="index.php?c=help">                
                <?php _menu_icon("top", "help"); ?>
                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Help"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Link</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                    </ul>
                </li>
            </ul>


            <form action="index.php"  method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="contacts">
                <input type="hidden" name="a" value="search">
                <input type="hidden" name="w" value="null">

                <div class="form-group">
                    <input name="txt" type="text" class="form-control" placeholder="Search">
                </div>
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



<?php
/* <nav class="navbar navbar-default">
  <div class="container-fluid">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
  <span class="sr-only">Toggle navigation</span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  <span class="icon-bar"></span>
  </button>
  <a class="navbar-brand" href="#">Brand</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
  <ul class="nav navbar-nav">
  <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
  <li><a href="#">Link</a></li>
  <li class="dropdown">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
  <?php _t("Action"); ?>
  <span class="caret"></span></a>
  <ul class="dropdown-menu">
  <li><a href="#">Archivar</a></li>
  <li><a href="#"><?php _t("Delete"); ?></a></li>
  <li><a href="#"><?php _t("Cloner"); ?></a></li>
  <li><a href="#"><?php _t("Give access to portal"); ?></a></li>
  <li><a href="#"><?php _t("Send email"); ?></a></li>
  <li><a href="#"><?php _t("Duplicar"); ?></a></li>
  <li><a href="#">Something else here</a></li>
  <li role="separator" class="divider"></li>
  <li><a href="#">Separated link</a></li>
  <li role="separator" class="divider"></li>
  <li><a href="#">One more separated link</a></li>
  </ul>
  </li>
  </ul>




  <form class="navbar-form navbar-left" action="index.php" method="get">
  <input type="hidden" name="c" value="contacts">
  <input type="hidden" name="a" value="search">

  <div class="form-group">
  <label class="sr-only" for="txt">Client</label>
  <input class="form-control" type="text" name="txt" id="txt" placeholder="Name">
  </div>

  <button type="submit" class="btn btn-default"><?php _t("Search contact"); ?></button>

  </form>





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
  </nav> */
?>
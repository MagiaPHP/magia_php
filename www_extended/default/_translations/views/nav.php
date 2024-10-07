
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
            <a class="navbar-brand" href="index.php?c=_translations">
                <?php _t("Translations"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a 
                        href="#" 
                        class="dropdown-toggle" 
                        data-toggle="dropdown" 
                        role="button" 
                        aria-haspopup="true" 
                        aria-expanded="false">
                            <?php _t("Context"); ?> 
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">

                        <?php
                        foreach (_content_list_context() as $key => $clc) {
                            echo '<li><a href="#">' . $clc["contexto"] . '</a></li>';
                        }
                        ?>
                    </ul>
                </li>


            </ul>



            <ul class="nav navbar-nav">
                <li><a href="index.php?c=_translations&a=search&w=porcentajes">%xxx%</a></li>
                <li><a href="index.php?c=_translations"><?php _t("Text without translations"); ?></a></li>


                <?php
                /**
                 *  <li class="dropdown">
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
                 */
                ?>
            </ul>



            <form class="navbar-form navbar-left" action="index.php" method="get">
                <input type="hidden" name="c" value="_translations">
                <input type="hidden" name="a" value="search">

                <div class="form-group">
                    <input 
                        type="text" 
                        class="form-control" 
                        placeholder="Search content" 
                        name="txt" 
                        required="" 
                        value="<?php
                        echo (isset($txt)) ? $txt : null;
                        ?>">
                </div>
                <label class="radio-inline">
                    <input type="radio" name="w" id="w" value="c" <?php echo (isset($w) && $w == 'c' ) ? " checked " : ""; ?> required=""> <?php _t("Content"); ?>
                </label>

                <label class="radio-inline">
                    <input type="radio" name="w" id="w" value="t" <?php echo (isset($w) && $w == 't' ) ? " checked " : ""; ?> > <?php _t("Translation"); ?>
                </label>



                <?php
                /**
                 *                 <div class="form-group">
                  <select class="form-control" name="l" id="language" >
                  <?php
                  foreach (_languages_list() as $key => $value) {

                  $selected = ( $value['language'] == users_field_contact_id("language", $u_id) ) ? " selected " : "";

                  echo '<option value="' . $value['language'] . '" ' . $selected . '>' . _tr($value['name']) . '</option>';
                  //echo '<option value="' . $value['language'] . '">' . _tr($value['name']) . '</option>';
                  }
                  ?>


                  </select>
                  </div>
                 */
                ?>
                <button type="submit" class="btn btn-default">
                    <?php _t("Search"); ?>
                </button>
            </form>




            <?php
            /**
             * 

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

             */
            ?>

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


<?php
//vardump(_content_list_context());
?>
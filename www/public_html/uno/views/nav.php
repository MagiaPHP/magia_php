<nav class="navbar navbar-inverse navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Factuz</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">
                <?php echo $mc->getName(); ?>
            </a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="index.php">
                        <?php _t("Blog"); ?>
                    </a>
                </li>

                <?php
                /**
                 * 
                 *                 <li><a href="index.php?c=sol">Shop</a></li>



                 * <li><a href="#">Contact</a></li>

                  <li class="dropdown">
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
                  </li>

                 * 
                 */
                ?>

            </ul>

            <?php if (is_logued()) { ?>
                <form class="navbar-form navbar-right" method="get" action="index.php">
                    <input type="hidden" name="c" value="home">
                    <input type="hidden" name="a" value="logout">                
                    <button type="submit" class="btn btn-success"><?php _t("Logout"); ?></button>
                </form>

            <?php } else { ?>
                <form class="navbar-form navbar-right" method="post" action="index.php">
                    <input type="hidden" name="c" value="users">
                    <input type="hidden" name="a" value="identification">  
                    <div class="form-group">
                        <input type="text" name="login" placeholder="Email" class="form-control">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Password" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-success"><?php _t("Sign in"); ?></button>
                </form>

            <?php }
            ?>




        </div>
    </div>
</nav>
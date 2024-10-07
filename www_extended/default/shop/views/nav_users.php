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
                <span class="fa fa-user-circle"></span>
                <?php _t("Users"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

            </ul>


            <?php
            /*            <form action="index.php" method="" class="navbar-form navbar-left">
              <input type="hidden" name="c" value="shop">
              <input type="hidden" name="a" value="offices_search">
              <input type="hidden" name="formId" value="nav">



              <div class="form-group">
              <input name="txt" type="search" class="form-control" placeholder="<?php _t("Search") ; ?>" autofocus>
              </div>


              <button type="submit" class="btn btn-default"><?php _t("Search") ; ?></button>


              </form> */
            ?>




            <form class="navbar-form navbar-right" action="" method="get">

                <?php if (permissions_has_permission($u_rol, "shop_users", "create")) { ?>    

                    <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
                        <span class="glyphicon glyphicon-plus-sign"></span>
                        <?php _t("New user"); ?>
                    </button>
                <?php } ?>                    
            </form>



        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php _t("Add new user"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_user_new.php"; ?>
            </div>

        </div>
    </div>
</div>
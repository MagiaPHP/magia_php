<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">30</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <span class="glyphicon glyphicon-file"></span>
                <?php _t("Orders List"); ?>
            </a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">




            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="orders_search">


                <div class="form-group">
                    <input 
                        type="text" 
                        name="txt" 
                        class="form-control" 
                        placeholder="<?php _t("By: id, ref, name, lastname"); ?>" 
                        value="" 
                        autofocus
                        required=""
                        >
                </div>

                <?php /* <div class="form-group">

                  <select class="form-control" name="w" id="w">

                  <option value="all"><?php _t("All");?></option>
                  <option value="by_ref" selected=""><?php _t("My ref");?></option>
                  <option value="by_id"><?php _t("Id");?></option>
                  <option value="by_registre_date"><?php _t("Registre date");?></option>
                  <option value="by_name"><?php _t("Name");?></option>
                  <option value="by_lastname"><?php _t("Lastname");?></option>
                  <option value="by_remake"><?php _t("Remake from");?></option>
                  <option value="by_bac"><?php _t("Bac");?></option>
                  <option value="by_delivery_date"><?php _t("Shipping date");?></option>
                  <option value="by_discount"><?php _t("Discount");?></option>
                  <option value="by_status"><?php _t("Status");?></option>

                  </select>
                  </div>
                 */ ?>


                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    <?php _t("Search"); ?>
                </button>



            </form>

            <?php /* <ul class="nav navbar-nav navbar-left">
              <li><a href="index.php?c=shop&a=search_avanced"><?php _t("Advanced"); ?></a></li>
              </ul> */ ?>


            <?php /*            <form class="navbar-form navbar-right" action="index.php" method="get">
              <input type="hidden" name="c" value="shop">
              <input type="hidden" name="a" value="order_choose_contact">

              <button type="submit" class="btn btn-primary">
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New order") ; ?>
              </button>
              </form> */ ?>

            <?php if (!offices_is_headoffice(contacts_work_at($u_id))) { ?> 

            <?php } ?>




        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
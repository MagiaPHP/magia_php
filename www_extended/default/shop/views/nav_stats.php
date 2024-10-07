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
                <span class="glyphicon glyphicon-stats"></span>
                <?php _t("Stats"); ?>
            </a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">





            </ul>


            <form action="index.php" method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="shop">
                <input type="hidden" name="a" value="stats">




                <div class="form-group">

                    <select class="form-control" name="office_id" id="office_id">
                        <?php
                        foreach (offices_list_by_headoffice($u_owner_id) as $key => $value) {

                            $selected = ($value['id'] == $office_id ) ? " selected " : "";

                            echo '<option value="' . $value['id'] . '" ' . $selected . '>' . contacts_formated($value['id']) . '</option>';
                        }
                        ?>
                    </select>                    
                </div>





                <div class="form-group">

                    <select class="form-control" name="year" id="year">

                        <?php
                        for ($i = 2020; $i <= 2025; $i++) {

                            $selected = ($i == $year || $i == date("Y") ) ? " selected " : "";

                            echo '<option value="' . $i . '" ' . $selected . '>' . $i . '</option>';
                        }
                        ?>
                    </select>                    
                </div>


                <div class="form-group">

                    <select class="form-control" name="month" id="month">

                        <?php
                        for ($i = 1; $i <= 12; $i++) {

                            if ($month) {
                                $selected = ($i == $month ) ? " selected " : "";
                            } else {
                                $selected = ( $i == date("m") ) ? " selected " : "";
                            }

                            echo '<option value="' . $i . '" ' . $selected . '>' . _tr(magia_dates_month($i)) . '</option>';
                        }
                        ?>
                    </select>                    
                </div>






                <?php /*
                  <div class="form-group">
                  <select name="txt"  class="selectpicker" data-live-search="true">
                  <?php
                  foreach (shop_labo_patients_list() as $key => $patients_list) {
                  echo "<option value=\"$patients_list[contact_id]\">$patients_list[contact_id] ". contacts_formated($patients_list[contact_id])."</option>";
                  }
                  ?>
                  </select>
                  </div>
                 * 
                 * 
                 * */ ?>
                <button type="submit" class="btn btn-default"><?php _t("Search"); ?></button>


            </form>


            <?php
            /*            <form class="navbar-form navbar-right" action="" method="get">


              <!-- Button trigger modal -->
              <button type="button" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New contact"); ?>
              </button>

              </form> */
            ?>



        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>




<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"><?php _t("Add new contact"); ?></h4>
            </div>
            <div class="modal-body">
                <?php include "form_contacts_new.php"; ?>
            </div>

        </div>
    </div>
</div>
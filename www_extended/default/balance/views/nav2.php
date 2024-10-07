<nav class="navbar navbar-default">
    <div class="container-fluid">        
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

            <a class="navbar-brand" href="index.php?c=balance">                

                <?php _menu_icon("top", "balance"); ?>                

                <?php echo ( _options_option('config_menus_debug') ) ? _menus_get_file_name(__FILE__) : _t("Balance"); ?>
            </a>
        </div>


        <div class="collapse navbar-collapse" id="menu_balance">

            <ul class="nav navbar-nav">

                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_details');
                    }
                    ?>
                </li>

            </ul>


            <?php
            /**
             *             <ul class="nav navbar-nav">               
              <li>
              <a href="index.php?&c=balance&a=export_pdf" target="top">
              <span class="glyphicon glyphicon-print"></span>
              <?php _t("Print"); ?>
              </a>
              </li>
              </ul>
             */
            ?>

            <form action="index.php"  method="get" class="navbar-form navbar-left">
                <input type="hidden" name="c" value="balance">
                <input type="hidden" name="a" value="search">

                <?php
                /**
                 *                 <div class="form-group">
                  <select class="form-control" name="year">
                  <?php
                  for ($y = 2021; $y <= date('Y'); $y++) {
                  $selected = ($y == date('Y')) ? " selected " : "";
                  echo '<option value="2021" ' . $selected . '>' . $y . '</option>';
                  }
                  ?>
                  </select>
                  </div>


                  <div class="form-group">


                  <div class="col-sm-10">
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
                  <option value="<?php echo $i; ?>"   <?php // echo $selected;        ?>   ><?php echo _tr(magia_dates_month($i)); ?></option>
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
                  </div>



                 */
                ?>

                <div class="form-group">
                    <input 
                        autofocus=""
                        name="txt" 
                        type="text" 
                        class="form-control" 
                        placeholder="" 
                        value="<?php echo (isset($txt)) ? $txt : ""; ?>"
                        >
                </div>



                <div class="form-group">
                    <select class="form-control" name="w">
                        <option value="all"><?php _t("All"); ?></option>
                        <?php
//                        $balance_fields = array(
//                            "id" => 'id',
//                            "client_id" => 'client_id',
//                            "expense_id" => 'Expense id',
//                            "invoice_id" => 'Invoice id',
//                            "credit_note_id" => 'Credit note id',
//                            "type" => 'Type',
//                            "account_number" => 'Account number',
//                            "sub_total" => 'Sub total',
//                            "tax" => 'Tax',
//                            "total" => 'Total',
//                            "ref" => "Reference",
//                            "description" => "Description",
//                            "ce" => "ce",
//                            "date" => "Date",
//                            "date_registre" => "Date registre",
//                            "canceled_code" => "Canceled code"
//                        );
//                        foreach ($balance_fields as $balance_key => $balance_field) {
//
//                            $selected = ($y == date('Y')) ? " selected " : "";
//
//                            echo '<option value="' . $balance_key . '" ' . $selected . '>' . _tr($balance_field) . '</option>';
//                        }
                        ?>
                    </select>
                </div>







                <?php
                /*
                  <div class="form-group">
                  <select class="form-control" name="owner_id">
                  <option value="all"><?php echo _t("All");  ?></option>

                  <?php foreach (contacts_list_by_type(1) as $key => $value) {
                  echo '<option value="all">'.$value['name'].'</option>';
                  }?>


                  </select>
                  </div> */
                ?>



                <button type="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span> 
                    <?php _t("Search"); ?>
                </button>

                <?php
                /* <a 
                  class="btn btn-default btn-sm"
                  role="button"
                  data-toggle="collapse"
                  href="#collapseExample"
                  aria-expanded="false"
                  aria-controls="collapseExample">
                  +
                  </a>
                 */
                ?>





            </form>


            <?php if (modules_field_module('status', 'exporrrrrrrrrrrrrrrrrrt')) { ?>
                <ul class="nav navbar-nav">
                    <?php if (permissions_has_permission($u_rol, "export", "read")) { ?>
                        <li><a href="index.php?c=export&a=balance"><?php _t("Export"); ?></a></li>
                    <?php } ?>
                </ul>
            <?php } ?>





            <ul class="nav navbar-nav">
                <?php if (permissions_has_permission($u_rol, "config", "update")) { ?>
                    <li>
                        <a
                            data-toggle="collapse"
                            href="#collapse_form_balance_pagination_items_limit"
                            aria-expanded="false"
                            aria-controls="collapse_form_balance_pagination_items_limit">
                            <span class="glyphicon glyphicon-cog"></span>
                        </a>
                    </li>
                <?php } ?>


            </ul>




            <?php
            /*

              <ul class="nav navbar-nav navbar-right">
              <li><a href="index.php?c=contacts&a=help"><?php _t("Help"); ?></a></li>


              </ul>
             */
            ?>


            <ul class="nav navbar-nav">

                <li>
                    <?php
                    if (modules_field_module('status', "docu")) {
                        echo docu_modal_bloc($c, $a, 'nav_details');
                    }
                    ?>
                </li>

            </ul>





            <?php
            /**
             *             <ul>
              <?php if (permissions_has_permission($u_rol, "balance", "create")) { ?>
              <li>
              <button
              type="button"
              class="btn btn-primary navbar-btn navbar-right"
              data-toggle="modal" data-target="#balance_add"
              >
              <span class="glyphicon glyphicon-plus-sign"></span>
              <?php _t("New"); ?>
              </button>

              </li>
              <div class="modal fade" id="balance_add" tabindex="-1" role="dialog" aria-labelledby="balance_addLabel">
              <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
              <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              </button>

              <h4 class="modal-title" id="balance_addLabel">
              <?php _t("Balance add new registre"); ?>
              </h4>

              </div>

              <div class="modal-body">

              <h3><?php _t("Record a payment from a client"); ?></h3>

              <?php _t("Examples of situations for which you can use this form"); ?>


              <ul>
              <li>
              <?php _t("If you want to make a collection record of a customer but do not want to relate it to an invoice or other document, you can do it here"); ?>

              </li>
              <li>
              <?php _t("If a client makes a payment without structured communication and you do not know which invoice this charge will affect"); ?>
              </li>
              </ul>


              <?php include "form_add.php"; ?>

              </div>

              </div>
              </div>
              </div>
              <?php } ?>
              </ul>
             */
            ?>








        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>






<div class="collapse" id="collapseExample">
    <?php // include "part_search_advanced.php"; ?>
</div>


<?php
/**
 *             
 */
?>
<div class="collapse" id="collapse_form_balance_pagination_items_limit">
    <div class="well">
        <?php
        $redi = 1;
        include view('config', 'form_balance_pagination_items_limit');
        ?>
    </div>
</div>







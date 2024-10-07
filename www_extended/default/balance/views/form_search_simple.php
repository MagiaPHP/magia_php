
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
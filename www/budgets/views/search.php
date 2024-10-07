<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-lg-2">
        <?php include "izq.php"; ?>
    </div>

    <div class="col-lg-10">
        <?php include view("budgets", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        /**        <h3>
          <?php _t("Search"); ?>:
          <?php echo ($client_id == "all")? " All ": contacts_formated($client_id); ?>,
          <?php _t("Status"); ?>:
          <?php echo ($status == "all")? " All ": budget_status_by_status($status); ?>
          <?php _t("year"); ?>:
          <?php echo ($year)? " $year ": ""; ?>
          <?php _t("month"); ?>:
          <?php echo ($month)? magia_dates_month($month): ""; ?>


          </h3> */
        ?>


        <?php include "table_index.php"; ?>
        <?php
        /* <p>
          <h5><?php _t("Search"); ?>: </h5>

          <b><?php _t("Office"); ?>:</b> <?php echo contacts_formated($client_id); ?>
          <b><?php _t("Status"); ?>:</b> <?php echo budget_status_by_status($status); ?>
          <b><?php _t("Year"); ?>:</b> <?php echo ($year); ?>
          <b><?php _t("Month"); ?>:</b> <?php echo ($month); ?>
          <b><?php _t("Unbilled only"); ?>:</b> <?php echo ($unbilled)? _t("Yes"):_t("No");; ?>


          </p>


          <script>
          function sellectAll(source) {
          var checkboxes = document.querySelectorAll('input[type="checkbox"]');
          for (var i = 0; i < checkboxes.length; i++) {
          if (checkboxes[i] != source)
          checkboxes[i].checked = source.checked;
          }
          }
          </script>






          <form method="post" action="index.php" class="form-inline">

          <input type="hidden" name="c" value="budgets">
          <input type="hidden" name="a" value="invoice_create">

          <?php  //include "table_index.php" ; ?>

          <?php
          if ( $status == 30 ) {
          // echo "Solo aca" ;
          }
          ?>

          <div class="form-group">
          <label class="sr-only" for="all"></label>
          <input
          type="checkbox"
          id="all"
          onclick="sellectAll(this);" />
          <?php _t("Select all") ; ?>
          </div>



          <div class="form-group">
          <label class="sr-only" for="action"></label>
          <select class="form-control" name="action">

          <option value=""><?php _t("Create invoice") ; ?></option>

          </select>
          </div>

          <button type="submit" class="btn btn-default"><?php _t("Check") ; ?></button>

          </form> */
        ?>     

        <?php //include "form_search.php"; ?>

    </div>
</div>

<?php include view("home", "footer"); ?> 





<?php include view("home", "header"); ?>  

<div class="row">
    <div class="col-sm-12 col-md-2 col-lg-2">
        <?php // include view("banks_lines_check", "izq"); ?>
    </div>

    <div class="col-sm-12 col-md-12 col-lg-12">
        <?php include view("banks_lines_check", "nav"); ?>


        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include view("banks_lines_check", "top"); ?>



        <form class="form-inline" method="get" action="index.php">
            <input type="hidden" name="c" value="banks_lines_check">
            <input type="hidden" name="a" value="index">

            <div class="form-group">
                <label class="sr-only" for="account_number"><?php _t("Account number"); ?></label>
                <select class="form-control" name="account_number">
                    <option value="null"><?php _t("Select one"); ?></option>
                    <?php
                    foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {
                        $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";
                        echo '<option value="' . $blbci['account_number'] . '"  ' . $selected . '>' . $blbci['bank'] . ' -  ' . $blbci['account_number'] . '  </option>';
                    }
                    ?>
                </select>
            </div>

            <button type="submit" class="btn btn-default">
                <?php echo icon('refresh'); ?>
                <?php _t("Changer bank"); ?>
            </button>
        </form>



        <br>


        <form class="form-inline" method="post" action="index.php">
            <input type="hidden" name="c" value="banks_lines_check">
            <input type="hidden" name="a" value="ok_delete_all_lines">
            <input type="hidden" name="redi[redi]" value="1">

            <button type="submit" class="btn btn-danger">
                <?php echo icon('remove'); ?>
                <?php _t("Delete all lines"); ?>
            </button>
        </form>





        <br>

        <?php
        /**
         * 
          <form class="form-inline" method="get" action="index.php">
          <input type="hidden" name="c" value="banks_lines_check">
          <input type="hidden" name="a" value="index">

          <div class="form-group">
          <label class="sr-only" for="account_number"><?php _t("Account number"); ?></label>
          <select class="form-control" name="account_number">
          <option value="null"><?php _t("Select one"); ?></option>
          <?php
          foreach (banks_list_by_contact_id($u_owner_id) as $key => $blbci) {
          $selected = ($blbci['account_number'] == $account_number ) ? " selected " : "";
          echo '<option value="' . $blbci['account_number'] . '"  ' . $selected . '>' . $blbci['bank'] . ' -  ' . $blbci['account_number'] . '  </option>';
          }
          ?>
          </select>
          </div>

          <button type="submit" class="btn btn-default">
          <?php echo icon('refresh'); ?>
          <?php _t("Changer bank"); ?>
          </button>
          </form>

         */
        ?>


        <?php // include "form_changer_date_format.php"; ?>

        <br>

        <a href="index.php?c=banks_lines">banks_lines</a>



        <?php
        if ($banks_lines_check) {
            include "table_index.php";
        } else {
            message("info", "No items");
        }
        ?>




        <div class="container-fluid">
            <div class="col-sm-12 col-md-6 col-lg-6">
                <?php
                $pagination->createHtml();
                ?>
            </div>

            <div class="col-sm-12 col-md-6 col-lg-6 text-right">
                <?php
                include view($c, "form_pagination_items_limit");
                ?>
            </div>
        </div>
    </div>
</div>

<?php include view("home", "footer"); ?> 

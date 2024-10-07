<form action="index.php" method="get" class="navbar-form navbar-left">
    <input type="hidden" name="c" value="banks_lines">
    <input type="hidden" name="a" value="search">

    <div class="form-group">
        <input 
            type="text" 
            name="txt" 
            class="form-control" 
            placeholder=""
            value="<?php echo (isset($txt)) ? "$txt" : ""; ?>"
            >
    </div>


    <?php
    /**
     *     <div class="form-group">
      <select class="form-control" name="w">
      <option value="all"><?php _t("All"); ?></option>
      <?php
      foreach (banks_lines_db_col_list_from_table($c) as $key => $bldbcollft) {

      $selected_where = (isset($w) && $w == "by_" . $bldbcollft) ? " selected " : "";

      echo '<option value="by_' . $bldbcollft . '"  ' . $selected_where . '>' . $bldbcollft . '</option>';
      }
      ?>
      </select>
      </div>
     */
    ?>

    <button type="submit" class="btn btn-default">
        <?php echo icon("search"); ?> 
        <?php _t("Search"); ?>
    </button>

</form>
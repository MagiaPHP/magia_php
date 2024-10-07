
<form class="form-inline" method="get" action="index.php">

    <input type="hidden" name="c" value="holidays">
    <input type="hidden" name="a" value="search">        
    <input type="hidden" name="w" value="by_year">        


    <?php
    /**
     *     <div class="form-group">
      <label class="sr-only" for="month"></label>
      <select class="form-control" name="month">
      <?php
      for ($m = 1; $m < 13; $m++) {
      $month_selected = ($m == $month) ? " selected " : "";
      echo '<option value="' . $m . '" ' . $month_selected . '>' . magia_dates_month($m) . '</option>';
      }
      ?>
      </select>
      </div>
     */
    ?>



    <div class="form-group">
        <label class="sr-only" for="year"></label>
        <select class="form-control" name="year">
            <?php
            for ($y = 2020; $y < date('Y') + 10; $y++) {
                $year_selected = ($y == $year) ? " selected " : "";
                echo '<option value="' . $y . '" ' . $year_selected . '>' . $y . '</option>';
            }
            ?>
        </select>
    </div>

    <button type="submit" class="btn btn-default">
        <?php echo icon("refresh"); ?> 
        <?php _t("Change"); ?>
    </button>
</form>

<br>


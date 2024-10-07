


<form action="index.php" method="post" class="form-inline">
    <input type="hidden" name="c" value="invoices"> 
    <input type="hidden" name="a" value="ok_date_expiration_update"> 
    <input type="hidden" name="invoice_id" value="<?php echo "$id"; ?>"> 
    <input type="hidden" name="redi" value="1"> 

    <?php # date    ?>

    <?php
    /**
     * <script>
      $(function () {
      $("#date_expiration").datepicker({
      // minDate: +0,
      // maxDate: "+12M +0D",
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true,


      });
      });
      </script>
     */
    ?>

    <div class="form-group">

        <input 
            type="date"  
            name="date_expiration" 
            class="form-control" 
            id="date_expiration" 
            placeholder="<?php _t("Expiration date"); ?>"
            value="<?php echo $invoices['date_expiration']; ?>"
            required=""
            >

    </div>
    <?php # /date    ?>

    <button type="submit" class="btn btn-primary"><?php _t("Change"); ?></button>

</form>




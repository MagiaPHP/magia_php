<form class="form-horizontal" action="index.php" method="post">

    <input type="hidden" name="c" value="budgets">
    <input type="hidden" name="a" value="ok_change_status">
    <input type="hidden" name="id" value="<?php echo $id; ?>"> 
    <input type="hidden" name="status" value="30">
    <input type="hidden" name="redi" value="1">


    <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">

            <?php
            /*
              <div class="radio">
              <label>
              <input type="radio" name="createInvoice" id="createInvoice" value="1">
              <?php _t("YES,  now") ; ?>
              </label>
              </div>
              <div class="radio">
              <label>
              <input type="radio" name="createInvoice" id="createInvoice" value="0" checked="">
              <?php _t('NO, the invoice will be created later') ; ?>
              </label>
              </div>
             */
            ?>




        </div>
    </div>




    <button type="submit" class="btn btn-primary"><?php _t("Accepted"); ?></button>

</form>


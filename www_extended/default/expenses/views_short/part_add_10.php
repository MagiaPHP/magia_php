<div class="panel panel-default">
    <div class="panel-body">

        <h3><?php _t("Invoice Number"); ?></h3>


        <form class="form-inline" action="index.php" method="post" >
            <input type="hidden" name="c" value="expenses">
            <input type="hidden" name="a" value="ok_add_40">
            <input type="hidden" name="redi" value="2">


            <div class="form-group">
                <label class="sr-only" for="invoice_number"><?php echo _t("Invoice number"); ?></label>
                <input 
                    type="text" 
                    class="form-control" 
                    id="invoice_number" 
                    placeholder=""
                    value="<?php echo $expense->GetInvoice_number(); ?>"
                    >
            </div>




            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("repeat"); ?>
            </button>



        </form>



    </div>
</div>



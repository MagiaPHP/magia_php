
<a name="30"></a>

<h2><?php _t("Invoice Totals"); ?></h2>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_30">
    <input type="hidden" name="redi" value="1">



    <?php # total ?>
    <div class="form-group">

        <label for="total" class="col-sm-2 control-label"><?php _t("Total"); ?></label>



        <div class="col-sm-8">
            <input 
                type="number" 
                min="00.01"
                step="any"
                name="total" 
                class="form-control" 
                id="total" 
                placeholder="<?php _t("Total"); ?>" 
                value="" 
                autofocus=""
                autocomplete="false"
                >
        </div>	
    </div>
    <?php # /total ?>

    <?php # tax ?>
    <div class="form-group">

        <label for="tva" class="col-sm-2 control-label"><?php _t("Tva"); ?></label>


        <div class="col-sm-8">
            <input 
                type="number" 
                name="tax" 
                class="form-control" 
                id="tax" 
                placeholder="<?php _t("Tva"); ?>" 
                value="" 
                min="0.00"
                step="any"
                autocomplete="false"
                >
        </div>	
    </div>
    <?php # /tax ?>


    <div class="form-group">
        <label for="tva" class="col-sm-2 control-label">
        </label>
        <div class="col-sm-8">    


            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>


        </div>      							
    </div>      							

</form>

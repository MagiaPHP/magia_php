<a name="15"></a>


Cual es la fecha max de pago de esta factura?

<h2><?php _t("Invoice deadline"); ?></h2>
<p>
    <?php _t('Fecha limite d pago'); ?>
</p>



<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_15">
    <input type="hidden" name="redi" value="1">



    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date" 
                name="deadline" 
                class="form-control" 
                id="deadline" 
                placeholder="deadline" 
                value=""
                autofocus=""
                >
        </div>	
    </div>
    <?php # /total ?>



    <div class="form-group">
        <label class="control-label col-sm-2" for=""></label>
        <div class="col-sm-8">    

            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>

        </div>      							
    </div>      							

</form>

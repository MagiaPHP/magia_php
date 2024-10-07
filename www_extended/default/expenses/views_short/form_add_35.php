
<a name="35"></a>



<h2><?php _t("Invoice Date"); ?></h2>
<p>
    <?php _t('Invoice issue date printed on the document'); ?>
</p>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_35">
    <input type="hidden" name="redi" value="1">



    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Invoice date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date" 
                name="date" 
                class="form-control" 
                id="date" 
                placeholder="date" 
                value="" 
                autofocus=""
                >
        </div>	
    </div>
    <?php # /total ?>



    <div class="form-group">
        <label class="control-label col-sm-3" for=""></label>
        <div class="col-sm-8">    



            <button type="submit" class="btn btn-default">
                <?php _t("Next"); ?>
                <?php echo icon("chevron-right"); ?>
            </button>


        </div>      							
    </div>      							

</form>

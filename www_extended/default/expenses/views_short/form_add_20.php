<a name="20"></a>

<h2><?php _t("Invoice title"); ?></h2>
<p>
    <?php _t("Give this invoice a title or a short description to remember it better in the future"); ?>
</p>

<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_20">
    <input type="hidden" name="redi" value="1">



    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="title"><?php _t("Invoice title"); ?></label>
        <div class="col-sm-8">
            <input type="text" 
                   name="title" 
                   class="form-control" 
                   id="title" 
                   placeholder="<?php _t("A short description"); ?>" 
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

<a name="40"></a>


<h2><?php _t("Du date"); ?></h2>


<form class="form-horizontal" action="index.php" method="post" >
    <input type="hidden" name="c" value="expenses">
    <input type="hidden" name="a" value="ok_add_40">
    <input type="hidden" name="redi" value="1">



    <?php # total ?>
    <div class="form-group">
        <label class="control-label col-sm-3" for="date"><?php _t("Due date"); ?></label>
        <div class="col-sm-8">
            <input 
                type="date" 
                name="deadline" 
                class="form-control" 
                id="deadline" 
                placeholder="date" 
                value="<?php echo $expense->getDate(); ?>" 
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


<form class="form-inline" method="post">
    <input type="hidden" name="c" value="credit_notes">
    <input type="hidden" name="a" value="ok_date_update">
    <input type="hidden" name="id" value="<?php echo $cn->getId(); ?>">
    <input type="hidden" name="redi" value="1">


    <?php /* https://jqueryui.com/datepicker/#dropdown-month-year */ ?>


    <div class="form-group">
        <label 
            class="sr-only" 
            for="date">
                <?php _t("Date"); ?>
        </label>
        <input 
            type="date" 
            class="form-control" 
            id="date"
            name="date"
            placeholder=""
            value="<?php echo $cn->getDate(); ?>"
            required=""

            >
    </div>

    <button 
        type="submit" 
        class="btn btn-primary">
            <?php _t("Change"); ?>
    </button>
</form>
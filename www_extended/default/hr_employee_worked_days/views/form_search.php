
<form class="navbar-form navbar-left" method="get" action="index.php">

    <input type="hidden" name="c" value="hr_employee_worked_days">
    <input type="hidden" name="a" value="search">
    <input type="hidden" name="w" value="by_period">

    <div class="form-group">
        <input type="date" class="form-control" name="date_start" id="date_start" placeholder=""

               >
    </div>

    <div class="form-group">
        <input type="date" class="form-control" name="date_end" id="date_end" placeholder=""

               >
    </div>

    <button type="submit" class="btn btn-default"

            >
                <?php echo icon("search"); ?> 
                <?php _t("Search"); ?>
    </button>
</form>
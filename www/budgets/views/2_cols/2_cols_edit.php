<?php
include view("home", "header");
?> 

<?php include "2_cols_edit_nav.php"; ?>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">

        <?php include "2_cols_part_edit.php"; ?>

    </div>
    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">

        <a name="items_add"></a>

        <?php include "2_cols_part_form_items_add.php"; ?>

    </div>

</div>    


<br>

<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 text-center">
        <form>
            <input type="hidden" name="c" value="budgets"> 
            <input type="hidden" name="a" value="details"> 
            <input type="hidden" name="id" value="<?php echo "$id"; ?>"> 
            <div class="form-group">
            </div>
            <button type="submit" class="btn btn-danger">
                <span class="glyphicon glyphicon-floppy-disk"></span> 
                <?php _t("Save"); ?>
            </button>
        </form>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2"></div>
</div>

<?php
/*


  <form action="index.php" method="get" class="form-horizontal">
  <input type="hidden" name="c" value="budgets">
  <input type="hidden" name="a" value="details">
  <input type="hidden" name="id" value="<?php echo "$id"; ?>">

  <div class="form-group">
  <div class="col-sm-offset-2 col-sm-10">
  <button type="submit" class="btn btn-default"><?php _t("End"); ?></button>
  </div>
  </div>
  </form>

 */
?>



<?php // include("www/home/views/footer.php");          ?>  

<?php
/**
 * 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


 */
?>


<?php include view("home", "footer"); ?>


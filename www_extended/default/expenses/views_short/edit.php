<?php include view("home", "header"); ?> 

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="panel panel-default">
            <div class="panel-body">
                <?php include "part_edit.php"; ?>
            </div>
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
        <?php include view("expenses", "part_items_add_individual"); ?>
    </div>

</div>    

<?php include "part_btn_save.php"; ?>



<?php
/**
 * 
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


 */
?>

<?php include view("home", "footer"); ?>


<?php include view("home", "header"); ?> 


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">    

        <div class="panel panel-default">
            <div class="panel-body text-center" >
                <h3>
                    <?php echo _t("Invoice") . ": " . invoices_numberf_to_print($id); ?>
                </h3>                        
            </div>
        </div>


        <?php include "short_part_edit.php"; ?>        
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">        
        <?php include "short_part_edit_der.php"; ?>
    </div>

</div>    

<?php include "short_part_btn_save.php"; ?>




<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>



<?php include view("home", "footer"); ?>


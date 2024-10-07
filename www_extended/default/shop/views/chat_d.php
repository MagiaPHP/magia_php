<?php include view("home", "header"); ?>

<div class="row">

    <div class="col-xs-12 col-md-3 col-lg-3">
        <?php include "izq_chat_d.php"; ?>
    </div> 

    <div class="col-xs-12 col-md-6 col-lg-6"> 

        <?php include "nav_chat_d.php"; ?>



        <?php foreach ($chat as $key => $value) { ?>



            <?php
            if ($value['sender_id'] == $u_id) {
                include "chat_line_der.php";
            } else {
                include "chat_line_izq.php";
            }
            ?>
        <?php } ?>










    </div>
    <div class="col-xs-12 col-md-3 col-lg-3"> 
        <?php include "der_chat_d.php"; ?>
    </div>
</div>

<?php include view("home", "footer"); ?>
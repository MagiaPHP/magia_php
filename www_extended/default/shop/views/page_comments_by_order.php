<?php include view("home", "header"); ?>  

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-2 col-lg-2" style="overflow:scroll; height:700px;">
        <?php include view('shop', 'izq_comments'); ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4" style="overflow:scroll; height:700px;">

        <?php
        if ($error) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php
        if ($order_id) {
            include view('shop', 'page_comments_by_order_body');
        }

        if (permissions_has_permission($u_rol, "shop_comments", "create") && $order_id) {


            // para que sea compatible con el formulario de comments
            $id = "$order_id";

            $redi = 2;
            include "form_comments_add.php";
        }

        echo '<a name="comments"></a>';
        ?>
        <br>

    </div>



    <div class="col-xs-10 col-sm-10 col-md-6 col-lg-6">

        <?php
        if ($order_id) {
            include view('shop', 'page_comments_by_order_iframe');
        }
        ?>

    </div>
</div>




<?php include view("home", "footer"); ?>  
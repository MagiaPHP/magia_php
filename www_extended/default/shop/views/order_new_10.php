<?php include view("home", "header"); ?>

<?php farra_progreso(5, $config_orders_total_steps); ?>


<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "der_orderNew.php"; ?>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
        <a name="form"></a>
        <?php
        if ($_REQUEST) {
            foreach ($error as $key => $value) {
                message("info", "$value");
            }
        }
        ?>

        <?php include "order_new_00.php"; ?>

        <?php ######################################################################## ?>
        <h1><?php _t("Select types"); ?></h1> 
        <?php include "form_order_new_select_type.php"; ?>


        <script>

            function changeSrcTypes() {

                var id = $("input:radio[name=type_id]:checked").val();

                var img_l = "www/gallery/img/jiho_audio/types_l_" + id + ".jpg";
                var img_r = "www/gallery/img/jiho_audio/types_r_" + id + ".jpg";


                if (id && UrlExists(img_l)) {
                    document.getElementById("l_side").src = img_l;
                } else {
                    document.getElementById("l_side").src = "l.jpg";
                }

                if (id && UrlExists(img_r)) {
                    document.getElementById("r_side").src = img_r;
                } else {
                    document.getElementById("r_side").src = "r.jpg";
                }

            }

            function UrlExists(url)
            {
                var http = new XMLHttpRequest();
                http.open('HEAD', url, false);
                http.send();
                return http.status != 404;
            }

            document.addEventListener("DOMContentLoaded", function () {
                changeSrcTypes();
            });

        </script>

        <form class="form-horizontal" method="post" action="index.php">
            <input type="hidden" name="c" value="shop">
            <input type="hidden" name="a" value="ok_order_new_type_add">                  

            <?php
            switch ($order['side']) {
                case 'L':
                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> ';
                    order_new_form_types("L", $type_l_id);
                    echo '</div> ';
                    break;

                case 'R':
                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> ';
                    order_new_form_types("R", $type_r_id);
                    echo '</div> ';
                    break;

                case 'S':
                    echo '<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> ';
                    order_new_form_types("L", $type_l_id);
                    echo '</div> ';
                    break;

                default:
                    break;
            }
            ?>                                                          

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">  

                <div class="form-group text-center" >
                    <button type="submit" class="btn btn-primary">
                        <?php _t("Next"); ?>
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </button>
                </div>

            </div> 

        </form>


        <?php ########################################################################  ?>
        <?php shop_orders_button_cancel(); ?>


    </div>

    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php include "izq_orderNew.php"; ?>
    </div>


    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <?php //include "der_help.php"; ?>
    </div>




</div>


<?php include view("home", "footer"); ?>
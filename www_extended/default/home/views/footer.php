
<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>
<br>
<br>    


<?php
################################################################################
# C O M M E N T S
################################################################################
################################################################################
// Si el modulo activo
if (modules_field_module('status', 'comments') && $a != 'edit') {


    if (permissions_has_permission($u_rol, "comments", "read") && $a == "details") {
        echo '<div class="row">
                <div class="col-sm-8 col-md-8 col-lg-8">
                    <div class="shadow-container">';
        echo '<a name="comments"></a>';
        echo "<h4>" . _tr("Comments") . "</h4>";

        $args['redi'] = '5';
        $args['c'] = $c;
        $args['a'] = $a;
        $args['params'] = (isset($id)) ? "id=$id" : "";

        include view("comments", "comments");

        echo '</div>
            </div>
        </div>
        <br>
        ';
    }

    echo '<a name="add_comments"></a>';
    if (permissions_has_permission($u_rol, "comments", "create") && $a == "details") {


//        $args['redi'] = '5';
//        $args['c'] = $c;
//        $args['a'] = $a;
//        $args['params'] = (isset($id)) ? "id=$id" : "";

        include view("comments", "formCommentsUpdate");
        echo '<br>';
        echo '<br>';
        echo '<br>';
    }
}
?>

<?php
#################################################################################
#################################################################################
#################################################################################
#################################################################################
?>






<?php
################################################################################
################################################################################
# L O G S  
################################################################################
if (modules_field_module('status', 'logs') && permissions_has_permission($u_rol, "logs", "read") && $a == "details") {
    echo '<ul class="nav nav-tabs">
  <li role="presentation" class="active"><a href="#">' . _tr("Logs") . '</a></li>
</ul>';
    include view("logs", "logs");
}

################################################################################
################################################################################
# L O G S   S H O P   
################################################################################
if (permissions_has_permission($u_rol, "shop_logs", "read") && $c == "shop") {
    $logs = null;
    if (isset($id)) {
        $logs = shop_logs($a, $id);
    }

    if (isset($logs) && $u_rol == 'root') {

        echo "<h2>" . _tr("Logs") . "</h2>";
        echo "<h3>u_rol == root</h3>";

        include view("shop", "table_logs");
    }
}

////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////
?> 
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<p style="color:#1ad6c4;">
    <a href="https://factuz.com" target="new">Factuz.com</a> 
</p>



<?php //background-image:url("1920x1080.jpg");              ?>

<?php
/**
 * <style>

  #pie_con_img {

  background-image:url("https://picsum.photos/1920/1080");
  opacity: 0.99;
  background-repeat: no-repeat;
  background-position: center center;
  background-attachment: fixed;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
  }
  </style>
 */
?>




<div class="row m-0" id="pie_con_img">

    <div>

        <?php if (is_logued() && 1 == 1) { ?>
            <div class="container">
                <div class="row well">

                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <?php logo(null, null, "img-responsive"); ?>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">

                        <h3><?php echo contacts_formated($u_owner_id); ?></h3>

                        <p>
                            <?php echo contacts_field_id('tva', $u_owner_id); ?>
                        </p>

                    </div>


                    <?php
                    //----------------------------------------------------------
                    ?>
                    <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <div class="list-group">


                            <?php
                            foreach (_menus_list_by_location('footer1') as $key => $menu_item) {
                                echo '<a href="' . $menu_item['url'] . '" class="list-group-item">' . icon($menu_item['icon']) . ' ' . $menu_item['label'] . '</a>';
                            }
                            ?>
                        </div>
                    </div>


                    <?php
                    //----------------------------------------------------------
                    ?>





                </div>
            </div>
        <?php } ?>
    </div>


</div>

<?php
/**
 * 
 * <script src="includes/bootstrap_341/js/bootstrap.min.js" zintegrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
 */
?>

<script src="includes/bootstrap_341/js/bootstrap.min.js" crossorigin="anonymous"></script>




<script>
    function showPasswordNp() {
        var x = document.getElementById("np");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPasswordRp() {
        var x = document.getElementById("rp");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
<?php
// esto me permite desactivar botones al enviar 
// poner id = btn_send
// <button type="submit" id="btn_send" class="btn btn-default">Send</button>
?>
<script>
    function disableButton() {
        var btn = document.getElementById('btn_send');
        btn.disabled = true;
        btn.innerText = 'Sending.....'
    }
</script>

<?php
// dont delete the code, i you want desactivate go to 
// http://localhost/factuz/index.php?c=config&a=tawk
// and desacrtive there 
if (_options_option('config_tawk_activated')) {
    ?>
    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {}, Tawk_LoadStart = new Date();
        (function () {
            var s1 = document.createElement("script"), s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/664cd389981b6c564772f6c9/1hue1kklu';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
<?php }
?>

<?php
/**
 * Esto es para las columnas escoer y mostrar 
 */
?>        
<script src="www_extended/default/home/views/js/form_show_col_from_table.js" type="text/javascript"></script>


</body>
</html>

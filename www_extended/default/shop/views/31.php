<?php include "00_header.php"; ?>

<?php // include "nav_address.php"; ?>

<?php
// Gestion de mensajes cortos
sms($sms);

if ($error) {
    foreach ($error as $key => $value) {
        message("info", "$value");
    }
}
?>



<h1>Acceso a la secretaria</h1>

<p>
    Escribe aca su email, y nosotros le enviaremos una invitacion para la gestion 
</p>


<form class="form-inline">



    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3"><?php _t("Name"); ?></label>
        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="<?php _t("Name"); ?>">
    </div>


    <div class="form-group">
        <label class="sr-only" for="exampleInputPassword3"><?php _t("Lastname"); ?></label>
        <input type="password" class="form-control" id="exampleInputPassword3" placeholder="<?php _t("Lastname"); ?>">
    </div>



    <div class="form-group">
        <label class="sr-only" for="exampleInputEmail3"><?php _t("Email"); ?></label>
        <input type="email" class="form-control" id="exampleInputEmail3" placeholder="<?php _t("Email"); ?>">
    </div>




    <button type="submit" class="btn btn-default">
        <?php _t("Send invitation"); ?>
        <span class="glyphicon glyphicon-send"></span>
    </button>
</form>






<?php
shop_registre_next(3);
?>



<?php include "00_footer.php"; ?>
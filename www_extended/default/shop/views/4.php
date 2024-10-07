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

<h1>Condiciones de venta</h1>
<p>
    Como todo emprendedor serio y responsable tienes las codiciones de venta 
    especificas a tu negocio y a tu empresa, registralas aca.
</p>

<a name="next"></a>
<form>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <textarea class="form-control" name="condiciones" rows="20" ></textarea>
    </div>
    <button type="submit" class="btn btn-default">
        save
    </button>
</form>






<?php
shop_registre_next(41);
?>







<?php include "00_footer.php"; ?>